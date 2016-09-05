<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage condipub
 * @since condipub 1.0 beta
 *
 */

get_header(); ?>
<?php get_sidebar(); ?>

 <!-- LOGO -->

 <?php if (have_posts()) : ?>

<div class="logo">

   	<a href="/"><img src="http://condipub.simplon-roubaix.com/wp-content/uploads/2016/08/CP-logo-blue.png" alt="logo"/></a>

</div>

		<!-- decor -->
	    <div id="decor" class="decor background-secondary">
	    </div>
	    <!-- /decor -->
		<main id="main" class="site-main" role="main">
			<?php while (have_posts()) : the_post(); ?>

			
			<div class="centerimg postimg">

				<?php the_post_thumbnail('post', array( 'class' => 'img_article' )); ?>

			</div>
			<section class="text_article">
			<h2 class="heavy text-primary">

				<?php the_title(); ?>

			</h2>
<a href="<?php echo get_post_meta($post->ID, '_billetterie', true ); ?>" class="background-primary btn-ticket heavy"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/ticket.png" class="ticket-brand"/>BILLETTERIE</a>

			<div class="article-container text-primary bold">
					<?php the_content(); ?>
			</div>
			<a href="<?php echo get_post_meta($post->ID, '_billetterie', true ); ?>" class="background-primary btn-ticket heavy"><img src="http://vps312019.ovh.net/wp-content/uploads/2016/08/ticket.png" class="ticket-brand"/>BILLETTERIE</a>
			</section>

			


				<?php endwhile; ?>


			</span>

	    </main> <!-- site main -->
							<?php endif; ?>

<?php get_footer(); ?>
