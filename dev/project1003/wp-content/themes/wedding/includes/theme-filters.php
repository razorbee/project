<?php

/**

* Filters and Actions

*/



// Theme Setup

add_action( 'after_setup_theme', 'wedding_themes_setup' );

add_action( 'after_switch_theme', 'wedding_update_image_sizes' );

add_filter( 'wp_nav_menu_args', 'wedding_main_menu_args' );

// Add layout extra classes to body_class output

add_filter( 'body_class', 'wedding_layout_body_class', 10 );

// Add custom meta tags to the <head>

add_action( 'wp_head', 'wedding_meta_tags', 5 );

// Custom Css from Theme Option

//add_action( 'wp_head', 'wedding_enqueue_custom_styling' );

// Load Theme Stylesheet and Jquery only on Frontend

if ( ! is_admin() ) {

	add_action( 'wp_enqueue_scripts', 'wedding_load_theme_scripts' );

}

add_filter( 'style_loader_src', 'wedding_remove_scripts_version', 9999 );

add_filter( 'script_loader_src', 'wedding_remove_scripts_version', 9999 );

// Admin Custom Css

add_action( 'admin_head', 'wedding_custom_admin_css' );



// Custom Excerpt Length and Custom More Excerpt

add_filter( 'excerpt_length', 'wedding_custom_excerpt_length', 999 );

add_filter( 'excerpt_more', 'wedding_custom_excerpt_more' );

// Activate Maintenance or Coming Soon Mode

add_action( 'template_redirect', 'wedding_activate_maintenance_mode' );



/* ======================================

 * Theme Setup

 * ====================================== */

 

/* Set the content width based on the theme's design and stylesheet. */

if ( ! isset( $content_width ) )

	$content_width = 640; /* pixels */



/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which runs

 * before the init hook. The init hook is too late for some features, such as indicating

 * support post thumbnails.

 */



if ( ! function_exists( 'wedding_themes_setup' ) ) {

	function wedding_themes_setup () {

		

		// load textdomain

		load_theme_textdomain('wedding', FALSE, WEDDING_THEME_DIR . '/languages/');

		

		// This theme styles the visual editor to resemble the theme style.

		add_editor_style( 'css/wedding-editor-style.css' );

		

		// Enable support for Post Thumbnails

		add_theme_support( 'post-thumbnails' );

		

		add_image_size('wedding-blog-large', 1170, 500, true);

		add_image_size('wedding-blog-medium', 570, 370, true);

		add_image_size('wedding-blog-thumb', 85, 85, true);

		add_image_size('wedding-theme-mid', 500, 320, true);

		add_image_size('wedding-team', 500, 500, true);

		add_image_size('wedding-team-single', 400, 400, true);

		add_image_size('wedding-testimonial-slider', 300, 300, true);

		add_image_size('wedding-vertical-thumb', 450, 728, true); //wedding-portfolio-list

		add_image_size('wedding-wide-thumb', 1920, 180, true); //wedding-portfolio-list

		add_image_size('wedding-custom-large', 1000, 695, true); //wedding-custom-large

		add_image_size('wedding-custom-single', 1300, 500, true); //wedding-custom-single

		add_image_size('wedding-custom-mid', 560, 385, true); //wedding-custom-mid

		

		// Title Tag Support

		add_theme_support( 'title-tag' );

		add_theme_support( 'custom-header' );

		add_theme_support( 'custom-background' );

	

		// Add default posts and comments RSS feed links to head

		add_theme_support( 'automatic-feed-links' );

		

		/*

		 * Switches default core markup for gallery and caption to output valid HTML5.

		 */

		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		

		// Woocommerce Support

		add_theme_support( 'woocommerce' );

		

		// Add Posts Format Support

		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );

		

		// This theme uses its own gallery styles.

		add_filter( 'use_default_gallery_style', '__return_false' );

		

	} // End wedding_themes_setup()

}



/* ======================================

 * Unset Intermediate Image Sizes

 * ====================================== */

 

function wedding_update_image_sizes() {



    // Change Default Sizes

	update_option('large_size_w', 600);

	update_option('large_size_h', 600);

	update_option('large_crop', '1');

	

}



/* ==========================================

 * WordPress 4.5 Upgrade Media Upload Issue

 * ========================================== */



function wedding_change_graphic_lib( $array ) {

	return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );

}

add_filter( 'wp_image_editors', 'wedding_change_graphic_lib' );



/* ======================================

 * Upload MIME Types

 * ====================================== */



function wedding_filter_mime_types( $mime_types ) {

	$mime_types['ttf'] 	= 'font/ttf';

	$mime_types['woff'] = 'font/woff';

	$mime_types['svg'] 	= 'font/svg';

	$mime_types['eot'] 	= 'font/eot';

	$mime_types['zip']  = 'application/zip';



	return $mime_types;

}

add_filter('upload_mimes', 'wedding_filter_mime_types');



/* ===================================================

 * Change Main Navigation menu based on pages or posts

 * =================================================== */

 

function wedding_main_menu_args( $args ) {



    global $post;



	$post_id = '';

	$menu_type = '';



	if ( ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() ) || ( get_option( 'page_for_posts' ) && is_archive() && ! is_tax( 'testimonial_categories' ) && ! is_tax( 'team_categories' ) ) ) {

		$post_id = get_option( 'page_for_posts' );

	} else {

		if ( isset( $post ) ) {

			$post_id = $post->ID;

		}

		if( WEDDING_WOOCOMMERCE_ACTIVE ) {

			if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {

				$post_id = get_option( 'woocommerce_shop_page_id' );

			}

		}

	}

	

	$menu_type = get_post_meta( $post_id, 'zozo_custom_nav_menu', true );



	if ( $menu_type != '' && $menu_type != 'default' && ( $args['theme_location'] == 'primary-menu' ) ) {

		$args['menu'] = $menu_type;

	}

	

	return $args;

}



