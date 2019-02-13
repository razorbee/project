<?php


function electrician_customizer_live_preview()
{
    wp_enqueue_script( 
          'ils-themecustomizer',            //Give the script an ID
          ELECTRICITY_JS_URL.'/theme-customizer.js',//Point to file
          array( 'jquery','customize-preview' ),    //Define dependencies
          '',                       //Define a version (optional) 
          true                      //Put script in footer?
    );
}
//add_action( 'customize_preview_init', 'electrician_customizer_live_preview' );

/*Customizer Code HERE*/



function electrician_theme_customizer( $wp_customize ) {

    // Customizer Title Control
    class WP_Customize_Title_Control extends WP_Customize_Control {
        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
        }
        public function render_content() {
            ?><h3><?php echo esc_html( $this->label ); ?></h3><?php
        }
    }




    $wp_customize->add_panel( 'all_styling_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'title'          => esc_html__('Styling Settings', 'electrician'),
        'description'    => esc_html__('All Styling Settings', 'electrician'),
    ) );
    



    //common color

     // All Color Settings
    $wp_customize->add_section( 'electrician_common_color_section' , array(
        'title'      => esc_html__( 'Common Color', 'electrician' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    //body_color

    $wp_customize->add_setting ( 'electrician_colors[preloader_border_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[preloader_border_color]', array(
        'label'        => esc_html__( 'Preloader Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[title_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[title_color]', array(
        'label'        => esc_html__( 'Title Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[price_table_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[price_table_bg_color]', array(
        'label'        => esc_html__( 'Price Bg Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[heading_span_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[heading_span_color]', array(
        'label'        => esc_html__( 'Theme Active Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[price_table_odd_bg_color]', array (
        'default' => '#eeeef3',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[price_table_odd_bg_color]', array(
        'label'        => esc_html__( 'Price Bg Odd Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[price_table_even_bg_color]', array (
        'default' => '#f4f4f5',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[price_table_even_bg_color]', array(
        'label'        => esc_html__( 'Price Bg Even Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[tags_color]', array (
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[tags_color]', array(
        'label'        => esc_html__( 'Tags color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[tags_border_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[tags_border_color]', array(
        'label'        => esc_html__( 'Tags Border Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[tags_hover_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[tags_hover_color]', array(
        'label'        => esc_html__( 'Tags Hover Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[tags_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[tags_bg_color]', array(
        'label'        => esc_html__( 'Tags Bg Hover Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );
    
    //body_color

    $wp_customize->add_setting ( 'electrician_colors[link_color]', array (
        'default' => '#252936',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[link_color]', array(
        'label'        => esc_html__( 'Link Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[link_color_hover]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[link_color_hover]', array(
        'label'        => esc_html__( 'Link Color hover', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[heading_color]', array (
        'default' => '#252936',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[heading_color]', array(
        'label'        => esc_html__( 'Heading Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[theme_text_color]', array (
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[theme_text_color]', array(
        'label'        => esc_html__( 'Theme Text Color', 'electrician' ),
        'section'    => 'electrician_common_color_section',
        'priority'   => 18,
    ) ) );

     //Header_color

    $wp_customize->add_section( 'electrician_header_color_section' , array(
        'title'      => esc_html__( 'Header Color', 'electrician' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'electrician_colors[header_bg_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[header_bg_color]', array(
        'label'        => esc_html__( 'Header Bg Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[header_icon_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[header_icon_color]', array(
        'label'        => esc_html__( 'Icon Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[social_icon_color]', array (
        'default' => '#d0d0d0',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[social_icon_color]', array(
        'label'        => esc_html__( 'Social Icon Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[social_icon_hover_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[social_icon_hover_color]', array(
        'label'        => esc_html__( 'Social Icon hover Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    // Main menu color

    $wp_customize->add_setting ( 'electrician_colors[menu_bg_color]', array (
        'default' => '#252936',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[menu_bg_color]', array(
        'label'        => esc_html__( 'Menu Bg Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[menu_link_color]', array (
        'default' => '#bfc3d0',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[menu_link_color]', array(
        'label'        => esc_html__( 'Menu Link Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[menu_link_hover_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[menu_link_hover_color]', array(
        'label'        => esc_html__( 'Menu Link Hover Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[dropdown_menu_bg_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[dropdown_menu_bg_color]', array(
        'label'        => esc_html__( 'Submenu Bg Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[submenu_link_color]', array (
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[submenu_link_color]', array(
        'label'        => esc_html__( 'Submenu Link Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[submenu_link_hover_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[submenu_link_hover_color]', array(
        'label'        => esc_html__( 'Submenu Link Hover Color', 'electrician' ),
        'section'    => 'electrician_header_color_section',
        'priority'   => 19,
    ) ) );
    
    //Slider color

    $wp_customize->add_section( 'electrician_Slider_color_section' , array(
        'title'      => esc_html__( 'Slider Color', 'electrician' ),
        'priority'   => 3,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'electrician_colors[nivo_slider_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[nivo_slider_color]', array(
        'label'        => esc_html__( 'Slider Text Color', 'electrician' ),
        'section'    => 'electrician_Slider_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[nivo_slider_navigation_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[nivo_slider_navigation_color]', array(
        'label'        => esc_html__( 'Slider Navigation Color', 'electrician' ),
        'section'    => 'electrician_Slider_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[slider_pagi_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[slider_pagi_color]', array(
        'label'        => esc_html__( 'Slider Pagination Color', 'electrician' ),
        'section'    => 'electrician_Slider_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[slider_pagi_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[slider_pagi_bg_color]', array(
        'label'        => esc_html__( 'Slider Pagination Bg Color', 'electrician' ),
        'section'    => 'electrician_Slider_color_section',
        'priority'   => 19,
    ) ) );

    //Button
    $wp_customize->add_section( 'electrician_Button_section' , array(
        'title'      => esc_html__( 'Button Color', 'electrician' ),
        'priority'   => 4,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'electrician_colors[button_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_bg_color]', array(
        'label'        => esc_html__( 'Button Bg Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[button_text_black_bg_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_text_black_bg_color]', array(
        'label'        => esc_html__( 'Button White Bg Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[button_text_black_color]', array (
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_text_black_color]', array(
        'label'        => esc_html__( 'Button Text Black Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[button_text_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_text_color]', array(
        'label'        => esc_html__( 'Button Text Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[button_bg_hover_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_bg_hover_color]', array(
        'label'        => esc_html__( 'Button Hover Bg Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[button_hover_text_color]', array (
        'default' => '#252936',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_hover_text_color]', array(
        'label'        => esc_html__( 'Button Hover Text Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[button_border_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[button_border_color]', array(
        'label'        => esc_html__( 'Button Border Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );
    
    $wp_customize->add_setting ( 'electrician_colors[icon_hover_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[icon_hover_color]', array(
        'label'        => esc_html__( 'Icon Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[service_icon_hover_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[service_icon_hover_color]', array(
        'label'        => esc_html__( 'Service Icon hover Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );
    
    $wp_customize->add_setting ( 'electrician_colors[service_icon_hover_bg_color]', array (
        'default' => '#ff9b36',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[service_icon_hover_bg_color]', array(
        'label'        => esc_html__( 'Service Icon Hover Bg Color', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );
    
    $wp_customize->add_setting ( 'electrician_colors[service_icon_hover_bg_color2]', array (
        'default' => '#ff7b2b',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[service_icon_hover_bg_color2]', array(
        'label'        => esc_html__( 'Service Icon Hover Bg Color 2', 'electrician' ),
        'section'    => 'electrician_Button_section',
        'priority'   => 19,
    ) ) );

    //Footer color

    $wp_customize->add_section( 'electrician_footer_section' , array(
        'title'      => esc_html__( 'Footer Color', 'electrician' ),
        'priority'   => 5,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'electrician_colors[footer_bg_color]', array (
        'default' => '#252936',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[footer_bg_color]', array(
        'label'        => esc_html__( 'Footer Bg Color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[footer_top_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[footer_top_bg_color]', array(
        'label'        => esc_html__( 'Footer Top Bg Color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[footer_text_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[footer_text_color]', array(
        'label'        => esc_html__( 'Footer Text Color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[footer_copyright_color]', array (
        'default' => '#9c9fa9',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[footer_copyright_color]', array(
        'label'        => esc_html__( 'Footer Copyright Text Color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[scroll_to_top]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[scroll_to_top]', array(
        'label'        => esc_html__( 'Scroll To Top Bg color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[scroll_to_top_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[scroll_to_top_color]', array(
        'label'        => esc_html__( 'Scroll To Top Color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[scroll_to_top_hover]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[scroll_to_top_hover]', array(
        'label'        => esc_html__( 'Scroll To Top Bg Hover color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[scroll_to_top_hover_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[scroll_to_top_hover_color]', array(
        'label'        => esc_html__( 'Scroll To Top Hover color', 'electrician' ),
        'section'    => 'electrician_footer_section',
        'priority'   => 19,
    ) ) );

    //Shop

    $wp_customize->add_section( 'electrician_shop_color_section' , array(
        'title'      => esc_html__( 'Shop Color', 'electrician' ),
        'priority'   => 6,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'electrician_colors[shop_active_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[shop_active_color]', array(
        'label'        => esc_html__( 'Shop Active Color', 'electrician' ),
        'section'    => 'electrician_shop_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[shop_active_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[shop_active_bg_color]', array(
        'label'        => esc_html__( 'Shop Active Bg Color', 'electrician' ),
        'section'    => 'electrician_shop_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[shop_button_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[shop_button_bg_color]', array(
        'label'        => esc_html__( 'Shop Button Bg Color', 'electrician' ),
        'section'    => 'electrician_shop_color_section',
        'priority'   => 19,
    ) ) );
    $wp_customize->add_setting ( 'electrician_colors[shop_button_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[shop_button_color]', array(
        'label'        => esc_html__( 'Shop Button Color', 'electrician' ),
        'section'    => 'electrician_shop_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[shop_button_bg_hover_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[shop_button_bg_hover_color]', array(
        'label'        => esc_html__( 'Shop Button Bg Hover Color', 'electrician' ),
        'section'    => 'electrician_shop_color_section',
        'priority'   => 19,
    ) ) );
    
    $wp_customize->add_setting ( 'electrician_colors[shop_button_hover_color]', array (
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[shop_button_hover_color]', array(
        'label'        => esc_html__( 'Shop Button Hover Color', 'electrician' ),
        'section'    => 'electrician_shop_color_section',
        'priority'   => 19,
    ) ) );


    //other

    $wp_customize->add_section( 'electrician_other_color_section' , array(
        'title'      => esc_html__( 'Others Color', 'electrician' ),
        'priority'   => 6,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'electrician_colors[gallery_item_overly_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[gallery_item_overly_bg_color]', array(
        'label'        => esc_html__( 'Gallery Overlay Bg Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );
    
    $wp_customize->add_setting ( 'electrician_colors[gallery_item_overly_text_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[gallery_item_overly_text_color]', array(
        'label'        => esc_html__( 'Gallery Overlay Text Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[gallery_border_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[gallery_border_color]', array(
        'label'        => esc_html__( 'Gallery Menu Border Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[faq_items_hover_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[faq_items_hover_color]', array(
        'label'        => esc_html__( 'FAQ Items Hover Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[services_title_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[services_title_bg_color]', array(
        'label'        => esc_html__( 'Services Title Bg Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[services_title_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[services_title_color]', array(
        'label'        => esc_html__( 'Services Title Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[copoun_highlight_text]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[copoun_highlight_text]', array(
        'label'        => esc_html__( 'Copoun Highlight Text', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[pagi_active_color]', array (
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[pagi_active_color]', array(
        'label'        => esc_html__( 'Pagination Active Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[pagi_active_bg_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[pagi_active_bg_color]', array(
        'label'        => esc_html__( 'Pagination Active Bg Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

    $wp_customize->add_setting ( 'electrician_colors[pagi_active_border_color]', array (
        'default' => '#f47629',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electrician_colors[pagi_active_border_color]', array(
        'label'        => esc_html__( 'Pagination Active Border Color', 'electrician' ),
        'section'    => 'electrician_other_color_section',
        'priority'   => 19,
    ) ) );

}
add_action( 'customize_register', 'electrician_theme_customizer' );