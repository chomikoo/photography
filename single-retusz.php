<?php
/**
 * Portfolio: Single Retusz
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */


    $beforeID = get_field('przed');
    $afterID = get_field('po');

get_header(); ?>

<main class="container">

    <?php

        while ( have_posts() ) {
            the_post();
        
        ?>
        <!-- <section class="entry">
            <h1 class="page-title"> <?php the_title(); ?></h1>
            <p> <?php the_field('data_sesji');?> <?php the_field('miejsce');?></p>
        </section> -->
        <section class="compare">
            <div class="compare__container">
                <img class="" <?php awesome_acf_responsive_image( $beforeID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
                <img class="" <?php awesome_acf_responsive_image( $afterID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />			
            </div>
        </section>

        <?php } ?>

</main>

<?php get_footer();