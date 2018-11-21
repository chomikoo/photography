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

	<main class="main container">

		<section class="albums">

			<div class="box box--filter albums__side">
					<div class="box__thumb">
						<img class="box__img " <?php awesome_acf_responsive_image(get_field('zdjecie'),'thumb-640', '1200px') ?>  />
					</div>
							
					<div class="box__content">

						<h2 class="box__title"><?php echo __('Kategorie:', 'photoportfolio'); ?></h2>
	
						<div id="category-filter" class="box__filter">
							<?php echo get_category_filters(); ?> 
						</div>
	
					</div>
		
			</div>

			<div id="filter-results" class="albums__main grid">

			<?php	
				$albums_args = array(
					'post_type' => 'albums',
					'posts_per_page' => 25,
				);

				$albums_loop = new WP_Query($albums_args);

				if ( $albums_loop->have_posts() ) {
					$i=0;
					while ( $albums_loop->have_posts() ) {
						$albums_loop->the_post();
						echo '<div class="album-card--grey '. (($i%3) ? 'grid--v1' : 'grid--v2').'"></div>';
						$i++;
					}
				
					
					wp_reset_postdata();
				}
			?>

			</div>
			
			</section>

		</main>

<?php get_footer();
