<?php 



/**



 * Add new params to Visual Composer



 *



 * @package		Wedding



 * @subpackage	Visual Composer



 * @author		Zozothemes



 */







/* =========================================



*  Rows



*  ========================================= */







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Style', 'wedding' ),



	'param_name'	=> 'bg_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )								=> '',



		esc_html__( 'Primary Background Color', 'wedding' )			=> 'bg-normal',



		esc_html__( 'Light Background Color', 'wedding' )				=> 'light-wrapper',



		esc_html__( 'Grey Background Color', 'wedding' )				=> 'grey-wrapper',



		esc_html__( 'Dark Background Color', 'wedding' )				=> 'dark-wrapper',



		esc_html__( 'Dark Grey Background Color', 'wedding' )			=> 'dark-grey-wrapper',



		esc_html__( 'Image Left, Content on Right', 'wedding' )		=> 'image-left',



		esc_html__( 'Image Right, Content on Left', 'wedding' )		=> 'image-right',



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Skin', 'wedding' ),



	'param_name'	=> 'bg_side_skin',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )								=> '',



		esc_html__( 'Primary Background Color', 'wedding' )			=> 'bg-normal',



		esc_html__( 'Light Background Color', 'wedding' )				=> 'light-wrapper',



		esc_html__( 'Grey Background Color', 'wedding' )				=> 'grey-wrapper',



		esc_html__( 'Dark Background Color', 'wedding' )				=> 'dark-wrapper',



		esc_html__( 'Dark Grey Background Color', 'wedding' )			=> 'dark-grey-wrapper',



	),



	'dependency'	=> array(



		'element'	=> 'bg_style',



		'value'		=> array( 'image-left', 'image-right' )



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'attach_image',



	'heading'		=> esc_html__( 'Left or Right Image', 'wedding' ),



	'param_name'	=> 'bg_side_image',



	'value'			=> '',



	'dependency'	=> array(



		'element'	=> 'bg_style',



		'value'		=> array( 'image-left', 'image-right' )



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Size', 'wedding' ),



	'param_name'	=> 'bg_side_size',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )		=> 'default',



		esc_html__( 'Cover', 'wedding' )		=> 'cover',



		esc_html__( 'Contain', 'wedding' )		=> 'contain',



	),



	'dependency'	=> array(



		'element'	=> 'bg_style',



		'value'		=> array( 'image-left', 'image-right' )



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Repeat', 'wedding' ),



	'param_name'	=> 'bg_side_repeat',



	'value'			=> array(



		esc_html__( 'No Repeat', 'wedding' )	=> 'no-repeat',



		esc_html__( 'Repeat', 'wedding' )		=> 'repeat',



		esc_html__( 'Repeat-x', 'wedding' )	=> 'repeat-x',



		esc_html__( 'Repeat-y', 'wedding' )	=> 'repeat-y',



	),



	'dependency'	=> array(



		'element'	=> 'bg_style',



		'value'		=> array( 'image-left', 'image-right' )



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Make Container Fluid ?', 'wedding' ),



	'param_name'	=> 'container_fluid',



	'value'			=> array(



		esc_html__( 'No', 'wedding' )	=> 'no',



		esc_html__( 'Yes', 'wedding' )	=> 'yes',



	),



	'dependency'	=> array(



		'element'	=> 'bg_style',



		'value'		=> array( 'image-left', 'image-right' )



	),



	'description'	=> esc_html__( 'Use this option to make column in fluid container.', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Column Match Height', 'wedding' ),



	'param_name'	=> 'match_height',



	'value'			=> array(



		esc_html__( 'No', 'wedding' )	=> 'no',



		esc_html__( 'Yes', 'wedding' )	=> 'yes',



	),



	'dependency'	=> array(



		'element'	=> 'bg_style',



		'value'		=> array( '', 'bg-normal', 'light-wrapper', 'grey-wrapper', 'dark-wrapper' )



	),



	'description'	=> esc_html__( 'Use this option to make all column in equal heights..', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Center Row Content', 'wedding' ),



	'param_name'	=> 'center_row',



	'value'			=> array(



		esc_html__( 'No', 'wedding' )	=> 'no',



		esc_html__( 'Yes', 'wedding' )	=> 'yes',



	),



	'description'	=> esc_html__( 'Use this option to add container and center the inner content. Useful when using full-width pages.', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'checkbox',



	'heading'		=> esc_html__( 'Enable Background Image Overlay?', 'wedding' ),



	'param_name'	=> 'bg_overlay',



	'description'	=> esc_html__( 'Check this box to enable the overlay for background image.', 'wedding' ),



	'value'			=> array(



		esc_html__( 'Yes, please', 'wedding' )	=> 'yes'



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Overlay Style', 'wedding' ),



	'param_name'	=> 'bg_overlay_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )				=> 'overlay-dark',



		esc_html__( 'Dark Overlay', 'wedding' )			=> 'overlay-dark',



		esc_html__( 'Light Overlay', 'wedding' )			=> 'overlay-light',



		esc_html__( 'Theme Overlay', 'wedding' )			=> 'overlay-primary',	



	),



	'dependency'	=> array(



		'element'	=> 'bg_overlay',



		'value'		=> 'yes'



	),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'checkbox',



	'heading'		=> esc_html__( 'Enable Video Background?', 'wedding' ),



	'param_name'	=> 'enable_video_bg',



	'description'	=> esc_html__( 'Check this box to enable the options for video background.', 'wedding' ),



	'value'			=> array(



		esc_html__( 'Yes, please', 'wedding' )	=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'textfield',



	'heading'		=> esc_html__( 'Video ID', 'wedding' ),



	'param_name'	=> 'video_id',



	'description'	=> esc_html__( 'Enter Youtube Video ID to play background video. Ex: Y-OLlJUXwKU', 'wedding' ),



	'dependency'	=> array(



		'element'	=> 'enable_video_bg',



		'value'		=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'attach_image',



	'heading'		=> esc_html__( 'Video Fallback Image', 'wedding' ),



	'param_name'	=> 'video_fallback',



	'value'			=> '',



	'dependency'	=> array(



		'element'	=> 'enable_video_bg',



		'value'		=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Video Autoplay', 'wedding' ),



	'param_name'	=> 'video_autoplay',



	'value'			=> array(



		esc_html__( 'Yes', 'wedding' )	=> 'true',



		esc_html__( 'No', 'wedding' )	=> 'false',



	),



	'dependency'	=> array(



		'element'	=> 'enable_video_bg',



		'value'		=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Video Mute', 'wedding' ),



	'param_name'	=> 'video_mute',



	'value'			=> array(



		esc_html__( 'No', 'wedding' )	=> 'false',



		esc_html__( 'Yes', 'wedding' )	=> 'true',



	),



	'dependency'	=> array(



		'element'	=> 'enable_video_bg',



		'value'		=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Video Controls', 'wedding' ),



	'param_name'	=> 'video_controls',



	'value'			=> array(



		esc_html__( 'No', 'wedding' )	=> 'false',



		esc_html__( 'Yes', 'wedding' )	=> 'true',



	),



	'dependency'	=> array(



		'element'	=> 'enable_video_bg',



		'value'		=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'textfield',



	'heading'		=> esc_html__( 'Video Height', 'wedding' ),



	'param_name'	=> 'video_height',



	'description'	=> esc_html__( 'Enter Video Height. Ex: 400', 'wedding' ),



	'dependency'	=> array(



		'element'	=> 'enable_video_bg',



		'value'		=> 'yes'



	),



	'group'			=> esc_html__( 'Video', 'wedding' ),



) );







vc_add_param( 'vc_row', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Typography Style', 'wedding' ),



	'param_name'	=> 'typo_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )		=> 'default',



		esc_html__( 'Dark Text', 'wedding' )	=> 'dark',



		esc_html__( 'White Text', 'wedding' )	=> 'light',



	),



) );







vc_add_param( 'vc_row', vc_map_add_css_animation( $label = false ) );







vc_add_param( 'vc_row', array(



	'type'			=> 'textfield',



	'heading'		=> esc_html__( 'Minimum Height', 'wedding' ),



	'param_name'	=> 'min_height',



	'description'	=> esc_html__( 'You can enter a minimum height for this row.', 'wedding' ),



) );







vc_remove_param( 'vc_row', 'equal_height' );







/* =========================================



*  Row Inner



*  ========================================= */







vc_add_param( 'vc_row_inner', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Column Match Height', 'wedding' ),



	'param_name'	=> 'match_height',



	'value'			=> array(



		esc_html__( 'No', 'wedding' )	=> 'no',



		esc_html__( 'Yes', 'wedding' )	=> 'yes',



	),



	'description'	=> esc_html__( 'Use this option to make all column in equal heights..', 'wedding' ),



) );







/* =========================================



*  Columns



*  ========================================= */







vc_add_param( 'vc_column', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Style', 'wedding' ),



	'param_name'	=> 'bg_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )								=> '',



		esc_html__( 'Primary Background Color', 'wedding' )			=> 'bg-normal',



		esc_html__( 'Light Background Color', 'wedding' )				=> 'light-wrapper',



		esc_html__( 'Grey Background Color', 'wedding' )				=> 'grey-wrapper',



		esc_html__( 'Dark Background Color', 'wedding' )				=> 'dark-wrapper',



		esc_html__( 'Dark Grey Background Color', 'wedding' )			=> 'dark-grey-wrapper',



	),



) );







vc_add_param( 'vc_column', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Typography Style', 'wedding' ),



	'param_name'	=> 'typo_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )		=> 'default',



		esc_html__( 'Dark Text', 'wedding' )	=> 'dark',



		esc_html__( 'White Text', 'wedding' )	=> 'light',



	),



) );







vc_add_param( 'vc_column', vc_map_add_css_animation( $label = false) );







/* =========================================



*  Column inner



*  ========================================= */







vc_add_param( 'vc_column_inner', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Background Style', 'wedding' ),



	'param_name'	=> 'bg_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )								=> '',



		esc_html__( 'Primary Background Color', 'wedding' )			=> 'bg-normal',



		esc_html__( 'Light Background Color', 'wedding' )				=> 'light-wrapper',



		esc_html__( 'Grey Background Color', 'wedding' )				=> 'grey-wrapper',



		esc_html__( 'Dark Background Color', 'wedding' )				=> 'dark-wrapper',



		esc_html__( 'Dark Grey Background Color', 'wedding' )			=> 'dark-grey-wrapper',



	),



) );







