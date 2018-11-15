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
					'post_type' => array('albums', 'retusz'),
					'orderby' => 'date',
					'posts_per_page' => 6
				);
				$query = new WP_Query($args);

				if ( $query->have_posts() ) {

					while( $query->have_posts() ) {
						$query->the_post(); 

						if( has_term('retusz', 'category') ) {
							get_template_part('template-parts/card','retouch');							
						} else  {
							get_template_part('template-parts/card','gallery');
						}
					
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
					<?php 
						$contact_img = get_field('kontakt_zdjecie');
					?>

					<img class="box__img lazy" data-src="<?php echo $contact_img['url']; ?>" alt="<?php echo $contact_img['alt']; ?>">
					<div class="box__content wysiwyg">
						<h2 class="box__title"><?php echo __('Kontakt'); ?></h2>
						<?php the_field('contact'); ?>
					</div>
			
				</article>

		</section>
	
	</main>

<?php get_footer();
