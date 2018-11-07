<?php
/**
 * The template for displaying archive pages

 * Template Name: Albums Archive

 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main class="container">
		<section class="grid">

			<?php
				$args = array(
					'post_type' => 'albums',
					'orderby' => 'date',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);
				
				if ( $query->have_posts() ) {
					
					while( $query->have_posts() ) {
						$query->the_post(); ?>

						<article class="album-card album-<?php the_ID(); ?>">
								
								<a href="<?php the_permalink(); ?>" class="album-card__link">
										<div class="album-card__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)"></div>
										<!-- <?php the_post_thumbnail('large', array('class' => 'album-card__thumb')); ?> -->
									<div class="album-card__container">
										<h2 class="album-card__title"><?php the_title(); ?></h2>
										<span class="album-card__date"><?php the_field('data_sesji'); ?>,<?php the_field('miejsce'); ?></span>
									</div>
								</a>
							
						</article>
						
						<?php

}		

wp_reset_postdata();
				} else { ?>

					<p><?php __( 'Nie znaleziono ostatnio dodanych albumów.' ); ?></p>
					
					<?php
				}
				?>
			
			</section>
		</main>

<?php get_footer();
