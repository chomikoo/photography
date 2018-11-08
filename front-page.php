<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Portfolio
 * @version 1.0
 */

get_header(); ?>
	<main class="container main">
		<section class="head">
 
			<div class="carousel">
			<?php
				$slider = get_field('slider_top');
				if( $slider ) {
					echo '<ul class="carousel__list">';
					foreach( $slider as $image) {
						// echo ;
					?>
						<li>
						
							<img class="carousel__img" <?php awesome_acf_responsive_image( $image[ID], 'thumb-640', '640px' ); ?> alt="<?php echo $image['alt']; ?>" />

						</li>
					<?php
					}
					echo '</ul>';
				}
 
			?>
			</div>

			<div class="head__about">
				<h2 class="head__title"><?php the_field('tytul'); ?>.</h2>
				<div class="head__text text"><?php the_field('tekst'); ?></div>
			</div>

		</section>

		<section class="grid">

			<!-- Recenty added  -->
			<?php
				$args = array(
					'post_type' => 'albums',
					'orderby' => 'date',
					'posts_per_page' => 4
				);
				$query = new WP_Query($args);

				if ( $query->have_posts() ) {

					while( $query->have_posts() ) {
						$query->the_post(); ?>

						<article class="album-card album-<?php the_ID(); ?>">
				
								<a href="<?php the_permalink(); ?>" class="album-card__link">
									<!-- <div class="album-card__img" style="background-image:url(<?php the_post_thumbnail_url(); ?>)"></div> -->
									<?php the_post_thumbnail('large', array('class' => 'album-card__img')); ?>
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
			
				
				<article id="instagram" class="box instagram">
					
					<!-- <span class="fab fa-instagram"></span> -->

				</article>
	
				<article class="box">
			
					<img class="box__img" src="<?php the_field('kontakt_zdjecie'); ?>">
					<div class="box__content">
						<h2 class="box__title"><?php echo __('Kontakt'); ?></h2>
						<?php the_field('contact'); ?>
					</div>
			
				</article>

		</section>
	
	</main>

<?php get_footer();
