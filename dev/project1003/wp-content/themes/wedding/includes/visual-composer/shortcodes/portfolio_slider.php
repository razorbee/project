<?php 



/**



 * Portfolio Slider shortcode



 */







if ( ! function_exists( 'wedding_vc_portfolio_slider_shortcode' ) ) {



	function wedding_vc_portfolio_slider_shortcode( $atts, $content = NULL ) {



		



		$atts = vc_map_get_attributes( 'zozo_vc_portfolio_slider', $atts );



		extract( $atts );







		$output = '';



		static $portfolio_id = 1;



		global $post;



				



		// Slider Configuration



		$data_attr = '';



	



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



		



		if( isset( $infinite_loop ) && $infinite_loop != '' ) {



			$data_attr .= ' data-loop="' . $infinite_loop . '" ';



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



		



		if( isset( $items ) && $items >= 2 ) {



			$image_size = 'full';



		} else {



			$image_size = 'wedding-vertical-thumb';



		}



		



		// Include categories



		$include_categories = ( '' != $include_categories ) ? $include_categories : '';



		$include_categories = ( 'all' == $include_categories ) ? '' : $include_categories;



		if( $include_categories ) {



			$include_categories = explode( ',', $include_categories );				



			if ( ! empty( $include_categories ) && is_array( $include_categories ) ) {



				$include_categories = array(



					'taxonomy'	=> 'portfolio_categories',



					'field'		=> 'slug',



					'terms'		=> $include_categories,



					'operator'	=> 'IN',



				);



			} else {



				$include_categories = '';



			}



		}



		



		// Exclude categories



		if( $exclude_categories ) {



			$exclude_categories = explode( ',', $exclude_categories );



			if ( ! empty( $exclude_categories ) && is_array( $exclude_categories ) ) {				



				$exclude_categories = array(



						'taxonomy'	=> 'portfolio_categories',



						'field'		=> 'slug',



						'terms'		=> $exclude_categories,



						'operator'	=> 'NOT IN',



					);



			} else {



				$exclude_categories = '';



			}



		}



		



		$query_args = array(



						'post_type' 		=> 'zozo_portfolio',



						'posts_per_page' 	=> -1,



						'orderby' 		 	=> 'date',



						'order' 		 	=> 'DESC',



					  );



					  



		$query_args['tax_query'] = array(



										'relation'	=> 'AND',



										$include_categories,



										$exclude_categories );



		



		$portfolio_slider_query = new WP_Query( $query_args );



		



		// Classes



		$main_classes = '';



		



		if( isset( $classes ) && $classes != '' ) {



			$main_classes .= ' ' . $classes;



		}



		



		$animation_classes = '';



		



		// Overlay Classes



		$overlay_set = $overlay_style = '';



		$overlay_position = '';







		if( isset( $overlay_fit ) && $overlay_fit == 'full' ) {



			$overlay_position = $overlay_position_full;



		} else {



			$overlay_position = $overlay_position_content;



		}



		



		$animation_classes .= ' overlay-'. esc_attr( $overlay_fit ) .' overlay-'. esc_attr( $overlay_position );



		



		$overlay_animation = 'portfolio-overlay '. esc_attr( $overlay_animation );



		$overlay_style = $overlay_color != '' ? ' style="background-color:'. $overlay_color .';"' : '';



		



		// Image Animation



		$thumbnail_animation = '';



		if( isset( $image_animation ) && $image_animation != 'none' ) {



			if( $image_animation == 'push' ) {



				$thumbnail_animation = ' ' . esc_attr( $image_animation ) . '-' . esc_attr( $image_position );



			}



			else {



				$thumbnail_animation = ' ' . esc_attr( $image_animation );



			}



		}



		



		if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {



			$button_class = '';



			if( isset( $button_icon_animations ) && $button_icon_animations != 'none' ){



				$button_class = ' ' . esc_attr( $button_icon_animations );



			}



		}



		



		if( $portfolio_slider_query->have_posts() ) {



			$output = '<div class="zozo-portfolio-slider-wrapper sl-layout-'. $slider_layout .''.$main_classes.'">';



			$output .= '<div id="zozo-portfolio-slider'.$portfolio_id.'" class="zozo-owl-carousel owl-carousel portfolio-carousel-slider"'.$data_attr.'>';



			



				while ($portfolio_slider_query->have_posts()) : $portfolio_slider_query->the_post();



					$portfolio_img = '';



					$portfolio_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $image_size);



					



					$portfolio_large = ''; 



					$portfolio_large = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');



					



					$author_rating 	= get_post_meta( $post->ID, 'zozo_author_rating', true );



					$custom_text 	= get_post_meta( $post->ID, 'zozo_portfolio_custom_text', true );



					$custom_url 	= get_post_meta( $post->ID, 'zozo_portfolio_custom_link', true );



					$custom_link 	= $custom_url == '' ? get_permalink() : esc_url( $custom_url );



					



					$media_icon_output = '';



					$media_icon_output = wedding_portfolio_media_icon_output( $post->ID, $portfolio_id );



					



					$output .= '<div id="portfolio-'.get_the_ID().'" class="portfolio-item portfolio-slider-item style-'.$slider_layout.'">';



					$output .= '<div class="post-inside-wrapper">';



						$output .= '<div class="portfolio-content '.$animation_classes.'">';



							



							// PORTFOLIO - CLASSIC



							if( isset( $slider_layout ) && $slider_layout == 'classic' ) {



								$output .= '<div class="portfolio-image-overlay-wrapper">';



									if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {



										if( isset( $item_link ) && $item_link == 'link_to_img' ) {



											$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="classic-img-link" title="'. get_the_title() .'">';



										} else if( isset( $item_link ) && $item_link == 'single_link' ) {



											$output .= '<a href="'. esc_url( $custom_link ) .'" class="classic-img-link" title="'. get_the_title(). '">';



										}



										



										$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';



									}



									



									$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';



									



									if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {



										$output .= '</a>';



									}



								$output .= '</div>';



								



								// Overlay Icons only



								if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {



									$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';



									$output .= '<div class="portfolio-mask overlay-mask position-'. $overlay_position .'">';



										$output .= '<ul class="overlay-buttons'. $button_class .'">';



										if( isset( $icon_zoom ) && $icon_zoom == 'yes' ) {



											if( isset( $media_icon_output ) && $media_icon_output != '' ) {



												$output .= $media_icon_output;



											} else {



												$output .= '<li><a href="'.esc_url( $portfolio_large[0] ).'" class="pf-icon-zoom" data-rel="prettyPhoto[gallery'. $portfolio_id .']" title="'.get_the_title().'"><i class="simple-icon icon-action-redo"></i></a></li>';



											}



										}



										if( isset( $icon_link ) && $icon_link == 'yes' ) {



											$output .= '<li><a href="'. $custom_link .'" class="pf-icon-link" title="'. get_the_title(). '"><i class="simple-icon icon-link"></i></a></li>';



										}



										$output .= '</ul>';



									$output .= '</div>';



								}



								



								$output .= '<div class="portfolio-inner-wrapper">';



									$output .= '<div class="portfolio-inner-content">';



										if( isset( $custom_text ) && $custom_text != '' ) {



											$output .= '<h5><a href="'. $custom_link .'" title="'.get_the_title().'">'.get_the_title().'</a><p class="portfolio-custom-text">'. $custom_text .'</p></h5>';



										} else {



											$output .= '<h5><a href="'. $custom_link .'" title="'.get_the_title().'">'.get_the_title().'</a></h5>';



										}



										



										// Category



										if( isset( $show_category ) && $show_category == 'yes' ) {



											$portfolio_cat = get_the_terms( get_the_ID(), 'portfolio_categories' );



											if ( ! empty( $portfolio_cat ) ) {



												$output .= '<div class="portfolio-cat"><a title="'. esc_html( $portfolio_cat[0]->name ) .'" href="'. get_term_link( $portfolio_cat[0]->slug, 'portfolio_categories' ) .'">'. esc_html( $portfolio_cat[0]->name ) .'</a></div>';



											}



										}



										



										if( isset( $author_rating ) && $author_rating != '' ) {



											$output .= '<div class="portfolio-rating">';	



												$output .= '<div class="rateit" data-rateit-value="'. $author_rating .'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>';



											$output .= '</div>';



										}



										



										if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {



											if( isset( $excerpt_length ) && $excerpt_length != '' ) {



												$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), $excerpt_length ) . '</p>';



											} else {



												$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), 15 ) . '</p>';



											}



										}



										if( isset( $button_text ) && $button_text != '' ) {



											$output .= '<a href="'. $custom_link .'" class="btn btn-more" title="'.get_the_title().'">'. $button_text .'</a>';



										}



										



									$output .= '</div>';



								$output .= '</div>';



							}



							// PORTFOLIO - DEFAULT



							elseif ( isset( $slider_layout ) && $slider_layout == 'default' ) {



								



								$output .= '<div class="portfolio-image-overlay-wrapper">';



									if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {



										if( isset( $item_link ) && $item_link == 'link_to_img' ) {



											$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="classic-img-link" title="'. get_the_title() .'">';



										} else if( isset( $item_link ) && $item_link == 'single_link' ) {



											$output .= '<a href="'. esc_url( $custom_link ) .'" class="classic-img-link" title="'. get_the_title(). '">';



										}



										



										$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';



									}



									



									$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';



									



									if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {



										$output .= '</a>';



									}



								$output .= '</div>';



								



								if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {



									$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';



								}



								$output .= '<div class="portfolio-mask overlay-mask position-'. $overlay_position .'">';



										



									// Category



									if( isset( $show_category ) && $show_category == 'yes' ) {



										$portfolio_cat = get_the_terms( get_the_ID(), 'portfolio_categories' );



										if ( ! empty( $portfolio_cat ) ) {



											$output .= '<div class="portfolio-cat"><a title="'. esc_html( $portfolio_cat[0]->name ) .'" href="'. get_term_link( $portfolio_cat[0]->slug, 'portfolio_categories' ) .'">'. esc_html( $portfolio_cat[0]->name ) .'</a></div>';



										}



									}



										



									// Title



									if( isset( $show_title ) && $show_title == 'yes' ) {



										$output .= '<div class="portfolio-title">';



											$output .= '<h4><a title="'. get_the_title() .'" href="'. $custom_link .'">'. get_the_title() .'</a></h4>';



											if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {



												if( isset( $excerpt_length ) && $excerpt_length != '' ) {



													$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), $excerpt_length )  . '</p>';



												} else {



													$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), 8 ) . '</p>';



												}



											}



										$output .= '</div>';



									}



																	



									// Icons



									if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {



										$output .= '<ul class="overlay-buttons'. $button_class .'">';



											if( isset( $icon_zoom ) && $icon_zoom == 'yes' ) {



												if( isset( $media_icon_output ) && $media_icon_output != '' ) {



													$output .= $media_icon_output;



												} else {



													$output .= '<li><a href="'.esc_url( $portfolio_large[0] ).'" class="pf-icon-zoom" data-rel="prettyPhoto[gallery'. $portfolio_id .']" title="'.get_the_title().'"><i class="simple-icon icon-action-redo"></i></a></li>';



												}



											}



											if( isset( $icon_link ) && $icon_link == 'yes' ) {



												$output .= '<li><a href="'. $custom_link .'" class="pf-icon-link" title="'. get_the_title(). '"><i class="simple-icon icon-link"></i></a></li>';



											}



										$output .= '</ul>';



									}



									



								$output .= '</div>';



							}



							// PORTFOLIO - STYLE ONE, STYLE TWO (Content with BG Color)



							elseif ( isset( $slider_layout ) && ( $slider_layout == 'style_one' || $slider_layout == 'style_two' ) ) {



								



								$output .= '<div class="portfolio-image-overlay-wrapper">';



									if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {



										if( isset( $item_link ) && $item_link == 'link_to_img' ) {



											$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="classic-img-link" title="'. get_the_title() .'">';



										} else if( isset( $item_link ) && $item_link == 'single_link' ) {



											$output .= '<a href="'. esc_url( $custom_link ) .'" class="classic-img-link" title="'. get_the_title(). '">';



										}



										



										$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';



									}



									



									$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';



									



									if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {



										$output .= '</a>';



									}



								$output .= '</div>';



								



								// Icons



								if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {



									$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';



									



									$output .= '<div class="portfolio-mask overlay-mask position-'. $overlay_position .'">';



									$output .= '<ul class="overlay-buttons'. $button_class .'">';



										if( isset( $icon_zoom ) && $icon_zoom == 'yes' ) {



											if( isset( $media_icon_output ) && $media_icon_output != '' ) {



												$output .= $media_icon_output;



											} else {



												$output .= '<li><a href="'.esc_url( $portfolio_large[0] ).'" class="pf-icon-zoom" data-rel="prettyPhoto[gallery'. $portfolio_id .']" title="'.get_the_title().'"><i class="simple-icon icon-action-redo"></i></a></li>';



											}



										}



										if( isset( $icon_link ) && $icon_link == 'yes' ) {



											$output .= '<li><a href="'. $custom_link .'" class="pf-icon-link" title="'. get_the_title(). '"><i class="simple-icon icon-link"></i></a></li>';



										}



									$output .= '</ul>';



									$output .= '</div>'; // .portfolio-mask



								}



									



								if( isset( $slider_layout ) && $slider_layout == 'style_two' ) {



									$output .= '</div>'; // .portfolio-content 



								}



								



								$output .= '<div class="portfolio-bottom">';



									// Category



									if( isset( $show_category ) && $show_category == 'yes' ) {



										$portfolio_cat = get_the_terms( get_the_ID(), 'portfolio_categories' );



										if ( ! empty( $portfolio_cat ) ) {



											$output .= '<div class="portfolio-cat"><a title="'. esc_html( $portfolio_cat[0]->name ) .'" href="'. get_term_link( $portfolio_cat[0]->slug, 'portfolio_categories' ) .'">'. esc_html( $portfolio_cat[0]->name ) .'</a></div>';



										}



									}



									



									// Title



									if( isset( $show_title ) && $show_title == 'yes' ) {



										$output .= '<div class="portfolio-title">';



											$output .= '<h4><a title="'. get_the_title() .'" href="'. $custom_link .'">'. get_the_title() .'</a></h4>';



										$output .= '</div>';



									}



									



									if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {



										$output .= '<div class="portfolio-excerpts">';



											if( isset( $excerpt_length ) && $excerpt_length != '' ) {



												$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), $excerpt_length )  . '</p>';



											} else {



												$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), 15 ) . '</p>';



											}



										$output .= '</div>';



									}



								$output .= '</div>';



							}



							



						if( isset( $slider_layout ) && $slider_layout != 'style_two' ) {



							$output .= '</div>'; // .portfolio-content 



						}



					$output .= '</div>'; // .post-inside-wrapper



					$output .= '</div>'; // .portfolio-item



					



				endwhile;



				



			$output .= '</div>';



			$output .= '</div>';



		}



		



		$portfolio_id++;



		wp_reset_postdata();



		



		return $output;



	}



}







