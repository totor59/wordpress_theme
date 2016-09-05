<?php
/*
Template Name: Archives
*/
get_header(); ?>

 <!-- LOGO -->


<div class="logo">

	<a href="#"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/CP-logo-blue.png" alt="logo"/></a>

</div>

		<!-- decor -->
	    <div class="decor background-secondary">
	    </div>
	    <!-- /decor -->
		<main id="main" class="site-main" role="main">


			<h1 class="heavy text-primary text_article">Archives</h1>


			<div class="text-primary bold text_article">
<?php

$args = array(
	'post_type' => 'evenements',
	'orderby' => 'meta_value',
	'meta_key' => '_expiration_date',
'meta_compare' => '>=',
'meta_value' => $display_date,
'order' => 'DESC'
);
$my_query = new WP_Query($args);

if ($my_query->have_posts()) : while ($my_query->have_posts()) :
$my_query->the_post();
$display_date = date('d F, Y', strtotime(get_post_meta($post->ID, "_expiration_date", true)));
?>

<?php if(!isset($currentMonth) || $currentMonth != date("m", strtotime($display_date))){
    $currentMonth = date("m", strtotime($display_date));
?>
	<h2 class="bold" style="margin: 15px 0;"><?php echo date("M. Y", strtotime($display_date)); ?></h2>
<?php
    }
?>

<ul>
    <li style="list-style:none;">
<a href="<?php echo get_permalink(); ?>">
        <p><?php echo get_post_meta($post->ID, "_date", true); ?>&nbsp;~&nbsp;<?php the_title(); ?></p>
</a>   
 </li>
</ul>
<?php endwhile; else: ?>
<ul id="shows">
<li><?php _e('Aucun événement à afficher! .'); ?></li>
</ul>
<?php endif; ?>



			</span>

	    </main> <!-- site main -->
						

<?php get_footer(); ?>
