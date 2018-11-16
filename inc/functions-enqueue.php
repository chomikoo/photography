<?php
/**
 * Portfolio: Enqueue Assets
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */



function chomikoo_load_scripts() {

	$ver = time();

	wp_enqueue_style( 'styles', THEME_URL . 'dist/css/style.min.css', array(), $ver, 'all' );
	
	
	wp_enqueue_script( 'fontawesome',  'https://use.fontawesome.com/releases/v5.5.0/js/all.js', array(), 'all' );
	wp_enqueue_script( 'slider', THEME_URL . 'src/js/vendors/slick.js', array('jquery'), $ver, 'all'  );

	wp_enqueue_script( 'lazy', THEME_URL . 'src/js/vendors/lazyload.iife.js', array('jquery'), $ver, 'all'  );

	wp_enqueue_script( 'twenty-event', THEME_URL . 'src/js/vendors/jquery.event.move.js', array('jquery'), $ver, 'all'  );
	wp_enqueue_script( 'twenty', THEME_URL . 'src/js/vendors/jquery.twentytwenty.js', array('jquery'), $ver, 'all'  );


	wp_enqueue_script( 'insta', THEME_URL . 'src/js/vendors/instafeed.js', array('jquery'), $ver, 'all'  );

	// AJAX FILTER 
	wp_register_script( 'genre-ajax-js', THEME_URL . '/src/js/genre.js', array( 'jquery' ), $ver, true );
    wp_localize_script( 'genre-ajax-js', 'ajax_category_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script( 'genre-ajax-js' );

	wp_enqueue_script( 'myscript', THEME_URL . 'src/js/script.js', array('jquery'), $ver, 'all'  );
	
	// PRODUCTION	
	// wp_enqueue_script( 'myscript', THEME_URL . 'src/js/script.js', array('jquery'), $ver, 'all'  );
}

add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );