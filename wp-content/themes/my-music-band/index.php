<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package My Music Band
 */

get_header(); ?>
		<main class="site-main">
			<?php get_template_part( 'template-parts/playlist/content', 'playlist' ); ?>

		 <?php get_template_part( 'template-parts/event/content', 'event' ); ?>

		 <?php get_template_part( 'template-parts/hero-content/content', 'hero' ); ?>

		 <?php get_template_part('template-parts/portfolio/display','portfolio'); ?>

		 <?php get_template_part( 'template-parts/testimonial/display', 'testimonial' ); ?>

		 <?php get_template_part('template-parts/featured-content/display','featured'); ?>

		 <?php get_template_part('template-parts/instagram-feed/content','instagram'); ?>

		 <?php get_template_part('template-parts/recent-posts/front','recent-posts'); ?>
	 </main><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
