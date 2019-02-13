<?php

vc_map(array(
    "name" => esc_html__("Electrician Testimonials", 'electrician'),
    "base" => "electricity_testimonials",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => esc_html__('Electrician', 'electrician'),
    "as_parent" => array('only' => 'electricity_testimonials_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'dropdown',
            'heading' => __('Style', 'electrician'),
            'param_name' => 'style',
            'value' => array(
                'Slider' => 'slider',
                'Grid' => 'grid',
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Heading", 'electrician'),
            "param_name" => "title_1",
            'dependency' => array(
                'element' => 'style',
                'value' => 'slider',
            ),
        ),

        array(
            "type" => "colorpicker",
            "admin_label" => true,
            "heading" => esc_html__("Heading color", 'electrician'),
            "param_name" => "title_color",
            'dependency' => array(
                'element' => 'style',
                'value' => 'slider',
            ),
        ),
        //Slider options
        array(
            "type" => "textfield",
            "heading" => __("How many slides to show", 'electrician'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many slides to scroll", 'electrician'),
            "param_name" => "slides_to_scroll",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_scroll' => '1',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Infinite Scroll", 'electrician'),
            "param_name" => "infinite",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Autoplay", 'electrician'),
            "param_name" => "autoplay",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Autoplay Speed", 'electrician'),
            "param_name" => "autoplay_speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'autoplay_speed' => '5000',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'electrician'),
            "param_name" => "arrows",
            'value' => array(
                'No' => 'false',
                'Yes' => 'true'    
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Dots", 'electrician'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        )
    )
));

vc_map(array(
    "name" => esc_html__("Electrician Testimonials Item", 'electrician'),
    "base" => "electricity_testimonials_items",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => esc_html__('Electrician', 'electrician'),
    "as_child" => array('only' => 'electricity_testimonials'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Title", 'electrician'),
            "param_name" => "title",
            "value" => "",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Review Text", 'electrician'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Reviewer Name", 'electrician'),
            "param_name" => "rev_name",
        ),
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Company", 'electrician'),
            "param_name" => "company",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_electricity_testimonials extends WPBakeryShortCodesContainer {

    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_electricity_testimonials_items extends WPBakeryShortCode {

    }

}