vc_add_param( 'vc_column_inner', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Typography Style', 'wedding' ),



	'param_name'	=> 'typo_style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' )		=> 'default',



		esc_html__( 'Dark Text', 'wedding' )	=> 'dark',



		esc_html__( 'White Text', 'wedding' )	=> 'light',



	),



) );







vc_add_param( 'vc_column_inner', vc_map_add_css_animation( $label = false) );







/* =========================================



*  Accordion



*  ========================================= */







vc_add_param( 'vc_tta_accordion', array(



	'type'			=> 'dropdown',



	'heading'		=> esc_html__( 'Style', 'wedding' ),



	'description' 	=> esc_html__( 'Select accordion display style.', 'wedding' ),



	'param_name'	=> 'style',



	'value'			=> array(



		esc_html__( 'Default', 'wedding' ) 	=> 'default',



		esc_html__( 'Classic', 'wedding' ) 	=> 'classic',



		esc_html__( 'Modern', 'wedding' ) 		=> 'modern',



		esc_html__( 'Flat', 'wedding' ) 		=> 'flat',



		esc_html__( 'Outline', 'wedding' ) 	=> 'outline',



	),



) );







/* =========================================



*  Section



*  ========================================= */







vc_remove_param( 'vc_tta_section', 'el_class' );







