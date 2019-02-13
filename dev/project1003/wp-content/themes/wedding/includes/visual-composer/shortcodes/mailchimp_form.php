<?php



/**



 * Mailchimp Form shortcode



 */







if ( ! function_exists( 'wedding_vc_mailchimp_form_shortcode' ) ) {



	function wedding_vc_mailchimp_form_shortcode( $atts, $content = NULL ) {



		



		$atts = vc_map_get_attributes( 'zozo_vc_mailchimp_form', $atts );



		extract( $atts );







		$output = '';



		$button_class = '';



		$button_html = '';



		$form_extra_class = '';



		static $zozo_mailchimp_id = 1;



		



		// Button



		$button_html = $button_text;



		if ( 'yes' == $button_block && $button_align == 'bottom' ) {



			$button_class .= ' btn-block';



		}



		



		if ( $button_align ) {



			$button_class .= ' btn-'. $button_align;



		}



		



		if ( 'yes' === $add_icon ) {



			$button_class .= ' zozo-btn-icon-' . $icon_align;



			if( isset( ${"icon_" . $type} ) ) {



				$iconClass = ${"icon_" . $type};



			} else {



				$iconClass = 'fa fa-adjust';



			}



				



			$icon_html = '<i class="zozo-btn-icon ' . esc_attr( $iconClass ) . '"></i>';



		



			if ( $icon_align == 'left' ) {



				$button_html = $icon_html . ' ' . $button_html;



			} else {



				$button_html .= ' ' . $icon_html;



			}



		}



		



		if ( $button_align ) {



			$form_extra_class = ' form-btn-'. $button_align;



		}



		



		$button_styles = $button_hover_styles = '';



		if( isset( $bg_color ) && $bg_color != '' ) {



			$button_styles = 'background-color: '.$bg_color.'; ';



		}



		



		if( isset( $bg_text_color ) && $bg_text_color != '' ) {



			$button_styles .= 'color: '.$bg_text_color.';';



		}



		



		if( isset( $bg_hover_color ) && $bg_hover_color != '' ) {



			$button_hover_styles = 'background-color: '.$bg_hover_color.'; ';



		}



		



		if( isset( $bg_hover_text_color ) && $bg_hover_text_color != '' ) {



			$button_hover_styles .= 'color: '.$bg_hover_text_color.';';



		}



		



		$custom_msgs = '';



		



		if( isset( $email_not_empty_msg ) && $email_not_empty_msg != '' ) {



			$custom_msgs .= ' data-email_not_empty="'. $email_not_empty_msg .'"';



		} else {



			$custom_msgs .= ' data-email_not_empty="'. esc_html__( "The email address is required", "wedding" ) .'"';



		}



		



		if( isset( $email_valid_msg ) && $email_valid_msg != '' ) {



			$custom_msgs .= ' data-email_valid="'. $email_valid_msg .'"';



		} else {



			$custom_msgs .= ' data-email_valid="'. esc_html__( "The input is not a valid email address", "wedding" ) .'"';



		}



		



		// Classes



		$main_classes = '';



		if( isset( $classes ) && $classes != '' ) {



			$main_classes .= ' ' . $classes;



		}



		if( isset( $form_style ) && $form_style != '' ) {



			$main_classes .= ' form-style-' . $form_style;



		}



		$main_classes .= wedding_vc_animation( $css_animation );



		



		if( isset( $mailing_list ) && $mailing_list != '' ) {



			



			$custom_stylings = '';



			if( ( isset( $button_styles ) && $button_styles != '' ) || ( isset( $button_hover_styles ) && $button_hover_styles != '' ) ) {



				if( isset( $button_styles ) && $button_styles != '' ) {



					$custom_stylings .= '#mc-subscribe'.$zozo_mailchimp_id.' .btn.mc-subscribe {' . $button_styles . ' }';



				}



				if( isset( $button_hover_styles ) && $button_hover_styles != '' ) {



					$custom_stylings .= '#mc-subscribe'.$zozo_mailchimp_id.' .btn.mc-subscribe:hover, #mc-subscribe'.$zozo_mailchimp_id.' .btn.mc-subscribe:active, #mc-subscribe'.$zozo_mailchimp_id.' .btn.mc-subscribe:focus {' . $button_hover_styles . ' }';



				}



			}



			



			if ( isset( $custom_stylings ) && $custom_stylings != '' ) {



				$output .= '<div class="zozo-vc-custom-css" data-css="'. $custom_stylings .'"></div>';



			}



	



			$output .= '<div id="mc-subscribe'.$zozo_mailchimp_id.'" class="zozo-mc-form subscribe-form mailchimp-form-wrapper'. esc_attr( $main_classes ) .'">';



				$output .= '<form action="#" method="post" id="zozo-mailchimp-form'.$zozo_mailchimp_id.'" name="zozo-mailchimp-form'.$zozo_mailchimp_id.'" class="zozo-mailchimp-form'.$form_extra_class.'"'. $custom_msgs .'>';



					



					if( $button_align == 'bottom' ) {



						$output .= '<div class="form-group mailchimp-email">';



							$output .= '<input type="text" placeholder="'.$placeholder_text.'" class="zozo-subscribe input-email form-control" value="" name="subscribe_email" id="subscribe_email">';



						$output .= '</div>';



						$output .= '<button type="submit" id="zozo_mc_form_submit" name="zozo_mc_submit" class="btn mc-subscribe zozo-submit'. esc_attr( $button_class ) .'">'.$button_html.'</button>';



					} 



					elseif( $button_align == 'inline' || $button_align == 'right' ) {



						$output .= '<div class="mailchimp-email zozo-form-group-addon">';



						$output .= '<div class="input-group form-group">';



							$output .= '<input type="text" placeholder="'.$placeholder_text.'" class="zozo-subscribe input-email form-control" value="" name="subscribe_email" id="subscribe_email">';



							$output .= '<div class="input-group-addon"><button type="submit" id="zozo_mc_form_submit" name="zozo_mc_submit" class="btn mc-subscribe zozo-submit'. esc_attr( $button_class ) .'">'.$button_html.'</button></div>';



						$output .= '</div>';



						$output .= '</div>';



					}



					



					$output .= '<input type="hidden" id="zozo_mc_form_list" name="zozo_mc_form_list" value="'. $mailing_list .'">';



																



				$output .= '</form>';



				



				$output .= '<p class="mailchimp-msg zozo-form-success"></p>';



			$output .= '</div>';



		



		}



		



		$zozo_mailchimp_id++;



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_mailchimp_form_shortcode_map' ) ) {



	function wedding_vc_mailchimp_form_shortcode_map() {



	



		vc_map( 



			array(



				"name"					=> esc_html__( "Mailchimp Form", "wedding" ),



				"description"			=> esc_html__( "Mailchimp form with different styles.", 'wedding' ),



				"base"					=> "zozo_vc_mailchimp_form",



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



						"heading"		=> esc_html__( "Form Style", "wedding" ),



						"param_name"	=> "form_style",



						'admin_label' 	=> true,



						"value"			=> array(



							esc_html__( "Default", "wedding" )			=> "default",



							esc_html__( "Transparent", "wedding" )		=> "transparent" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Mailing List", "wedding" ),



						"param_name"	=> "mailing_list",



						"value"			=> wedding_get_mailing_lists_format()



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Placeholder Text", "wedding" ),



						"param_name"	=> "placeholder_text",



						'admin_label' 	=> true,



						"value"			=> esc_html__( 'Subscribe Now!', 'wedding' ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Button Text", "wedding" ),



						"param_name"	=> "button_text",



						'admin_label' 	=> true,



						"value"			=> esc_html__( 'Subscribe', 'wedding' ),



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						'type' 			=> 'dropdown',



						'heading' 		=> esc_html__( 'Button Alignment', 'wedding' ),



						'param_name' 	=> 'button_align',



						'description' 	=> esc_html__( 'Select button alignment.', 'wedding' ),



						'value' 		=> array(



							esc_html__( 'Inline', 'wedding' ) 	=> 'inline',



							esc_html__( 'Right', 'wedding' ) 	=> 'right',



							esc_html__( 'Bottom', 'wedding' ) 	=> 'bottom'



						),



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						'type' 			=> 'checkbox',



						'heading' 		=> esc_html__( 'Set full width button?', 'wedding' ),



						'param_name' 	=> 'button_block',



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes"



						),



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						'type' 			=> 'checkbox',



						'heading' 		=> esc_html__( 'Add icon?', 'wedding' ),



						'param_name' 	=> 'add_icon',



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes"



						),



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						'type' 			=> 'dropdown',



						'heading' 		=> esc_html__( 'Icon Alignment', 'wedding' ),



						'description' 	=> esc_html__( 'Select icon alignment.', 'wedding' ),



						'param_name' 	=> 'icon_align',



						'value' 		=> array(



							esc_html__( 'Left', 'wedding' ) 	=> 'left',



							esc_html__( 'Right', 'wedding' ) => 'right',



						),



						'dependency' 	=> array(



							'element' 	=> 'add_icon',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type" 			=> "dropdown",



						"heading" 		=> esc_html__( "Choose from Icon library", "wedding" ),



						"value" 		=> array(



							esc_html__( "Font Awesome", "wedding" ) 	=> "fontawesome",



							esc_html__( "Lineicons", "wedding" ) 	=> "lineicons",



							esc_html__( "Flaticons", "wedding" ) 	=> "flaticons",



						),



						"param_name" 	=> "type",



						'dependency' 	=> array(



							'element' 	=> 'add_icon',



							'value' 	=> 'yes',



						),



						"description" 	=> esc_html__( "Select icon library.", "wedding" ),



						"group"			=> esc_html__( "Button", "wedding" ),



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



						"group"			=> esc_html__( "Button", "wedding" ),



					),				



					array(



						"type" 			=> 'iconpicker',



						"heading" 		=> esc_html__( "Icon", "wedding" ),



						"param_name" 	=> "icon_lineicons",



						"value" 		=> "fa fa-minus-circle",



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



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type" 			=> 'iconpicker',



						"heading" 		=> esc_html__( "Icon", "wedding" ),



						"param_name" 	=> "icon_flaticons",



						"value" 		=> "fa fa-minus-circle",



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



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Button Background Color", "wedding" ),



						"param_name"	=> "bg_color",



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Button Text Color", "wedding" ),



						"param_name"	=> "bg_text_color",



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Button Hover Background Color", "wedding" ),



						"param_name"	=> "bg_hover_color",



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Button Hover Text Color", "wedding" ),



						"param_name"	=> "bg_hover_text_color",



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Email Field Required", "wedding" ),



						"param_name"	=> "email_not_empty_msg",



						"value"			=> esc_html__( "The email address is required", "wedding" ),



						"group"			=> esc_html__( "Error Messages", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Email Field Valid", "wedding" ),



						"param_name"	=> "email_valid_msg",



						"value"			=> esc_html__( "The input is not a valid email address", "wedding" ),



						"group"			=> esc_html__( "Error Messages", "wedding" ),



					),



				)



			) 



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_mailchimp_form_shortcode_map' );