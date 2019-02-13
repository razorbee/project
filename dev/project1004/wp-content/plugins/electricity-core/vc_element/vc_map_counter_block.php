<?php 


vc_map(array(
    "name" => esc_html__("Electrician Counter Box", 'electrician'),
    "base" => "electrician_counterbox",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => esc_html__('Electrician', 'electrician'),
    "as_parent" => array('only' => 'electrician_counterbox_item'),
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
                'slides_to_show' => '4',
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
                'autoplay_speed' => '4000',
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
    "name" => "Counter Box Item",
    "base" => "electrician_counterbox_item",
    "category" => 'Electrician',
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Counter Value(must be numeric)",
            "param_name" => "count_number",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Speed(must be numeric)",
            "param_name" => "number_scrolling_speed",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

 
if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_electrician_counterbox extends WPBakeryShortCodesContainer {

    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_electrician_Counterbox_Item extends WPBakeryShortCode {

    }

}