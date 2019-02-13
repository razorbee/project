<?php
$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'js_composer')] = 0;
}
vc_map(array(
    "name" => esc_html__("Electrician Price", 'electrician'),
    "base" => "electrician_price",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => esc_html__('Electrician', 'electrician'),
    "as_parent" => array('only' => 'electrician_price_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
        ),
    )
));


vc_map(array(
    "name" => "Electrician Price Item",
    "base" => "electrician_price_item",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => esc_html__('Electrician', 'electrician'),
    "as_child" => array('only' => 'electrician_price'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Plan Title", "electrician"),
            "param_name" => "title",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Planning Currency", "electrician"),
            "param_name" => "currency",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Planning Rate", "electrician"),
            "param_name" => "rate",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Plan Time", "electrician"),
            "param_name" => "time",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Plan content", 'electrician'),
            "param_name" => "content",
            "value" => "",
        ),
       	 
       		 
        array(
            "type" => "dropdown",
            "heading" => "Featured Plan",
            "param_name" => "featured",
            "value" => array(
                "No" =>false,
                "Yes" =>true,
            ),
            "std" => 'false',
            "admin_label" => false,
        ),

        //vc modal part		
		array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', 'electrician'),
            'param_name' => 'target_plan',
            'value' => array(
                'None' => '1',
                'Modal' => '2',
                 'Link' => '3',
            )
        ),
		 array(
            "type" => "textfield",
            "heading" => esc_html__("Button Title", "electrician"),
            "param_name" => "button",
            "holder" => "div",
            "admin_label" => false,
			"dependency" => array(
            "element" => "target_plan",
            "value" => "2"
            ),
        ),	
        array(
        "type" => "dropdown",
        "heading" => esc_html__("Contact Form Shortcode", "electrician"),
        "param_name" => "cf7scode",
        "holder" => "div",
        "admin_label" => false,
        'value' => $contact_forms,
        "dependency" => array(
            "element" => "target_plan",
            "value" => "2"
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Modal Title", "electrician"),
            "param_name" => "modal_title",
            "holder" => "div",
            "admin_label" => false,
			"dependency" => array(
				"element" => "target_plan",
				"value" => "2"
			),
        ),
		array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Modal Button URL",
            "param_name" => "modal_button_url",
			"dependency" => array(
				"element" => "target_plan",
				"value" => "3"
			),
        ),
        
        
    )
));

class WPBakeryShortCode_electrician_Price extends WPBakeryShortCodesContainer {
    
}

class WPBakeryShortCode_electrician_Price_Item extends WPBakeryShortCode {
    
}