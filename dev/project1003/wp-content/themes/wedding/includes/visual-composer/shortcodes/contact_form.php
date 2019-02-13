<?php



/**



 * Contact Form shortcode



 */







if ( ! function_exists( 'wedding_vc_contact_form_shortcode' ) ) {



	function wedding_vc_contact_form_shortcode( $atts, $content = NULL ) {



	



		$atts = vc_map_get_attributes( 'zozo_vc_contact_form', $atts );



		extract( $atts );







		$output = '';



		$button_class = '';



		$button_html = '';



		static $zozo_contactform_id = 1;



		



		// Button



		$button_html = $button_text;



		if ( 'yes' == $button_block ) {



			$button_class .= ' btn-block';



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



		



		$custom_msgs = '';



		if( isset( $name_not_empty_msg ) && $name_not_empty_msg != '' ) {



			$custom_msgs .= ' data-name_not_empty="'. $name_not_empty_msg .'"';



		} else {



			$custom_msgs .= ' data-name_not_empty="'. esc_html__( "Name Field Required", "wedding" ) .'"';



		}



		



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



		



		if( isset( $phone_valid_msg ) && $phone_valid_msg != '' ) {



			$custom_msgs .= ' data-phone_valid="'. $phone_valid_msg .'"';



		} else {



			$custom_msgs .= ' data-phone_valid="'. esc_html__( "The value can contain only digits", "wedding" ) .'"';



		}



		



		if( isset( $message_not_empty_msg ) && $message_not_empty_msg != '' ) {



			$custom_msgs .= ' data-msg_not_empty="'. $message_not_empty_msg .'"';



		} else {



			$custom_msgs .= ' data-msg_not_empty="'. esc_html__( "Message is required", "wedding" ) .'"';



		}



		



		// Classes



		$main_classes = '';



		if( isset( $classes ) && $classes != '' ) {



			$main_classes .= ' ' . $classes;



		}



		if( isset( $form_style ) && $form_style != '' ) {



			$main_classes .= ' form-style-' . $form_style;



		}



		if( isset( $form_layout ) && $form_layout != '' ) {



			$main_classes .= ' form-layout-' . $form_layout;



		}



		$main_classes .= wedding_vc_animation( $css_animation );



		



		$output .= '<div class="contact-form-wrapper'. esc_attr( $main_classes ) .'">';



			$output .= '<p class="bg-success zozo-form-success"></p>'; 



			$output .= '<p class="bg-danger zozo-form-error"></p>';



				



				$output .= '<div class="zozo-contact-form-container">';



					$output .= '<form name="contactform'.$zozo_contactform_id.'" class="zozo-contact-form" id="contactform'.$zozo_contactform_id.'" method="post" action="#"'. $custom_msgs .'>';



					



					if( isset( $form_layout ) && $form_layout == 'two-column' ) {



						$output .= '<div class="row">';



							$output .= '<div class="col-md-6 form-col-left col-xs-12">';



					}



					



					// Name Field



					if( isset( $show_name ) && $show_name == 'yes' ) {						



						$output .= '<div class="zozo-input-text form-group">';



							$output .= '<label class="sr-only" for="contact_name">'.$name_label.'</label>';



							$output .= '<input type="text" name="contact_name" id="contact_name" class="input-name form-control" placeholder="'.esc_attr($name_label).'" value="">';		



						$output .= '</div>';



					}



					



					if( isset( $form_layout ) && $form_layout == 'two-column' ) {



						$output .= '</div>';



						$output .= '<div class="col-md-6 col-xs-12">';



					}



					



					// Phone Field



					if( isset( $show_phone ) && $show_phone == 'yes' ) {



						$output .= '<div class="zozo-input-phone form-group">';



							$output .= '<label class="sr-only" for="contact_phone">'.$phone_label.'</label>';



							$output .= '<input type="text" id="contact_phone" name="contact_phone" class="input-phone form-control" placeholder="'.esc_attr($phone_label).'" value="">';



						$output .= '</div>';



					}



					



					if( isset( $form_layout ) && $form_layout == 'two-column' ) {



							$output .= '</div>';



						$output .= '</div>';



					}



					



					// Email Field



					$output .= '<div class="zozo-input-email form-group">';



						$output .= '<label class="sr-only" for="contact_email">'.$email_label.'</label>';							



						$output .= '<input type="text" name="contact_email" id="contact_email" class="input-email form-control" placeholder="'.esc_attr($email_label).'" value="">';



					$output .= '</div>';



					



					// Message Field



					if( isset( $show_message ) && $show_message == 'yes' ) {



						$output .= '<div class="zozo-textarea-message form-group">';



							$output .= '<label class="sr-only" for="contact_message">'.$message_label.'</label>';



							$output .= '<textarea name="contact_message" id="contact_message" class="textarea-message form-control" rows="3" cols="25" placeholder="'.esc_attr($message_label).'"></textarea>';



						$output .= '</div>';



					}



					



					$output .= '<input type="hidden" id="send_to_email" name="send_to_email" value="'. $mail_send_to .'">';



					$output .= '<input type="hidden" id="mail_from_name" name="mail_from_name" value="'. $mail_from_name .'">';



					$output .= '<input type="hidden" id="mail_from_email" name="mail_from_email" value="'. $mail_from_email .'">';



					$output .= '<input type="hidden" id="mail_subject" name="mail_subject" value="'. $mail_subject .'">';



					



					// Button



					$output .= '<div class="zozo-input-submit form-group text-'.$button_align.'">';



						$output .= '<button type="submit" class="btn zozo-submit'. esc_attr( $button_class ) .'">'.$button_html.'</button>';



					$output .= '</div>';



					



					$output .= '</form>';



				$output .= '</div>';



				



		$output .= '</div>';



		



		$zozo_contactform_id++;



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_contact_form_shortcode_map' ) ) {



	function wedding_vc_contact_form_shortcode_map() {



	



		vc_map( 



			array(



				"name"					=> esc_html__( "Contact Form", "wedding" ),



				"description"			=> esc_html__( "Contact form with different styles.", 'wedding' ),



				"base"					=> "zozo_vc_contact_form",



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



						'admin_label' 	=> true,



						"heading"		=> esc_html__( "Form Layout", "wedding" ),



						"param_name"	=> "form_layout",



						"value"			=> array(



							esc_html__( "Default", "wedding" )			=> "default",



							esc_html__( "Two Column Style", "wedding" )	=> "two-column"	),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Form Style", "wedding" ),



						"param_name"	=> "form_style",



						"value"			=> array(



							esc_html__( "Default", "wedding" )			=> "default",



							esc_html__( "Transparent", "wedding" )		=> "transparent",



							esc_html__( "Flat", "wedding" )			=> "flat" ),



					),



					// Fields



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Show Name Field", "wedding" ),



						"param_name"	=> "show_name",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no",



						),



						"group"			=> esc_html__( "Fields", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Name Field Label", "wedding" ),



						"param_name"	=> "name_label",



						"value"			=> "Full Name",



						"group"			=> esc_html__( "Fields", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Email Field Label", "wedding" ),



						"param_name"	=> "email_label",



						"value"			=> "Email",



						"group"			=> esc_html__( "Fields", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Show Phone Field", "wedding" ),



						"param_name"	=> "show_phone",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no",



						),



						"group"			=> esc_html__( "Fields", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Phone Field Label", "wedding" ),



						"param_name"	=> "phone_label",



						"value"			=> "Phone",



						"group"			=> esc_html__( "Fields", "wedding" ),



					),					



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Show Message Field", "wedding" ),



						"param_name"	=> "show_message",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no",



						),



						"group"			=> esc_html__( "Fields", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Message Field Label", "wedding" ),



						"param_name"	=> "message_label",



						"value"			=> "Message",



						"group"			=> esc_html__( "Fields", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Button Text", "wedding" ),



						"param_name"	=> "button_text",



						'admin_label' 	=> true,



						"value"			=> esc_html__( 'Send Now', 'wedding' ),



						"group"			=> esc_html__( "Button", "wedding" ),



					),



					array(



						'type' 			=> 'dropdown',



						'heading' 		=> esc_html__( 'Button Alignment', 'wedding' ),



						'param_name' 	=> 'button_align',



						'description' 	=> esc_html__( 'Select button alignment.', 'wedding' ),



						'value' 		=> array(



							esc_html__( 'Left', 'wedding' ) 		=> 'left',



							esc_html__( 'Right', 'wedding' ) 	=> 'right',



							esc_html__( 'Center', 'wedding' ) 	=> 'center'



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



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Name Field Required", "wedding" ),



						"param_name"	=> "name_not_empty_msg",



						"value"			=> esc_html__( "The name is required and cannot be empty", "wedding" ),



						"group"			=> esc_html__( "Error Messages", "wedding" ),



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



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Phone Field Valid", "wedding" ),



						"param_name"	=> "phone_valid_msg",



						"value"			=> esc_html__( "The value can contain only digits", "wedding" ),



						"group"			=> esc_html__( "Error Messages", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Message Field Required", "wedding" ),



						"param_name"	=> "message_not_empty_msg",



						"value"			=> esc_html__( "Message is required", "wedding" ),



						"group"			=> esc_html__( "Error Messages", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Send To", "wedding" ),



						"param_name"	=> "mail_send_to",



						"value"			=> '',



						"group"			=> esc_html__( "Mail", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "From Name", "wedding" ),



						"param_name"	=> "mail_from_name",



						"value"			=> '',



						"group"			=> esc_html__( "Mail", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "From Email Address", "wedding" ),



						"param_name"	=> "mail_from_email",



						"value"			=> '',



						"group"			=> esc_html__( "Mail", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Subject", "wedding" ),



						"param_name"	=> "mail_subject",



						"value"			=> '',



						"group"			=> esc_html__( "Mail", "wedding" ),



					),



				)



			) 



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_contact_form_shortcode_map' );