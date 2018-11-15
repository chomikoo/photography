<?php
/**
 * Portfolio: Other
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */

	function lazy_load_thumbnail($post_id,$image_size,$max_width) {
		$img_id = get_post_thumbnail_id($post_id);

		$img_src = wp_get_attachment_image_url($img_id, $image_size);

		$image_srcset = wp_get_attachment_image_srcset( $img_id, $image_size );

		$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

		echo 'data-src="'.$img_src.'" data-srcset="'.$image_srcset.'" data-sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" alt="'.$alt.'"' ;
	}


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


	/*-----------------------------------------------------------------------
	Move the Yoast SEO Meta Box to the Bottom of the edit screen in WordPress
	------------------------------------------------------------------------*/
	function yoasttobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

	/*-----------------------------------------------------------------------
	// Require a featured image before publish posts
	------------------------------------------------------------------------*/

	add_action('save_post', 'chomikoo_check_thumbnail');
	add_action('admin_notices', 'chomikoo_thumbnail_error');

	function chomikoo_check_thumbnail( $post_id ) {
		// change to any custom post type 
		if( get_post_type($post_id) != 'post' )
			return;

		if ( ! has_post_thumbnail( $post_id ) ) {
			// set a transient to show the users an admin message
			set_transient( "has_post_thumbnail", "no" );
			// unhook this function so it doesn't loop infinitely
			remove_action('save_post', 'chomikoo_check_thumbnail');
			// update the post set it to draft
			wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));

			add_action('save_post', 'chomikoo_check_thumbnail');
		
		} else {

			delete_transient( "has_post_thumbnail" );
			
		}

	}

	function chomikoo_thumbnail_error() {
		// check if the transient is set, and display the error message
		if ( get_transient( "has_post_thumbnail" ) == "no" ) {
			echo "<div id='message' class='error'><p><strong>Musisz ustawić obraz dla postu przed publikacja. Twoj post został zapisany</strong></p></div>";
			delete_transient( "has_post_thumbnail" );
		}
	}