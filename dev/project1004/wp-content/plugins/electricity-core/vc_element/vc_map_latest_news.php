<?php

vc_map(array(
    "name" => esc_html__("Latest News", 'electrician'),
    "base" => "electrician_latestNews_row",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => esc_html__('Electrician', 'electrician'),
    "as_parent" => array('only' => 'electrician_latest_news'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'electrician'),
            'param_name' => 'extra_class',
        ),
        //Slider options
        array(
            "type" => "textfield",
            "heading" => __("How many slides to show", 'electrician'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '2',
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
                'autoplay_speed' => '6000',
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
    "name" => "Latest News Item",
    "base" => "electrician_latest_news",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => 'Electrician',
    "params" => array(
                    array(
                      "type" => "textfield",
                      "class" => "",
                      "heading" => esc_html__( "Title", "electrician" ),
                      "param_name" => "title",
                        "holder" => "div",
                        "admin_label" => false,
                    ),
                    array(
                      "type" => "textfield",
                      "class" => "",
                      "heading" => esc_html__( "Date", "electrician" ),
                      "param_name" => "text",
                        "holder" => "div",
                        "admin_label" => false,
                    ),
                    array(
                      "type" => "textarea",
                      "class" => "",
                      "heading" => esc_html__( "Description text", "electrician" ),
                      "param_name" =>  "content",
                    ),
                    array(
                      "type" => "attach_image",
                      "class" => "",
                      "heading" => esc_html__( "Thumbnail Image", "electrician" ),
                      "param_name" =>  "image",
                    ),
                    array(
                    "type" => "vc_link",
                    "holder" => "div",
                    "heading" => "Link URL",
                    "param_name" => "link_url",
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Extra Class', 'electrician'),
                        'param_name' => 'extra_class',
                    ),
                )
));
 
if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_electrician_latestNews_row extends WPBakeryShortCodesContainer {

    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_electrician_latest_news extends WPBakeryShortCode {

    }

}