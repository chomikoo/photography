<?php
/**
 * Portfolio: Header
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */
?>


<?php
    wp_nav_menu( array( 
        'theme_location' => 'top-menu', 
        'container' => false,
        // 'menu_class' => 'menu',
        'items_wrap' => '<ul id="main-menu" class="menu">%3$s</ul>',
        ) ); 
?>

<button id="hamburger" class="btn hamburger" aria-label="Menu Open">
    <span class="hamburger__bar"></span>
    <span class="hamburger__bar"></span>
    <span class="hamburger__bar"></span>
</button>