vc_add_param( 'vc_tta_section', array(



	"type" 			=> "dropdown",



	"heading" 		=> esc_html__( "Icon library", "wedding" ),



	"value" 		=> array(



		esc_html__( "Font Awesome", "wedding" ) 		=> "fontawesome",



		esc_html__( 'Open Iconic', 'wedding' ) 		=> 'openiconic',



		esc_html__( 'Typicons', 'wedding' ) 		=> 'typicons',



		esc_html__( 'Entypo', 'wedding' ) 			=> 'entypo',



		esc_html__( "Lineicons", "wedding" ) 		=> "lineicons",



		esc_html__( "Flaticons", "wedding" ) 		=> "flaticons",



	),



	"admin_label" 	=> true,



	"param_name" 	=> "i_type",



	"dependency" 	=> array(



						"element" 	=> "add_icon",



						"value" 	=> "true",



					),



	"description" 	=> esc_html__( "Select icon library.", "wedding" ),



) );







vc_add_param( 'vc_tta_section', array(



	"type" 			=> 'iconpicker',



	"heading" 		=> esc_html__( "Icon", "wedding" ),



	"param_name" 	=> "i_icon_lineicons",



	"value" 		=> "",



	"settings" 		=> array(



		"emptyIcon" 	=> true,



		"type" 			=> 'simplelineicons',



		"iconsPerPage" 	=> 4000,



	),



	"dependency" 	=> array(



		"element" 	=> "i_type",



		"value" 	=> "lineicons",



	),



	"description" 	=> esc_html__( "Select icon from library.", "wedding" ),



) );







