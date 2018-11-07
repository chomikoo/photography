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
	wp_enqueue_script( 'slider', THEME_URL . 'src/js/vendors/imagesloaded.js', array('jquery'), $ver, 'all'  );

	wp_enqueue_script( 'insta', THEME_URL . 'src/js/vendors/instafeed.js', array('jquery'), $ver, 'all'  );
	wp_enqueue_script( 'myscript', THEME_URL . 'src/js/script.js', array('jquery'), $ver, 'all'  );
	
	// PRODUCTION	
	// wp_enqueue_script( 'myscript', THEME_URL . 'src/js/script.js', array('jquery'), $ver, 'all'  );
}

add_action( 'wp_enqueue_scripts', 'chomikoo_load_scripts' );