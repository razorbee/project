<?php 

/**

 * Portfolio Grid shortcode

 */

if ( ! function_exists( 'wedding_vc_portfolio_grid_shortcode' ) ) {

	function wedding_vc_portfolio_grid_shortcode( $atts, $content = NULL ) {

	

		$atts = vc_map_get_attributes( 'zozo_vc_portfolio_grid', $atts );

		extract( $atts );

		$output = '';

		static $portfolio_id = 1;

		global $post;

		

		// Include categories

		$include_categories = ( '' != $include_categories ) ? $include_categories : '';

		$include_categories = ( 'all' == $include_categories ) ? '' : $include_categories;

		$include_filter_cats = '';

		if( $include_categories ) {

			$include_categories = explode( ',', $include_categories );

			$include_filter_cats = array();

			foreach( $include_categories as $key ) {

				$key = get_term_by( 'slug', $key, 'portfolio_categories' );

				$include_filter_cats[] = $key->term_id;

			}

		}

		

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

		

		// Exclude categories

		$exclude_filter_cats = '';

		if( $exclude_categories ) {

			$exclude_categories = explode( ',', $exclude_categories );

			if ( ! empty( $exclude_categories ) && is_array( $exclude_categories ) ) {

				$exclude_filter_cats = array();

				foreach ( $exclude_categories as $key ) {

					$key = get_term_by( 'slug', $key, 'portfolio_categories' );

					$exclude_filter_cats[] = $key->term_id;

				}

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

		global $wp_query;

		$paged = (get_query_var('paged')) ? get_query_var('paged') : (isset($wp_query->query['paged']) ? $wp_query->query['paged'] : 1);

		

		$query_args = array(

						'post_type' 		=> 'zozo_portfolio',

						'posts_per_page'	=> $posts,

						'paged' 			=> $paged,

						'orderby' 		 	=> 'date',

						'order' 		 	=> 'DESC',

					  );

					  		

		$query_args['tax_query'] 	= array(

										'relation'	=> 'AND',

										$include_categories,

										$exclude_categories );

										

		if( isset( $style ) && $style == 'classic' ) {

			switch( $orderby ) {

				case 'rating':

					$query_args['meta_key'] = 'zozo_author_rating';

					$query_args['orderby']  = 'meta_value_num';

				break;

		

				case 'title':

					$query_args['orderby'] = 'title';

				break;

		

				case 'id':

					$query_args['orderby'] = 'ID';

				break;

		

				case 'random':

					$query_args['orderby'] = 'rand';

				break;

		

				default:

					$query_args['orderby'] = 'post_date';

				break;

			}

		}

		

		$portfolio_query = new WP_Query( $query_args );

		

		// Classes

		$main_classes = '';

		

		if( isset( $classes ) && $classes != '' ) {

			$main_classes .= ' ' . $classes;

		}

		

		$animation_classes = '';

		

		// Overlay Classes

		$overlay_set = $overlay_style = '';

		$overlay_position = '';

		

		if( isset( $style ) && $style != 'list_style' ) {

			if( isset( $overlay_fit ) && $overlay_fit == 'full' ) {

				$overlay_position = $overlay_position_full;

			} else {

				$overlay_position = $overlay_position_content;

			}

			

			$animation_classes .= ' overlay-'. esc_attr( $overlay_fit ) .' overlay-'. esc_attr( $overlay_position );

			

			$overlay_animation = 'portfolio-overlay '. esc_attr( $overlay_animation );

			$overlay_style = $overlay_color != '' ? ' style="background-color:'. $overlay_color .';"' : '';

		}

		

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

		

		// Icon Top Space if Title Exists

		$icon_space = ( $show_title == 'yes' || $show_category == 'yes' ) ? ' item-has-content' : '';

		if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {

			$button_class = '';

			if( isset( $button_icon_animations ) && $button_icon_animations != 'none' ){

				$button_class = ' ' . esc_attr( $button_icon_animations );

			}

		}

	

		if( $portfolio_query->have_posts() ) {

			

			$output = '<div id="zozo-portfolio-wrapper-'. $portfolio_id .'" class="zozo-portfolio-grid-wrapper zozo-isotope-grid-system'. $main_classes .' '. $style .''. $icon_space .'">';

			

			// Display filter links

			if( isset( $filters ) && $filters == 'yes' ) {

			

				$terms = get_terms( 'portfolio_categories', array(

					'include'	=> $include_filter_cats,

					'exclude'	=> $exclude_filter_cats,

					'orderby' 	=> 'include'

				) );

				

				if ( $terms && count( $terms ) > '1') {

					$filter_class = '';

					if( isset( $filter_align ) && $filter_align != '' ) {

						$filter_class = ' text-'. $filter_align .'';

					}

					

					$arrow = $filter_type == 'arrow-style' ? $arrow_position : '';

					

					$output .= '<div class="zozo-isotope-filters clearfix">';

					$output .= '<ul class="zozo-smartmenu portfolio-tabs '.$filter_type.'-filter '. $arrow .''.$filter_class.'">'. "\n";

						

						$output .= '<li class="smartmenu-filter">';

						$output .= '<ul class="smart-sub-menu portfolio-sub-filter">'. "\n";

						

						// First Filter Check

						if( isset( $first_filter ) && $first_filter == "all" ) {

							$output .= '<li class="first-element"><a class="active" data-filter="*" href="#"><span>' . esc_html__('Show All', 'wedding').'</span><span class="sub-arrow"></span></a></li>'. "\n";

						}

						

						$term_count = 0;

						foreach($terms as $term ) {

						

							$term_count++;

							$tag_class = $li_class = '';

							$arrow_html = '';

							

							if( isset( $first_filter ) && $first_filter != 'all' ) {

								if( $first_filter == $term->term_id ) {

									$tag_class = ' class="active"';

								}

								

								if( isset( $term_count ) && $term_count == 1 ) {

									$li_class = ' class="first-element"';

									$arrow_html = '<span class="sub-arrow"></span>';

								}

							}

							$output .= '<li'. $li_class .'><a'.$tag_class.' data-filter="grid-cat-'.$term->term_id.'" href="#"><span>' .$term->name. '</span>'. $arrow_html .'</a></li>'. "\n";

						}

						

						$output .= '</ul></li>'. "\n";

						

					$output .= '</ul>'. "\n";

					$output .= '</div>';

				}

			}

			

			$isotope_wrapper_class = '';

			if( isset( $gutter ) && $gutter == '' ) {

				$gutter = 0;

			}

			

			if( isset( $gutter ) && $gutter == 0 ) {

				$isotope_wrapper_class = ' no-gutter';

			}

			

			$pagination_class = '';

			if( isset( $pagination ) && $pagination == 'yes' ) {

				$pagination_class = ' zozo-isotope-pagination';

			}

			

			$output .= '<div class="zozo-isotope-wrapper'. $isotope_wrapper_class .'">';

			

			if( isset( $style ) && $style == 'masonry' ) {

				$column_width = 12 / $columns;

				$output .= '<div id="zozo_portfolio_'.$portfolio_id.'" class="zozo-portfolio zozo-isotope-layout masonry-style portfolio-cols-'.$columns.''. $pagination_class .'" data-columns="'.$columns.'" data-gutter="'.$gutter.'" data-layout="masonry">'. "\n";

			}

			elseif( isset( $style ) && $style == 'list_style' ) {

				//$column_width = 12 / $list_columns;

				$column_width = 12;

				$output .= '<div id="zozo_portfolio_'.$portfolio_id.'" class="zozo-portfolio zozo-isotope-layout list-style portfolio-cols-'.$list_columns.''. $pagination_class .'" data-columns="'.$list_columns.'" data-gutter="'.$gutter.'" data-type="masonry" data-layout="fitRows">'. "\n";

			}

			else {

				$column_width = 12 / $columns;

				$output .= '<div id="zozo_portfolio_'.$portfolio_id.'" class="zozo-portfolio zozo-isotope-layout '.$style.'-grid-style portfolio-cols-'.$columns.''. $pagination_class .'" data-columns="'.$columns.'" data-gutter="'.$gutter.'" data-type="masonry" data-layout="fitRows">';

			}

			while($portfolio_query->have_posts()) : $portfolio_query->the_post();

				

				if( isset( $style ) && $style == 'masonry' ) {

					$image_size = 'full';

				} else if( isset( $style ) && $style == 'list_style' ) {

					$image_size = 'wedding-wide-thumb';

				} else {

					if( isset( $columns ) && $columns == '2' ) {

						$image_size = 'wedding-custom-large';

					} else {

						$image_size = 'wedding-custom-mid';

					}

				}

				

				$portfolio_img = '';

				$portfolio_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $image_size);

				

				if( isset( $style ) && $style == 'masonry' ) {

					$thumb_image   = get_post_thumbnail_id( $post->ID );

					$image_id      = $thumb_image;

					$thumb_img_url = wp_get_attachment_url( $thumb_image, 'full' );

					

					$thumb_width = 530;

					$thumb_height = null;

					

					$portfolio_img = wedding_aq_resize( $thumb_img_url, $thumb_width, $thumb_height, false, false );

					

					if( $thumb_img_url == '' && ! has_post_thumbnail( $post->ID ) ) {

						$portfolio_img[0] = 'https://placehold.it/530x400?text=No+Image';

						$portfolio_img[1] = 530;

						$portfolio_img[2] = 400;

					}

				}

				

				$item_classes = '';

				$item_tags = get_the_terms($post->ID, 'portfolio_categories');

				if( $item_tags ) {

					foreach( $item_tags as $item_tag ) {

						$item_classes .= 'grid-cat-' . esc_attr( $item_tag->term_id ) . ' ';

					}

				}

				

				$portfolio_large = $custom_url = ''; 

				$portfolio_large = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

				

				$author_rating 	= get_post_meta( $post->ID, 'zozo_author_rating', true );

				$custom_text 	= get_post_meta( $post->ID, 'zozo_portfolio_custom_text', true ); 

				$custom_url 	= get_post_meta( $post->ID, 'zozo_portfolio_custom_link', true );

				$custom_link 	= $custom_url == '' ? get_permalink() : esc_url( $custom_url );

								

				$media_output = '';

				if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

					if( isset( $item_link ) && $item_link == 'link_to_img' ) {

						$media_output = wedding_portfolio_media_output( $post->ID, $style, $columns, $portfolio_id, 'link_to_img', $overlay_animation, $overlay_style );

					} else {

						$media_output = wedding_portfolio_media_output( $post->ID, $style, $columns, $portfolio_id, '' );

					}

				} else {

					$media_output = wedding_portfolio_media_output( $post->ID, $style, $columns, $portfolio_id, '' );

				}

				

				$media_icon_output = '';

				$media_icon_output = wedding_portfolio_media_icon_output( $post->ID, $portfolio_id );

				

				$post_item_class = '';

				if( isset( $media_output ) && $media_output != '' ) {

					$post_item_class = ' portfolio-item-gallery-format';

				}

				

				$output .= '<div id="portfolio-'.get_the_ID().'" class="portfolio-item'. $post_item_class .' isotope-post post-iso-w' . $column_width .' post-iso-h' . $column_width .' '.$item_classes.' zozo-img-wrapper style-'.$style.'">';

				

				$output .= '<div class="post-inside-wrapper margin-top-'. $gutter .' animate_when_almost_visible bottom-t-top" data-delay="200">';

					$output .= '<div class="portfolio-content '.$animation_classes.'">';

				

					// PORTFOLIO - CLASSIC

					if( isset( $style ) && $style == 'classic' ) {

						

						$output .= '<div class="portfolio-image-overlay-wrapper">';

						if( isset( $media_output ) && $media_output != '' ) {

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								if( isset( $item_link ) && $item_link == 'single_link' ) {

									$output .= '<a href="'. esc_url( $custom_link ) .'" class="img-overlay-link" title="'. get_the_title(). '">';

										$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

									$output .= '</a>';

									$output .= $media_output;

								} else {

									//$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

									$output .= $media_output;

								}

							} else {

								$output .= $media_output;

							}

						} else {

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								if( isset( $item_link ) && $item_link == 'link_to_img' ) {

									$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="img-overlay-link" title="'. get_the_title() .'">';

								} else if( isset( $item_link ) && $item_link == 'single_link' ) {

									$output .= '<a href="'. esc_url( $custom_link ) .'" class="img-overlay-link" title="'. get_the_title(). '">';

								}

								

								$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

							}

							

							$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';

							

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								$output .= '</a>';

							}

						}

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

						$output .= '</div>';

												

						$output .= '<div class="portfolio-inner-wrapper">';

							$output .= '<div class="portfolio-inner-content">';

								// Category

								if( isset( $show_category ) && $show_category == 'yes' ) {

									$portfolio_cat = get_the_terms( get_the_ID(), 'portfolio_categories' );

									if ( ! empty( $portfolio_cat ) ) {

										$output .= '<div class="portfolio-cat"><a title="'. esc_html( $portfolio_cat[0]->name ) .'" href="'. get_term_link( $portfolio_cat[0]->slug, 'portfolio_categories' ) .'">'. esc_html( $portfolio_cat[0]->name ) .'</a></div>';

									}

								}

								

								if( isset( $custom_text ) && $custom_text != '' ) {

									$output .= '<h5><a href="'. $custom_link .'" title="'.get_the_title().'">'.get_the_title().'</a><p class="portfolio-custom-text">'. $custom_text .'</p></h5>';

								} else {

									$output .= '<h5><a href="'. $custom_link .'" title="'.get_the_title().'">'.get_the_title().'</a></h5>';

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

					// PORTFOLIO - MASONRY

					elseif ( isset( $style ) && ( $style == 'masonry' || $style == 'default' ) ) {

						

						$output .= '<div class="portfolio-image-overlay-wrapper">';

						if( isset( $media_output ) && $media_output != '' ) {

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								if( isset( $item_link ) && $item_link == 'single_link' ) {

									$output .= '<a href="'. esc_url( $custom_link ) .'" class="img-overlay-link" title="'. get_the_title(). '">';

										$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

									$output .= '</a>';

									$output .= $media_output;

								} else {

									//$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

									$output .= $media_output;

								}

							} else {

								$output .= $media_output;

							}

						} else {

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								if( isset( $item_link ) && $item_link == 'link_to_img' ) {

									$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="classic-img-link" title="'. get_the_title() .'">';

								} else if( isset( $item_link ) && $item_link == 'single_link' ) {

									$output .= '<a href="'. esc_url( $custom_link ) .'" class="img-overlay-link" title="'. get_the_title(). '">';

								}

								

								$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

							}

							

							$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';

							

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								$output .= '</a>';

							}

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

									/*if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {

										if( isset( $excerpt_length ) && $excerpt_length != '' ) {

											$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), $excerpt_length )  . '</p>';

										} else {

											$output .= '<p>' . wedding_shortcode_stripped_excerpt( get_the_excerpt(), 8 ) . '</p>';

										}

									}*/

								$output .= '</div>';

							}

							

							//Newly Added

							if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {

								$output .= '<div class="portfolio-excerpts"><p>';

								

									ob_start();

									the_excerpt();

									$expt = ob_get_clean();

									

									if( isset( $excerpt_length ) && $excerpt_length != '' ) {

										$output .= wedding_shortcode_stripped_excerpt( $expt, $excerpt_length );

									} else {

										$output .= wedding_shortcode_stripped_excerpt( $expt, 30 );

									}

								$output .= '</p></div>';

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

					elseif ( isset( $style ) && $style != 'list_style' ) {

						

						$output .= '<div class="portfolio-image-overlay-wrapper">';

						if( isset( $media_output ) && $media_output != '' ) {

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								if( isset( $item_link ) && $item_link == 'single_link' ) {

									$output .= '<a href="'. esc_url( $custom_link ) .'" class="img-overlay-link" title="'. get_the_title(). '">';

										$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

									$output .= '</a>';

									$output .= $media_output;

								} else {

									//$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

									$output .= $media_output;

								}

							} else {

								$output .= $media_output;

							}

						} else {

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								if( isset( $item_link ) && $item_link == 'link_to_img' ) {

									$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="img-overlay-link" title="'. get_the_title() .'">';

								} else if( isset( $item_link ) && $item_link == 'single_link' ) {

									$output .= '<a href="'. esc_url( $custom_link ) .'" class="img-overlay-link" title="'. get_the_title(). '">';

								}

								

								$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

							}

							

							$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';

							

							if( isset( $overlay_icons ) && $overlay_icons == 'no' ) {

								$output .= '</a>';

							}

						}

						$output .= '</div>';

						

						// Icons

						if( isset( $overlay_icons ) && $overlay_icons == 'yes' ) {

							$output .= '<div class="'. $overlay_animation .'"'. $overlay_style .'></div>';

							

							$output .= '<div class="portfolio-mask overlay-mask position-'. $overlay_position .'">';

							

							//Newly Added

							if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {

								$output .= '<div class="portfolio-excerpts"><p>';

									if( isset( $excerpt_length ) && $excerpt_length != '' ) {

										$output .= wedding_shortcode_stripped_excerpt( get_the_excerpt(), $excerpt_length );

									} else {

										$output .= wedding_shortcode_stripped_excerpt( get_the_excerpt(), 30 );

									}

								$output .= '</p></div>';

							}

														

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

							

						if( isset( $style ) && $style == 'style_two' ) {

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

					// PORTFOLIO - LIST STYLE

					elseif ( isset( $style ) && $style == 'list_style' ) {

						$output .= '<div class="portfolio-list-wrapper">';

						

							$output .= '<div class="portfolio-list-left">';

								$output .= '<a href="'. esc_url( $portfolio_large[0] ) .'" data-rel="prettyPhoto[gallery'. $portfolio_id .']" class="img-overlay-link" title="'. get_the_title() .'">';

								$output .= '<div class="portfolio-img'. $thumbnail_animation .'"><img class="img-responsive" src="'. esc_url($portfolio_img[0]) .'" width="'. esc_attr($portfolio_img[1]) .'" height="'. esc_attr($portfolio_img[2]) .'" alt="'. get_the_title() .'" /></div>';

								$output .= '</a>';

							$output .= '</div>';

							

							$output .= '<div class="portfolio-list-right">';

								

								// Title

								if( isset( $show_title ) && $show_title == 'yes' ) {

									$output .= '<div class="portfolio-title">';

										$output .= '<h4><a title="'. get_the_title() .'" href="'. $custom_link .'">'. get_the_title() .'</a></h4>';

									$output .= '</div>';

								}

								

								// Category

								if( isset( $show_category ) && $show_category == 'yes' ) {

									$portfolio_cat = get_the_terms( get_the_ID(), 'portfolio_categories' );

									if ( ! empty( $portfolio_cat ) ) {

										$output .= '<div class="portfolio-cat"><a title="'. esc_html( $portfolio_cat[0]->name ) .'" href="'. get_term_link( $portfolio_cat[0]->slug, 'portfolio_categories' ) .'">'. esc_html( $portfolio_cat[0]->name ) .'</a></div>';

									}

								}

								

								if( isset( $show_excerpt ) && $show_excerpt == 'yes' ) {

									$output .= '<div class="portfolio-excerpts"><p>';

										if( isset( $excerpt_length ) && $excerpt_length != '' ) {

											$output .= wedding_shortcode_stripped_excerpt( get_the_excerpt(), $excerpt_length );

										} else {

											$output .= wedding_shortcode_stripped_excerpt( get_the_excerpt(), 30 );

										}

									$output .= '</p></div>';

								}

								

								if( isset( $button_text ) && $button_text != '' ) {

									$output .= '<a href="'. get_permalink() .'" class="btn btn-more" title="'.get_the_title().'">'. $button_text .'</a>';

								}

							$output .= '</div>';

							

							

						$output .= '</div>';

					}

					

					if( isset( $style ) && $style != 'style_two' ) {

						$output .= '</div>'; // .portfolio-content 

					}

				$output .= '</div>';

			$output .= '</div>'; //portfolio-item 

			endwhile;

				

			$output .= '</div>';

				

			$output .= '</div>';

			

			if( isset( $pagination ) && $pagination == 'yes' ) {

				$output .= '<div class="zozo-pagination-wrapper">';

				$output .= wedding_pagination( $portfolio_query->max_num_pages, '', $paged );

				$output .= '</div>';

			}

			$output .= '</div>';

		}		

		

		$portfolio_id++;

		wp_reset_postdata();

		

		return $output;

	}

}

