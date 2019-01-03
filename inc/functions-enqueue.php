<?php
/**
 * Portfolio: Enqueue Assets
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */



function chomikoo_load_scripts() {

	$ver = '0301d';
	// $ver = time();

	wp_enqueue_style( 'styles', THEME_URL . 'dist/css/style.min.css', array(), $ver, 'all' );
	
	
	// wp_enqueue_script( 'fontawesome',  'https://use.fontawesome.com/releases/v5.5.0/js/all.js', array(), 'all' );
	// Slider
	// wp_enqueue_script( 'slider', THEME_URL . 'src/js/vendors/slick.js', array('jquery'), $ver, 'all'  );

	// Lazy loades
	// wp_enqueue_script( 'lazy', THEME_URL . 'src/js/vendors/lazyload.iife.js', array('jquery'), $ver, 'all'  );
	
	// TwentyTwenty - Compate imges 
	// wp_enqueue_script( 'twenty-event', THEME_URL . 'src/js/vendors/jquery.event.move.js', array('jquery'), $ver, 'all'  );
	// wp_enqueue_script( 'twenty', THEME_URL . 'src/js/vendors/jquery.twentytwenty.js', array('jquery'), $ver, 'all'  );

	// Instagram Feed
	// wp_enqueue_script( 'insta', THEME_URL . 'src/js/vendors/instafeed.js', array('jquery'), $ver, 'all'  );
	
	// Main scripts
	// wp_enqueue_script( 'myscript', THEME_URL . 'src/js/script.js', array('jquery'), $ver, 'all'  );

	if( is_page('portfolio') ) {
		// AJAX FILTER 
		wp_register_script( 'filter-ajax-js', THEME_URL . '/src/js/filter.js', array( 'jquery' ), $ver, true );
		wp_localize_script( 'filter-ajax-js', 'ajax_category_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( 'filter-ajax-js' );
	}
		
	
	// PRODUCTION	
	wp_enqueue_script( 'myscript', THEME_URL . 'dist/js/script.min.js', array('jquery'), $ver, 'all'  );
}

add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );