<?php
/**
 * Portfolio: Header
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header class="header container">

            <h1 class="page-title"><a href="<?php echo get_home_url(); ?>">N<span class="hide-text">atalia</span><span class="red-text">Z<span class="hide-text">ięba</span></span></a></h1>
            <?php get_template_part('template-parts/navbar'); ?>
            
        </header>