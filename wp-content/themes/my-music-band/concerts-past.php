<?php
/**
 * Template Name: Past Concerts
 */

get_header(); ?>

<div class="content-area primary">

	<div class="archive-posts-wrapper">
		<?php
		$header_image = my_music_band_featured_overall_image();

		if ( 'disable' === $header_image ) : ?>

		<header class="page-header">
			<?php the_archive_title( '<h2 id="banner-title" class="page-title section-title">', '</h2>' ); ?>

			<div class="taxonomy-description-wrapper">
				<?php the_archive_description(); ?>
			</div>
		</header><!-- .entry-header -->

	<?php endif; ?>
	<?php
	// Get requested resource location
	$link = $_SERVER['REQUEST_URI'];
	$page = 1;// Getting page number from url for pagination
	if (preg_match("/page/i", $link) == 1) $page = (int) str_replace("/", "", substr($link, -2));

	$date = date('Ymd');
	$concerts = new WP_Query(array(
		'posts_per_page' => 5,
		'post_type' => 'concert',
		'paged' => $page,
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_query' => array(
	    array(
	      'key' => 'event_date',
				'compare' => '>=',
	      'value' => $date,
	      'type' => 'DATE'
	    )
	  )
	));
	if ($concerts->have_posts()) :
	?>
	<div class="section-content-wrapper">
		<div id="infinite-post-wrap" class="archive-post-wrap">
			<?php
			/* Start the Loop */
			while ($concerts->have_posts()) : $concerts->the_post();

			$monthNum = substr(get_field('event_date'), 4, 2);
			$mois = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin',
			'07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre');

			$location = get_field('event_location');
			$address = '';
			foreach( array('city', 'country') as $i => $k ) {
				if(isset($location[$k]))
				$address .= sprintf('<span class="segment-%s">%s</span>, ', $k, $location[$k]);
			}
			$address = trim( $address, ', ' );// Trim trailing comma.
			?>

			<div id="events-content-area" class="content-area">
				<div class="content-area primary">
					<div class="events-content-wrapper">
						<article id="events-post-<?php the_id(); ?>" class="event-list-item hentry">
							<div class="entry-container">
								<div class="entry-meta" style="padding-top: 3px;">
									<span class="posted-on">
										<a>
											<div class="entry-date">
												<div class="mobile-inline">
													<p><strong style="margin-bottom: 0; margin-top: 3px;"><?php echo substr(get_field('event_date'), 6, 8); ?></strong></p>
													<p><?php echo $mois[$monthNum]; ?><br></p>
													<p style="font-size: 15px;"><b><?php echo substr(get_field('event_date'), 0, 4); ?></b></p>
												</div>
												<p style="margin-bottom: 0; line-height: 90%;">-</p>
												<p style="font-size: 16px;"><b><?php echo get_field('event_time'); ?></b></p>
											</div>
										</a>
									</span>
								</div>
								<div class="event-list-description">
									<div class="event-title">
										<h2 class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
									</div>
									<?php if ($address != "") { ?>
										<div class="event-list-item-venue">
											<div class="entry-summary">
												<p>
													<a id="archive-event-map-link" href="https://www.google.com/maps/place/<?php echo $location['address']; ?>" target="_blank">
														<i class="fa fa-map-marker" style="font-size: 36px; margin-right: 0.2em;"></i>
														<?php echo $address; ?>
													</a>
												</p>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="event-list-item-actions">
									<a href="<?php the_permalink(); ?>" class="more-link"><span class="more-button">En Savoir plus</span></a>
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>

			<?php
			/*
			* Include the Post-Format-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
		// }
	endwhile;
	if (function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $concerts));
	wp_reset_postdata();
	?>
</div><!-- .archive-post-wrap -->
</div><!-- .section-content-wrap -->

<?php
else :

	get_template_part( 'template-parts/content/content', 'none' );

endif; ?>
</div><!-- .archive-posts-wrapper -->
</div><!-- .primary-->
<script>
jQuery(document).ready(function(){
	jQuery('.custom-header-content').css('padding', '4em 50px');
	jQuery('#content .wrapper').css('padding-bottom', '0');
	jQuery('.entry-title.section-title').html('Concerts Passées');
});
</script>
<?php
get_sidebar();
get_footer();
