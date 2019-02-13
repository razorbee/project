<?php 



/**



 * Icons shortcode



 */







if ( ! function_exists( 'wedding_vc_icons_shortcode' ) ) {



	function wedding_vc_icons_shortcode( $atts, $content = NULL ) {



		



		$atts = vc_map_get_attributes( 'zozo_vc_icons', $atts );



		extract( $atts );







		$output = '';



		$extra_class = '';







		// Icon style		



		$icon_stylings = '';



		if( $icon_color ) {



			$icon_stylings .= 'color:'. $icon_color .';';



		}



		



		if( $icon_border_color ) {



			if( $icon_border_width == '' ) {



				$icon_border_width = 1;



			}



			$icon_stylings .= ' border:'.$icon_border_width.'px solid '.$icon_border_color.';';



		}



		



		if( $icon_type != 'none' ) {



			if( $icon_bg_color != '' ) {



				$icon_stylings .= ' background-color: '.$icon_bg_color.';';



			}



			$extra_class .= sprintf( ' icon-shape icon-%s', $icon_type );



		} else {



			$extra_class .= ' icon-plain';



		}



		



		if( $icon_size ) {



			$extra_class .= sprintf( ' icon-%s', $icon_size );



		}



		



		if( $icon_style ) {		



			$extra_class .= sprintf( ' icon-%s', $icon_style );



		}



				



		if( $icon_stylings ) {



			$icon_stylings = 'style="'. $icon_stylings  .'"';



		}		



		



		// Classes



		$main_classes = 'zozo-vc-icons';



		



		if( isset( $classes ) && $classes != '' ) {



			$main_classes .= ' ' . $classes;



		}



		if( isset( $icon_align ) && $icon_align != '' ) {



			$main_classes .= ' text-' . $icon_align;



		}



		$main_classes .= wedding_vc_animation( $css_animation );



		



		$output .= '<div class="'. esc_attr( $main_classes ) .'">';					



			// Icon



			if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {



				$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) . $extra_class . ' zozo-icon"'.$icon_stylings.'></i>';



			}



		$output .= '</div>';



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_icons_shortcode_map' ) ) {



	function wedding_vc_icons_shortcode_map() {



		



		vc_map( 



			array(



				"name"					=> esc_html__( "Icons", "wedding" ),



				"description"			=> esc_html__( "List Icons with different style.", 'wedding' ),



				"base"					=> "zozo_vc_icons",



				"category"				=> esc_html__( "Theme Addons", "wedding" ),



				"icon"					=> "zozo-vc-icon",



				"params"				=> array(					



					array(



						'type'			=> 'textfield',



						'admin_label' 	=> true,



						'heading'		=> esc_html__( 'Extra Class', "wedding" ),



						'param_name'	=> 'classes',



						'value' 		=> '',



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "CSS Animation", "wedding" ),



						"param_name"	=> "css_animation",



						"value"			=> array(



							esc_html__( "No", "wedding" )					=> '',



							esc_html__( "Top to bottom", "wedding" )			=> "top-to-bottom",



							esc_html__( "Bottom to top", "wedding" )			=> "bottom-to-top",



							esc_html__( "Left to right", "wedding" )			=> "left-to-right",



							esc_html__( "Right to left", "wedding" )			=> "right-to-left",



							esc_html__( "Appear from center", "wedding" )	=> "appear" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Alignment", "wedding" ),



						"param_name"	=> "icon_align",



						"value"			=> array(



							esc_html__( "Default", "wedding" )	=> "",



							esc_html__( "Center", "wedding" )	=> "center",



							esc_html__( "Left", "wedding" )		=> "left",



							esc_html__( "Right", "wedding" )		=> "right",



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Icon Type", "wedding" ),



						"param_name"	=> "icon_type",



						"value"			=> array(



							esc_html__( "None", "wedding" )		=> "none",



							esc_html__( "Circle", "wedding" )	=> "circle",



							esc_html__( "Rounded", "wedding" )	=> "rounded",



							esc_html__( "Square", "wedding" )	=> "square",



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Icon Style", "wedding" ),



						"param_name"	=> "icon_style",



						"value"			=> array(



							esc_html__( "Light", "wedding" )			=> "light",



							esc_html__( "Dark", "wedding" )			=> "dark",



							esc_html__( "Bordered", "wedding" )		=> "bordered",



							esc_html__( "Transparent", "wedding" )	=> "transparent",



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Icon Size", "wedding" ),



						"param_name"	=> "icon_size",



						"value"			=> array(



							esc_html__( "Small", "wedding" )			=> "small",



							esc_html__( "Medium", "wedding" )		=> "medium",



							esc_html__( "Large", "wedding" )			=> "large",



							esc_html__( "Extra Large", "wedding" )	=> "exlarge",



						),



						"group"			=> esc_html__( "Icon", "wedding" ),



					),



					array(



						"type" 			=> "dropdown",



						"heading" 		=> esc_html__( "Choose from Icon library", "wedding" ),



						"value" 		=> array(



							esc_html__( "None", "wedding" ) 				=> "",



							esc_html__( "Font Awesome", "wedding" ) 		=> "fontawesome",



							esc_html__( "Lineicons", "wedding" ) 		=> "lineicons",



							esc_html__( "Flaticons", "wedding" ) 		=> "flaticons",



						),



						"admin_label" 	=> true,



						"param_name" 	=> "type",



						"description" 	=> esc_html__( "Select icon library.", "wedding" ),



						"group"			=> esc_html__( "Icon", "wedding" ),



					),					



					array(



						"type" 			=> 'iconpicker',



						"heading" 		=> esc_html__( "Icon", "wedding" ),



						"param_name" 	=> "icon_fontawesome",



						"value" 		=> "fa fa-minus-circle",



						"settings" 		=> array(



							"emptyIcon" 	=> true,



							"iconsPerPage" 	=> 4000,



						),



						"dependency" 	=> array(



							"element" 	=> "type",



							"value" 	=> "fontawesome",



						),



						"description" 	=> esc_html__( "Select icon from library.", "wedding" ),



						"group"			=> esc_html__( "Icon", "wedding" ),



					),				



					array(



						"type" 			=> 'iconpicker',



						"heading" 		=> esc_html__( "Icon", "wedding" ),



						"param_name" 	=> "icon_lineicons",



						"value" 		=> "",



						"settings" 		=> array(



							"emptyIcon" 	=> true,



							"type" 			=> 'simplelineicons',



							"iconsPerPage" 	=> 4000,



						),



						"dependency" 	=> array(



							"element" 	=> "type",



							"value" 	=> "lineicons",



						),



						"description" 	=> esc_html__( "Select icon from library.", "wedding" ),



						"group"			=> esc_html__( "Icon", "wedding" ),



					),



					array(



						"type" 			=> 'iconpicker',



						"heading" 		=> esc_html__( "Icon", "wedding" ),



						"param_name" 	=> "icon_flaticons",



						"value" 		=> "",



						"settings" 		=> array(



							"emptyIcon" 	=> true,



							"type" 			=> 'flaticons',



							"iconsPerPage" 	=> 4000,



						),



						"dependency" 	=> array(



							"element" 	=> "type",



							"value" 	=> "flaticons",



						),



						"description" 	=> esc_html__( "Select icon from library.", "wedding" ),



						"group"			=> esc_html__( "Icon", "wedding" ),



					),



					// Stylings



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Icon Color", "wedding" ),



						"param_name"	=> "icon_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),



					),		



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Icon Background Color", "wedding" ),



						"param_name"	=> "icon_bg_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),			



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Icon Border Color", "wedding" ),



						"param_name"	=> "icon_border_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),			



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Border Width", "wedding" ),



						"param_name"	=> "icon_border_width",



						"description" 	=> esc_html__( "Enter border width for icon. Ex: 2 or 3.", "wedding" ),



						"group"			=> esc_html__( "Stylings", "wedding" ),



					),



				)



			) 



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_icons_shortcode_map' );