<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package conditionpub
 */

get_header(); ?>


<?php get_sidebar(); ?>


<!-- ##################
 MAIN CONTENT
 ####################-->


 <!-- LOGO -->

 <div class="logo">
   <a href="/"><img src="http://condipub.simplon-roubaix.com/wp-content/uploads/2016/08/CP-logo-blue.png" alt="logo"/></a>

 </div>

  <div class="logo_resp">
   <a href="/"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/CP-logo-arche-blue.png" alt="logo_resp"/></a>

 </div>


 <!-- decor -->
 <div id="decor" class="decor background-secondary">
 </div>
 <!-- /decor -->
 <main>
 <!-- Caroussel -->

 <?php
$args = array(
	'post_type'     => 'evenements',
	'category_name'=> 'alaune',
	'post_per_page' => 1,
);

$slides = new WP_Query( $args);

if ( $slides->have_posts()) : ?>

<div class="carousel">
       <?php while ($slides->have_posts() ) : $slides->the_post(); ?>
      <div class="item">
	<a href="<?php echo get_permalink(); ?>">
	  <div class="imageContainer">
	    <?php the_post_thumbnail( 'slides' ); ?>
	 </div>

	  <div class="overlay">
	    <p class="bold"><?php echo get_post_meta($post->ID, 'Date de l événement', true ); ?></p>
	    <h3 class="heavy"><?php the_title( ); ?></h3>
	    <span class="bold"><?php the_excerpt( ); ?></span>
	 </div>
       </a>

      </div>

   <?php endwhile; ?>
    </div>
 <?php endif; ?>

 <!-- /Caroussel -->

 <!-- Actus&Labos -->
   <!-- Actus -->
<?php
	$args = array(
		'post_type' => array( 'post', 'evenements'),
		'category_name'=> 'actu',
		'post_per_page' => 1,
		"meta_key" => "_sortdate",
		"orderby" => "meta_value",
		"order" => "ASC"
	);

$actu = new WP_Query( $args);

if ( $actu->have_posts()) : ?>




   <section class="actuslabos">
     <h2 class="text-primary bold">ACTUALITES</h2>
     <div class="wrap-content">
			 <?php while ($actu->have_posts() ) : $actu->the_post(); ?>

       <figure class="actus">
	 <figcaption class="text-primary">
	 <p class="bold"><span class="heavy"><?php echo get_post_meta($post->ID, '_date', true ); ?></span><br><?php the_title( ); ?><br></p>
	 </figcaption>
	 <div class="img-wrapper background-primary">
	   <a class="actus" href="<?php echo get_permalink(); ?>"><img <?php the_post_thumbnail( 'slides' ); ?> </a>
	 </div>
       </figure>
			   <?php endwhile; ?>

     </div>
	 <?php endif; ?>

     <!-- Labos -->
<?php
	$args = array(
		'post_type' => array( 'post', 'evenements'),
		'category_name'=> 'les-labos',
		'post_per_page' => 1,
	);

$labos = new WP_Query( $args);

if ( $labos->have_posts()) : ?>

    <h2 class="text-primary bold">LABORATOIRES</h2>
    <div class="wrap-content">
       <?php while ($labos->have_posts() ) : $labos->the_post(); ?>

	     <figure class="labos">
			     <figcaption class="text-primary">
				     <p class="bold"><span class="heavy"><?php echo get_post_meta($post->ID, 'Date de l événement', true ); ?></span><br><?php the_title( ); ?></p>
					     </figcaption>
						     <div class="img-wrapper background-primary">
							       <a href="<?php echo get_permalink(); ?>"><img class="labos" <?php the_post_thumbnail( 'slides' ); ?></a>
								       </div>
									     </figure>
  <?php endwhile; ?>
     </div>
   </section>
  <?php endif; ?>
   <!-- /Actus&Labos -->
 </main>
<!-- ##################
/MAIN CONTENT
####################-->

<?php
get_footer(); ?>
