<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package My Music Band
 */

get_header(); ?>

	<div id="primary" class="content-area single-concert-primary">
		<main id="main" class="site-main">
			<div class="singular-content-wrap">
				<?php
				while ( have_posts() ) : the_post();
				$location = get_field('event_location');
				if( $location ): ?>
				<div id="event-location">
					<div id="single-event-address">
						<h2><?php echo esc_attr($location['address']); ?></h2>
					</div>
					<div class="acf-map" data-zoom="16">
							<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
					</div>
				</div>
				<?php endif;

					get_template_part( 'template-parts/content/content', 'single' );

					//the_post_navigation();

                    the_post_navigation( array(
                    	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'my-music-band' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Prev Article', 'my-music-band' ) . '</span> <span class="nav-title">%title</span>',
                    	'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'my-music-band' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next Article', 'my-music-band' ) . '</span> <span class="nav-title">%title</span>',
                    ) );


					get_template_part( 'template-parts/content/content', 'comment' );

				endwhile; // End of the loop.
				?>
			</div><!-- .singular-content-wrap -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_KEY; ?>"></script>
	<script type="text/javascript">
	(function( $ ) {

	/**
	 * initMap
	 *
	 * Renders a Google Map onto the selected jQuery element
	 *
	 * @date    22/10/19
	 * @since   5.8.6
	 *
	 * @param   jQuery $el The jQuery element.
	 * @return  object The map instance.
	 */
	function initMap( $el ) {

	    // Find marker elements within map.
	    var $markers = $el.find('.marker');

	    // Create gerenic map.
	    var mapArgs = {
	        zoom        : $el.data('zoom') || 16,
	        mapTypeId   : google.maps.MapTypeId.ROADMAP
	    };
	    var map = new google.maps.Map( $el[0], mapArgs );

	    // Add markers.
	    map.markers = [];
	    $markers.each(function(){
	        initMarker( $(this), map );
	    });

	    // Center map based on markers.
	    centerMap( map );

	    // Return map instance.
	    return map;
	}

	/**
	 * initMarker
	 *
	 * Creates a marker for the given jQuery element and map.
	 *
	 * @date    22/10/19
	 * @since   5.8.6
	 *
	 * @param   jQuery $el The jQuery element.
	 * @param   object The map instance.
	 * @return  object The marker instance.
	 */
	function initMarker( $marker, map ) {

	    // Get position from marker.
	    var lat = $marker.data('lat');
	    var lng = $marker.data('lng');
	    var latLng = {
	        lat: parseFloat( lat ),
	        lng: parseFloat( lng )
	    };

	    // Create marker instance.
	    var marker = new google.maps.Marker({
	        position : latLng,
	        map: map
	    });

	    // Append to reference for later use.
	    map.markers.push( marker );

	    // If marker contains HTML, add it to an infoWindow.
	    if( $marker.html() ){

	        // Create info window.
	        var infowindow = new google.maps.InfoWindow({
	            content: $marker.html()
	        });

	        // Show info window when marker is clicked.
	        google.maps.event.addListener(marker, 'click', function() {
	            infowindow.open( map, marker );
	        });
	    }
	}

	/**
	 * centerMap
	 *
	 * Centers the map showing all markers in view.
	 *
	 * @date    22/10/19
	 * @since   5.8.6
	 *
	 * @param   object The map instance.
	 * @return  void
	 */
	function centerMap( map ) {

	    // Create map boundaries from all map markers.
	    var bounds = new google.maps.LatLngBounds();
	    map.markers.forEach(function( marker ){
	        bounds.extend({
	            lat: marker.position.lat(),
	            lng: marker.position.lng()
	        });
	    });

	    // Case: Single marker.
	    if( map.markers.length == 1 ){
	        map.setCenter( bounds.getCenter() );

	    // Case: Multiple markers.
	    } else{
	        map.fitBounds( bounds );
	    }
	}

	// Render maps on page load.
	$(document).ready(function(){
	    $('.acf-map').each(function(){
	        var map = initMap( $(this) );
	    });
			$('.single-concert-primary .nav-previous .nav-subtitle').html("concert precedent");
			$('.single-concert-primary .nav-next .nav-subtitle').html("concert suivant");
			// $('.header-media').css('height', '250px');
			$('.custom-header-content').css('padding', '50px 50px');
	});

	})(jQuery);
	</script>
<?php
get_sidebar();
get_footer();
