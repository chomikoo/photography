<?php
/**
 * Portfolio: Custom Post Types
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */

	// Custom Post Type
	
    add_action('init', 'chomikoo_init_posttypes');
    
    function chomikoo_init_posttypes(){

        /*
         * Register Albums Post Type
         */

        
        $labels =  array(
            'name'              => __('Galerie'),
            'singular_name'     => __('Galerie'),
            'all_items'         => __('Wszystkie Galerie'),
            'add_new'           =>__('Dodaj nowy Galerie'),
            'add_new_item'      => __('Dodaj nowy Galerie'),
            'edit_item'         => __('Edytuj Galerie'),
            'new_item'          => __('Nowy Galeria'),
            'view_item'         => __('Zobacz Galerie'),
            'search_items'      => __('Szukaj w Galeriach'),
            'not_found'         =>  __('Nie znaleziono żadnych Galerii'),
            'not_found_in_trash' => __('Nie znaleziono żadnych Galerii w koszu'), 
        );
        
        $galery_args = array(
            'labels' => $labels,
            'parent_item_colon' => '',
            'public'                    => true,
            'publicly_queryable'        => true,
            'show_ui'                   => true, 
            'query_var'                 => true,
            'rewrite'                   => true,
            'capability_type'           => 'post',
            'hierarchical'              => false,
            'menu_icon'                 => 'dashicons-format-image',
            'menu_position'             => 5,
            'show_in_rest'              => true,
            'rest_base'                 => 'recipes-api',
            'rest_controller_class'     => 'WP_REST_Posts_Controller',
            'rewrite'                   => array('slug' => 'Galeriey'),
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields'
            ),
            'has_archive' => true            
        );
        
        register_post_type('recipes', $gallery_args);

    }

    