vc_add_param( 'vc_tta_section', array(



	"type" 			=> 'iconpicker',



	"heading" 		=> esc_html__( "Icon", "wedding" ),



	"param_name" 	=> "i_icon_flaticons",



	"value" 		=> "",



	"settings" 		=> array(



		"emptyIcon" 	=> true,



		"type" 			=> 'flaticons',



		"iconsPerPage" 	=> 4000,



	),



	"dependency" 	=> array(



		"element" 	=> "i_type",



		"value" 	=> "flaticons",



	),



	"description" 	=> esc_html__( "Select icon from library.", "wedding" ),



) );







vc_add_param( 'vc_tta_section', array(



	'type' 			=> 'textfield',



	'heading' 		=> esc_html__( 'Extra class name', 'wedding' ),



	'param_name' 	=> 'el_class',



	'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'wedding' )



) );







/* =========================================



*  Button



*  ========================================= */







vc_add_param( 'vc_btn', array(



	"type" 			=> "dropdown",



	'heading' 		=> esc_html__( 'Style', 'wedding' ),



	'description' 	=> esc_html__( 'Select button display style.', 'wedding' ),



	'value' 		=> array(



		esc_html__( 'Default', 'wedding' ) 		=> 'default',



		esc_html__( 'Transparent', 'wedding' ) 	=> 'transparent',



		esc_html__( 'Modern', 'wedding' ) 			=> 'modern',



		esc_html__( 'Classic', 'wedding' ) 		=> 'classic',



		esc_html__( 'Flat', 'wedding' ) 			=> 'flat',



		esc_html__( 'Outline', 'wedding' ) 		=> 'outline',



		esc_html__( '3d', 'wedding' ) 				=> '3d',



		esc_html__( 'Custom', 'wedding' ) 			=> 'custom',



		esc_html__( 'Outline custom', 'wedding' ) 	=> 'outline-custom',



	),



	"param_name" 	=> "style",



) );







vc_add_param( 'vc_btn', array(



	'type' 					=> 'dropdown',



	'heading' 				=> esc_html__( 'Color', 'wedding' ),



	'param_name' 			=> 'color',



	'description' 			=> esc_html__( 'Select button color.', 'wedding' ),



	// compatible with btn2, need to be converted from btn1



	'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',



	'value' 				=> array(



				// Theme Colors



				esc_html__( 'Theme Color', 'wedding' ) 		=> 'primary-bg',



				// Btn1 Colors



				esc_html__( 'Classic Grey', 'wedding' ) 		=> 'default',



				esc_html__( 'Classic Blue', 'wedding' ) 		=> 'primary',



				esc_html__( 'Classic Turquoise', 'wedding' ) 	=> 'info',



				esc_html__( 'Classic Green', 'wedding' ) 		=> 'success',



				esc_html__( 'Classic Orange', 'wedding' )		=> 'warning',



				esc_html__( 'Classic Red', 'wedding' ) 		=> 'danger',



				esc_html__( 'Classic Black', 'wedding' ) 		=> "inverse"



			   // + Btn2 Colors (default color set)



		   ) + getVcShared( 'colors-dashed' ),



	'std' 					=> 'primary-bg',



	// must have default color grey



	'dependency' => array(



		'element' => 'style',



		'value_not_equal_to' => array( 'custom', 'outline-custom' )



	),



) );