if ( ! function_exists( 'wedding_vc_portfolio_slider_shortcode_map' ) ) {



	function wedding_vc_portfolio_slider_shortcode_map() {



				



		vc_map( 



			array(



				"name"					=> esc_html__( "Portfolio Slider", "wedding" ),



				"description"			=> esc_html__( "Show your works in Slider.", 'wedding' ),



				"base"					=> "zozo_vc_portfolio_slider",



				"category"				=> esc_html__( "Theme Addons", "wedding" ),



				"icon"					=> "zozo-vc-icon",



				"params"				=> array(



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Slider Layout", "wedding" ),



						"param_name"	=> "slider_layout",



						'admin_label'	=> true,



						"value"			=> array(



							esc_html__( "Default", "wedding" )		=> "default",



							esc_html__( "Classic", "wedding" )		=> "classic",



							esc_html__( "Style One", "wedding" )	=> "style_one",



							esc_html__( "Style Two", "wedding" )	=> "style_two",



						),



					),



					array(



						'type'			=> 'textfield',



						'heading'		=> esc_html__( 'Include Categories', 'wedding' ),



						'param_name'	=> 'include_categories',



						'admin_label'	=> true,



						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to pull posts from or enter "all" to pull recent posts from all categories. Example: category-1, category-2.','wedding'),



					),



					array(



						'type'			=> 'textfield',



						'heading'		=> esc_html__( 'Exclude Categories', 'wedding' ),



						'param_name'	=> 'exclude_categories',



						'admin_label'	=> true,



						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to exclude. Example: category-1, category-2.','wedding'),



					),



					array(



						'type'			=> 'textfield',



						'heading'		=> esc_html__( 'Extra Class', "wedding" ),



						'param_name'	=> 'classes',



						'value' 		=> '',



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Show Excerpt Content", "wedding" ),



						"param_name"	=> "show_excerpt",



						"description" 	=> esc_html__( "Enable/Disable Excerpts", "wedding" ),



						"group"			=> esc_html__( 'Content', 'wedding' ),



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no",



						),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Excerpt Length", "wedding" ),



						"param_name"	=> "excerpt_length",



						"description" 	=> esc_html__( "Enter excerpt length", "wedding" ),



						"group"			=> esc_html__( 'Content', 'wedding' ),



						'dependency'	=> array(



							'element'	=> 'show_excerpt',



							"value" 	=> 'yes',



						),



					),



					// Image



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Image Animation", "wedding" ),



						"param_name"	=> "image_animation",



						"value"			=> array(



							esc_html__( "None", "wedding" )		=> "none",



							esc_html__( "Zoom In", "wedding" )		=> "zoomin",



							esc_html__( "Zoom Out", "wedding" )	=> "zoomout",



							esc_html__( "Rotate", "wedding" )		=> "rotate",



							esc_html__( "Push", "wedding" )		=> "push" ),



						"group"			=> esc_html__( 'Image', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Image Position", "wedding" ),



						"param_name"	=> "image_position",



						"dependency" 	=> array(



							"element" 	=> "image_animation",



							"value" 	=> "push",



						),



						"value"			=> array(



							esc_html__( "Left", "wedding" )	=> "left",



							esc_html__( "Right", "wedding" )	=> "right",



							esc_html__( "Top", "wedding" )		=> "top",



							esc_html__( "Bottom", "wedding" )	=> "bottom" ),



						"group"			=> esc_html__( 'Image', 'wedding' ),



					),



					// Overlay



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Overlay Animation", "wedding" ),



						"param_name"	=> "overlay_animation",



						"value"			=> array(



							esc_html__( "Default", "wedding" )		=> "default",



							esc_html__( "Zoom In", "wedding" )		=> "zoomin",



							esc_html__( "Zoom Out", "wedding" )	=> "zoomout"),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					array(



						"type"			=> 'colorpicker',



						"heading"		=> esc_html__( "Overlay Color", "wedding" ),



						"param_name"	=> "overlay_color",



						"group"			=> esc_html__( "Overlay", "wedding" ),



					),	



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Overlay Fit", "wedding" ),



						"param_name"	=> "overlay_fit",



						"value"			=> array(



							esc_html__( "Full", "wedding" )			=> "full",



							esc_html__( "Content Only", "wedding" )	=> "content" ),



						'dependency'	=> array(



							'element'	=> 'slider_layout',



							'value'		=> array( 'default', 'classic' ),



						),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Overlay Position", "wedding" ),



						"param_name"	=> "overlay_position_full",



						"value"			=> array(



							esc_html__( "Default", "wedding" )		=> "center",



							esc_html__( "Top", "wedding" )			=> "top",



							esc_html__( "Bottom", "wedding" )		=> "bottom",



							esc_html__( "Right", "wedding" )			=> "right",



							esc_html__( "Left", "wedding" )			=> "left",



							esc_html__( "Top Right", "wedding" )		=> "top-right",



							esc_html__( "Top Left", "wedding" )		=> "top-left",



							esc_html__( "Bottom Right", "wedding" )	=> "bottom-right",



							esc_html__( "Bottom Left", "wedding" )	=> "bottom-left",



						),



						"description" 	=> esc_html__( "Choose Overlay Content Positions", "wedding" ),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



						'dependency'	=> array(



							'element'	=> 'overlay_fit',



							"value" 	=> 'full',



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Overlay Position", "wedding" ),



						"param_name"	=> "overlay_position_content",



						"value"			=> array(



							esc_html__( "Default", "wedding" )		=> "center",



							esc_html__( "Top", "wedding" )			=> "top",



							esc_html__( "Bottom", "wedding" )		=> "bottom",



							esc_html__( "Right", "wedding" )			=> "right",



							esc_html__( "Left", "wedding" )			=> "left",



						),



						"description" 	=> esc_html__( "Choose Overlay Content Positions", "wedding" ),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



						'dependency'	=> array(



							'element'	=> 'overlay_fit',



							"value" 	=> 'content',



						),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Show Title", "wedding" ),



						"param_name"	=> "show_title",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no" ),



						"group"			=> esc_html__( 'Content', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Show Category", "wedding" ),



						"param_name"	=> "show_category",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no" ),



						"group"			=> esc_html__( 'Content', 'wedding' ),



					),



					// Overlay Icons



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Overlay Icons", "wedding" ),



						"param_name"	=> "overlay_icons",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no" ),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Item Link", "wedding" ),



						"param_name"	=> "item_link",



						"value"			=> array(



							esc_html__( "Link to Large Image", "wedding" )	=> "link_to_img",



							esc_html__( "Single/Custom Link", "wedding" )	=> "single_link" ),



						'dependency'	=> array(



							'element'	=> 'overlay_icons',



							"value" 	=> 'no',



						),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Zoom Icon", "wedding" ),



						"param_name"	=> "icon_zoom",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no" ),



						'dependency'	=> array(



							'element'	=> 'overlay_icons',



							"value" 	=> 'yes',



						),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Link Icon", "wedding" ),



						"param_name"	=> "icon_link",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "yes",



							esc_html__( "No", "wedding" )	=> "no" ),



						'dependency'	=> array(



							'element'	=> 'overlay_icons',



							"value" 	=> 'yes',



						),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Icons Animation", "wedding" ),



						"param_name"	=> "button_icon_animations",



						"value"			=> array(



							esc_html__( "None", "wedding" )			=> "none",



							esc_html__( "Fade Up", "wedding" )		=> "fade-up",



							esc_html__( "Fade Down", "wedding" )		=> "fade-down",



							esc_html__( "Fade Right", "wedding" )	=> "fade-right",



							esc_html__( "Fade Left", "wedding" )		=> "fade-left",



							esc_html__( "Zoom In", "wedding" )		=> "zoom-in",



							esc_html__( "Flip X", "wedding" )		=> "flip-x",



							esc_html__( "Flip Y", "wedding" )		=> "flip-y",



						),



						"description" 	=> esc_html__( "Enable/Disable for Overlay Icon Animations", "wedding" ),



						'dependency'	=> array(



							'element'	=> 'overlay_icons',



							"value" 	=> 'yes',



						),



						"group"			=> esc_html__( 'Overlay', 'wedding' ),



					),



					// Slider



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items to Display", "wedding" ),



						"param_name"	=> "items",



						'admin_label'	=> true,



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items to Scrollby", "wedding" ),



						"param_name"	=> "items_scroll",



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						'type'			=> 'dropdown',



						'heading'		=> esc_html__( "Auto Play", 'wedding' ),



						'param_name'	=> "auto_play",



						'admin_label'	=> true,				



						'value'			=> array(



							esc_html__( 'True', 'wedding' )	=> 'true',



							esc_html__( 'False', 'wedding' )	=> 'false',



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



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Margin ( Items Spacing )", "wedding" ),



						"param_name"	=> "margin",



						'admin_label'	=> true,



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items To Display in Tablet", "wedding" ),



						"param_name"	=> "items_tablet",



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items To Display In Mobile Landscape", "wedding" ),



						"param_name"	=> "items_mobile_landscape",



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> "textfield",



						"heading"		=> esc_html__( "Items To Display In Mobile Portrait", "wedding" ),



						"param_name"	=> "items_mobile_portrait",



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Navigation", "wedding" ),



						"param_name"	=> "navigation",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "true",



							esc_html__( "No", "wedding" )	=> "false" ),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



					array(



						"type"			=> 'dropdown',



						"heading"		=> esc_html__( "Pagination", "wedding" ),



						"param_name"	=> "pagination",



						"value"			=> array(



							esc_html__( "Yes", "wedding" )	=> "true",



							esc_html__( "No", "wedding" )	=> "false" ),



						"group"			=> esc_html__( "Slider", "wedding" ),



					),



				)



			) 



		);



	}



}



add_action( 'vc_before_init', 'wedding_vc_portfolio_slider_shortcode_map' );