<?php 



/**



 * Clients Slider shortcode



 */







if ( ! function_exists( 'wedding_vc_clients_slider_shortcode' ) ) {



	function wedding_vc_clients_slider_shortcode( $atts, $content = NULL ) {



		



		$atts = vc_map_get_attributes( 'zozo_vc_clients_slider', $atts );



		extract( $atts );







		$output = '';



		static $clients_id = 1;



				



		// Slider Configuration



		$data_attr = '';



		



		if( isset( $show_slider ) && $show_slider == "yes" ) {



			if( isset( $items ) && $items != '' ) {



				$data_attr .= ' data-items="' . $items . '" ';



			}



			



			if( isset( $items_scroll ) && $items_scroll != '' ) {



				$data_attr .= ' data-slideby="' . $items_scroll . '" ';



			}



			



			if( isset( $items_tablet ) && $items_tablet != '' ) {



				$data_attr .= ' data-items-tablet="' . $items_tablet . '" ';



			}



			



			if( isset( $items_mobile_landscape ) && $items_mobile_landscape != '' ) {



				$data_attr .= ' data-items-mobile-landscape="' . $items_mobile_landscape . '" ';



			}



			



			if( isset( $items_mobile_portrait ) && $items_mobile_portrait != '' ) {



				$data_attr .= ' data-items-mobile-portrait="' . $items_mobile_portrait . '" ';



			}



		



			if( isset( $auto_play ) && $auto_play != '' ) {



				$data_attr .= ' data-autoplay="' . $auto_play . '" ';



			}



			if( isset( $timeout_duration ) && $timeout_duration != '' ) {



				$data_attr .= ' data-autoplay-timeout="' . $timeout_duration . '" ';



			}



			



			if( isset( $items ) && $items == 1 ) {



				$data_attr .= ' data-loop="false" ';



			} else {



				if( isset( $infinite_loop ) && $infinite_loop != '' ) {



					$data_attr .= ' data-loop="' . $infinite_loop . '" ';



				}



			}



			



			if( isset( $margin ) && $margin != '' ) {



				$data_attr .= ' data-margin="' . $margin . '" ';



			}



		



			if( isset( $pagination ) && $pagination != '' ) {



				$data_attr .= ' data-pagination="' . $pagination . '" ';



			}



			if( isset( $navigation ) && $navigation != '' ) {



				$data_attr .= ' data-navigation="' . $navigation . '" ';



			}



		}



		



		// Classes



		$main_classes = '';



		$column_class = '';



		$main_classes .= wedding_vc_animation( $css_animation );



		if( isset( $show_slider ) && $show_slider == "no" ) {



			$main_classes .= ' client-columns-'.$columns.'';



		



			if( isset( $columns ) && $columns != '' ) {



				if( isset( $columns ) && $columns == '2' ) {



					$column_class = ' col-md-6 col-sm-6 col-xs-12';



				} else if( isset( $columns ) && $columns == '3' ) {



					$column_class = ' col-md-4 col-sm-4 col-xs-12';



				} else if( isset( $columns ) && $columns == '4' ) {



					$column_class = ' col-md-3 col-sm-4 col-xs-12';



				} else if( isset( $columns ) && $columns == '6' ) {



					$column_class = ' col-md-2 col-sm-4 col-xs-12';



				}



			} else {



				$column_class = ' col-md-6 col-sm-6 col-xs-12';



			}



		}



		



		// Clients link



		$client_links = explode( ",", $custom_links );



		$images = explode( ',', $images );



		$i = -1;



		$client_images = '';



		



		foreach ( $images as $attach_id ) {



			$i++;



			



			$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => 'full' ) );



			$thumbnail = $post_thumbnail['thumbnail'];



			



			$link_start = $link_end = '';



		



			if( isset( $client_links[$i] ) && $client_links[$i] != '' ) {



				$link_start = '<a href="' . $client_links[$i] . '"' . ( ! empty( $link_target ) ? ' target="' . $link_target . '"' : '' ) . '>';



				$link_end = '</a>';



			}



			$client_images .= '<div class="client-item'. $column_class .'">' . $link_start . $thumbnail . $link_end . '</div>';



		}



		



		$extra_margin_class = "";



		if( $i > $columns ) {



			$extra_margin_class = " client-grid-spacer";



		}



		



		// Main Wrapper



		$output = '<div class="zozo-client-slider-wrapper'.$main_classes.' style-'.$display_type.'">';



		if( isset( $show_slider ) && $show_slider == "yes" ) {



			$output .= '<div id="zozo-client-slider-' . $clients_id. '" class="zozo-owl-carousel zozo-client-slider owl-carousel"' . $data_attr . '>';



		} else {		



			$output .= '<div id="zozo-client-grid-' . $clients_id. '" class="zozo-client-grid'.$extra_margin_class.'">';



		}



			$output .= $client_images;



		$output .= '</div>';



		$output .= '</div>'; // .zozo-client-slider-wrapper



		



		$clients_id++;



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_clients_slider_shortcode_map' ) ) {



	function wedding_vc_clients_slider_shortcode_map() {



		



		vc_map( 



			array(



				"name"					=> esc_html__( "Clients Slider", "wedding" ),



				"description"			=> esc_html__( "Clients/Brands Images Carousel Slider.", 'wedding' ),



				"base"					=> "zozo_vc_clients_slider",



				"category"				=> esc_html__( "Theme Addons", "wedding" ),



				"icon"					=> "zozo-vc-icon",



				"params"				=> array(



					array(



						'type'			=> 'textfield',



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



						'type'			=> 'dropdown',



						'heading'		=> esc_html__( "Display Type", 'wedding' ),



						'param_name'	=> "display_type",



						'value'			=> array(



							esc_html__( 'Default', 'wedding' )			=> 'default',



							esc_html__( 'Grayscale Style', 'wedding' )	=> 'hover_syle',



						),



					),



					array(



						"type" 			=> 'attach_images',



						"heading" 		=> esc_html__( "Client/Brand Images", "wedding" ),



						"param_name"	=> "images",



						"admin_label" 	=> true,



						"value" 		=> '',



						"description" 	=> esc_html__( "Select images from media library.", "wedding" )



					),					



					array(



						"type"			=> 'exploded_textarea',



						"heading"		=> esc_html__( "Custom Links", "wedding" ),



						"param_name"	=> "custom_links",



						"value" 		=> 'http://customlink.com,http://customlink.com',



						"description" 	=> esc_html__( "Enter links for each image here. Divide links with linebreaks (Enter).", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Link Target", "wedding" ),



						"param_name"	=> "link_target",



						"value"			=> array(



							esc_html__( 'Same window', 'wedding' ) 	=> "_self",



							esc_html__( 'New window', 'wedding' ) 	=> "_blank" ),



					),



					// Slider



					array(



						'type'			=> 'dropdown',



						'heading'		=> esc_html__( "Show as Slider", 'wedding' ),



						'param_name'	=> "show_slider",



						'value'			=> array(



							esc_html__( 'Yes', 'wedding' )	=> 'yes',



							esc_html__( 'No', 'wedding' )	=> 'no',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Columns", "wedding" ),



						"param_name"	=> "columns",



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'no',



						),				



						"value"			=> array(



							esc_html__( "Two Columns", "wedding" )		=> "2",



							esc_html__( "Three Columns", "wedding" )		=> "3",



							esc_html__( "Four Columns", "wedding" )		=> "4",



							esc_html__( "Six Columns", "wedding" )		=> "6", ),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items to Display", "wedding" ),



						"param_name"	=> "items",



						"admin_label" 	=> true,



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items to Scrollby", "wedding" ),



						"param_name"	=> "items_scroll",



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						'type'			=> 'dropdown',



						'heading'		=> esc_html__( "Auto Play", 'wedding' ),



						'param_name'	=> "auto_play",



						"admin_label" 	=> true,



						'value'			=> array(



							esc_html__( 'True', 'wedding' )	=> 'true',



							esc_html__( 'False', 'wedding' )	=> 'false',



						),



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						'type'			=> 'textfield',



						'heading'		=> esc_html__( 'Timeout Duration (in milliseconds)', 'wedding' ),



						'param_name'	=> "timeout_duration",



						'value'			=> "5000",



						'dependency'	=> array(



							'element'	=> "auto_play",



							'value'		=> 'true'



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						'type'			=> 'dropdown',



						'heading'		=> esc_html__( "Infinite Loop", 'wedding' ),



						'param_name'	=> "infinite_loop",



						'value'			=> array(



							esc_html__( 'False', 'wedding' )	=> 'false',



							esc_html__( 'True', 'wedding' )	=> 'true',



						),



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Margin ( Items Spacing )", "wedding" ),



						"param_name"	=> "margin",



						'admin_label'	=> true,



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items To Display in Tablet", "wedding" ),



						"param_name"	=> "items_tablet",



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items To Display In Mobile Landscape", "wedding" ),



						"param_name"	=> "items_mobile_landscape",



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items To Display In Mobile Portrait", "wedding" ),



						"param_name"	=> "items_mobile_portrait",



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Navigation", "wedding" ),



						"param_name"	=> "navigation",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "true",



							esc_html__( "No", "wedding" )	=> "false" ),



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Pagination", "wedding" ),



						"param_name"	=> "pagination",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "true",



							esc_html__( "No", "wedding" )	=> "false" ),



						'dependency' 	=> array(



							'element' 	=> 'show_slider',



							'value' 	=> 'yes',



						),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



				)



			) 



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_clients_slider_shortcode_map' );