/* ======================================

 * Add layout to body_class output

 * ====================================== */

if ( ! function_exists( 'wedding_layout_body_class' ) ) {



	function wedding_layout_body_class( $classes ) {

	

		global $post, $wp_query;



		$layout = $blog_type = $theme_class = $footer_layout = $shop_page_id = '';

		if( WEDDING_WOOCOMMERCE_ACTIVE ) {

		

			if( is_shop() ) {

				$post_id = get_option('woocommerce_shop_page_id');

				$layout = get_post_meta( $post_id, 'zozo_layout', true );

			}

				

			else if( is_product_category() || is_product_tag() ) {

				$layout = wedding_get_theme_option( 'zozo_woo_archive_layout' );

				if( isset( $layout ) && $layout == '' ) {

					$layout = 'one-col';

				}

			} 

			

			else if( is_archive() ) {

				$layout = wedding_get_theme_option( 'zozo_blog_archive_layout' );

				$blog_type = 'blog-' . wedding_get_theme_option( 'zozo_archive_blog_type' );

			}

			

		} else {

		

			if( is_archive() ) {

				$layout = wedding_get_theme_option( 'zozo_blog_archive_layout' );

				$blog_type = 'blog-' . wedding_get_theme_option( 'zozo_archive_blog_type' );

			}

		}

		

		if( is_home() ) {

			$home_id = get_option( 'page_for_posts' );

			$layout = get_post_meta( $home_id, 'zozo_layout', true );

			if( ! $layout ) {

				$layout = wedding_get_theme_option( 'zozo_blog_layout' );

			}

			$blog_type = 'blog-' . wedding_get_theme_option( 'zozo_blog_type' );

		}

		

		// Only for Posts

		if ( is_singular( 'post' ) ) {

			$layout = get_post_meta( $post->ID, 'zozo_layout', true );

			if( ! $layout ) {

				$layout = wedding_get_theme_option( 'zozo_single_post_layout' );

			}

		}

		// If Singular posts value empty set theme option value	

		elseif( is_singular() ) {

			$layout = get_post_meta( $post->ID, 'zozo_layout', true );

			if( ! $layout ) {

				$layout = wedding_get_theme_option( 'zozo_layout' );

			}			

		}

		

		if( WEDDING_WOOCOMMERCE_ACTIVE ) {

			if( is_product() ) {

				$layout = wedding_get_theme_option( 'zozo_woo_single_layout' );

			}

		}

		if( ! $layout ) {			

			if( wedding_get_theme_option( 'zozo_layout' ) != '' ) {		

				$layout = wedding_get_theme_option( 'zozo_layout' );

			}

			else {

				$layout = 'one-col';

			}

		}

				

		// Theme Layout

		if( is_singular() ) {

			$theme_class = get_post_meta( $post->ID, 'zozo_theme_layout', true );			

		}

		

		if( $theme_class == '' || $theme_class == 'default' ) {		

			if( wedding_get_theme_option( 'zozo_theme_layout' ) != '' ) {

				$theme_class = wedding_get_theme_option( 'zozo_theme_layout' );

			} else {

				$theme_class = 'boxed';

			}

		}

		

		$classes[] = $theme_class;

		

		if( is_singular( 'post' ) || is_singular( 'page' ) ) {

		

			// Page Title Bar

			$hide_title_bar = get_post_meta( $post->ID, 'zozo_hide_page_title_bar', true );

			$classes[] = 'hide-title-bar-' . $hide_title_bar;

			

			// Header Type

			$header_type = '';

			$header_type 	= get_post_meta( $post->ID, 'zozo_header_type', true );

			if( isset( $header_type ) && $header_type == '' || $header_type == 'default' ) {

				$header_type = wedding_get_theme_option( 'zozo_header_type' );

			}

			$classes[] = 'htype-' . $header_type;

			

			// Footer Class

			$footer_style = get_post_meta( $post->ID, 'zozo_footer_style', true );

			if( isset( $footer_style ) && $footer_style == '' || $footer_style == 'default' ) {

				$footer_style = wedding_get_theme_option( 'zozo_footer_style' );

			}

			$classes[] = 'footer-' . $footer_style;

		}

		

		// RTL

		$enable_rtl_mode = wedding_get_theme_option( 'zozo_enable_rtl_mode' );

		if( is_rtl() || ( isset( $enable_rtl_mode ) && $enable_rtl_mode == 1 ) || isset( $_GET['RTL'] ) ) {

			$classes[] = 'rtl';

		}

		

		// Theme Skin

		if( wedding_get_theme_option( 'zozo_theme_skin' ) != '' ) {

			$classes[] = 'theme-skin-' . wedding_get_theme_option( 'zozo_theme_skin' );

		}

		

		if( wedding_get_theme_option( 'zozo_enable_back_to_top' ) && wedding_get_theme_option( 'zozo_back_to_top_position' ) == 'floating_bar' ) {

			$classes[] = 'footer-scroll-bar';

		}

		

		// Sticky Class

		if( wedding_get_theme_option( 'zozo_sticky_header' ) == 1 ) {

			$classes[] = 'header-is-sticky';

		}

		

		// Sticky Hide

		$sticky_hide = wedding_get_theme_option( 'enable_sticky_header_hide' );

		if( isset( $_GET['sticky_hide'] ) && $_GET['sticky_hide'] == 'off' ) {

			$sticky_hide = 0;

		}

		else if( isset( $_GET['sticky_hide'] ) && $_GET['sticky_hide'] == 'on' ) {

			$sticky_hide = 1;

		}

		

		if( isset( $sticky_hide ) && $sticky_hide == 1 ) {

			$classes[] = 'header-sticky-hide';

		}

		

		// Mobile Header Visibility

		$mobile_header_visiblity = wedding_get_theme_option( 'mobile_header_visible' );

		$classes[] = 'mhv-' . $mobile_header_visiblity;

		

		// Mobile Sticky Class

		if( wedding_get_theme_option( 'sticky_mobile_header' ) == 1 ) {

			$classes[] = 'header-mobile-is-sticky';

		} else {

			$classes[] = 'header-mobile-un-sticky';

		}

		

		// Sliding Bar Class

		if( wedding_get_theme_option( 'zozo_disable_sliding_bar' ) == 1 ) {

			$classes[] = 'no-mobile-slidingbar';

		}

		

		// Revolution Slider Position

		if( is_singular( 'post' ) || is_singular( 'page' ) ) {

			$rev_slider_position = get_post_meta( $post->ID, 'zozo_slider_position', true );

			if( isset( $rev_slider_position ) && $rev_slider_position == '' || $rev_slider_position == 'default' ) {

				$rev_slider_position = wedding_get_theme_option( 'zozo_slider_position' );

			}

			$classes[] = 'rev-position-header-' . $rev_slider_position;

		}

		

		// Header Transparency

		$header_transparency 	= '';

		if( is_singular( 'post' ) || is_singular( 'page' ) ) {

			$header_transparency 	= get_post_meta( $post->ID, 'zozo_header_transparency', true );

		}

		

		if( isset( $header_transparency ) && $header_transparency == '' || $header_transparency == 'default' ) {

			$header_transparency = wedding_get_theme_option( 'zozo_header_transparency' );

		}			

		if( ! $header_transparency ) {

			$header_transparency  = "no-transparent";

		}

		

		$classes[] = 'trans-h-' . $header_transparency;

		// Catalog Mode Class

		if( WEDDING_WOOCOMMERCE_ACTIVE ) {

			if( wedding_get_theme_option( 'zozo_woo_enable_catalog_mode' ) == 1 ) {

				$classes[] = 'woo-enable-catalog-mode';

			}

		}

		

		// Blog Type

		$classes[] = $blog_type;

		

		// Add classes to body_class() output 

		$classes[] = $layout;

		

		// Mobile

		if ( wp_is_mobile() ) {

			$classes[] = 'is-mobile';

		}

		

		return $classes;

		

	} // End wedding_layout_body_class()

	

}



