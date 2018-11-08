<?php
/**
 * The template for displaying archive pages

 * Template Name: About

 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since 1.0
 * @version 1.0
 */

	$imageID = get_field('zdjecie');

get_header(); ?>

	<main class="container">
		<section class="about">
			   
			<img class="about__img" src="<?php awesome_acf_responsive_image( $imageID, 'thumb-640', '640px' ); ?>">
			<div class="about__content ">
				<h2 class="about__title"><?php echo __('o mnie'); ?></h2> 
				<div class="wysiwyg"><?php the_field('o_mnie'); ?></div>
			</div>
	
		</section>

		<!-- <section id="instagram"></section> -->
	</main>

<?php get_footer();
