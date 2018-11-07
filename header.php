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
        <title><?php bloginfo('name'); ?><?php wp_title(' | ', 'echo', 'right'); ?></title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header class="header container">

            <h1 class="page-title">Natalia<span class="red-text">Zięba</span></h1>
            <?php get_template_part('template-parts/navbar'); ?>
            
        </header>