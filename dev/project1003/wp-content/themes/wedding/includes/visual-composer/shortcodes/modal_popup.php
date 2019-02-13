<?php 



/**



 * Modal Popup Shortcode



 */







if ( ! function_exists( 'wedding_vc_modal_box_shortcode' ) ) {



	function wedding_vc_modal_box_shortcode( $atts, $content = NULL ) {



		



		$atts = vc_map_get_attributes( 'zozo_vc_modal', $atts );



		extract( $atts );







		$output = '';







		// Custom Styles



		$styles = '';



		$overlay_style = '';



		if( isset( $overlay_bg_color ) && $overlay_bg_color != '' ) {



			$overlay_style = 'background-color: '. $overlay_bg_color .';';



		}



		



		$content_styles = '';



		if( isset( $content_bg_color ) && $content_bg_color != '' ) {



			$content_styles = 'background-color: '. $content_bg_color .';';



		}



		



		if( isset( $modal_border_radius ) && $modal_border_radius != '' ) {



			$content_styles .= 'border-radius: '. $modal_border_radius .'px;';



			$content_styles .= '-moz-border-radius: '. $modal_border_radius .'px;';



			$content_styles .= '-webkit-border-radius: '. $modal_border_radius .'px;';



			$content_styles .= '-o-border-radius: '. $modal_border_radius .'px;';



			$content_styles .= '-ms-border-radius: '. $modal_border_radius .'px;';



		}



		



		if( isset( $modal_padding ) && $modal_padding != '' ) {



			$content_styles .= 'padding: '. $modal_padding .'px;';



		}



		



		if( $overlay_style != '' ) {



			$styles .= sprintf( '.zozo-vc-modal-overlay.%s {%s}', $modal_uniq_id, $overlay_style ) . "\n";



		}



		if( $content_styles != '' ) {



			$styles .= sprintf( '.zozo-vc-modal-overlay.%s .zozo_vc_modal .zozo_vc_modal-content {%s}', $modal_uniq_id, $content_styles ) . "\n";



		}



		



		



		if ( isset( $styles ) && $styles != '' ) {



			$output = '<div class="zozo-vc-custom-css" data-css="'. $styles .'"></div>';



		}



		



		$hide_forever_msg = $hide_forever_tag = $modal_hidden = '';



		$modal_hidden = 'no';



		



		if( $modal_on == "onload" ) {



			if( isset( $modal_hide_forever ) && $modal_hide_forever == 'yes' ) {



				if( isset( $hide_forever_text ) && $hide_forever_text != '' ) {



					$hide_forever_msg = $hide_forever_text;



				} else {



					$hide_forever_msg = esc_html__( 'Never see this message again.', 'wedding' );



				}



				$hide_forever_tag = '<div class="zozo-vc-modal-hide"><label for="zozo_modal_hide_forever"><input type="checkbox" class="zozo-modal-checkbox" name="zozo_modal_hide_forever" id="zozo_modal_hide_forever"><span> </span>'. $hide_forever_msg .'</label></div>';



			}



			



			if( isset( $_COOKIE[ $modal_uniq_id ] ) ) {



				$modal_hidden = 'yes';



			} else {



				$modal_hidden = 'no';



			}



		}



		



		// Classes



		$main_classes = 'zozo-vc-modal-wrapper';		



		if( isset( $classes ) && $classes != '' ) {



			$main_classes .= ' ' . $classes;



		}



		$main_classes .= wedding_vc_animation( $css_animation );



		



		$output .= '<div class="'.$main_classes.'">';



		



		if( $modal_on == "btn_modal" ) {



			$output .= '<button data-modal-id="'. $modal_uniq_id .'" class="zozo-btn-modal btn '. $btn_size .' text-'. $modal_on_align .' zozo-modal-overlay-show">'. $btn_text .'</button>';



		}



		else if( $modal_on == "image_modal" ) {



			$img = wp_get_attachment_image_src( $modal_img, 'large' );



			$output .= '<img src="'. esc_url($img[0]) .'" width="'. esc_attr($img[1]) .'" height="'. esc_attr($img[2]) .'" data-modal-id="'. $modal_uniq_id .'" class="zozo-modal-img zozo-modal-overlay-show text-'. $modal_on_align .'" />';



		}



		else if( $modal_on == "text_modal" ) {



			$output .= '<span data-modal-id="'. $modal_uniq_id .'" class="zozo-modal-text zozo-modal-overlay-show text-'. $modal_on_align .'">'. $modal_text .'</span>';



		}



		else if( $modal_on == "onload" ) {



			if( $modal_hidden == 'no' ) {



				$output .= '<div data-modal-id="'. $modal_uniq_id .'" class="zozo-modal-onload zozo-modal-overlay-show" data-onload-delay="'. $onload_delay .'"></div>';



			}



		}



		



		$modal_output = '';



		$modal_output .= '<div class="zozo-vc-modal-overlay '. $modal_uniq_id .'" data-class="'. $modal_uniq_id .'">';



			$modal_output .= '<div class="zozo-vc-modal-overlay-inner zozo_vc_modal vc-modal-'. $modal_size .'">';



				$modal_output .= '<div class="zozo_vc_modal-content">';



				



					$modal_output .= '<div class="zozo-vc-modal-overlay-close"><i class="flaticon flaticon-shapes btn-modal-toggle-close"></i></div>';



					$modal_output .= do_shortcode( wpb_js_remove_wpautop( $content ) );



					$modal_output .= $hide_forever_tag;



					



				$modal_output .= '</div>';



			$modal_output .= '</div>';



		$modal_output .= '</div>';



		



		if( $modal_hidden == 'no' ) {



			$output .= $modal_output;



		}



		



		$output .= '</div>';



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_modal_box_shortcode_map' ) ) {



	function wedding_vc_modal_box_shortcode_map() {



		



		vc_map( 



			array(



				"name"					=> esc_html__( "Modal Box", "wedding" ),



				"description"			=> esc_html__( "Show your content with Modal Box.", 'wedding' ),



				"base"					=> "zozo_vc_modal",



				"as_parent" 			=> array( 'only' => 'vc_row' ),



				"js_view" 				=> 'VcColumnView',



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



							esc_html__( "No", "wedding" )						=> '',



							esc_html__( "Top to bottom", "wedding" )			=> "top-to-bottom",



							esc_html__( "Bottom to top", "wedding" )			=> "bottom-to-top",



							esc_html__( "Left to right", "wedding" )			=> "left-to-right",



							esc_html__( "Right to left", "wedding" )			=> "right-to-left",



							esc_html__( "Appear from center", "wedding" )		=> "appear" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Display Modal On ?", "wedding" ),



						"param_name"	=> "modal_on",



						"value"			=> array(



							esc_html__( "Button", "wedding" )		=> 'btn_modal',



							esc_html__( "Text", "wedding" )		=> "text_modal",



							esc_html__( "Image", "wedding" )		=> "image_modal",



							esc_html__( "On Page Load", "wedding" ) => "onload" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Modal ID", "wedding" ),



						"param_name"	=> "modal_uniq_id",



						"value"			=> uniqid('zozo-modal-'),



					),



					array(



						"type" 			=> "number",



						"heading" 		=> esc_html__("Delay in Popup Display", "wedding" ),



						"param_name" 	=> "onload_delay",



						"value" 		=> "2",



						"suffix" 		=> "seconds",



						"description" 	=> esc_html__( "Time delay before modal popup on page load (in seconds)", "wedding" ),



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "onload" ),



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Enable Never see this message again link", "wedding" ),



						"param_name"	=> "modal_hide_forever",



						"value"			=> array(



							esc_html__( "No", "wedding" )		=> "no",



							esc_html__( "Yes", "wedding" )		=> "yes",



						),



						"description" 	=> esc_html__( "Enable this option to add link to hide this popup forever.", "wedding" ),



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "onload" ),



						),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Never see this message Text", "wedding" ),



						"param_name"	=> "hide_forever_text",



						"value"			=> "",



						'dependency'	=> array(



							'element'	=> 'modal_hide_forever',



							'value'		=> array( "yes" ),



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Alignment", "wedding" ),



						"param_name"	=> "modal_on_align",



						"value"			=> array(



							esc_html__( "Center", "wedding" )		=> "center",



							esc_html__( "Left", "wedding" )		=> "left",



							esc_html__( "Right", "wedding" )		=> "right",



						),



						"description" 	=> esc_html__( "Choose the alignment of selector button/text/image.", "wedding" ),



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "btn_modal", "image_modal", "text_modal" ),



						),



					),



					array(



						"type"			=> "attach_image",



						"heading"		=> esc_html__( "Upload Image", "wedding" ),



						"param_name"	=> "modal_img",



						"value"			=> "",



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "image_modal" ),



						),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Button Text", "wedding" ),



						"param_name"	=> "btn_text",



						"value"			=> "",



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "btn_modal" ),



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Button Size", "wedding" ),



						"param_name"	=> "btn_size",



						"value"			=> array(



							esc_html__( "Small", "wedding" )		=> "btn-sm",



							esc_html__( "Medium", "wedding" )		=> "btn-md",



							esc_html__( "Large", "wedding" )		=> "btn-lg",



							esc_html__( "Block", "wedding" )		=> "btn-block" ),



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "btn_modal" ),



						),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Enter Text", "wedding" ),



						"param_name"	=> "modal_text",



						"value"			=> "",



						"description" 	=> esc_html__( "Enter the text on which the modal box will be triggered.", "wedding" ),



						'dependency'	=> array(



							'element'	=> 'modal_on',



							'value'		=> array( "text_modal" ),



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Modal Box Size", "wedding" ),



						"param_name"	=> "modal_size",



						"value"			=> array(



							esc_html__( "Small", "wedding" )		=> "small",



							esc_html__( "Medium", "wedding" )		=> "medium",



							esc_html__( "Large", "wedding" )		=> "large",



							esc_html__( "Block", "wedding" )		=> "block" ),



						"description" 	=> esc_html__( "Choose modal box size.", "wedding" ),



					),



					array(



						"type" 			=> "number",



						"heading" 		=> esc_html__("Border Radius", "wedding" ),



						"param_name" 	=> "modal_border_radius",



						"value" 		=> 0,



						"min" 			=> 1,



						"max" 			=> 500,



						"suffix" 		=> "px",



						"description" 	=> esc_html__( "To shape the modal content box, enter border radius.", "wedding" ),



						"group"			=> esc_html__( "Stylings", "wedding" ),



					),



					array(



						"type" 			=> "number",



						"heading" 		=> esc_html__("Padding", "wedding" ),



						"param_name" 	=> "modal_padding",



						"value" 		=> 0,



						"min" 			=> 1,



						"max" 			=> 500,



						"suffix" 		=> "px",



						"description" 	=> esc_html__( "Add spacing for modal box.", "wedding" ),



						"group"			=> esc_html__( "Stylings", "wedding" ),



					),



					array(



						"type"			=> "colorpicker",



						"heading"		=> esc_html__( "Overlay Background Color", "wedding" ),



						"param_name"	=> "overlay_bg_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),



					),



					array(



						"type"			=> "colorpicker",



						"heading"		=> esc_html__( "Content Background Color", "wedding" ),



						"param_name"	=> "content_bg_color",



						"group"			=> esc_html__( "Stylings", "wedding" ),



					),



				),



				'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',



			)



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_modal_box_shortcode_map' );







/**



 * We need to define this so that VC will show our nesting container correctly



 */



if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {



    class WPBakeryShortCode_Zozo_Vc_Modal extends WPBakeryShortCodesContainer {



    }



}