/* ======================================

 * Print custom meta tags

 * ====================================== */

if ( ! function_exists( 'wedding_meta_tags' ) ) {



	function wedding_meta_tags() {

				

		if( wedding_get_theme_option( 'zozo_enable_responsive' ) == 1 ) {

			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />' . "\n";

		}

				

	} // End wedding_meta_tags()

	

}



/* ======================================

 * Enqueue Custom Styling

 * ====================================== */



if ( ! function_exists( 'wedding_enqueue_custom_styling' ) ) {



	function wedding_enqueue_custom_styling() {

		ob_start();

		get_template_part( 'includes/custom', 'styles' );

		$custom_css = ob_get_contents();

		ob_get_clean();

		

		$output = '';

		// Front Page Parallax Styles

		if( is_page_template( 'template-parallax-page.php' ) ) {

			/* Check for Query */

			$page_query = wedding_parallax_front_query();	

				

			if( !empty( $page_query ) ) {

			

				$query_styles = new WP_Query( $page_query );

					

				if( $query_styles->have_posts() ) :

					while ( $query_styles->have_posts() ) : $query_styles->the_post();

						global $post;							

						$backup = $post;

					

						$zozo_additional_sections_order = get_post_meta( $post->ID, 'zozo_parallax_additional_sections_order', true );

						

						$output .= wedding_parallax_custom_styles( $post );

						

						if( $zozo_additional_sections_order != '' ) {

							$additional_query = wedding_parallax_additional_query( $zozo_additional_sections_order );

							

							if( !empty( $additional_query ) ) {

								$custom_query = new WP_Query( $additional_query );

							}

							if ( $custom_query->have_posts() ):

								while ( $custom_query->have_posts() ): $custom_query->the_post();

								

									$output .= wedding_parallax_custom_styles( $post );

									

								endwhile;

							endif;

							wp_reset_postdata();

						}

						

						$post = $backup;

						

					endwhile;

				endif;

				wp_reset_postdata();

			}			

		}

		

		$custom_styles = $custom_css . $output;

		

		if( $custom_css || $output ) {

			wp_add_inline_style( 'wedding-zozo-custom-css', $custom_styles );

		}

		

	} // End wedding_enqueue_custom_styling()

	add_action( 'wp_enqueue_scripts', 'wedding_enqueue_custom_styling' );

}



/* =========================================

 * Parallax Custom Styles Output

 * ========================================= */

 