if ( ! function_exists( 'wedding_vc_portfolio_grid_shortcode_map' ) ) {

	function wedding_vc_portfolio_grid_shortcode_map() {

		

		vc_map( 

			array(

				"name"					=> esc_html__( "Portfolio Grid", "wedding" ),

				"description"			=> esc_html__( "Show your works with different style.", 'wedding' ),

				"base"					=> "zozo_vc_portfolio_grid",

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

						"type"			=> "textfield",

						"heading"		=> esc_html__( "Posts per Page", "wedding" ),

						"admin_label" 	=> true,

						"param_name"	=> "posts",						

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Show Pagination ?", "wedding" ),

						"param_name"	=> "pagination",	

						"value"			=> array(

							esc_html__( "Yes", "wedding" )		=> "yes",

							esc_html__( "No", "wedding" )		=> "no" ),

					),

					array(

						'type'			=> 'textfield',

						'heading'		=> esc_html__( 'Include Categories', 'wedding' ),

						'param_name'	=> 'include_categories',

						'admin_label'	=> true,

						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to pull posts from or enter "all" to pull recent posts from all categories. Example: category-1, category-2.', 'wedding'),

					),

					array(

						'type'			=> 'textfield',

						'heading'		=> esc_html__( 'Exclude Categories', 'wedding' ),

						'param_name'	=> 'exclude_categories',

						'admin_label'	=> true,

						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to exclude. Example: category-1, category-2.', 'wedding'),

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Portfolio Filters", "wedding" ),

						"param_name"	=> "filters",

						"admin_label" 	=> true,

						"value"			=> array(

							esc_html__( "Yes", "wedding" )		=> "yes",

							esc_html__( "No", "wedding" )		=> "no" ),

						"group"			=> esc_html__( 'Filters', 'wedding' ),

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Portfolio Filters Type", "wedding" ),

						"param_name"	=> "filter_type",

						"dependency" 	=> array(

							"element" 	=> "filters",

							"value" 	=> "yes",

						),

						"value"			=> array(

							esc_html__( "Default", "wedding" )		=> "default",

							esc_html__( "Arrow Style", "wedding" )	=> "arrow-style",

							esc_html__( "Transparent", "wedding" )	=> "transparent" ),

						"group"			=> esc_html__( 'Filters', 'wedding' ),

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Arrow Position", "wedding" ),

						"param_name"	=> "arrow_position",

						"dependency" 	=> array(

							"element" 	=> "filter_type",

							"value" 	=> "arrow-style",

						),

						"value"			=> array(

							esc_html__( "Center", "wedding" )	=> "arrow-center",

							esc_html__( "Left", "wedding" )		=> "arrow-left",

							esc_html__( "Right", "wedding" )		=> "arrow-right" ),

						"group"			=> esc_html__( 'Filters', 'wedding' ),

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

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Filters Alignment", "wedding" ),

						"param_name"	=> "filter_align",

						"value"			=> array(

							esc_html__( "Center", "wedding" )	=> "center",

							esc_html__( "Left", "wedding" )		=> "left",

							esc_html__( "Right", "wedding" )		=> "right",

						),

						"group"			=> esc_html__( 'Filters', 'wedding' ),

					),

					array(

						"type"			=> 'textfield',

						"heading"		=> esc_html__( "Portfolio First Filter", "wedding" ),

						"param_name"	=> "first_filter",

						"description" 	=> esc_html__( 'Enter the slug of category (only one) to show elements from that category on page load. Enter "all" to show from all categories.', 'wedding' ),

						"group"			=> esc_html__( 'Filters', 'wedding' ),

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Portfolio Type", "wedding" ),

						"param_name"	=> "style",

						"admin_label" 	=> true,

						"value"			=> array(

							esc_html__( "Default", "wedding" )		=> "default",

							esc_html__( "Classic", "wedding" )		=> "classic",

							esc_html__( "Masonry", "wedding" )		=> "masonry",

							esc_html__( "Style One", "wedding" )		=> "style_one",

							esc_html__( "Style Two", "wedding" )		=> "style_two",

							esc_html__( "List Style", "wedding" )	=> "list_style",

						),

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Portfolio Columns", "wedding" ),

						"param_name"	=> "columns",

						"admin_label" 	=> true,

						"value"			=> array(

							esc_html__( "Two Columns", "wedding" )		=> "2",

							esc_html__( "Three Columns", "wedding" )		=> "3",

							esc_html__( "Four Columns", "wedding" )		=> "4" ),

						'dependency'	=> array(

							'element'	=> 'style',

							'value'		=> array( 'default', 'classic', 'masonry', 'style_one', 'style_two' ),

						),

						"description" 	=> esc_html__( "Select Columns type for Portfolio", "wedding" ),

					),	

					/*array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Portfolio List Columns", "wedding" ),

						"param_name"	=> "list_columns",

						"value"			=> array(

							esc_html__( "One Columns", "wedding" )		=> "1",

							esc_html__( "Two Columns", "wedding" )		=> "2",

							esc_html__( "Three Columns", "wedding" )		=> "3",

							esc_html__( "Four Columns", "wedding" )		=> "4" ),

						'dependency'	=> array(

							'element'	=> 'style',

							"value" 	=> 'list_style',

						),

						"description" 	=> esc_html__( "Select Columns type for List Style Portfolio", "wedding" ),

					),*/		

					array(

						"type"			=> "textfield",

						"heading"		=> esc_html__( "Items Spacing", "wedding" ),

						"param_name"	=> "gutter",

						"description" 	=> esc_html__( "Enter gap size between portfolio items. Only enter number Ex: 10", "wedding" ),

					),

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Show Excerpt Content", "wedding" ),

						"param_name"	=> "show_excerpt",

						"description" 	=> esc_html__( "Enable/Disable Excerpts", "wedding" ),

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

						'dependency'	=> array(

							'element'	=> 'show_excerpt',

							"value" 	=> 'yes',

						),

					),

					

					// Overlay

					array(

						"type"			=> 'dropdown',

						"heading"		=> esc_html__( "Overlay Animation", "wedding" ),

						"param_name"	=> "overlay_animation",

						"value"			=> array(

							esc_html__( "Default", "wedding" )	=> "default",

							esc_html__( "Zoom In", "wedding" )	=> "zoomin",

							esc_html__( "Zoom Out", "wedding" )	=> "zoomout"),

						'dependency'	=> array(

							'element'	=> 'style',

							'value'		=> array( 'default', 'classic', 'masonry', 'style_one', 'style_two' ),

						),

						"group"			=> esc_html__( 'Overlay', 'wedding' ),

					),

					array(

						"type"			=> 'colorpicker',

						"heading"		=> esc_html__( "Overlay Color", "wedding" ),

						"param_name"	=> "overlay_color",

						'dependency'	=> array(

							'element'	=> 'style',

							'value'		=> array( 'default', 'classic', 'masonry', 'style_one', 'style_two' ),

						),

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

							'element'	=> 'style',

							'value'		=> array( 'default', 'masonry' ),

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

						"heading"		=> esc_html__( "Order By", "wedding" ),

						"param_name"	=> "orderby",

						"value"			=> array(

							esc_html__( "Title", "wedding" )		=> "title",

							esc_html__( "ID", "wedding" )		=> "id",

							esc_html__( "Random", "wedding" )	=> "random",

							esc_html__( "Post Date", "wedding" )	=> "post_date",

							esc_html__( "Rating", "wedding" )	=> "rating",

						),

						'dependency'	=> array(

							'element'	=> 'style',

							"value" 	=> array( "classic" ),

						),

					),							

					array(

						"type"			=> "textfield",

						"heading"		=> esc_html__( "Button Text", "wedding" ),

						"param_name"	=> "button_text",

						"description" 	=> esc_html__( "Enter button text.", "wedding" ),

						'dependency'	=> array(

							'element'	=> 'style',

							"value" 	=> array( "classic", "list_style" ),

						),

					),

					// Title

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

						'dependency'	=> array(

							'element'	=> 'style',

							'value'		=> array( 'default', 'classic', 'masonry', 'style_one', 'style_two' ),

						),

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

				)

			) 

		);

	}

}

add_action( 'vc_before_init', 'wedding_vc_portfolio_grid_shortcode_map' );