<?php
/**
 * Portfolio: Single Page
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */


get_header(); ?>

<main id="main" class="container">

    <?php

        while ( have_posts() ) {
            the_post();
        ?>
        <section class="entry">
            <h1 class="page-title"> <?php the_title(); ?></h1>
            <p> <?php the_field('data_sesji');?> <?php the_field('miejsce');?></p>
        </section>
            
        <?php

        echo '<section class="gallery">';
            
            $gallery = get_field('galeria');
            if( $gallery ) {
                echo '<ul class="gallery">';
                foreach( $gallery as $image) {  
                ?>
                <li class="gallery__element">
                    <figure class="gallery__figure">
                        <img class="gallery__img" <?php awesome_acf_responsive_image( $image[ID], 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
                        <?php 
                            $figcaption = $image['caption'];
                            if( $figcaption ) {
                                
                                echo "<figcaption class=\"gallery__caption\">$figcaption</figcaption>";
                                
                            }
                        ?>
                    </figure>
                </li>
                <?php
            }
            echo '</ul>';
        }
        
        echo '</section>';
            
        }
        
    ?>


</main>

<?php get_footer();
