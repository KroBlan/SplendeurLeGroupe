<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My Music Band
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' );  ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'my-music-band' ); ?></a>

	<?php get_template_part( 'template-parts/top-playlist/content', 'playlist' ); ?>

	<header id="masthead" class="site-header nav-up">
		<script>
			// Hide Header on on scroll down
			var didScroll;
			var lastScrollTop = 0;
			var delta = 5;
			var navbarHeight = jQuery('#masthead').outerHeight();

			jQuery(window).scroll(function(event){
				didScroll = true;
			});

			setInterval(function() {
				if (didScroll) {
						hasScrolled();
						didScroll = false;
						if (window.scrollY<=0) {
							jQuery('#masthead').removeClass('nav-down').addClass('nav-up');
							if (jQuery('#slide-arrow').hasClass('slide-arrow-up')) {
								jQuery('#slide-arrow').removeClass('slide-arrow-up').addClass('slide-arrow-down');
							}
						}
				}
			}, 250);

			function hasScrolled() {
				var st = jQuery(this).scrollTop();

				// Make sure they scroll more than delta
				if(Math.abs(lastScrollTop - st) <= delta)
						return;

				// If they scrolled down and are past the navbar, add class .nav-up.
				// This is necessary so you never see what is "behind" the navbar.
				if (st > navbarHeight) {
					if (st > lastScrollTop && st > navbarHeight) {
							// Scroll Down
							jQuery('#masthead').removeClass('nav-down').addClass('nav-up');
							if (jQuery('#slide-arrow').hasClass('slide-arrow-up')) {
								jQuery('#slide-arrow').removeClass('slide-arrow-up').addClass('slide-arrow-down');
							}
					} else {
							// Scroll Up
							if(st + jQuery(window).height() < jQuery(document).height()) {
									jQuery('#masthead').removeClass('nav-up').addClass('nav-down');
									if (jQuery('#slide-arrow').hasClass('slide-arrow-down')) {
										jQuery('#slide-arrow').removeClass('slide-arrow-down').addClass('slide-arrow-up');
									}
							}
					}
				}
				lastScrollTop = st;
			}
			jQuery( document ).ready(function() {
				jQuery('#slide-nav-container').click(function() {
				  if (jQuery('#masthead').hasClass('nav-up')) {
						jQuery('#masthead').removeClass('nav-up').addClass('nav-down');
						if (jQuery('#slide-arrow').hasClass('slide-arrow-down')) {
							jQuery('#slide-arrow').removeClass('slide-arrow-down').addClass('slide-arrow-up');
						}
					} else {
						jQuery('#masthead').removeClass('nav-down').addClass('nav-up');
						if (jQuery('#slide-arrow').hasClass('slide-arrow-up')) {
							jQuery('#slide-arrow').removeClass('slide-arrow-up').addClass('slide-arrow-down');
						}
					}
				});
			});
		</script>
		<div class="site-header-main">
			<div class="wrapper" style="padding-bottom: 0;">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

				<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
			</div><!-- .wrapper -->
		</div><!-- .site-header-main -->
		<div id="slide-nav-container">
			<div id ="slide-arrow" class="slide-arrow-down">

			</div>
		</div>
	</header><!-- #masthead -->

	<div class="below-site-header">

		<?php get_template_part( 'template-parts/header/breadcrumb' ); ?>

		<?php get_template_part( 'template-parts/slider/content', 'slider' ); ?>

		<?php get_template_part( 'template-parts/header/header', 'media' ); ?>

		<div id="content" class="site-content">
			<div class="wrapper">
