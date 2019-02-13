<?php
/**
 * Theme Options
 */

require_once( WEDDING_CORE_ADMIN . '/functions.php' ); 

// include redux framework core functions
require_once( WEDDING_CORE_ADMIN . '/ReduxCore/framework.php' );

// Theme options
require_once( WEDDING_CORE_ADMIN . '/theme-config/config.php' );

// Save Theme Options
add_action('redux/options/zozo_options/saved', 'wedding_save_theme_options', 10, 2);
add_action('redux/options/zozo_options/import', 'wedding_save_theme_options', 10, 2);
add_action('redux/options/zozo_options/reset', 'wedding_save_theme_options');
add_action('redux/options/zozo_options/section/reset', 'wedding_save_theme_options');
add_action('customize_save_after', 'wedding_save_theme_options', 30);

if ( isset( $_POST['wp_customize'] ) && $_POST['wp_customize'] == "on" && isset( $_POST['customized'] ) && ! empty( $_POST['customized'] ) && ! isset( $_POST['action'] ) ) {
	add_action( 'wp_head', 'wedding_dynamic_css_output', 100 );
}

function wedding_dynamic_css_output() {
	// Custom Styles File
    ob_start();
    include WEDDING_INCLUDES . 'custom-skins.php';
    $custom_css = ob_get_clean();

    if( $custom_css ) {
		echo '<!-- Dynamic Custom CSS -->'. "\n";
		echo '<style type="text/css">' . $custom_css;
		echo '</style>' . "\n";
	}
}