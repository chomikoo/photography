<?php 

//Get category Filters
function get_category_filters() {
    $terms = get_terms('category');
    $filters_html = false;
 
    if( $terms ) {
        $filters_html = '<ul>';
 
        foreach( $terms as $term ) {

            $term_id = $term->term_id;
            $term_name = $term->name;
 
            $filters_html .= '<li class="term_id_'.$term_id.'">'.$term_name.'<input type="checkbox" name="filter_category[]" value="'.$term_id.'"></li>';

        }
        $filters_html .= '<li class="clear-all">Zobacz wszystkie</li>';
        $filters_html .= '</ul>';
 
        return $filters_html;
    }
}


//Add Ajax Actions
add_action('wp_ajax_category_filter', 'ajax_category_filter');
add_action('wp_ajax_nopriv_category_filter', 'ajax_category_filter');

//Construct Loop & Results
function ajax_category_filter() {

	$query_data = $_GET;
	
    $albums_terms = ( $query_data['albums'] ) ? explode(',', $query_data['albums'] ) : false;
    
	$tax_query = ($albums_terms) ? array( array(
		'taxonomy' => 'category',
		'field' => 'id',
		'terms' => $albums_terms
	) ) : false;
	
	// $search_value = ($query_data['search']) ? $query_data['search'] : false;
	
	$paged = (isset($query_data['paged']) ) ? intval($query_data['paged']) : 1;
	
	$albums_args = array(
		'post_type' => 'albums',
		'posts_per_page' => 25,
		'tax_query' => $tax_query,
		'paged' => $paged
	);
	$albums_loop = new WP_Query($albums_args);
	
	if( $albums_loop->have_posts() ) {
        $i = 0;
        $grid = true;
        while( $albums_loop->have_posts() ){ 
            $albums_loop->the_post();
            
            if( has_term('retusz', 'category') ) {
                include( locate_template('template-parts/card-retouch.php') );
            } else  {
                include( locate_template('template-parts/card-gallery.php') );
            }
            
            $i++;
        }
    
        // echo '<div class="filter__navigation">';
        // $big = 999999999;
        // echo paginate_links( array(
        // 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		// 	'format' => '?paged=%#%',
		// 	'current' => max( 1, $paged ),
		// 	'total' => $albums_loop->max_num_pages
        //     ) );
        //     echo '</div>';	
        } else {
            echo '<h2>Przykro mi nie znaleziono żadnego albumu pasujacego do kryterium </h2>';
        
        }
    
	wp_reset_postdata();
	
	die();
}