/* =========================================



*  Call To Action



*  ========================================= */







vc_add_param( 'vc_cta', array(



	'type' 			=> 'dropdown',



	'heading' 		=> esc_html__( 'Style', 'wedding' ),



	'param_name' 	=> 'style',



	'value' 		=> array(



		esc_html__( 'Default', 'wedding' ) 	=> 'default',



		esc_html__( 'Classic', 'wedding' ) 	=> 'classic',



		esc_html__( 'Flat', 'wedding' ) 		=> 'flat',



		esc_html__( 'Outline', 'wedding' ) 	=> 'outline',



		esc_html__( '3d', 'wedding' ) 			=> '3d',



		esc_html__( 'Custom', 'wedding' ) 		=> 'custom',



	),



	'std' 			=> 'default',



	'description' 	=> esc_html__( 'Select call to action display style.', 'wedding' ),



) );







vc_add_param( 'vc_cta', array(



	"type" 			=> "dropdown",



	'heading' 		=> esc_html__( 'Style', 'wedding' ),



	'description' 	=> esc_html__( 'Select button display style.', 'wedding' ),



	'value' 		=> array(



		esc_html__( 'Default', 'wedding' ) 		=> 'default',



		esc_html__( 'Transparent', 'wedding' ) 	=> 'transparent',



		esc_html__( 'Modern', 'wedding' ) 			=> 'modern',



		esc_html__( 'Classic', 'wedding' ) 		=> 'classic',



		esc_html__( 'Flat', 'wedding' ) 			=> 'flat',



		esc_html__( 'Outline', 'wedding' ) 		=> 'outline',



		esc_html__( '3d', 'wedding' ) 				=> '3d',



		esc_html__( 'Custom', 'wedding' ) 			=> 'custom',



		esc_html__( 'Outline custom', 'wedding' ) 	=> 'outline-custom',



	),



	'dependency' 			=> array(



		'element' 		=> 'add_button',



		'not_empty' 	=> true,



	),



	"integrated_shortcode" 			=> "vc_btn",



	"integrated_shortcode_field" 	=> "btn_",



	"param_name" 					=> "btn_style",



	"group"							=> esc_html__( 'Button', 'wedding' ),



) );







vc_add_param( 'vc_cta', array(



	'type' 					=> 'dropdown',



	'heading' 				=> esc_html__( 'Color', 'wedding' ),



	'param_name' 			=> 'btn_color',



	'description' 			=> esc_html__( 'Select button color.', 'wedding' ),



	// compatible with btn2, need to be converted from btn1



	'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',



	'value' 				=> array(



				// Theme Colors



				esc_html__( 'Theme Color', 'wedding' ) 		=> 'primary-bg',



				// Btn1 Colors



				esc_html__( 'Classic Grey', 'wedding' ) 		=> 'default',



				esc_html__( 'Classic Blue', 'wedding' ) 		=> 'primary',



				esc_html__( 'Classic Turquoise', 'wedding' ) 	=> 'info',



				esc_html__( 'Classic Green', 'wedding' ) 		=> 'success',



				esc_html__( 'Classic Orange', 'wedding' )		=> 'warning',



				esc_html__( 'Classic Red', 'wedding' ) 		=> 'danger',



				esc_html__( 'Classic Black', 'wedding' ) 		=> "inverse"



			   // + Btn2 Colors (default color set)



		   ) + getVcShared( 'colors-dashed' ),



	'std' 							=> 'primary-bg',



	"group"							=> esc_html__( 'Button', 'wedding' ),



	"integrated_shortcode" 			=> "vc_btn",



	"integrated_shortcode_field" 	=> "btn_",



	// must have default color grey



	'dependency' 			=> array(



		'element' 				=> 'btn_style',



		'value_not_equal_to' 	=> array( 'custom', 'outline-custom' )



	),



) );







