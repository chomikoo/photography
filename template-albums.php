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
		<section class="grid">

			<?php
				$args = array(
					'post_type' => 'albums',
					'orderby' => 'date',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);
				
				if ( $query->have_posts() ) {
					$i = 0;
					while( $query->have_posts() ) {
						$query->the_post(); 
						
						if( has_term('retusz', 'category') ) {
							// get_template_part('template-parts/card','retouch');	
							include( locate_template('template-parts/card-retouch.php') );
						} else  {

							include( locate_template('template-parts/card-gallery.php') );
							// get_template_part('template-parts/card','gallery');
						}
					
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
