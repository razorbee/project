<?php
// Register Custom Post Type
function electrician_services_post_type() {


    $postype_name_electrician_services = 'Services';

    if(function_exists('electrician_options')){
        $electrician_options = electrician_options();
        if( isset( $electrician_options['electrician-postype_name_electrician_services'] )&&!empty($electrician_options['electrician-postype_name_electrician_services']) ){
                $postype_name_electrician_services = $electrician_options['electrician-postype_name_electrician_services'];
        }
    }

    

    $labels = array(
        'name' => _x($postype_name_electrician_services, 'Post Type General Name', 'electrician'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'electrician'),
        'menu_name' => __('Services', 'electrician'),
        'name_admin_bar' => __('Service', 'electrician'),
        'archives' => __('Item Archives', 'electrician'),
        'parent_item_colon' => __('Parent Item:', 'electrician'),
        'all_items' => __('All Services', 'electrician'),
        'add_new_item' => __('Add New Service', 'electrician'),
        'add_new' => __('Add New Service', 'electrician'),
        'new_item' => __('New Service Item', 'electrician'),
        'edit_item' => __('Edit Service Item', 'electrician'),
        'update_item' => __('Update Service Item', 'electrician'),
        'view_item' => __('View Service Item', 'electrician'),
        'search_items' => __('Search Item', 'electrician'),
        'not_found' => __('Not found', 'electrician'),
        'not_found_in_trash' => __('Not found in Trash', 'electrician'),
        'featured_image' => __('Featured Image', 'electrician'),
        'set_featured_image' => __('Set featured image', 'electrician'),
        'remove_featured_image' => __('Remove featured image', 'electrician'),
        'use_featured_image' => __('Use as featured image', 'electrician'),
        'insert_into_item' => __('Insert into item', 'electrician'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'electrician'),
        'items_list' => __('Items list', 'electrician'),
        'items_list_navigation' => __('Items list navigation', 'electrician'),
        'filter_items_list' => __('Filter items list', 'electrician'),
    );

    $slug_postype_electrician_services = 'electrician-services';

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'electrician'),
        'public' => true,
        'publicly_queryable' => true,
        'taxonomies' => array('taxonomy_service'),
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => apply_filters('electrician_services_postype_electrician_services_slug',$slug_postype_electrician_services) ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('electrician_services', $args);
}

add_action('init', 'electrician_services_post_type', 0);
