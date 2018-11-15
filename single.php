<?php
/**
 * Portfolio: Single Page
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */


 get_header(); ?>

    <main id="main" class="main">
    
    <?php
    while ( have_posts() ) {
            the_post();

        if( has_term('retusz', 'category') ) {
            get_template_part('template-parts/single/content','retouch');							
        } else  {
            get_template_part('template-parts/single/content','gallery');
        }
        


    } ?>

    </main>

<?php get_footer();
