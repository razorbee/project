<?php

add_filter('rwmb_meta_boxes', 'electrician_register_framework_post_meta_box');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function electrician_register_framework_post_meta_box($meta_boxes) {
    global $wp_registered_sidebars;
    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign

    $sidebars = array();
    foreach ($wp_registered_sidebars as $key => $value) {
        $sidebars[$key] = $value['name'];
    }

    $meta_boxes[] = array(
        'id' => 'meta-box-electrician-coupons',
        'title' => esc_html__('Our Coupons Meta Fields', 'electrician'),
        'pages' => array(
            'our-coupons',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Coupon Top Left', 'electrician'),
                'desc' => esc_html__('Coupon Top Left', 'electrician'),
                'id' => "_coupon-top-left",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Top Right Title', 'electrician'),
                'desc' => esc_html__('Coupon Top Right Title', 'electrician'),
                'id' => "_coupon-top-right-title",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Top Right Percentance', 'electrician'),
                'desc' => esc_html__('Coupon Top Right Percentance', 'electrician'),
                'id' => "_coupon-top-righ-percentance",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Top Right Content', 'electrician'),
                'desc' => esc_html__('Coupon Top Right Content', 'electrician'),
                'id' => "_coupon-top-right-content",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Bottom Right', 'electrician'),
                'desc' => esc_html__('Coupon Bottom Right', 'electrician'),
                'id' => "_coupon-bottom-right",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Bottom Right Image', 'electrician'),
                'desc' => esc_html__('Coupon Bottom Right Image', 'electrician'),
                'id' => "_coupon-bottom-right-mage",
                'type' => 'image',
            ),
    ));

    //$posts_page = get_option('page_for_posts');
    return $meta_boxes;
}
