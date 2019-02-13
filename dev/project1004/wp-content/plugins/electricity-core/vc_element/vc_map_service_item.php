<?php

vc_map(array(
    "name" => "Electrician Services links",
    "base" => "electrician_thumb_link",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => 'Electrician',
    "as_parent" => array('only' => 'electronic_thumb_link_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'electrician'),
            'param_name' => 'extra_class',
        ),
        array(
            "type" => "textfield",
            "heading" => __("No Of Column", 'electrician'),
            "param_name" => "col_no",
            "std" => "3",
            "admin_label" => true,
        ),
    )
));


vc_map(array(
    "name" => "Electronic Services links item",
    "base" => "electronic_thumb_link_item",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => 'Electrician',
    "as_child" => array('only' => 'electrician_thumb_link'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textarea",
            "class" => "",
            "heading" => esc_html__("Description text", "electrician"),
            "param_name" => "description",
        ),
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__("Title", "electrician"),
            "param_name" => "title",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "attach_image",
            "class" => "",
            "heading" => esc_html__("Thumbnail Image", "electrician"),
            "param_name" => "image",
        ),
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'electrician'),
            'param_name' => 'extra_class',
        ),
        vc_map_add_css_animation()
    )
));


if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_electrician_thumb_link extends WPBakeryShortCodesContainer {
        
    }

}

if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_electronic_thumb_link_item extends WPBakeryShortCode {
        
    }

}