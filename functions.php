<?php

add_theme_support( 'menus' );

// Register the 'primary' menu.
function register_theme_menus() {
	register_nav_menus (
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
}

add_action( 'init', 'register_theme_menus');

function my_register_sidebars() {

	// Register the 'primary' sidebar.
	register_sidebar(
		array(
			'id' => 'primary-sidebar',
			'name' => __( 'Primary' ),
			'description' => __( 'An upcoming events agenda' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}


add_action( 'widgets_init', 'my_register_sidebars' );


// Call the CSS stylesheets.

function wpt_theme_styles() {

	wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'flexbox_css', get_template_directory_uri() . '/css/flexbox.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );


add_theme_support( 'post-thumbnails');


//Call the Javascript

function add_my_script() {
	wp_enqueue_script(
		'custom-script', get_template_directory_uri() . '/js/main.js',
		array('jquery')
	);

}



add_action( 'wp_enqueue_scripts', 'add_my_script' );



// Limit character on Excerpt

function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



//Custom post type "Evenement"
add_action('init', 'cpt_init');
function cpt_init() {
	$labels = array(
		'name' => 'Evénements',
		'singular_name' => 'evenements',
		'add_new' => 'Ajouter un événement',
		'add_new_item' => 'Ajouter un événement',
		'edit_item' => 'Editer un événement',
		'new_item' => 'Nouvel événement',
		'all_items' => 'Tous les événements',
		'view_item' => 'Voir événement',
		'search_items' => 'Chercher événement',
		'not_found' => 'Aucun événement trouvé',
		'not_found_in_trash' => 'Aucun événement trouvé dans la corbeille',
		'parent_item_colon' => '',
		'menu_name' => 'Evénements'
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Les évenements de la Condition Publique',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
		'taxonomies' => array( 'category', 'post_tag' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
	
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	register_post_type('evenements', $args );
}


add_filter ("manage_edit-evenements_columns", "evenements_edit_columns");
add_action ("manage_posts_custom_column", "evenements_custom_columns");

function evenements_edit_columns($columns) {

	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Event",
		"tf_col_ev_cat" => "Catégorie",
		"tf_col_ev_date" => "Date",
		"tf_col_ev_desc" => "Description",
		"tf_col_ev_thumb" => "Thumbnail",


	);
	return $columns;
}



function evenements_custom_columns($column)
{
	global $post;
	$custom = get_post_custom();
	switch ($column)
	{
	case "tf_col_ev_cat":
		// - show taxonomy terms -
		$eventcats = get_the_terms($post->ID, "category");
		$eventcats_html = array();
		if ($eventcats) {
			foreach ($eventcats as $eventcat)
				array_push($eventcats_html, $eventcat->name);
			echo implode($eventcats_html, ", ");
		} else {
			_e('None', 'themeforce');;
		}
		break;
	case "tf_col_ev_date":
		// - show dates -
		echo get_post_meta($post->ID, '_date', true );
		break;
	case "tf_col_ev_thumb":
		// - show thumb -
		$post_image_id = get_post_thumbnail_id(get_the_ID());
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			echo '<img src="';
			//	echo bloginfo('template_url');
			//	echo '../../uploads/2016/08/';
			echo $thumbnail;
			echo '" alt="" style="height: 60px;"/>';
		}
		break;
		case "tf_col_ev_desc";
		the_excerpt();
		break;

	}
}


//Metabox "Infos Evenement"


add_action('add_meta_boxes','init_metabox');
function init_metabox(){
	add_meta_box('info_event', 'Informations Evénement', 'info_event', 'evenements', 'normal');
}

function info_event($post){
	$date      = get_post_meta($post->ID,'_date',true);
	$expiration_date   = get_post_meta($post->ID,'_expiration_date',true);
	$billetterie   = get_post_meta($post->ID,'_billetterie',true);
?>
<label for="date">Date qui apparait sur le site</label><br>
<input id="date" style="width: 650px;" type="text" name="date" value="<?php echo $date; ?>" /><br>
<label for="expiration_date">Date de l'événement au format yyyymmdd</label><br>
<input id="expiration_date" style="width: 650px;" type="text" name="expiration_date" value="<?php echo $expiration_date; ?>" /><br>
<label for="billetterie">Collez ici le lien billetterie de l'événement</label><br>
<input id="billetterie" style="width: 650px;" type="text" name="billetterie" value="<?php echo $billetterie; ?>" /><br>
<label for="billetterie">Collez ici le lien billetterie de l'événement</label><br>

<?php
}

add_action('save_post','save_metabox');
function save_metabox($post_id){
	if(isset($_POST['date'])){
		update_post_meta($post_id, '_date', sanitize_text_field($_POST['date']));
	}
	if(isset($_POST['expiration_date'])){
		update_post_meta($post_id, '_expiration_date', sanitize_text_field($_POST['expiration_date']));
	}
	if(isset($_POST['billetterie'])){
		update_post_meta($post_id, '_billetterie', sanitize_text_field($_POST['billetterie']));
	}

}

//Customize Background Color --- Plugin "Réglages couleur"

add_action( 'customize_register' , 'my_theme_options' );

function my_theme_options( $wp_customize ) {
	// Sections, settings and controls will be added here
	$wp_customize->add_setting( 'mytheme_color',
		array(
			'default' => 'fffd38',
			'transport' => 'postMessage',
		)
	);
	$wp_customize->add_section(
		'mytheme_color_options',
		array(
			'title'       => __( 'Réglages couleurs', 'Condi' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Changez la couleur secondaire ici', 'Condi'),
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'mytheme_color_control',
		array(
			'label'    => __( 'Couleur Secondaire', 'Condi' ),
			'section'  => 'mytheme_color_options',
			'settings' => 'mytheme_color',
			'priority' => 10,
		)
	));
}

add_action( 'wp_head' , 'my_dynamic_css' );

function my_dynamic_css() {
?>
	<style type='text/css'>
	#volet {
		background-color:<?php echo get_theme_mod('mytheme_color') ?> ;
	}
	#decor {
		background-color:<?php echo get_theme_mod('mytheme_color') ?> ;
	}
	#changelink:hover {
		color:<?php echo get_theme_mod('mytheme_color') ?> ;
	}
	#cssmenu> ul> li:hover> a, #cssmenu ul li.active a {
	color: <?php echo get_theme_mod('mytheme_color') ?>;
	}
	@media only screen and (max-width : 1200px) {
	#cssmenu ul, #cssmenu .submenu-button  {
	background-color:  <?php echo get_theme_mod('mytheme_color') ?>;
}
}
	</style>
<?php
}

//Custom title on homepage

add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );

/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wpdocs_hack_wp_title_for_home( $title )
{
	if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
		$title = __( 'La Condition Publique' ) . ' | ' . get_bloginfo( 'description' );
	}
	return $title;
}


// !!! SECURITE !!!


//Désactiver l'éditeur de texte dans l'espace admin

define('DISALLOW_FILE_EDIT',true);

//Masquer la version de Wordpress utilisée
remove_action("wp_head", "wp_generator");

//Masquer les messages d'erreur
add_filter('login_errors',create_function('$a', "return null;"));


?>
