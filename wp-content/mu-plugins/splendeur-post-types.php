<?php
function splendeur_custom_post_types() {
	register_post_type('concert', array(
		'supports' => array('title', 'editor', 'excerpt'),
		'rewrite' => array('slug' => 'concerts'),
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Concerts',
      'add_new_item' => 'Ajouter Nouveau Concert',
      'edit_item' => 'Modifier Concert',
      'all_items' => 'Tous Les Concerts',
      'singular_name' => 'Concert'
		),
		'menu_icon' => 'dashicons-tickets-alt'
	));
}
add_action( 'init', 'splendeur_custom_post_types');

// Fixe pagination 404 problem
add_action('pre_get_posts','bamboo_pre_get_posts');
function bamboo_pre_get_posts( $query ) {
  if( $query->is_main_query() && !$query->is_feed() && !is_admin() ) {
    $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
  }
}

function my_acf_google_map_api($api){
	$api['key'] = 'AIzaSyCUuERKpbeyDgoZ2yvXAG8aYXu9TKA122Q';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
