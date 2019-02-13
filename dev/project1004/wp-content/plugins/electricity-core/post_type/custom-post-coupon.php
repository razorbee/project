<?php

// Register Custom Post Type
function electrician_coupons_post_type() {

    $labels = array(
        'name' => _x('Coupons', 'Post Type General Name', 'electrician'),
        'singular_name' => _x('Coupon', 'Post Type Singular Name', 'electrician'),
        'menu_name' => __('Coupons', 'electrician'),
        'name_admin_bar' => __('Coupon', 'electrician'),
        'archives' => __('Item Archives', 'electrician'),
        'parent_item_colon' => __('Parent Item:', 'electrician'),
        'all_items' => __('All Coupons', 'electrician'),
        'add_new_item' => __('Add New Coupon', 'electrician'),
        'add_new' => __('Add New Coupon', 'electrician'),
        'new_item' => __('New Service Item', 'electrician'),
        'edit_item' => __('Edit Coupon Item', 'electrician'),
        'update_item' => __('Update Coupon Item', 'electrician'),
        'view_item' => __('View Coupon Item', 'electrician'),
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

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'electrician'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our-coupons'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail'),
    );

    register_post_type('our-coupons', $args);
}

add_action('init', 'electrician_coupons_post_type', 0);
