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

add_filter('wp_nav_menu','chomikoo_add_menuclass');
function chomikoo_add_menuclass($ulclass) {
	return preg_replace('/<a/', '<a class="menu__link"', $ulclass, -1);
}