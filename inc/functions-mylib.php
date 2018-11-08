<?php
/**
 * Portfolio: Other
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */


	/////////////////////////////////////////////////
	// Count posts views
	/////////////////////////////////////////////////
	function chomikoo_track_post_views( $post_id ) {
		$count_key = 'post_views_count';
		$count = get_post_meta($post_id, $count_key, true );
		if( $count == '' )  {
			delete_post_meta($post_id, $count_key, '0');
			add_post_meta($post_id, $count_key, '0');
			return '0'			;
		}
		return $count;
	}
	
	function chomikoo_set_post_views( $post_id ) {	
		$count_key = 'post_views_count';
		$count = get_post_meta($post_id, $count_key, true);

		if( $count == '' ) {
			$count = 0;
			delete_post_meta($post_id, $count_key, '0');
			add_post_meta($post_id, $count_key, '0');
		} else {
			$count++;
			update_post_meta($post_id, $count_key, $count);
		}
	}

	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// add_action( 'wp_head', 'chomikoo_track_post_views' );


	/////////////////////////////////////////////////
	//Set thumbnail on save post
	/////////////////////////////////////////////////

	function set_featured_image_from_gallery() {
	  $has_thumbnail = get_the_post_thumbnail($post->ID);

	  if ( !$has_thumbnail ) {

	    $images = get_field('gallery', false, false);
	    $image_id = $images[0];

	    if ( $image_id ) {
	      set_post_thumbnail( $post->ID, $image_id );
	    }
	  }
	}


	//////////////////
	// CUSTOM EXCERPT
	//////////////////

	function custom_field_excerpt($field, $excerpt_length = 30) {
		global $post;
		$text = get_field($field); 
		if ( '' != $text ) {
			$text = strip_shortcodes( $text );
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]&gt;', ']]&gt;', $text);
			$excerpt_more = apply_filters('excerpt_more', '' . '&nbsp;...');
			$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
		}
		return apply_filters('the_excerpt', $text);
	}


	/*-------------------------------------
	Move the Yoast SEO Meta Box to the Bottom of the edit screen in WordPress
	---------------------------------------*/
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');