vc_add_param( 'vc_cta', array(



	"type" 			=> "dropdown",



	'heading' 		=> esc_html__( 'Icon color', 'wedding' ),



	'description' 	=> esc_html__( 'Select icon color.', 'wedding' ),



	'value' 		=> array_merge( getVcShared( 'colors' ), array( esc_html__( 'Theme Color', 'wedding' ) => 'primary-bg' ), array( esc_html__( 'Custom color', 'wedding' ) => 'custom' ) ),



	'dependency' 			=> array(



		'element' 		=> 'add_icon',



		'not_empty' 	=> true,



	),



	"integrated_shortcode" 			=> "vc_icon",



	"integrated_shortcode_field" 	=> "i_",



	"param_name" 					=> "i_color",



	'param_holder_class' 			=> 'vc_colored-dropdown',



	"group"							=> esc_html__( 'Icon', 'wedding' ),



) );







vc_add_param( 'vc_cta', array(



	"type" 			=> "dropdown",



	'heading' 		=> esc_html__( 'Background color', 'wedding' ),



	'description' 	=> esc_html__( 'Select background color for icon.', 'wedding' ),



	'value' 		=> array_merge( getVcShared( 'colors' ), array( esc_html__( 'Theme Color', 'wedding' ) => 'primary-bg' ), array( esc_html__( 'Custom color', 'wedding' ) => 'custom' ) ),



	'dependency' 		=> array(



		'element' 		=> 'i_background_style',



		'not_empty' 	=> true,



	),



	"integrated_shortcode" 			=> "vc_icon",



	"integrated_shortcode_field" 	=> "i_",



	"param_name" 					=> "i_background_color",



	'param_holder_class' 			=> 'vc_colored-dropdown',



	"group"							=> esc_html__( 'Icon', 'wedding' ),



) );







/* =========================================



*  Progress Bar



*  ========================================= */







vc_add_param( 'vc_progress_bar', array(



	'type' 			=> 'dropdown',



	'heading' 		=> esc_html__( 'Color', 'wedding' ),



	'param_name' 	=> 'bgcolor',



	'value' 		=> array(



		esc_html__( 'Default', 'wedding' ) 	=> 'bar_default',



		esc_html__( 'Default White', 'wedding' ) 	=> 'bar_default_white',



		esc_html__( 'Grey', 'wedding' ) 		=> 'bar_grey',



		esc_html__( 'Blue', 'wedding' ) 		=> 'bar_blue',



		esc_html__( 'Turquoise', 'wedding' ) 	=> 'bar_turquoise',



		esc_html__( 'Green', 'wedding' ) 		=> 'bar_green',



		esc_html__( 'Orange', 'wedding' ) 		=> 'bar_orange',



		esc_html__( 'Red', 'wedding' ) 		=> 'bar_red',



		esc_html__( 'Black', 'wedding' ) 		=> 'bar_black',



		esc_html__( 'Custom Color', 'wedding' ) 	=> 'custom'



	),



	'admin_label' 	=> true,



	'description' 	=> esc_html__( 'Select bar background color.', 'wedding' ),



) );







vc_add_param( 'vc_progress_bar', array(



	'type' 			=> 'dropdown',



	'heading' 		=> esc_html__( 'Style', 'wedding' ),



	'param_name' 	=> 'bar_style',



	'value' 		=> array(



		esc_html__( 'Default', 'wedding' ) 		=> 'default',



		esc_html__( 'Tooltip', 'wedding' ) 		=> 'tooltip',



	),



	'description' 	=> esc_html__( 'Select bar style.', 'wedding' ),



) );







