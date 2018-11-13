<?php
/**
 * The template for displaying archive pages

 * Template Name: Retusz Archive

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
					'post_type' => 'retusz',
					'orderby' => 'date',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);
				
				if ( $query->have_posts() ) {
					$i = 0;
					while( $query->have_posts() ) {
						$query->the_post(); ?>

						<article class="album-card album-<?php the_ID(); ?> <?php echo ($i%3) ? 'grid--v1' : 'grid--v2' ?>">
								
								<a href="<?php the_permalink(); ?>" class="album-card__link">
									<?php
										$beforeID = get_field('przed');
										$afterID = get_field('po');
									?>
									<div class="album-card__compare">
										<img class="album-card__img album-card__img--left lazy" <?php awesome_acf_responsive_image_lazyload( $beforeID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
										<img class="album-card__img album-card__img--right lazy" <?php awesome_acf_responsive_image_lazyload( $afterID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
									</div>

									<div class="album-card__container">
										<h2 class="album-card__title"><?php the_title(); ?></h2>
										<!-- <span class="album-card__date"><?php echo $beforeID; ?>,<?php echo $afterID; ?></span> -->
									</div>
								</a>
							
						</article>
						
						<?php
						$i++;
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
