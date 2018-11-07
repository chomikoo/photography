<?php
/**
 * Portfolio: Menus
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */


// Register Menu
function chomikoo_custom_menu() {
	register_nav_menus(
	array(
		'top-menu' => __( 'Menu' ),
		'social-menu' => __( 'Social menu' )
		)
	);
}
add_action( 'init', 'chomikoo_custom_menu' );

