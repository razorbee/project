<?php
/**
 * Add Shortcode To Visual Composer
 */
$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'electrician')] = 0;
}

vc_map(array(
    "name" => "Action Button",
    "base" => "electricial_action_button",
    "description" => 'Action Button',
    "category" => 'Electrician',
    "icon" =>  ELECTRICITY_THEME_URI . '/images/electricity.png',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "title",
            "admin_label" => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', 'electrician'),
            'param_name' => 'button_action',
            'value' => array(
                'None' =>'',
                'Link' => '1',
                 'Pop up' => '2',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Pop Up Id', 'electrician'),
            'param_name' => 'popup_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'electrician'),
                'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),

        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Pop Up Location To Open', 'electrician'),
            'param_name' => 'popup_position',
            'value' => array(
                        'bottom'=>'bottom',
                         'top'=>'top',
                            ),
            'save_always' => true,
            'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),

        ),

        array(
            'type' => 'dropdown',
            'heading' => __( 'Icon library', 'js_composer' ),
            'value' => array(
                __( 'Electrician', 'electrician' ) => 'electrician',
                __( 'Font Awesome', 'js_composer' ) => 'fontawesome',
                __( 'Open Iconic', 'js_composer' ) => 'openiconic',
                __( 'Typicons', 'js_composer' ) => 'typicons',
                __( 'Entypo', 'js_composer' ) => 'entypo',
                __( 'Linecons', 'js_composer' ) => 'linecons',
                __( 'Mono Social', 'js_composer' ) => 'monosocial',
            ),
            'param_name' => 'icon_type',
            'description' => __( 'Select icon library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'fontawesome',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_openiconic',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'openiconic',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_typicons',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'typicons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_entypo',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_linecons',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'linecons',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon_monosocial',
            'value' => 'vc-mono vc-mono-fivehundredpx',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'monosocial',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'monosocial',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
         array(
            'type' => 'iconpicker',
            'heading' => __( 'Icon', 'js_composer' ),
            'param_name' => 'icon',
            'value' => 'icon-lightning',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'electrician',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'electrician',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
        ),
 
        array(
                "type" => "vc_link",
                "holder" => "div",
                "heading" => "Action Button",
                "param_name" => "link_url",
                'dependency' => array(
                'element' => 'button_action',
                'value' => '1',
                ),
             ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    ),
    'js_view' => 'VcIconElementView_Backend',
));