if ( ! function_exists( 'wedding_parallax_custom_styles' ) ) {

	function wedding_parallax_custom_styles( $post ) {

	

		global $post;

		

		$output = '';

		

		// Section Padding Styles

		$zozo_section_padding_top = get_post_meta( $post->ID, 'zozo_section_padding_top', true);

		$zozo_section_padding_bottom = get_post_meta( $post->ID, 'zozo_section_padding_bottom', true);

		$zozo_section_header_padding = get_post_meta( $post->ID, 'zozo_section_header_padding', true);

		

		$zozo_section_header_padding = ( !empty($zozo_section_header_padding) || $zozo_section_header_padding == '0' ) ? $zozo_section_header_padding : '40px';

		

		if( ( !empty($zozo_section_padding_top) || $zozo_section_padding_top == '0' ) || ( !empty($zozo_section_padding_bottom) || $zozo_section_padding_bottom == '0' ) ) {

			$output .= '#page-' . $post->post_name . ' { ';

			if( ( !empty($zozo_section_padding_top) || $zozo_section_padding_top == '0' ) ) {

				$output .= 'padding-top:' . $zozo_section_padding_top . ';';

			}

			

			if( ( !empty($zozo_section_padding_bottom) || $zozo_section_padding_bottom == '0' ) ) {

				$output .= 'padding-bottom:' . $zozo_section_padding_bottom . ';';								

			}

			$output .= ' }'. "\n";

		}

		$output .= '#page-' . $post->post_name . ' .parallax-header { padding-bottom:' . $zozo_section_header_padding . '; }'. "\n";

		

		// Section Color Styles

		$zozo_section_title_color = get_post_meta( $post->ID, 'zozo_section_title_color', true);

		$zozo_section_slogan_color = get_post_meta( $post->ID, 'zozo_section_slogan_color', true);

		$zozo_section_text_color = get_post_meta( $post->ID, 'zozo_section_text_color', true);

		$zozo_section_content_heading_color = get_post_meta( $post->ID, 'zozo_section_content_heading_color', true);

		

		if( !empty($zozo_section_title_color) ) {

			$output.= '#page-' . $post->post_name . ' .parallax-title { color: ' . $zozo_section_title_color . '; }'. "\n";

		}

		

		if( !empty($zozo_section_slogan_color) ) {

			$output.= '#page-' . $post->post_name . ' .parallax-desc { color: ' . $zozo_section_slogan_color . '; }'. "\n";

		}

		

		if( !empty($zozo_section_text_color) ) {

			$output.= '#page-' . $post->post_name . ' .parallax-content { color: ' . $zozo_section_text_color . '; }'. "\n";

		}

		

		if( !empty($zozo_section_content_heading_color) ) {

			$output.= '#page-' . $post->post_name . ' .parallax-content h1, 

						#page-' . $post->post_name . ' .parallax-content h2, 

						#page-' . $post->post_name . ' .parallax-content h3, 

						#page-' . $post->post_name . ' .parallax-content h4, 

						#page-' . $post->post_name . ' .parallax-content h5, 

						#page-' . $post->post_name . ' .parallax-content h6 { color: ' . $zozo_section_content_heading_color . '; }'. "\n";

		}

		

		// Section Background

		$zozo_parallax_bg_image = get_post_meta( $post->ID, 'zozo_parallax_bg_image', true);

		$zozo_parallax_bg_repeat = get_post_meta( $post->ID, 'zozo_parallax_bg_repeat', true);

		$zozo_parallax_bg_attachment = get_post_meta( $post->ID, 'zozo_parallax_bg_attachment', true);

		$zozo_parallax_bg_postion = get_post_meta( $post->ID, 'zozo_parallax_bg_postion', true);

		$zozo_parallax_bg_size = get_post_meta( $post->ID, 'zozo_parallax_bg_size', true);

		

		$zozo_parallax_bg_repeat = !empty($zozo_parallax_bg_repeat) ? $zozo_parallax_bg_repeat : 'no-repeat';

		

		$parallax_background = '';

		

		if( !empty($zozo_parallax_bg_image) ) {

			$parallax_background = 'background-image: url(' . $zozo_parallax_bg_image . ');';

			$parallax_background .= 'background-repeat: ' . $zozo_parallax_bg_repeat . ';';

			if( !empty($zozo_parallax_bg_postion) ) {

				$parallax_background .= 'background-position: ' . $zozo_parallax_bg_postion . ';';

			}

			if( !empty($zozo_parallax_bg_size) ) {

				$parallax_background .= 'background-size: ' . $zozo_parallax_bg_size . ';';

			}

			if( !empty($zozo_parallax_bg_attachment) ) {

				$parallax_background .= 'background-attachment: ' . $zozo_parallax_bg_attachment . ';';

			}

		}

		if( !empty($zozo_parallax_bg_image) ) {						

			$output.= '#page-' . $post->post_name . ' { '. $parallax_background . ' }'. "\n";

		}

		

		$zozo_section_bg_color = get_post_meta( $post->ID, 'zozo_section_bg_color', true);

		if( !empty($zozo_section_bg_color) ) {						

			$output.= '#page-' . $post->post_name . ' { background-color: ' . $zozo_section_bg_color . '; }'. "\n";

		}

		

		$zozo_parallax_bg_overlay = get_post_meta( $post->ID, 'zozo_parallax_bg_overlay', true);

		if( $zozo_parallax_bg_overlay == 'yes' ) {

			$zozo_section_overlay_color = get_post_meta( $post->ID, 'zozo_section_overlay_color', true);

			$zozo_overlay_color_opacity = get_post_meta( $post->ID, 'zozo_overlay_color_opacity', true);

			

			$zozo_overlay_color_opacity = $zozo_overlay_color_opacity != 0 ? $zozo_overlay_color_opacity : '0.7';

			

			$rgb_color = '';

			$rgb_color = wedding_hex2rgb( $zozo_section_overlay_color );

			

			$output.= '#page-' . $post->post_name . ' .parallax-bg-overlay { background-color: rgba(' . $rgb_color[0] . ',' . $rgb_color[1] . ',' . $rgb_color[2] . ', ' . $zozo_overlay_color_opacity . '); }'. "\n";

		}

		

		return $output;

		

	}

}



