<?php
/**
 * Portfolio: Footer
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */
?>


<?php
    wp_nav_menu( array( 
        'theme_location' => 'social-menu', 
        'container' => false,
        // 'menu_class' => 'menu',
        'items_wrap' => '<ul id="footer-menu" class="footer__menu">%3$s</ul>',
        ) ); 
?>

