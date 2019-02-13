<?php

/**

 * Zozothemes functions and definitions

 *

 * @package Zozothemes

 */



// Set path to theme specific functions

$library_path = get_template_directory() . '/lib/';

$includes_path = get_template_directory() . '/includes/';

$admin_path = get_template_directory() . '/framework/admin/';



// Define path to theme specific functions 

define( 'WEDDING_LIBRARY', $library_path );

define( 'WEDDING_INCLUDES', $includes_path ); 

define( 'WEDDING_FRAMEWORK_PATH', get_template_directory() . '/framework' );

define( 'WEDDING_ADMIN', get_template_directory() . '/admin' );

define( 'WEDDING_ADMIN_URL', get_template_directory_uri() . '/admin' );

define( 'WEDDING_THEME_URL', get_template_directory_uri() );

define( 'WEDDING_THEME_DIR', get_template_directory() );

define( 'WEDDING_VC_ACTIVE', class_exists( 'Vc_Manager' ) );

define( 'WEDDING_REVSLIDER_ACTIVE', class_exists( 'RevSlider' ) );

define( 'WEDDING_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );



function wedding_check_registered_post_types() {

    // types will be a list of the post type names

    $types = get_post_types( array('_builtin' => false) );

	

	if( in_array( 'zozo_testimonial', $types ) ) {

		define( 'WEDDING_TESTIMONIAL_ACTIVE', true );

	} else {

		define( 'WEDDING_TESTIMONIAL_ACTIVE', false );

	}

	

	if( in_array( 'zozo_team_member', $types ) ) {

		define( 'WEDDING_TEAM_ACTIVE', true );

	} else {

		define( 'WEDDING_TEAM_ACTIVE', false );

	}

	

} 



add_action( 'init', 'wedding_check_registered_post_types' );

 

/**

 * Theme Framework

 */

require WEDDING_FRAMEWORK_PATH . '/framework.php';  



/**

 * Register Sidebar

 */

require WEDDING_INCLUDES . 'sidebar-register.php'; 



/**

 * Theme Actions and Filters

 */

require WEDDING_INCLUDES . 'theme-filters.php';



/**

 * Theme Functions

 */

require WEDDING_INCLUDES . 'theme-functions.php';



/**

 * Admin Custom Meta Boxes

 */

require WEDDING_INCLUDES . 'metaboxes.php'; 



/**

 * Admin Custom Meta Box Fields

 */

require WEDDING_INCLUDES . 'register-metabox-types.php'; 



/**

 * Bootstrap Library Files

 */

require WEDDING_LIBRARY . 'wp_bootstrap_navwalker.php'; 



/**

 * Sidebar Generator

 */

require WEDDING_INCLUDES . 'plugins/sidebar-generator/sidebar_generator.php';  



/**

 * Woocommerce Config

 */

if( class_exists('WooCommerce') ) {

	require WEDDING_INCLUDES . 'woo-functions.php';

}



/**

 * Mega Menu Framework

 */

$mega_opt = wedding_get_theme_option( 'zozo_menu_type' );

if( $mega_opt == 'megamenu' ) require WEDDING_ADMIN . '/walker/custom_menu.php';



/**

 * Breadcrumbs

 */

require WEDDING_INCLUDES . 'class-breadcrumbs.php';  



/**

 * Demo Importer

 */

include WEDDING_INCLUDES . 'plugins/importer/zozo-importer.php'; 



/**

 * TGM Plugin Activation

 */

require_once WEDDING_FRAMEWORK_PATH . '/plugins-activation/init.php';  



/**

 * Ratings Plugin

 */

require_once WEDDING_INCLUDES . 'class-zozo-item-ratings.php';  



wedding_item_ratings_init();

function wedding_item_ratings_init() {

	

	//Init vars

	$config_options = array();

								

	//Set post types option

	$_post_types = array();

	$_post_types = array('zozo_testimonial');

	

	$_min_level = 0;

	$_max_level = 5;

	

	$config_options[] = array(

		'meta_key'			=>	'zozo_author_rating',

		'name'				=>	esc_html__( 'Rating', 'wedding' ),

		'disable_on_update'	=>	FALSE,

		'max_rating_size'	=> 	(int) $_max_level,

		'min_rating_size'	=> 	(int) $_min_level,

		'active_post_types'	=>	$_post_types

	);

	

	//Instatiate plugin class and pass config options array

	new WeddingItemRatings( $config_options );

}



/**

 * Visual Composer

 */

include WEDDING_INCLUDES . 'visual-composer/visual-composer.php'; 



/**

 * Include Widgets

 */

include_once( WEDDING_THEME_DIR . '/widgets/instagram_widget.php');

include_once( WEDDING_THEME_DIR . '/widgets/mailchimp_widget.php');

include_once( WEDDING_THEME_DIR . '/widgets/popular_posts_widget.php');

include_once( WEDDING_THEME_DIR . '/widgets/category_posts_widget.php');

include_once( WEDDING_THEME_DIR . '/widgets/tabs_widget.php');

include_once( WEDDING_THEME_DIR . '/widgets/counters_widget.php');

include_once( WEDDING_THEME_DIR . '/widgets/social_link_widget.php'); 



/*Theme Option Default Values*/

require WEDDING_INCLUDES . 'theme-default.php';