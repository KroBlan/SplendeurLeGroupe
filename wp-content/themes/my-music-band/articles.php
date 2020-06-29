<?php
/**
 * Template Name: Articles
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="singular-content-wrap">
				<?php
				/**
				 * Template part for displaying Recent Posts in the front page template
				 *
				 * @package My Music Band
				 */
				?>
				<div class="recent-blog-content archive-posts-wrapper section">
						<div class="section-content-wrapper recent-blog-content-wrapper">
							<div id="infinite-post-wrap" class="archive-post-wrap">
								<?php
								// Get requested resource location
								$link = $_SERVER['REQUEST_URI'];
								$page = 1;// Getting page number from url for pagination
								if (preg_match("/page/i", $link) == 1) $page = (int) str_replace("/", "", substr($link, -2));

								$articles = new WP_Query( array(
									'posts_per_page' => 5,
									'paged' => $page,
									'order' => 'DESC',
									'ignore_sticky_posts' => true
								) );
								/* Start the Loop */
								while ( $articles->have_posts() ) :
									$articles->the_post();
									?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="post-wrapper hentry-inner">
											<?php my_music_band_archive_image(); ?>

											<div class="entry-container">

												<header class="entry-header">
													<?php if ( is_sticky() ) { ?>
														<span class="sticky-post"><?php esc_html_e( 'Featured', 'my-music-band' ); ?></span>
													<?php } ?>

													<?php //if ( 'post' === get_post_type() ) : ?>
													<!-- <div class="entry-meta"> -->
														<?php //my_music_band_cat_list(); ?>
													<!-- </div> --><!-- .entry-meta -->
													<?php
													//endif; ?>

													<?php
													if ( is_singular() ) :
														the_title( '<h1 class="entry-title">', '</h1>' );
													else :
														the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
													endif;?>
												</header><!-- .entry-header -->

												<div class="entry-content">
													<?php
													$archive_layout = 'excerpt-image-top';

													if ( 'full-content-image-top' === $archive_layout || 'full-content' === $archive_layout ) {
														/* translators: %s: Name of current post. Only visible to screen readers */
														the_content( sprintf(
															wp_kses(

																__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'my-music-band' ),
																array(
																	'span' => array(
																		'class' => array(),
																	),
																)
															),
															get_the_title()
														) );

														wp_link_pages( array(
															'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'my-music-band' ),
															'after'  => '</div>',
														) );
													} else {
														the_excerpt();
													}
													?>
												</div><!-- .entry-content -->

												<div class="entry-footer">
													<?php if ( 'post' === get_post_type() ) : ?>
													<div class="entry-meta">
														<?php my_music_band_posted_on(); ?>
													</div><!-- .entry-meta -->
													<?php
													endif; ?>
												</div>
											</div> <!-- .entry-container -->
										</div><!-- .hentry-inner -->
									</article><!-- #post -->
									<?php
								endwhile;
								if (function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $articles));
								wp_reset_postdata();
								?>
							</div><!-- .archive-post-wrap -->
						</div><!-- .section-content-wrap -->
				</div> <!-- .recent-blog-content-wrapper -->
				<script>
					jQuery(document).ready(function() {
						jQuery('.readmore').html('Lire la suite');
					});
				</script>
			</div>	<!-- .singular-content-wrap -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php
get_footer();