vc_add_param( 'vc_progress_bar', array(



	'type' 			=> 'textfield',



	'heading' 		=> esc_html__( 'Bar Height', 'wedding' ),



	'param_name' 	=> 'bar_height',



	'description' 	=> esc_html__( 'Enter bar height. Ex: 20px', 'wedding' )



) );







/* =========================================



*  Testimonial Categories



*  ========================================= */



if( WEDDING_TESTIMONIAL_ACTIVE ) {







	$testimonial_args = array(



		'orderby'                  => 'name',



		'hide_empty'               => 0,



		'hierarchical'             => 1,



		'taxonomy'                 => 'testimonial_categories'



	);



	



	$testimonial_lists = get_categories( $testimonial_args );



	$testimonials_cats = array( 'Show all categories' => 'all' );



	



	foreach( $testimonial_lists as $cat ){



		$testimonials_cats[$cat->name] = $cat->slug;



	}



	



	vc_add_param( 'zozo_vc_testimonials_slider', array(



		'type'			=> 'dropdown',



		'admin_label' 	=> true,



		'heading'		=> esc_html__( 'Choose Testimonial Categories', 'wedding' ),



		'param_name'	=> 'categories_id',



		'value' 		=> $testimonials_cats		



	) );



	



	vc_add_param( 'zozo_vc_testimonials_grid', array(



		'type'			=> 'dropdown',



		'admin_label' 	=> true,



		'heading'		=> esc_html__( 'Choose Testimonial Categories', 'wedding' ),



		'param_name'	=> 'categories_id',



		'value' 		=> $testimonials_cats		



	) );



	



}







/* =========================================



*  Team Categories



*  ========================================= */



if( WEDDING_TEAM_ACTIVE ) {







	$team_args = array(



		'orderby'                  => 'name',



		'hide_empty'               => 0,



		'hierarchical'             => 1,



		'taxonomy'                 => 'team_categories'



	);



	



	$team_lists = get_categories( $team_args );



	$team_cats = array( 'Show all categories' => 'all' );



	



	foreach( $team_lists as $cat ){



		$team_cats[$cat->name] = $cat->slug;



	}



	



	vc_add_param( 'zozo_vc_team_grid', array(



		'type'			=> 'dropdown',



		'admin_label' 	=> true,



		'heading'		=> esc_html__( 'Choose Team Categories', 'wedding' ),



		'param_name'	=> 'categories_id',



		'value' 		=> $team_cats		



	) );



	



	vc_add_param( 'zozo_vc_team_slider', array(



		'type'			=> 'dropdown',



		'admin_label' 	=> true,



		'heading'		=> esc_html__( 'Choose Team Categories', 'wedding' ),



		'param_name'	=> 'categories_id',



		'value' 		=> $team_cats		



	) );



	



	vc_add_param( 'zozo_vc_team_list', array(



		'type'			=> 'dropdown',



		'admin_label' 	=> true,



		'heading'		=> esc_html__( 'Choose Team Categories', 'wedding' ),



		'param_name'	=> 'categories_id',



		'value' 		=> $team_cats		



	) );



	



}



/* =========================================



*  Woocommerce Product Categories



*  ========================================= */



if( WEDDING_WOOCOMMERCE_ACTIVE ) {







	$woo_args = array(



		'orderby'                  => 'name',



		'hide_empty'               => 0,



		'hierarchical'             => 1,



		'taxonomy'                 => 'product_cat'



	);



	



	$woo_lists = get_categories( $woo_args );



	$woo_cats = array( 'Show all categories' => 'all' );



	



	foreach( $woo_lists as $cat ){



		$woo_cats[$cat->name] = $cat->slug;



	}



	



	vc_add_param( 'zozo_vc_woo_product_slider', array(



		'type'			=> 'dropdown',



		'admin_label' 	=> true,



		'heading'		=> esc_html__( 'Choose Product Categories', 'wedding' ),



		'param_name'	=> 'categories_id',



		'value' 		=> $woo_cats		



	) );



	



}