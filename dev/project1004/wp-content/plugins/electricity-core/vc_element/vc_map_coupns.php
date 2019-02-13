<?php

vc_map(array(
    "name" => "Coupns",
    "base" => "electrician_coupns",
    "icon" => ELECTRICITY_THEME_URI . '/images/electricity.png',
    "category" => 'Electrician',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Posts Per Page', 'electrician'),
            'param_name' => 'per_page',
            'value' => 2
        ),
        
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Column No', 'electrician'),
            'param_name' => 'column',
            'value' => 2
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'electrician'),
            'param_name' => 'extra_class',
        )
    )
));