/* =========================================

 * Enqueue Custom Styling for Admin

 * ========================================= */



if ( ! function_exists( 'wedding_custom_admin_css' ) ) {

	function wedding_custom_admin_css() {

	

		if( wedding_get_theme_option( 'zozo_custom_scheme_color' ) != '' ) {

			$custom_color = wedding_get_theme_option( 'zozo_custom_scheme_color' );			

			$acustom_css = '.vc_colored-dropdown .primary-bg { background: '. $custom_color .' !important; }';			

			if( $acustom_css ) {

				wp_add_inline_style( 'wedding-zozo-admin-css', $acustom_css );

			}

		}

		

	}

}



/* =========================================

 * Load theme style and js in the <head>

 * ========================================= */



if ( ! function_exists( 'wedding_load_theme_scripts' ) ) {



	function wedding_load_theme_scripts() {

	

		global $is_IE;

		

		if( WEDDING_VC_ACTIVE ) {

			wp_deregister_style( 'font-awesome' );

			$script_type = 'wp_deregister' . '_script';

			$script_type( 'waypoints' );

		}

		

		// Load Visual composer CSS first so it's easier to override

        if( WEDDING_VC_ACTIVE ) {

            wp_enqueue_style( 'js_composer_front' );

        }

		

		if( wedding_get_theme_option( 'zozo_minify_css' ) == 1 ) {

			wp_enqueue_style( 'wedding-zozo-main-min-style', WEDDING_THEME_URL .'/css/wedding-main-min.css', array(), '1.0' );

		} 

		else {

			// Stylesheet

			wp_enqueue_style( 'prettyphoto', WEDDING_THEME_URL . '/css/wedding-prettyPhoto.css', array(), '3.1.6' );

			

			wp_enqueue_style( 'font-awesome', WEDDING_THEME_URL . '/css/wedding-font-awesome.min.css', array(), null );

			

			wp_enqueue_style( 'wedding-zozo-iconspack-style', WEDDING_THEME_URL . '/css/wedding-iconspack.css', array(), null );

		

			wp_enqueue_style( 'wedding-zozo-effects-style', WEDDING_THEME_URL . '/css/wedding-animate.css', array(), null );

			

			// Carousel CSS

			wp_enqueue_style( 'owl-carousel', WEDDING_THEME_URL . '/css/wedding-owl.carousel.css', array(), '2.0.0' );

			

			wp_enqueue_style( 'bootstrap', WEDDING_THEME_URL . '/css/wedding-bootstrap.min.css', array(), '3.3.6' );

			

			wp_enqueue_style( 'rati-it', WEDDING_THEME_URL .'/css/wedding-rateit.css', array(), '1.0.22' );	

		

		}

		

		wp_enqueue_style( 'wedding-zozo-theme-style', get_template_directory_uri() . '/style.css', array(), null );			

		

		wp_register_style( 'wedding-zozo-rtl-style', WEDDING_THEME_URL . '/rtl.css', array(), '1.0' );

		$enable_rtl_mode = wedding_get_theme_option( 'zozo_enable_rtl_mode' );

		$isRTL = "false";

		$isOriginLeft = "true";

		

		if( is_rtl() || ( isset( $enable_rtl_mode ) && $enable_rtl_mode == 1 ) || isset( $_GET['RTL'] ) ) {

			$isRTL = "true";

			$isOriginLeft = "false";

			wp_enqueue_style('wedding-zozo-rtl-style');

		}

		

		// Custom CSS

		$upload_dir = wp_upload_dir();



		if( is_file( $upload_dir['basedir'] . '/wedding/theme_'. get_current_blog_id() .'.css' ) ) {



			$custom_css_url = $upload_dir['baseurl'] . '/wedding/theme_'. get_current_blog_id() .'.css';

			

			$custom_css_url = str_replace( array(

				'http://',

				'https://',

			), '//', $custom_css_url );

			

			wp_enqueue_style( 'wedding-zozo-custom-css', $custom_css_url, array(), '1.0' );

		} else {

            wp_enqueue_style( 'wedding-zozo-custom-css', WEDDING_THEME_URL . '/css/wedding-theme.css', array(), '1.0' );

        }

	

		// Javascripts

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

			wp_enqueue_script( 'comment-reply' );

		}

		

			

		if( $is_IE ) {

				// Javascripts

			wp_enqueue_style( 'wedding-zozo-html5-js', WEDDING_THEME_URL . '/js/plugins/wedding-html5.js', array() );

			wp_enqueue_style( 'wedding-zozo-respond-js', WEDDING_THEME_URL . '/js/plugins/wedding-respond.min.js', array() );

			wp_enqueue_style( 'wedding-zozo-lineicon-ie-js', WEDDING_THEME_URL . '/js/plugins/wedding-icons-lte-ie7.js', array() );

		}

		

		if( wedding_get_theme_option( 'zozo_minify_js' ) == 1 ) {

		

			wp_enqueue_script( 'wedding-zozo-theme-init-min-js', WEDDING_THEME_URL . '/js/plugins/wedding-theme-init.min.js', array('jquery'), null, false );

			wp_enqueue_script( 'wedding-zozo-theme-min-js', WEDDING_THEME_URL . '/js/wedding-theme-min.js', array('jquery'), '1.0', true );

			

		} 

		else {

		

			wp_enqueue_script( 'wedding-zozo-theme-init-js', WEDDING_THEME_URL . '/js/plugins/wedding-theme-init.js', array('jquery'), null, false );

		

			wp_enqueue_style( 'bootstrap', WEDDING_THEME_URL . '/js/plugins/wedding-bootstrap.min.js', array(), null, true );

			

			wp_enqueue_style( 'wedding-zozo-main-js', WEDDING_THEME_URL . '/js/plugins/wedding-main.js', array(), null, true );

			

			wp_enqueue_style( 'jquery-modernizr', WEDDING_THEME_URL . '/js/plugins/wedding-modernizr.min.js', array('jquery'), null, true );

			

			wp_enqueue_style( 'jquery-prettyphoto', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.prettyPhoto.js', array('jquery'), null, true );

			

			wp_enqueue_style( 'jquery-rateit', WEDDING_THEME_URL . '/js/rate-it/wedding-jquery.rateit.min.js', array('jquery'), null, true );

		

			wp_enqueue_style( 'jquery-owl-carousel', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.carousel.min.js', array('jquery'), null, true );

			

			wp_enqueue_style( 'jquery-match-height', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.match-height.js', array('jquery'), null, true );

					

			wp_enqueue_style( 'wedding-zozo-general-js', WEDDING_THEME_URL . '/js/plugins/wedding-general.js', array('jquery'), null, true );

			

			wp_enqueue_style( 'wedding-zozo-owl-carousel-custom-js', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.carousel-custom.js', array('jquery'), null, true );

			

		}

		

		if( wedding_get_theme_option( 'zozo_google_map_api' ) != '' ) {

			$gmap_key = wedding_get_theme_option( 'zozo_google_map_api' );

			wp_register_script( 'wedding-zozo-gmaps-js', '//maps.google.com/maps/api/js?key='. $gmap_key .'', array('jquery'), null, true );

		}

		

		// Skrollr Jquery

		wp_register_script( 'jquery-skrollr', WEDDING_THEME_URL . '/js/plugins/wedding-skrollr.min.js', array('jquery'), null, true );

			

		// Video Slider Js

		wp_register_script( 'jquery-YTPlayer', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.mb.YTPlayer.js', array('jquery'), null, true ); 

		

		wp_enqueue_script( 'wedding-zmm-script', WEDDING_THEME_URL . '/js/wedding-custom.js' , array(), '1', true );

		

		// Countdown Js

		wp_register_script( 'jquery-countdown-plugin', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.countdown-plugin.min.js', array('jquery'), null, true );

		wp_register_script( 'jquery-countdown', WEDDING_THEME_URL . '/js/plugins/wedding-jquery.countdown.min.js', array('jquery'), null, true );

		

		$template_uri = get_template_directory_uri();

		

		$sticky_menu_height = '';

		$sticky_menu_height_opt = wedding_get_theme_option( 'zozo_sticky_menu_height' );

		if( isset( $sticky_menu_height_opt['height'] ) && $sticky_menu_height_opt['height'] != '' ) {

			if( is_numeric( $sticky_menu_height_opt['height'] ) ) {

				$sticky_menu_height = $sticky_menu_height_opt['height'] . $sticky_menu_height_opt['units'];

			} else {

				$sticky_menu_height = $sticky_menu_height_opt['height'];

			}

		}

		

		$sticky_menu_height_alt = '';

		$sticky_menu_height_alt_opt = wedding_get_theme_option( 'zozo_sticky_menu_height_alt' );

		if( isset ( $sticky_menu_height_alt_opt['height'] ) && $sticky_menu_height_alt_opt['height'] != '' ) {

			if( is_numeric( $sticky_menu_height_alt_opt['height'] ) ) {

				$sticky_menu_height_alt = $sticky_menu_height_alt_opt['height'] . $sticky_menu_height_alt_opt['units'];

			} else {

				$sticky_menu_height_alt = $sticky_menu_height_alt_opt['height'];

			}

		}

		

		wp_localize_script('jquery', 'wedding_js_vars', 

							array( 'zozo_template_uri' 		=> esc_js( $template_uri ),

								   'isRTL' 					=> esc_js( $isRTL ),

								   'isOriginLeft'       	=> esc_js( $isOriginLeft ),

								   'zozo_sticky_height' 	=> esc_js( $sticky_menu_height ),

								   'zozo_sticky_height_alt' => esc_js( $sticky_menu_height_alt ),

								   'zozo_ajax_url'	   		=> esc_js( admin_url('admin-ajax.php') ),

								   'zozo_back_menu'	   		=> esc_html__( 'Back', 'wedding' ),

								   'zozo_CounterYears' 		=> esc_html__( 'Years', 'wedding' ),

								   'zozo_CounterMonths' 	=> esc_html__( 'Months', 'wedding' ),

								   'zozo_CounterWeeks' 		=> esc_html__( 'Weeks', 'wedding' ),

								   'zozo_CounterDays' 		=> esc_html__( 'Days', 'wedding' ),

								   'zozo_CounterHours' 		=> esc_html__( 'Hours', 'wedding' ),

								   'zozo_CounterMins' 		=> esc_html__( 'Mins', 'wedding' ),

								   'zozo_CounterSecs' 		=> esc_html__( 'Secs', 'wedding' ),

								   'zozo_CounterYear' 		=> esc_html__( 'Year', 'wedding' ),

								   'zozo_CounterMonth' 		=> esc_html__( 'Month', 'wedding' ),

								   'zozo_CounterWeek' 		=> esc_html__( 'Week', 'wedding' ),

								   'zozo_CounterDay' 		=> esc_html__( 'Day', 'wedding' ),

								   'zozo_CounterHour' 		=> esc_html__( 'Hour', 'wedding' ),

								   'zozo_CounterMin' 		=> esc_html__( 'Min', 'wedding' ),

								   'zozo_CounterSec' 		=> esc_html__( 'Sec', 'wedding' ) ));



	} // End wedding_load_theme_scripts()

	

}



/* =================================================================

 * Remove version numbers from scripts URL

 * ================================================================= */



function wedding_remove_scripts_version( $src ) {

	if ( get_theme_mod( 'zozo_remove_scripts_version', true ) && strpos( $src, 'ver=' ) ) {

		$src = remove_query_arg( 'ver', $src );

	}

	return $src;

}







/* =================================================================

 * Custom Excerpt Length used on archive/category and blog pages

 * ================================================================= */



function wedding_custom_excerpt_length( $limit ) {		

	return '60';	

}



function wedding_custom_excerpt_more( $more ) {

	return '...';

}



/* =================================================================

 * Check Plugins Loaded

 * ================================================================= */

 

if( ! function_exists( 'wedding_check_plugins_loaded' ) ) { 

	function wedding_check_plugins_loaded() {

		if( ! function_exists( 'is_woocommerce' ) ) {

			function is_woocommerce() { return false; }

		}		

	}

}



/* =================================================================

 * Excerpt with allow some tags

 * ================================================================= */



function wedding_wpse_allowedtags() {

    // Add custom tags to this string

    return '<script>,<style>,<strong>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<blockquote>,<table>,<thead>,<tbody>,<th>,<tr>,<td>,<address>,<pre>,<code>,<span>,<div>,<button>,<dl>,<dt>,<dd>';

}



function wedding_blog_allowedtags() {

    return '<a>,<span>';

}



if ( ! function_exists( 'wedding_blog_trim_excerpt' ) ) {



    function wedding_blog_trim_excerpt( $excerpt_length ) {

		global $post;

		

		$content = $post_excerpt = $clean_excerpt = $excerpt = '';

		

		if( isset( $excerpt_length ) && $excerpt_length == '' ) {

			$limit = 168;

		}

		

		$post = get_post( get_the_ID() );

		$more_tag = strpos( $post->post_content, '<!--more-->' );

		

		$readmore_link = '';

		$readmore_link = ' <span class="meta-more-link">&rarr;</span>';



		$content = get_the_content( $readmore_link );

		

		if( $post->post_excerpt || $more_tag !== false ) {				

			if( ! $more_tag ) {

				$content = rtrim( get_the_excerpt(), '&rarr;' );

			}				

		}

		

		$content = apply_filters('the_content', $content);

		$post_excerpt = strip_tags( $content, wedding_blog_allowedtags() ); 

		$clean_excerpt = strpos( $post_excerpt, '...' ) ? strstr( $post_excerpt, '...', true ) : $post_excerpt;

		

		$clean_excerpt = wedding_remove_vc_from_excerpt($clean_excerpt);

		$clean_excerpt = strip_shortcodes(wedding_remove_zozo_from_excerpt($clean_excerpt));

		$excerpt_word_array = explode( ' ', $clean_excerpt );		

		$excerpt_word_array = array_slice( $excerpt_word_array, 0, $excerpt_length );

		$excerpt = implode( ' ', $excerpt_word_array );

		

		return $excerpt;

    }



}



/* =================================================================

 * Maintenance or Coming Soon Page

 * ================================================================= */



if ( ! function_exists( 'wedding_activate_maintenance_mode' ) ) {



    function wedding_activate_maintenance_mode() {

		$maintenance_mode = '';

		$comingsoon_mode = '';

		$custom_logo = '';

		$contact_info = '';

		

		if( wedding_get_theme_option( 'zozo_enable_maintenance' ) ) {

			$maintenance_mode = wedding_get_theme_option( 'zozo_enable_maintenance' );

		} else {

			$maintenance_mode = false;

		}

		

		if( wedding_get_theme_option( 'zozo_enable_coming_soon' ) ) {

			$comingsoon_mode = wedding_get_theme_option( 'zozo_enable_coming_soon' );

		} else {

			$comingsoon_mode = false;

		}

		

		$args['response'] = 503;

		

		$logo = wedding_get_theme_option( 'zozo_logo' );

		if( isset( $logo['url'] ) ) {

			$custom_logo = '<div class="logo"><img class="img-responsive" src="' . esc_url( $logo['url'] ) . '" alt="'. esc_html__('Maintenance', 'wedding') .'" width="'. esc_attr( $logo['width'] ) .'" height="'. esc_attr( $logo['height'] ) .'" style="margin: 0 auto; display: block;"></div>';

		}

		

		if( wedding_get_theme_option( 'zozo_header_email' ) != '' ) {

			$contact_infos = '<h5 style="margin: 10px 0;"><a href="mailto:'.esc_attr( wedding_get_theme_option( 'zozo_header_email' )  ).'" style="color: #FFC400;">'.esc_html( wedding_get_theme_option( 'zozo_header_email' ) ).'</a></h5>';

		}

		

		if( wedding_get_theme_option( 'zozo_header_phone' ) != '' ) {

			$contact_infos .= '<h5 style="margin: 10px 0;">'. esc_html( wedding_get_theme_option( 'zozo_header_phone' ) ) .'</h5>';

		}

		

		if( isset( $contact_infos ) && $contact_infos != '' ) {

			$contact_info = '<h2 style="font-family: Roboto; font-weight: bold; display:inline-block; margin-bottom: 10px; color: #000;">CONTACT US</h2>';

			$contact_info .= $contact_infos;

		}

		

		if ( $maintenance_mode == 1 ) {

			if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {

				wp_die( $custom_logo . '<div class="content" style="text-align:center;"><h1 style="font-family: Roboto; font-weight: bold; display:inline-block; border-bottom: 3px double #666; font-size: 32px; color: #000;">UNDER <span style="color: #FFC400;">MAINTENANCE</span></h1><p>' . esc_html__( 'We are currently in maintenance mode. We will be back soon.', 'wedding' ) . '</p>'. $contact_info .'</div>', get_bloginfo( 'name' ), $args );

			}

		} else if ( $maintenance_mode == 2 ) {



			$maintenance_page     	= wedding_get_theme_option( 'zozo_maintenance_mode_page' );

			$current_page_url 		= wedding_get_current_url();

			$maintenance_page_url 	= get_permalink( $maintenance_page );



			if ( $current_page_url != $maintenance_page_url ) {

				if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {

					wp_redirect( $maintenance_page_url );

					exit;

				}

			}

			

		} else if ( $comingsoon_mode == 1 ) {



			if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {

				wp_die( $custom_logo . '<div class="content" style="text-align:center;"><h1 style="font-family: Roboto; font-weight: bold; display:inline-block; border-bottom: 3px double #666; font-size: 32px; color: #000;">COMING <span style="color: #FFC400;">SOON!</span></h1><p>' . esc_html__( 'We are currently working on an awesome new site, which will be ready soon. Stay Tuned!', 'wedding' ) . '</p>'. $contact_info .'</div>', get_bloginfo( 'name' ), $args );

			}

			

		} else if ( $comingsoon_mode == 2 ) {



			$comingsoon_page     	= wedding_get_theme_option( 'zozo_coming_soon_page' );

			$current_page_url 		= wedding_get_current_url();

			$comingsoon_page_url 	= get_permalink( $comingsoon_page );



			if ( $current_page_url != $comingsoon_page_url ) {

				if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {

					wp_redirect( $comingsoon_page_url );

					exit;

				}

			}

			

		}

		

	}

	

}



if( ! function_exists('wedding_remove_vc_from_excerpt') )  {

	function wedding_remove_vc_from_excerpt( $excerpt ) {

		$patterns = "/\[[\/]?vc_[^\]]*\]/";

		$replacements = "";

		return preg_replace($patterns, $replacements, $excerpt);

	}

}



if( ! function_exists('wedding_remove_zozo_from_excerpt') )  {

	function wedding_remove_zozo_from_excerpt( $excerpt ) {

		$patterns = "/\[[\/]?zozo_[^\]]*\]/";

		$replacements = "";

		return preg_replace($patterns, $replacements, $excerpt);

	}

}



if( ! function_exists('wedding_shortcode_stripped_excerpt') ) {

	function wedding_shortcode_stripped_excerpt( $content, $excerpt_length ) {

			

		$post_excerpt = strip_tags( $content ); 

		$clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

		

		$clean_excerpt = wedding_remove_vc_from_excerpt($clean_excerpt);

		$clean_excerpt = strip_shortcodes(wedding_remove_zozo_from_excerpt($clean_excerpt));

		$excerpt_word_array = explode( ' ', $clean_excerpt );		

		$excerpt_word_array = array_slice( $excerpt_word_array, 0, $excerpt_length );

		$excerpt = implode( ' ', $excerpt_word_array );

		

		return $excerpt;

		

	}

}



/* =================================================================

 * Enable compatibility with theme for JC Submenu

 * ================================================================= */



function wedding_jc_disable_public_walker($default){

    return false;

}



add_filter('jcs/enable_public_walker', 'wedding_jc_disable_public_walker');



function wedding_jc_edit_item_classes( $classes, $item_id, $item_type ){

 

    $classes[] = "menu-item menu-item-type-$item_type";

    return $classes;

	

}

add_action( 'jcs/item_classes', 'wedding_jc_edit_item_classes', 10, 3 );



/* ================================================

 * Modal Popup Hide Forever

 * ================================================ */

 

add_action('wp_ajax_modal_hide_forever', 'wedding_modal_hide_forever');

add_action('wp_ajax_nopriv_modal_hide_forever', 'wedding_modal_hide_forever');



if( ! function_exists( "wedding_modal_hide_forever" ) ) {

	function wedding_modal_hide_forever() {

	

		if( $_POST['id'] != '' && $_POST['value'] != '' ) {

			wedding_setcookie( $_POST['id'], $_POST['value'], 0 );			

			echo "success";

		}

		

		die();

	}

}



function wedding_setcookie( $name, $value, $expire = 0, $secure = false ) {

	setcookie( $name, $value, $expire, '/', COOKIE_DOMAIN, $secure );

}





add_action( 'wp_enqueue_scripts', 'wedding_manage_cf7_styles', 99 ); 

if( ! function_exists( "wedding_manage_cf7_styles" ) ) {

	function wedding_manage_cf7_styles() {

		

		if( class_exists( 'WPCF7' ) ){

		

			global $post;

	

			// Page Content Meta

			$page_has_cf7 = false;

			if( $post ) {

				$page_has_cf7 = get_post_meta( $post->ID, 'zozo_page_has_cf7', true );

			}

			

			/** Dequeue globally enqueued scripts & styles */

			 wp_dequeue_script( 'contact-form-7' );

			 wp_dequeue_style( 'contact-form-7' );

			 //for cf7

			 if ( $page_has_cf7 == true ) {

				wp_enqueue_script( 'contact-form-7' );

				wp_enqueue_style( 'contact-form-7' );

			 }

		}

	}

}

