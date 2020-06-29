<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package My Music Band
*/

?>
</div><!-- .wrapper -->
</div><!-- #content -->
<?php get_template_part( 'template-parts/footer/footer', 'instagram' ); ?>

<footer id="colophon" class="site-footer">
	<aside id="footer-social-navigation" class="widget-area" role="complementary">
		<div class="wrapper">
			<?php kv_email_subscription_fn() ?><!-- Newsletter block -->
			<section class="widget social-widget">
				<h2 id="footer-blue-line" class="widget-title section-title"></h2>
				<nav class="social-navigation" role="navigation" aria-label="Social Menu">
					<div class="menu-social-container">
						<ul id="menu-connect-with-us" class="social-links-menu">
							<li id="facebook-logo" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5685">
								<a href="https://www.facebook.com/zuck"><?php echo wp_get_attachment_image('facebook-logo.png'); ?><span class="screen-reader-text">facebook</span></a>
							</li>
							<!-- <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5686">
								<a href="https://twitter.com/catchthemes"><span class="screen-reader-text">twitter</span></a>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5687">
								<a href="https://plus.google.com/+Catchthemes/posts"><span class="screen-reader-text">googleplus</span></a>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5688">
								<a href="https://www.pinterest.com/catchthemes/"><span class="screen-reader-text">pinterest</span></a>
							</li> -->
							<li id="youtube-logo" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5689">
								<a href="https://www.youtube.com/channel/UCO1GQbdmD4ejfJzxfQwuaew"><div id="white-triangle"></div><span class="screen-reader-text">youtube</span></a>
								<script>
									jQuery(document).ready(function(){
										jQuery('#youtube-logo a').mouseenter(function() {
											setTimeout(function() {
												jQuery('#white-triangle').css('border-top-color', '#1b1b1b');
												jQuery('#white-triangle').css('border-bottom-color', '#1b1b1b');
											}, 40);
											setTimeout(function() {
    										jQuery('#white-triangle').css('border-top-color', 'red');
												jQuery('#white-triangle').css('border-bottom-color', 'red');
											}, 180);
										});
										jQuery('#youtube-logo a').mouseleave(function() {
											jQuery('#white-triangle').css('border-top-color', 'red');
											jQuery('#white-triangle').css('border-bottom-color', 'red');
										});
									});
								</script>
							</li>
							<li id="instagram-logo" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5690">
								<a href="https://www.instagram.com/splendeur.legroupe/"><span class="screen-reader-text">instagram</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</section>
		</div>
	</aside>
	<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

	<div id="site-generator">
		<?php get_template_part('template-parts/navigation/navigation', 'social'); ?>

		<?php get_template_part('template-parts/footer/site', 'info'); ?>
	</div><!-- #site-generator -->
</footer><!-- #colophon -->
</div><!-- .below-site-header -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
