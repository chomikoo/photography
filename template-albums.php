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
	
						<div id="category-filter">
							<?php echo get_category_filters(); ?> 
						</div>
	
					</div>
		
			</div>

			<div id="filter-results" class="albums__main grid">
				
			</div>
			
			</section>

		</main>

<?php get_footer();
