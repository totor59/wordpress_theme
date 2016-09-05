<?php
/*
Template Name: Page
*/
get_header(); ?>

 <!-- LOGO -->

 <?php if (have_posts()) : ?>

<div class="logo">

   	<a href="#"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/CP-logo-blue.png" alt="logo"/></a>

</div>

		<!-- decor -->
	    <div class="decor background-secondary">
	    </div>
	    <!-- /decor -->
		<main id="main" class="site-main" role="main">
			<?php while (have_posts()) : the_post(); ?>


			<div class="centerimg">

				<?php the_post_thumbnail('post', array( 'class' => 'img_article' )); ?>

			</div>

			<h2 class="heavy text-primary text_article">

				<?php the_title(); ?>

			</h2>


			<div class="text-primary bold text_article">
					<?php the_content(); ?>
			</div>




				<?php endwhile; ?>


			</span>

	    </main> <!-- site main -->
							<?php endif; ?>

<?php get_footer(); ?>
