<?php 



/**



 * Service Box shortcode



 */







if ( ! function_exists( 'wedding_vc_service_box_shortcode' ) ) {



	function wedding_vc_service_box_shortcode( $atts, $content = NULL ) {



	



		$atts = vc_map_get_attributes( 'zozo_vc_service_box', $atts );



		extract( $atts );







		$output = '';



		$extra_class = '';



		



		$icon_styles = '';



		if( $icon_color ) {



			$icon_styles = ' style="color:'. $icon_color .';"';



		}



		



		$title_styles = '';



		if( $title_color ) {



			$title_styles = ' style="color:'. $title_color .';"';



		}



		



		$ribbon_styles = '';



		if( $ribbon_font_color ) {



			$ribbon_styles = ' style="color:'. $ribbon_font_color .';"';



		}



		



		$content_styles = '';



		if( $content_color ) {



			$content_styles = ' style="color:'. $content_color .';"';



		}



		



		// Classes



		$main_classes = 'zozo-vc-service-box';



		



		if( isset( $classes ) && $classes != '' ) {



			$main_classes .= ' ' . $classes;



		}



		if( isset( $alignment ) && $alignment != '' ) {



			$main_classes .= ' text-' . $alignment;



		}



		if( isset( $box_style ) && $box_style != '' ) {		



			$main_classes .= ' service-box-'. $box_style;



		}



		$main_classes .= wedding_vc_animation( $css_animation );



		



		$output .= '<div class="'. esc_attr( $main_classes ) .'">';	



			$output .= '<div class="service-box-inner">';



				if( isset( $ribbon_text ) && $ribbon_text != '' ) {



					$output .= '<div class="service-ribbon-text"'.$ribbon_styles.'>'. $ribbon_text .'</div>';



				}



				$output .= '<div class="service-box-content">';



					// Icon



					if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {



						$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' service-icon"'.$icon_styles.'></i>';



					}



				$output .= '</div>';



			$output .= '</div>';



			// Title



			if( isset( $title ) && $title != '' ) {



				// Title URL



				$title_link = $link_title = $link_target = '';



				if( $title_url && $title_url != '' ) {



					$link = vc_build_link( $title_url );



					$title_link = isset( $link['url'] ) ? $link['url'] : '';



					$link_title = isset( $link['title'] ) ? $link['title'] : '';



					$link_target = isset( $link['target'] ) ? $link['target'] : '';



				}



				if( isset( $title_link ) && $title_link != '' ) {



					$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';



				}



				$output .= '<h5 class="service-title"'.$title_styles.'>'. $title .'</h5>';



				if( isset( $title_link ) && $title_link != '' ) {



					$output .= '</a>';



				}



			}



			// Content



			$output .= '<div class="service-desc"'. $content_styles .'>';



				$output .= apply_filters( 'the_content', $content );



			$output .= '</div>';



		$output .= '</div>';



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_service_box_shortcode_map' ) ) {



	function wedding_vc_service_box_shortcode_map() {



		



		vc_map( 



			array(



				"name"					=> esc_html__( "Service Box", "wedding" ),



				"description"			=> esc_html__( "List your services with different style.", 'wedding' ),



				"base"					=> "zozo_vc_service_box",



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



						"param_name"	=> "alignment",



						"value"			=> array(



							esc_html__( "Default", "wedding" )	=> "center",



							esc_html__( "Center", "wedding" )	=> "center",



							esc_html__( "Left", "wedding" )		=> "left",



							esc_html__( "Right", "wedding" )		=> "right",



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Services Box Style", "wedding" ),



						"param_name"	=> "box_style",



						"value"			=> array(



							esc_html__( "Default", "wedding" )	=> "circle",



							esc_html__( "Circle", "wedding" )	=> "circle",



							esc_html__( "Rounded", "wedding" )	=> "rounded",



							esc_html__( "Square", "wedding" )	=> "square",



						),



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



					// Content



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Ribbon Text", "wedding" ),



						"param_name"	=> "ribbon_text",



						"value"			=> "",



						"group"			=> esc_html__( "Content", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Heading", "wedding" ),



						"param_name"	=> "title",



						"value"			=> "Sample Heading",



						"group"			=> esc_html__( "Content", "wedding" ),



					),



					array(



						"type"			=> "vc_link",



						"heading"		=> esc_html__( "Heading URL", "wedding" ),



						"param_name"	=> "title_url",



						"value"			=> "",



						"group"			=> esc_html__( "Content", "wedding" ),



					),



					array(



						"type"			=> "textarea_html",



						"holder"		=> "div",



						"heading"		=> esc_html__( "Content", "wedding" ),



						"param_name"	=> "content",



						"value"			=> esc_html__( 'I am text block. Please change this dummy text in your page editor for this service box.', "wedding" ),



						"group"			=> esc_html__( "Content", "wedding" ),



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



						"heading"		=> esc_html__( "Title Color", "wedding" ),



						"param_name"	=> "title_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),			



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Ribbon Font Color", "wedding" ),



						"param_name"	=> "ribbon_font_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),			



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Content Color", "wedding" ),



						"param_name"	=> "content_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),			



					),



				)



			) 



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_service_box_shortcode_map' );