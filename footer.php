<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Portfolio
 * @since 1.0
 * @version 1.2
 */

?>

	<footer class="footer container">
		
		<div class="footer__social">
			<?php get_template_part('template-parts/footer-socials'); ?>
		</div>

	</footer>


<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
<script>
WebFont.load({
	google: {
	families: ['Montserrat:400,700|Open+Sans&amp;subset=latin-ext']
	}
});
</script>
<?php wp_footer(); ?>

</body>
</html>
