<?php 
/**
*
*	@package Photoportfolio
*	==============================
*	AJAX FUNCTIONS
*	==============================
*/

// add_action('rest_api_init', 'customRoute');
// function customRoute() {
//     register_rest_route('photo/v1', 'list', array(
//         'methods'   =>  WP_REST_SERVER::READABLE,
//         'callback'  =>  'allPosts'
//     ));
// }
// function allPosts() {
//     $posts = new WP_Query(array(
//         'post_type' => array('albums', 'retusz'),
//         's' => $data['id']
//     ));
//     $postResults = array();
//     while($posts->have_posts()) {
//         $posts->the_post();
//         array_push($postResults, array(
//             'id'    => get_the_ID(),
//             'title' => get_the_title(),
//             'permalink' => get_the_permalink(),
//             'thumbnail' => get_the_post_thumbnail(),
//             'acf'   => get_fields(),
//             )
//         );
//     }
//     return $postResults;
// }
