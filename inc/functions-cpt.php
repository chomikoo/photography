<?php
/**
 * Portfolio: Custom Post kategoriees
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */

	// Custom Post kategoriee
	
    add_action('init', 'chomikoo_init_posttypes');
    
    function chomikoo_init_posttypes(){

        /*
         * Register Albums Post kategoriee
         */

        
        $labels =  array(
            'name'              => __('Galeria'),
            'singular_name'     => __('Galeria'),
            'all_items'         => __('Wszystkie Galerie'),
            'add_new'           =>__('Dodaj nową Galerie'),
            'add_new_item'      => __('Dodaj nową Galerie'),
            'edit_item'         => __('Edytuj Galerie'),
            'new_item'          => __('Nowy Galeria'),
            'view_item'         => __('Zobacz Galerie'),
            'search_items'      => __('Szukaj w Galeriach'),
            'not_found'         =>  __('Nie znaleziono żadnych Galerii'),
            'not_found_in_trash' => __('Nie znaleziono żadnych Galerii w koszu'), 
        );
        
        $gallery_args = array(
            'labels' => $labels,
            'parent_item_colon' => '',
            'public'                    => true,
            'publicly_queryable'        => true,
            'show_ui'                   => true, 
            'query_var'                 => true,
            'rewrite'                   => true,
            'capability_kategoriee'           => 'post',
            'hierarchical'              => false,
            'menu_icon'                 => 'dashicons-format-image',
            'menu_position'             => 5,
            'show_in_rest'              => true,
            'rest_base'                 => 'recipes-api',
            'rest_controller_class'     => 'WP_REST_Posts_Controller',
            'rewrite'                   => array('slug' => 'Gallery'),
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields'
            ),
            'has_archive' => true            
        );
        
        register_post_type('albums', $gallery_args);

    }


    function chomikoo_init_taxonomies(){
        // Category TAXONOMY
            $category_taxonomy_labels = array(
                'name'              => __('Kategoria'),
                'singular_name'     => __('Kategoria'),
                'search_items'      => __('Wyszukaj kategorie'),
                'popular_items'     => __('Najpopularniejsze kategorie'),
                'all_items'         => __('Wszystkie kategorie'),
                'most_used_items'   => null,
                'parent_item'       => null,
                'parent_item_colon' => null,
                'edit_item'         => __('Edytuj kategorie') ,
                'update_item'       => __('Aktualizuj kategorie'),
                'add_new_item'      => __('Dodaj nowy kategorie'),
                'new_item_name'     => __('Nazwa nowego kategorie'),
                'separate_items_with_commas'    => __('Oddziel kategoriey przecinkiem'),
                'add_or_remove_items'           => __('Dodaj lub usuń kategorie'),
                'choose_from_most_used'         => __('Wybierz spośród najczęścież używanych kategori'),
                'menu_name'                     => __('kategori'),
            );
            // kategoriee
            register_taxonomy(
                'category',
                array('albums'),
                array(
                    'hierarchical' => true,
                    'labels' => $category_taxonomy_labels,
                    'show_ui' => true,
                    'update_count_callback' => '_update_post_term_count',
                    'query_var' => true,
                    'rewrite' => array('slug' => 'kategorie' )
            ));
     
        }
    
    