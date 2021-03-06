<?php
/**
 * The template for displaying archive pages

 * Template Name: Contact

 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main class="container ">

		<section class="contact">

			<div class="contact__form">
				<?php echo do_shortcode(get_field('contact_shortcode')); ?>
				<!-- <?php echo do_shortcode('[contact-form-7 id="81" title="Formularz 1"]') ?> -->
			</div>

			<article class="contact__box box">
				<img class="box__img" src="<?php the_field('zdjecie'); ?>">
				<div class="box__content wysiwyg">
					<h2 class="box__title"><?php echo __('Kontakt'); ?></h2>
					<?php the_field('tekst'); ?>
				</div>
			</article>

		</section>


	</main>

<?php get_footer();
