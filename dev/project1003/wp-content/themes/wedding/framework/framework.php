<?php 

/* ======================================

 * CORE FILES

 * ====================================== */

if( ! function_exists('wedding_include_welcome_screen') ) {

	function wedding_include_welcome_screen() {

		// Welcome Admin Page

		include_once WEDDING_INCLUDES . 'theme-admin/index.php';

	}

	add_action( 'init', 'wedding_include_welcome_screen', 0 );

}



/* ================================================

 * Get Theme Option Values

 * ================================================ */

 

if ( ! function_exists( 'wedding_get_theme_option' ) ) {



	function wedding_get_theme_option( $option_id, $default = '' ) {

	

		if ( isset( $_POST['wp_customize'] ) && $_POST['wp_customize'] == "on" && 

		isset( $_POST['customized'] ) && ! empty( $_POST['customized'] ) && ! isset( $_POST['action'] ) ) {

			global $zozo_options;

		} else {

			$zozo_options = get_option( 'zozo_options' );

		}

		

		$zozo_options = isset( $zozo_options ) ? $zozo_options : '';



		/* look for the saved value */

		if( isset( $zozo_options[$option_id] ) && '' != $zozo_options[$option_id] ) {

			return $zozo_options[$option_id];

		}

		

		return $default;

	

	}

  

}



// Core Functions

include_once WEDDING_FRAMEWORK_PATH . '/core/functions.php';

// Header Functions

include_once WEDDING_FRAMEWORK_PATH . '/core/header-functions.php';

// Footer Functions

include_once WEDDING_FRAMEWORK_PATH . '/core/footer-functions.php';