<?php
/**
* The template for displaying featured posts on the front page
*
* @package My Music Band
*/

$concerts = new WP_Query(array(
  'posts_per_page' => -1,
  'post_type' => 'concert',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC'
));
$concertsNumber = 0; // To limit the concerts displayed on home page
?>
<div id="events-content-area" class="content-area">
  <div class="content-area primary">
    <div class="events-content-wrapper">
      <div class="section-heading-wrapper events-section-headline">
        <div class="section-title-wrapper">
          <h2 class="section-title">Prochains Concerts</h2>
        </div>
      </div>
      <?php
      while ($concerts->have_posts() && $concertsNumber < 4) {
        if ($concertsNumber == 3) {
          echo '<p class="view-more"><a class="more-recent-posts button" href="'.get_site_url().'/incoming-dates">TOUS LES CONCERTS</a></p>';
          $concertsNumber++;
        } else {
          $concerts->the_post();
          $eventDate = explode(' ', get_field('event_date'));
          if ($eventDate[0] >= date('Ymd')) {// Si la date du concert n'est pas passée
            $concertsNumber++;

            $monthNum = substr(get_field('event_date'), 4, 2);
      			$mois = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin',
      			'07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre');

            $location = get_field('event_location');
      			$address = '';
      			foreach( array('city', 'country') as $i => $k ) {
      					if(isset($location[$k])) {
      							$address .= sprintf('<span class="segment-%s">%s</span>, ', $k, $location[$k]);
      					}
      			}
      			// Trim trailing comma.
      			$address = trim( $address, ', ' );
            ?>
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
                      <a href="#"><?php the_title(); ?></a>
                    </h2>
                  </div>
                  <?php if ($address != "") { ?>
                  <div class="event-list-item-venue">
                    <div class="entry-summary">
                      <p>
                        <a href="https://www.google.com/maps/place/<?php echo $location['address']; ?>" target="_blank">
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
            <?php
          } //if ($eventDate[0] >= date('Ymd'))
        } //if ($concertsNumber == 4)
      } //while ($concerts->have_posts())
      ?>
    </div>
  </div>
</div>
