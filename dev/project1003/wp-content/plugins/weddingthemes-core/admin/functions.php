<?php // Custom Functions

add_action( 'admin_print_scripts-post.php', 'wedding_admin_icon_styles_compatible', 30 );
add_action( 'admin_print_scripts-post-new.php', 'wedding_admin_icon_styles_compatible', 30 );

/**
 * Enqueue Icon Styles for Admin
 *
 * @return	void
 */
function wedding_admin_icon_styles_compatible() {
	// CSS		
	wp_enqueue_style( 'wedding-zozo-font-awesome', WEDDING_THEME_URL . '/css/wedding-font-awesome.css', false, '4.6.3', 'all' );
	wp_enqueue_style( 'wedding-zozo-iconspack', WEDDING_THEME_URL . '/css/wedding-iconspack.css', false, '1.0', 'all' );
}

add_action( 'admin_enqueue_scripts', 'wedding_admin_icon_enqueue_styles' );

function wedding_admin_icon_enqueue_styles( $hook ) {
    if( 'nav-menus.php' == $hook ) {
        wp_enqueue_style( 'wedding-zozo-font-awesome', WEDDING_THEME_URL . '/css/wedding-font-awesome.css', false, '4.6.3', 'all' );
    }
}

/* ==================================================================
 *	Revolution Slider Disable Notice
 * ================================================================== */

if( is_admin() ) {
	if( function_exists( 'set_revslider_as_theme' )){
		add_action( 'init', 'wedding_set_Rev_Slider_as_theme' );
		function wedding_set_Rev_Slider_as_theme() {
			update_option('revslider-valid-notice', 'false');
			set_revslider_as_theme();
		}
	}
}

/* ==================================================================
 *	Ultimate Addon Disable Notice
 * ================================================================== */

if( class_exists('Ultimate_VC_Addons') ) {
	add_action('admin_init', 'wedding_disable_ultimate_addon_notice');
}
function wedding_disable_ultimate_addon_notice() {
	remove_action('admin_notices','bsf_notices',1000);
	remove_action('network_admin_notices','bsf_notices',1000);
}