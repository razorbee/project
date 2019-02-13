<?php
    /**
     * Theme Options Configuration File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "zozo_options";
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get('Name') . ' ' . esc_html__('Options', 'wedding'),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'wedding' ),
        'page_title'           => esc_html__( 'Theme Options', 'wedding' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAsd03TE8ZfcIrp1Lsr-GDGOk6284M4itY',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => true,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        'disable_google_fonts_link' => false,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-admin-generic',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
		//'forced_dev_mode_off'  => true,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        // OPTIONAL -> Give you extra features
        'page_priority'        => 62,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'zozo_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit' 		=> '',                   // Disable the footer credit of Redux. Please leave if you can help it.
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
        //'compiler'             => true,
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'href'  => 'http://docs.zozothemes.com/wedding/',
        'title' => esc_html__( 'Documentation', 'wedding' ),
    );
    $args['admin_bar_links'][] = array(
        'href'  => 'https://zozothemes.ticksy.com/',
        'title' => esc_html__( 'Support', 'wedding' ),
    );
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( '<p>%1$s <strong>$%2$s</strong></p>', esc_html__( 'Did you know that Wedding Theme sets a global variable for you? To access any of your saved options from within your code you can use your global variable:', 'wedding' ), $v );
    } else {
        $args['intro_text'] = sprintf( '<p>%1$s</p>', esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'wedding' ) );
    }
    // Add content after the form.
    $args['footer_text'] = '';
    Redux::setArgs( $opt_name, $args );
    /*
     * ---> END ARGUMENTS
     */
    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'wedding' ),
            'content' => sprintf( '<p>%1$s</p>', esc_html__( 'This is the tab content, HTML is allowed.', 'wedding' ) )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'wedding' ),
            'content' => sprintf( '<p>%1$s</p>', esc_html__( 'This is the tab content, HTML is allowed.', 'wedding' ) )
        )
    );
    //Redux::setHelpTab( $opt_name, $tabs );
    // Set the help sidebar
    $content = sprintf( '<p>%1$s</p>', esc_html__( 'This is the sidebar content, HTML is allowed.', 'wedding' ) );
    //Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */
    /*
     *
     * ---> START SECTIONS
     *
     */
    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
    // -> START General Settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'wedding' ),
        'id'     => 'general',
        'desc'   => '',
        'icon'   => 'el el-icon-dashboard',
        'fields' => array(
			array(
				'id'		=> 'zozo_disable_page_loader',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Page Loader', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_page_loader_img',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Custom Page Loader Image', 'wedding'),
				'desc'     	=> esc_html__( "Upload the custom page loader image.", "wedding" ),
				'required'  => array('zozo_disable_page_loader', 'equals', false),
			),
			array(
				'id'		=> 'zozo_enable_responsive',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Responsive Design', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_enable_rtl_mode',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable RTL Mode', 'wedding'),						
				'subtitle'  => esc_html__( "Enable this mode for right-to-left language mode.", "wedding" ),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			
			array(
				'id'		=> 'zozo_disable_opengraph',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Open Graph Meta Tags', 'wedding'),						
				'subtitle'  => esc_html__( "Disable open graph meta tags which is mainly used when sharing pages on social networking sites like Facebook.", "wedding" ),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
        )
    ) );
    // Logo
    Redux::setSection( $opt_name, array(
        'title' 	 => esc_html__('Logo', 'wedding'),
        'id'         => 'general-logo',
        'subsection' => true,
        'fields'     => array(
            array(
				'id'		=> 'zozo_logo',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Logo', 'wedding'),
				'desc'     	=> esc_html__( "Upload your website logo.", "wedding" ),
				'default' 	=> array(
					'url' 		=> WEDDING_THEME_URL . '',
					'width' 	=> '93',
					'height' 	=> '26'
				)
			),
			array(
				'id'		=> 'zozo_retina_logo',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Retina Logo', 'wedding'),
				'desc'     	=> esc_html__( "Upload the retina version of your logo.", "wedding" ),
			),
			array(
				'id'		=> 'zozo_logo_maxheight',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Logo Max Height', 'wedding'),
				'subtitle'  => esc_html__('This must be numeric (no px).', 'wedding'),
				'desc' 		=> esc_html__('You can set a max height for the logo here, and this will resize it on the front end if your logo image is bigger.', 'wedding'),
				'validate'  => 'numeric',
				'default'   => '100',
			),
			array(
				'id'       			=> 'zozo_logo_padding',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'right'         	=> false,
				'left'          	=> false,
				'units'         	=> array( 'px' ),
				'units_extended'	=> 'false',
				'title'    			=> esc_html__( 'Logo Padding', 'wedding' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for logo.', 'wedding' ),
			),
			array(
				'id'			=> 'zozo_sticky_logo',
				'type' 			=> 'media',
				'url'			=> false,
				'readonly' 		=> false,
				'title' 		=> esc_html__('Sticky Header Logo', 'wedding'),
				'desc'     		=> esc_html__( "Upload your sticky header logo.", "wedding" ),
				'default' 		=> array(
					'url' 		=> WEDDING_THEME_URL . '',
					'width' 	=> '93',
					'height' 	=> '26'
				)
			),
			array(
				'id'       			=> 'zozo_sticky_logo_padding',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'right'         	=> false,
				'left'          	=> false,
				'units'         	=> array( 'px' ),
				'units_extended'	=> 'false',
				'title'    			=> esc_html__( 'Sticky Logo Padding', 'wedding' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for sticky logo.', 'wedding' ),
			),
        )
    ) );
	
	// Icons
	if ( ! function_exists( 'wp_site_icon' ) ) {
			
	} else {
		Redux::setSection( $opt_name, array(
			'title' 	 => esc_html__('Icons', 'wedding'),
			'id'         => 'general-icons',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'		=> 'icons_info',
					'type' 		=> 'info',
					'title' 	=> esc_html__('Please use "Site Icon" feature for adding favicon and other apple icons in "Appearance > Customize > Site Identity > Site Icon"', 'wedding'),
					'notice' 	=> false
				),
			)
		) );
	}
	
	// Mailchimp
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('API Keys & Message Text', 'wedding'),
		'id'         => 'general-apikeys',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_google_map_api',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Google Map API Key', 'wedding'),
				'desc' 		=> wp_kses( __( 'Enter your Google Map API key to use google map with your site. Please follow this <a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key" target="_blank">link</a> to get API key.', 'wedding' ), wedding_expanded_allowed_tags() ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_mailchimp_api',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Mailchimp API Key', 'wedding'),
				'desc' 		=> esc_html__('Enter your Mailchimp API key to get subscribers for your lists.', 'wedding'),
				'default' 	=> ""
			),			
			array(
				'id'		=> 'zozo_mailchimp_success_message_api',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Mailchimp Success Message', 'wedding'),
				'desc' 		=> esc_html__('Mailchimp Success Message Text.', 'wedding'),
				'default' 	=> esc_html__( 'Success. You receive confirmation email to subscribe into our mailing lists.', 'wedding' )			
			),			
			array(
				'id'		=> 'zozo_mailchimp_subscription_error_message_api',	
				'type'     	=> 'text',		
				'title' 	=> esc_html__('Mailchimp Subscription Error Message', 'wedding'),		
				'desc' 		=> esc_html__('Mailchimp Subscription Error Message Text.', 'wedding'),	
				'default' 	=> esc_html__( 'Sorry. You already subscribed into our mailing lists.', 'wedding' )			
			),	
			array(		
				'id'		=> 'zozo_mailchimp_error_message_api',		
				'type'     	=> 'text',		
				'title' 	=> esc_html__('Mailchimp Error Message', 'wedding'),					
				'desc' 		=> esc_html__('Mailchimp Error Message Text.', 'wedding'),			
				'default' 	=> "Error. Please try again."			
			),
		)
	) );
	
	// Custom CSS
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Custom CSS', 'wedding'),
		'id'         => 'general-customcss',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_custom_css',
				'type' 		=> 'ace_editor',
				'title' 	=> esc_html__('Custom CSS Code', 'wedding'),
				'subtitle' 	=> esc_html__('Paste your CSS code here.', 'wedding'),
				'mode' 		=> 'css',
				'theme' 	=> 'monokai',
				'default' 	=> ""
			),
		)
	) );
	
	// Maintenance Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Maintenance', 'wedding' ),
        'id'     => 'maintenance',
        'desc'   => '',
        'icon'   => 'el el-icon-eye-close',
		'fields' => array(
			array(
				'id'		=> 'zozo_enable_maintenance',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable Maintenance Mode', 'wedding'),
				'subtitle' 	=> esc_html__('Enable the themes maintenance mode.', 'wedding'),
				'options'  	=> array(
					'0' 	=> esc_html__('Off', 'wedding'),
					'1' 	=> esc_html__('On ( Standard )', 'wedding'),
					'2' 	=> esc_html__('On ( Custom Page )', 'wedding'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'zozo_maintenance_mode_page',
				'type' 		=> 'select',
				'data' 		=> 'pages',
				'title' 	=> esc_html__('Custom Maintenance Mode Page', 'wedding'),
				'subtitle' 	=> esc_html__('Select the page that is your maintenance page, if you would like to show a custom page instead of the standard page from theme. You should use the Maintenance Page template for this page.', 'wedding'),
				'required'  => array('zozo_enable_maintenance', '=', '2'),
				'default' 	=> '',
				'args' 		=> array()
			),
			array(
				'id'		=> 'zozo_enable_coming_soon',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable Coming Soon Mode', 'wedding'),
				'subtitle' 	=> esc_html__('Enable the themes coming soon mode.', 'wedding'),
				'options'  	=> array(
					'0' 	=> esc_html__('Off', 'wedding'),
					'1' 	=> esc_html__('On ( Standard )', 'wedding'),
					'2' 	=> esc_html__('On ( Custom Page )', 'wedding'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'zozo_coming_soon_page',
				'type' 		=> 'select',
				'data' 		=> 'pages',
				'title' 	=> esc_html__('Custom Coming Soon Page', 'wedding'),
				'subtitle' 	=> esc_html__('Select the page that is your coming soon page, if you would like to show a custom page instead of the standard page from theme. You should use the Maintenance Page template for this page.', 'wedding'),
				'required'  => array('zozo_enable_coming_soon', '=', '2'),
				'default' 	=> '',
				'args' 		=> array()
			),
		)
	) );
	
	// Layout Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Layout', 'wedding' ),
        'id'     => 'layout',
        'desc'   => '',
        'icon'   => 'el el-icon-view-mode',
		'fields' => array(
			array(
				'id'		=> 'zozo_theme_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Theme Layout', 'wedding'),
				'options' 	=> array(
					'fullwidth' => array('alt' => esc_html__('Full Width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/full-width.jpg'),
					'boxed' 	=> array('alt' => esc_html__('Boxed', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/boxed.jpg'),
					'wide' 		=> array('alt' => esc_html__('Wide', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/wide.jpg'),
				),
				'default' 	=> 'fullwidth'
			),
			array(
				'id'		=> 'zozo_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Page Layout', 'wedding'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'            => 'zozo_fullwidth_site_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Container Max Width', 'wedding' ),
				'subtitle'      => esc_html__( 'Please choose container maximum width for fullwidth layout', 'wedding' ),
				'default'       => 1200,
				'min'           => 1100,
				'step'          => 5,
				'max'           => 1600,
				'required' 		=> array('zozo_theme_layout', 'equals', 'fullwidth'),
				'display_value' => 'text'
			),
			array(
				'id'            => 'zozo_boxed_site_width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Container Max Width', 'wedding' ),
				'subtitle'      => esc_html__( 'Please choose container maximum width for boxed layout', 'wedding' ),
				'default'       => 1200,
				'min'           => 1100,
				'step'          => 5,
				'max'           => 1600,
				'required' 		=> array('zozo_theme_layout', 'equals', 'boxed'),
				'display_value' => 'text'
			),
		)
	) );
	
	// Header Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'wedding' ),
        'id'     => 'header',
        'desc'   => '',
        'icon'   => 'el el-icon-website',
		'fields' => array(
			array(
				'id'		=> 'zozo_header_layout',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Layout', 'wedding'),
				'options'  	=> array(
					'fullwidth'	=> esc_html__( 'Full Width', 'wedding' ),
					'wide'		=> esc_html__( 'Wide', 'wedding' ),
					'boxed'		=> esc_html__( 'Boxed', 'wedding' ),
				),
				'default' 	=> 'fullwidth'
			),
			array(
				'id'		=> 'zozo_enable_header_top_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Header Top Bar', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sticky_header',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Sticky Header', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'       => 'enable_sticky_header_hide',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sticky header show/hide', 'wedding' ),
				'subtitle' => esc_html__( 'Enable the sticky header to hide once scrolled 800px down the page, and show on scroll up.', 'wedding' ),
				'desc'     => '',
				'options'  => array( '1' => esc_html__( 'On', 'wedding' ), '0' => esc_html__( 'Off', 'wedding' ) ),
				'required' => array('zozo_sticky_header', 'equals', true),
				'default'  => '0'
			),
		)
	) );
	
	// Header Type
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Header Type', 'wedding'),
		'id'         => 'header-headertype',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_header_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Skin', 'wedding'),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'wedding' ),
					'dark'		=> esc_html__( 'Dark', 'wedding' ),
				),
				'default' 	=> 'light'
			),
			array(
				'id'		=> 'zozo_header_transparency',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Transparency', 'wedding'),
				'options'  	=> array(
					'no-transparent'	=> esc_html__( 'No Transparency', 'wedding' ),
					'transparent'		=> esc_html__( 'Transparent', 'wedding' ),
					'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' ),
				),
				'default' 	=> 'no-transparent'
			),
			array(
				'id'		=> 'zozo_header_menu_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Header Menu Skin', 'wedding'),
				'options'  	=> array(
					'default'			=> esc_html__( 'Default', 'wedding' ),
					'light'				=> esc_html__( 'Light', 'wedding' ),
					'dark'				=> esc_html__( 'Dark', 'wedding' ),
					'semi-transparent'	=> esc_html__( 'Semi Transparent', 'wedding' ),
				),
				'default' 	=> 'default'
			),
			array(
				'id'		=> 'zozo_header_search_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Header Search Type', 'wedding'),
				'subtitle' 	=> esc_html__('Choose search style mode in header.', 'wedding'),
				'options'  	=> array(
					'0' 	=> esc_html__('Standard', 'wedding'),
					'1' 	=> esc_html__('Toggle', 'wedding'),
					'2' 	=> esc_html__('Fullscreen', 'wedding'),
				),
				'default'  => '1'
			),
			array(
				'id'		=> 'zozo_header_type',
				'type' 		=> 'image_select',
				'full_width'=> true,
				'title' 	=> esc_html__('Header Type', 'wedding'),
				'options' 	=> array(
					'header-1' 			=> array('alt' => esc_html__('Default Header', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/headers/header-01.jpg'),					
					'header-3' 			=> array('alt' => esc_html__('Header Center Logo', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/headers/header-03.jpg'),					
					'header-7' 			=> array('alt' => esc_html__('Header Centered Logo', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/headers/header-05.jpg'),					
					'header-11' 		=> array('alt' => esc_html__('Header Style 2', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/headers/header-07.jpg'),
				),
				'default' 	=> 'header-1'
			),
			// Header 1
			array(
				'id'       => 'zozo_header_1_elements_config',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Header Elements Config', 'wedding' ),
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 1. You can drag the items between enabled/disabled and also order them as you like.', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-1' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'wedding' ),
						'cart-icon'         => esc_html__( 'Cart', 'wedding' ),																		
					),
					'disabled' => array(
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),						
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'wedding' ),
						
					),
				),
			),
			array(
				'id'		=> 'zozo_header_1_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-1' )),
				'default' 	=> esc_html__('Header Text', 'wedding'),				
			),
			
			// Header 3
			array(
				'id'       => 'zozo_header_3_elements_config',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Header Elements Config', 'wedding' ),
				'subtitle' => esc_html__( 'Choose the elements for the header area for Header 3. You can drag the items between enabled/disabled and also order them as you like.', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-3' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'wedding' ),
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),						
					),
					'disabled' => array(
						'cart-icon'         => esc_html__( 'Cart', 'wedding' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'wedding' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_3_elements_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the config above set to Text/Shortcode', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-3' )),
				'default' 	=> esc_html__('Header Text', 'wedding'),
			),			
			
			
			// Header 11
			array(
				'id'       => 'zozo_header_11_logo_bar_config',
				'type'     => 'sorter',
				'title'    => 'Header Logo Bar Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header logo bar right area for Header 11. You can drag the items between enabled/disabled and also order them as you like.', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'options'  => array(
					'enabled'  => array(
						'address-info'		=> esc_html__( 'Address / Store Hours', 'wedding' ),
					),
					'disabled' => array(						
						'cart-icon'         => esc_html__( 'Cart', 'wedding' ),
						'primary-menu'		=> esc_html__( 'Primary Menu', 'wedding' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),						
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_11_logo_bar_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Logo Bar Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Logo Bar Header when you have the config above set to Text/Shortcode', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'default' 	=> esc_html__('Header Logo Bar Text', 'wedding'),
			),
			array(
				'id'       => 'zozo_header_11_left_config',
				'type'     => 'sorter',
				'title'    => 'Header Left Config',
				'subtitle' => esc_html__( 'Choose the elements for the header left area for Header 11. You can drag the items between enabled/disabled and also order them as you like.', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'options'  => array(
					'enabled'  => array(
						'primary-menu'		=> esc_html__( 'Primary Menu', 'wedding' ),
					),
					'disabled' => array(
						'cart-icon'			=> esc_html__( 'Cart', 'wedding' ),
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),						
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'wedding' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_11_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Left Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the left config above set to Text/Shortcode', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'default' 	=> esc_html__('Header Left Text', 'wedding'),
			),
			array(
				'id'       => 'zozo_header_11_right_config',
				'type'     => 'sorter',
				'title'    => 'Header Right Config',
				'subtitle' => esc_html__( 'Choose the elements for the header right area for Header 11. You can drag the items between enabled/disabled and also order them as you like.', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),
						'cart-icon'			=> esc_html__( 'Cart', 'wedding' ),
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),
					),
					'disabled' => array(						
						'primary-menu'		=> esc_html__( 'Primary Menu', 'wedding' ),
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),
						'address-info'		=> esc_html__( 'Address / Store Hours', 'wedding' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_11_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Right Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Header when you have the right config above set to Text/Shortcode', 'wedding' ),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-11' )),
				'default' 	=> esc_html__('Header Right Text', 'wedding'),
			),
			
			
			
			array(
				'id'		=> 'zozo_slider_position',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Slider Position', 'wedding'),
				'required' 	=> array('zozo_header_type', 'equals', array( 'header-1','header-3','header-7' )),
				'options'  	=> array(
					'below'		=> esc_html__( 'Below Header', 'wedding' ),
					'above'		=> esc_html__( 'Above Header', 'wedding' ),
				),
				'default' 	=> 'below'
			),			
		)
	) );
	
	// Header Top Bar
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Header Top Bar', 'wedding'),
		'id'         => 'header-headertopbar',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'zozo_header_top_bar_left',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Header Top Bar Left Config', 'wedding' ),
				'subtitle' => esc_html__( 'Choose the config for the header top bar left area', 'wedding' ),
				'required' => array('zozo_enable_header_top_bar', 'equals', true),
				'options'  => array(
					'enabled'  => array(
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),
					),
					'disabled' => array(
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),
						'top-menu'			=> esc_html__( 'Top Menu', 'wedding' ),						
						'welcome-msg'		=> esc_html__( 'Welcome Message', 'wedding' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_top_bar_left_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Top Bar Left Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Top Bar when you have the left config above set to Text/Shortcode', 'wedding' ),
				'default' 	=> esc_html__('Top Bar Left Text', 'wedding'),
			),
			array(
				'id'       => 'zozo_header_top_bar_right',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Header Top Bar Right Config', 'wedding' ),
				'subtitle' => esc_html__( 'Choose the config for the header top bar right area', 'wedding' ),
				'required' => array('zozo_enable_header_top_bar', 'equals', true),
				'options'  => array(
					'enabled'  => array(
						'social-icons'		=> esc_html__( 'Social Icons', 'wedding' ),
					),
					'disabled' => array(
						'contact-info'		=> esc_html__( 'Contact Info', 'wedding' ),
						'search-icon'		=> esc_html__( 'Search', 'wedding' ),
						'top-menu'			=> esc_html__( 'Top Menu', 'wedding' ),						
						'welcome-msg'		=> esc_html__( 'Welcome Message', 'wedding' ),
						'text-shortcode'	=> esc_html__( 'Text/Shortcode', 'wedding' ),
					),
				),
			),
			array(
				'id'		=> 'zozo_header_top_bar_right_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Top Bar Right Text', 'wedding'),
				'desc' 		=> esc_html__( 'You can use any shortcodes to set text on Top Bar when you have the right config above set to Text/Shortcode', 'wedding' ),
				'default' 	=> esc_html__('Top Bar Right Text', 'wedding'),
			),
			array(
				'id'		=> 'zozo_welcome_msg',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Welcome Message', 'wedding'),
				'desc' 		=> '',
				'default' 	=> esc_html__("Welcome to Wedding", "wedding"),
			),
			array(
				'id'		=> 'zozo_header_phone',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Phone Number', 'wedding'),
				'desc' 		=> esc_html__('Phone number will display in the contact info section.', 'wedding'),
				'default' 	=> "+12 123 456 789"
			),
			array(
				'id'		=> 'zozo_header_email',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Header Email Address', 'wedding'),
				'desc' 		=> esc_html__('Email address will display in the contact info section.', 'wedding'),
				'default' 	=> "info@yoursite.com"
			),
			array(
				'id'       => 'zozo_header_address',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Address', 'wedding' ),
				'default'  => '<strong>One Canada Square, </strong><span>Canary Wharf, United Kingdom.</span>'
			),
			array(
				'id'       => 'zozo_header_business_hours',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Business Hours', 'wedding' ),
				'default'  => '<strong>Monday-Friday: 9am to 5pm </strong><span>Saturday / Sunday: Closed</span>'
			),
		)
	) );
	
	// Header Styling Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Styling', 'wedding'),
		'id'         => 'header-styling',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       			=> 'zozo_header_spacing',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'units'         	=> array( 'em', 'px', '%' ),
				'units_extended'	=> 'true',
				'title'    			=> esc_html__( 'Header Padding', 'wedding' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for header.', 'wedding' ),
			),
		)
	) );
	
	// Header Menu Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Main Menu', 'wedding'),
		'id'         => 'header-mainmenu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_menu_type',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Menu Type', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Please select menu type.', 'wedding' ),
				'options'  	=> array(
					'standard'		=> esc_html__( 'Standard Menu', 'wedding' ),
					'megamenu'		=> esc_html__( 'Mega Menu', 'wedding' ),
				),
				'default'  	=> 'megamenu'
			),
			array(
				'id'		=> 'zozo_menu_separator',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Menu Separator', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'       	=> 'zozo_dropdown_menu_skin',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Dropdown Menu Skin', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Please select dropdown menu skin type.', 'wedding' ),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'wedding' ),
					'dark'		=> esc_html__( 'Dark', 'wedding' ),
				),
				'default'  	=> 'light'
			),
			array(
				'id'             => 'zozo_dropdown_menu_width',
				'type'           => 'dimensions',
				'units'          => array( 'em', 'px', '%' ),
				'units_extended' => 'true',
				'title'          => esc_html__( 'Dropdown Menu Width ( Only Standard Mode )', 'wedding' ),
				'subtitle'       => esc_html__( 'Enter dropdown menu width for standard mode.', 'wedding' ),
				'height'         => false,
				'default'        => array(
					'width'  => 220,
					'units'  => 'px',
				)
			),
			array(
				'id'             => 'zozo_menu_height',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',

				'title'          => esc_html__( 'Main Menu Height', 'wedding' ),
				'subtitle'       => esc_html__( 'Enter main menu height.', 'wedding' ),
				'width'         => false,
				'default'        => array(
					'height'  => 80,
					'units'   => 'px',
				)
			),
			array(
				'id'             => 'zozo_sticky_menu_height',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Sticky Main Menu Height', 'wedding' ),
				'subtitle'       => esc_html__( 'Enter main menu height in sticky.', 'wedding' ),
				'width'         => false,
				'default'        => array(
					'height'  => 60,
					'units'   => 'px',
				)
			),
			array(
				'id'		=> 'menu_height',
				'type' 		=> 'info',
				'title' 	=> esc_html__('If Header Type 4, 5, 6, 11', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'             => 'zozo_logo_bar_height',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Logo Bar Height', 'wedding' ),
				'subtitle'       => esc_html__( 'Enter logo bar height.', 'wedding' ),
				'width'         => false,
				'default'        => array(
					'height'  => 76,
					'units'   => 'px',
				)
			),
			array(
				'id'             => 'zozo_menu_height_alt',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Main Menu Height', 'wedding' ),
				'subtitle'       => esc_html__( 'Enter main menu height.', 'wedding' ),
				'width'         => false,
				'default'        => array(
					'height'  => 60,
					'units'   => 'px',
				)
			),
			array(
				'id'             => 'zozo_sticky_menu_height_alt',
				'type'           => 'dimensions',
				'units'          => 'px',
				'units_extended' => 'false',
				'title'          => esc_html__( 'Sticky Main Menu Height', 'wedding' ),
				'subtitle'       => esc_html__( 'Enter main menu height in sticky.', 'wedding' ),
				'width'         => false,
				'default'        => array(
					'height'  => 60,
					'units'   => 'px',
				)
			),
		)
	) );

	
	// Mobile Header Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Mobile Header', 'wedding' ),
        'id'     => 'mobile-header',
        'desc'   => '',
        'icon'   => 'el el-icon-iphone-home',
		'fields' => array(
			array(
				'id'		=> 'mobile_logo',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Mobile Logo', 'wedding'),
				'desc'     	=> esc_html__( "Upload an image or insert an image url to use for the mobile logo.", "wedding" ),
				'default' 	=> array(
					'url' 		=> '',
					'width' 	=> '',
					'height' 	=> ''
				)
			),
			array(
				'id' 		=> 'mobile_header_visible',
				'type' 		=> 'select',
				'title' 	=> esc_html__('Mobile Header Visiblity', 'wedding'),
				'subtitle' 	=> esc_html__('Select at what screen size the main header is replaced by the mobile header.', 'wedding'),
				'options' 	=> array(
					'tablet-land'	=> esc_html__( 'Tablet (Landscape)', 'wedding' ),
					'tablet-port'	=> esc_html__( 'Tablet (Portrait)', 'wedding' ),
					'mobile'  		=> esc_html__( 'Mobile', 'wedding' ),
				),
				'default' 	=> 'tablet-land'
			),
			array(
				'id'		=> 'sticky_mobile_header',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Mobile Sticky Header', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'       	=> 'mobile_header_layout',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Mobile Header Layout', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Choose the config for the layout of the mobile header.', 'wedding' ),
				'options'  	=> array(
					'left-logo'			=> esc_html__( 'Left Logo', 'wedding' ),
					'right-logo'		=> esc_html__( 'Right Logo', 'wedding' ),
					'center-logo'  		=> esc_html__( 'Center Logo (Menu Left)', 'wedding' ),
					'center-logo-alt'  	=> esc_html__( 'Center Logo (Menu Right)', 'wedding' ),
				),
				'default'  	=> 'left-logo'
			),
			array(
				'id'		=> 'mobile_top_text',
				'type'     	=> 'textarea',
				'title' 	=> esc_html__('Mobile Top Bar Text', 'wedding'),
				'subtitle' 	=> esc_html__( 'You can use any shortcodes or text to show above mobile header', 'wedding' ),
				'desc' 		=> esc_html__( 'Leave blank to hide.', 'wedding' ),
				'default' 	=> '',
			),
			array(
				'id'		=> 'mobile_show_search',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable search box', 'wedding'),
				'subtitle' 	=> esc_html__('Check this to show the search box in the mobile header.', 'wedding'),
				'options'  	=> array(
					'1' 	=> esc_html__('On', 'wedding'),
					'0' 	=> esc_html__('Off', 'wedding'),
				),
				'default'  => '1'
			),
			array(
				'id'		=> 'mobile_show_translation',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable translation options', 'wedding'),
				'subtitle' 	=> esc_html__('Check this to show the translation options in the mobile header. NOTE: WPML plugin is required for this.', 'wedding'),
				'options'  	=> array(
					'1' 	=> esc_html__('On', 'wedding'),
					'0' 	=> esc_html__('Off', 'wedding'),
				),
				'default'  => '0'
			),
			array(
				'id'		=> 'mobile_social_icons',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Enable mobile social icons', 'wedding'),
				'subtitle' 	=> esc_html__('Enable yes to show social icons on mobile menu warpper.', 'wedding'),
				'options'  	=> array(
					'1' 	=> esc_html__('On', 'wedding'),
					'0' 	=> esc_html__('Off', 'wedding'),
				),
				'default'  => '1'
			),
		)
	) );
	
		// Page Title Bar Settings
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Page Title Bar', 'wedding' ),
        'id'     => 'page-title-bar',
        'desc'   => '',
        'icon'   => 'el el-icon-indent-left',
		'fields' => array(
			array(
				'id'		=> 'zozo_enable_breadcrumbs',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Breadcrumbs', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			
			array(
				'id'		=> 'zozo_enable_page_title_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Page Title Bar', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			
			array(
				'id'		=> 'zozo_enable_page_title',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Page Title', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		
			array(
					'id'       	=> 'zozo_page_title_bar_type_new',
					'type'     	=> 'select',
					'title'    	=> esc_html__( 'Page Title Bar Type', 'wedding' ),
					'subtitle' 	=> esc_html__( 'Choose Page Title Bar Type.', 'wedding' ),					
					'options'  	=> array(
						'default'		=> esc_html__( 'Default', 'wedding' ),
						'mini'		=> esc_html__( 'Mini', 'wedding' ),
					),
					'default'  	=> 'default'
				),
				
			array(
					'id'       	=> 'zozo_page_title_bar_skin_new',
					'type'     	=> 'select',
					'title'    	=> esc_html__( 'Page Title Bar Skin', 'wedding' ),
					'subtitle' 	=> esc_html__( 'Choose Page Title Bar Skin.', 'wedding' ),					
					'options'  	=> array(
						'default'		=> esc_html__( 'Default', 'wedding' ),
						'dark'		=> esc_html__( 'Dark', 'wedding' ),
					),
					'default'  	=> 'default'
				),
				
			array(
					'id'       	=> 'zozo_page_title_alignment_new',
					'type'     	=> 'select',
					'title'    	=> esc_html__( 'Page Title Alignment', 'wedding' ),
					'subtitle' 	=> esc_html__( 'Choose Page Title Alignment.', 'wedding' ),					
					'options'  	=> array(
						'default'		=> esc_html__( 'Default', 'wedding' ),
						'right'		=> esc_html__( 'Right', 'wedding' ),
						
						'center'		=> esc_html__( 'Center', 'wedding' ),
					),
					'default'  	=> 'default'
				),	
				
			array(
				'id'		=> 'zozo_page_title_bar_height',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Page Title Bar Height', 'wedding'),
				'desc' 		=> esc_html__( 'Enter the height of the page title bar. In pixels ex: 120px.', 'wedding' ),
				'default' 	=> ""
			),
			
			array(
				'id'		=> 'zozo_page_title_bar_mobile_height',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Page Title Bar Mobile Height', 'wedding'),
				'desc' 		=> esc_html__( 'Enter the height of the page title bar on mobile. In pixels ex: 120px.', 'wedding' ),
				'default' 	=> ""
			),
			
			array(
				'id'       		=> 'zozo_page_title_color',
				'type'     		=> 'color',
				'title'    		=> esc_html__( 'Title Color', 'wedding' ),
				'validate' 		=> 'color',
				'transparent' 	=> false,
			),	
			
			array(
				'id'       		=> 'zozo_page_title_breadcrumbs_color',
				'type'     		=> 'color',
				'title'    		=> esc_html__( 'Breadcrumbs Color', 'wedding' ),
				'validate' 		=> 'color',
				'transparent' 	=> false,
			),
			
			array(
				'id'       		=> 'zozo_page_title_border_color',
				'type'     		=> 'color',
				'title'    		=> esc_html__( 'Border Color', 'wedding' ),
				'validate' 		=> 'color',
				'transparent' 	=> false,
			),
			
			array(
				'id'       		=> 'zozo_page_title_background_color',
				'type'     		=> 'color',
				'title'    		=> esc_html__( 'Background Color', 'wedding' ),
				'validate' 		=> 'color',
				'transparent' 	=> false,
			),
			
			array(
				'id'		=> 'zozo_page_title_background_image',
				'type' 		=> 'media',
				'url'		=> false,
				'readonly' 	=> false,
				'title' 	=> esc_html__('Background Image', 'wedding'),
				'desc'     	=> esc_html__( "Upload your background image.", "wedding" ),
			),
			
			array(
					'id'       	=> 'zozo_page_title_background_image_repeat',
					'type'     	=> 'select',
					'title'    	=> esc_html__( 'Background Repeat', 'wedding' ),										
					'options'  	=> array(
						'repeat'		=> esc_html__( 'Repeat', 'wedding' ),
						'repeat-x'		=> esc_html__( 'Repeat-x', 'wedding' ),
						
						'repeat-y'		=> esc_html__( 'Repeat-y', 'wedding' ),
						
						'no-repeat'		=> esc_html__( 'No Repeat', 'wedding' ),
					),
					'default'  	=> 'repeat'
				),	
				
			array(
					'id'       	=> 'zozo_page_title_background_position',
					'type'     	=> 'select',
					'title'    	=> esc_html__( 'Background Position', 'wedding' ),										
					'options'  	=> array(
						'left top'		=> esc_html__( 'Left Top', 'wedding' ),
						'left center'		=> esc_html__( 'Left Center', 'wedding' ),
						
						'left bottom'		=> esc_html__( 'Left Bottom', 'wedding' ),
						
						'center top'		=> esc_html__( 'Center Top', 'wedding' ),
						'center center'		=> esc_html__( 'Center Center', 'wedding' ),
						
						'center bottom'		=> esc_html__( 'Center Bottom', 'wedding' ),
						
						'right top'		=> esc_html__( 'Right Top', 'wedding' ),
						'right center'		=> esc_html__( 'Right Center', 'wedding' ),
						
						'right bottom'		=> esc_html__( 'Right Bottom', 'wedding' ),
					),
					'default'  	=> 'left top'
				),	
				
				array(
				'id'		=> 'zozo_page_title_parallax_bg_image',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Parallax Background Image', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			    ),
				
				array(
				'id'		=> 'zozo_page_title_scale_bg_image',
				'type' 		=> 'checkbox',
				'title' 	=> esc_html__('100% Scale Background Image', 'wedding'),
				'default' 	=> '0',				
			    ),
				
				array(
				'id'		=> 'zozo_page_title_video_bg',
				'type' 		=> 'checkbox',
				'title' 	=> esc_html__('Enable Video Background ?', 'wedding'),
				'default' 	=> '0',				
			    ),
				
				array(
				'id'		=> 'zozo_page_title_video_bg_id',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Video ID', 'wedding'),
				'desc' 		=> esc_html__( 'Enter video id. ex:GHRv565gfg', 'wedding' ),
				'default' 	=> ""
			),		
					
		)
	) );
	
	
	// Footer Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'wedding' ),
        'id'     => 'footer',
        'desc'   => '',
        'icon'   => 'el el-icon-website',
		'fields' => array(
			array(
				'id'		=> 'zozo_copyright_bar_enable',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Copyright Bar', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'       => 'zozo_copyright_text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Copyright Text', 'wedding' ),
				'desc'     => esc_html__( 'Enter an copyright text to show on footer. Use [year] shortcode to display current year.', 'wedding' ),				
				'default'  => sprintf( wp_kses( __( 'Designed by <a href="%s">zozothemes.com</a>', 'wedding' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( "http://themes.zozothemes.com/" ) )
			),
			array(
				'id'		=> 'zozo_footer_widgets_enable',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Footer Widgets', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_enable_back_to_top',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Back To Top', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'       	=> 'zozo_back_to_top_position',
				'type'     	=> 'select',
				'title'    	=> esc_html__( 'Back To Top Position', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Choose Back To Top position in footer.', 'wedding' ),
				'required' 	=> array('zozo_enable_back_to_top', 'equals', true),
				'options'  	=> array(
					'floating_bar'		=> esc_html__( 'Floating Style', 'wedding' ),
					'footer_top'		=> esc_html__( 'In Footer Top', 'wedding' ),
				),
				'default'  	=> 'floating_bar'
			),
			array(
				'id'		=> 'zozo_enable_footer_menu',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Footer Menu', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Footer Type
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Footer Type', 'wedding'),
		'id'         => 'footer-footertype',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_footer_copyright_align',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Footer Copyright Bar Align', 'wedding'),
				'options'  	=> array(
					'left'		=> esc_html__( 'Left', 'wedding' ),
					'center'	=> esc_html__( 'Center', 'wedding' ),
				),
				'default' 	=> 'left'
			),
			array(
				'id'		=> 'zozo_footer_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Footer Skin', 'wedding'),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'wedding' ),
					'dark'		=> esc_html__( 'Dark', 'wedding' ),
				),
				'default' 	=> 'light'
			),
			array(
				'id'		=> 'zozo_footer_style',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Footer Style', 'wedding'),
				'options'  	=> array(
					'default'	=> esc_html__( 'Normal', 'wedding' ),
					'sticky'	=> esc_html__( 'Sticky', 'wedding' ),					
				),
				'default' 	=> 'default'
			),
			array(
				'id'		=> 'zozo_footer_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Footer Type', 'wedding'),
				'options' 	=> array(
					'footer-1' 			=> array('alt' => esc_html__('Default Footer', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-01.jpg'),
					'footer-2' 			=> array('alt' => esc_html__('Footer 3 Column', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-02.jpg'),
					'footer-3' 			=> array('alt' => esc_html__('Footer 3 Column Centered', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-03.jpg'),
					'footer-8' 			=> array('alt' => esc_html__('Footer 3 Column Alt', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-08.jpg'),
					'footer-4' 			=> array('alt' => esc_html__('Footer 2 Column', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-04.jpg'),
					'footer-5' 			=> array('alt' => esc_html__('Footer 2 Column Large', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-05.jpg'),
					'footer-6' 			=> array('alt' => esc_html__('Footer 2 Column Large', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-06.jpg'),							
					'footer-7' 			=> array('alt' => esc_html__('Footer One Column', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/footers/footer-07.jpg'),
				),
				'default' 	=> 'footer-7'
			),
		)
	) );
	
	// Footer Styling Options
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Styling', 'wedding'),
		'id'         => 'footer-styling',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       			=> 'zozo_footer_spacing',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'units'         	=> array( 'em', 'px', '%' ),
				'units_extended'	=> 'true',
				'title'    			=> esc_html__( 'Footer Widgets Padding', 'wedding' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for footer widgets section.', 'wedding' ),
			),
			array(
				'id'       			=> 'zozo_footer_copyright_spacing',
				'type'     			=> 'spacing',
				'mode'     			=> 'padding',
				'units'         	=> array( 'em', 'px', '%' ),
				'units_extended'	=> 'true',
				'title'    			=> esc_html__( 'Footer Copyright Bar Padding', 'wedding' ),
				'subtitle' 			=> esc_html__( 'Choose the spacing for footer copyright bar.', 'wedding' ),
			),
		)
	) );
	
	// Typography Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'wedding' ),
        'id'     => 'typography',
        'desc'   => '',
        'icon'   => 'el el-icon-text-height',
		'fields' => array(
			array(
				'id'       		=> 'zozo_body_font',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Body Font', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the body font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'font-weight'  	=> true,
				'font-style'  	=> false,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '14px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '300',
					'font-style'  => '',
					'line-height' => '28px',
				),
			),
			array(
				'id'       		=> 'zozo_h1_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H1 Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the H1 font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '45px',
					'font-family' => 'Niconne',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '42px',
				),
			),
			array(
				'id'       		=> 'zozo_h2_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H2 Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the H2 font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '33px',
					'font-family' => 'Niconne',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '40px',
				),
			),
			array(
				'id'       		=> 'zozo_h3_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H3 Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the H3 font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '22px',
					'font-family' => 'Niconne',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '29px',
				),
			),
			array(
				'id'       		=> 'zozo_h4_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H4 Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the H4 font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '24px',
					'font-family' => 'Niconne',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '29px',
				),
			),
			array(
				'id'       		=> 'zozo_h5_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H5 Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the H5 font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '17px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '28px',
				),
			),
			array(
				'id'       		=> 'zozo_h6_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'H6 Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the H6 font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '14px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '300',
					'font-style'  => '',
					'line-height' => '28px',
				),
			),
		)
	) );
	
	// Menu Typography
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Menu', 'wedding'),
		'id'         => 'typography-menu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       		=> 'zozo_top_menu_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Top Menu Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Top menu font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '12px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '12px',
				),
			),
			array(
				'id'       		=> 'zozo_menu_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Main Menu Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Main menu font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'line-height'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '13px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '500',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_submenu_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Sub Menu Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Sub menu font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '13px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '20px',
				),
			),
		)
	) );
	
	// Title Typography
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Page/Post', 'wedding'),
		'id'         => 'typography-title',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       		=> 'zozo_single_post_title_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Page/Post Title Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Page/Post font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '25px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '35px',
				),
			),
			array(
				'id'       		=> 'zozo_post_title_font_styles',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Blog Archive Title Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Blog Archive Title font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '25px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
					'line-height' => '24px',
				),
			),
		)
	) );
	
	// Widgets Typography
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Widgets', 'wedding'),
		'id'         => 'typography-widgets',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       		=> 'zozo_widget_title_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Widget Title Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Widget Title font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '17px',
					'line-height' => '20px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_widget_text_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Widget Text Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Widget Text font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '15px',
					'line-height' => '28px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_footer_widget_title_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Footer Widget Title Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Footer Widget Title font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '17px',
					'line-height' => '20px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '',
					'font-style'  => '',
				),
			),
			array(
				'id'       		=> 'zozo_footer_widget_text_fonts',
				'type'     		=> 'typography',
				'title'    		=> esc_html__( 'Footer Widget Text Font Style', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Footer Widget Text font properties.', 'wedding' ),
				'google'   		=> true,
				'subsets'  		=> true,
				'all_styles'  	=> true,
				'text-align'	=> false,
				'default'  		=> array(
					'color'       => '',
					'font-size'   => '15px',
					'line-height' => '28px',
					'font-family' => 'Poppins',
					'google'      => true,
					'font-weight' => '400',
					'font-style'  => '',
				),
			),
		)
	) );
	
	// Skin Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Skin', 'wedding' ),
        'id'     => 'skin',
        'desc'   => '',
        'icon'   => 'el el-icon-broom',
		'fields' => array(
			array(
				'id'		=> 'zozo_theme_skin',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Theme Skin', 'wedding'),
				'options'  	=> array(
					'light'		=> esc_html__( 'Light', 'wedding' ),
				),
				'default' 	=> 'light'
			),
			array(
				'id'       		=> 'zozo_custom_scheme_color',
				'type'     		=> 'color',
				'title'    		=> esc_html__( 'Custom Color Scheme', 'wedding' ),
				'validate' 		=> 'color',
				'transparent' 	=> false,
				'default' 	=> '#b378d4'
			),
			array(
				'id'       		=> 'zozo_custom_color_skin',
				'type'     		=> 'link_color',
				'title'    		=> esc_html__( 'Custom Color Skin', 'wedding' ),
				'subtitle' 		=> esc_html__( 'Specify the Color when Custom Color Scheme works as background color.', 'wedding' ),
				'active'   		=> false,
				'default'  		=> array(
					'regular' 	=> '',
					'hover'   	=> '',							
				)
			),
			array(
				'id'       => 'zozo_link_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Link Color', 'wedding' ),
				'subtitle' => esc_html__( 'Choose link color.', 'wedding' ),
				'active'   => false,
				'default'  => array(
					'regular' => '#b378d4',
					'hover'   => '',
				)
			),
		)
	) );
	
	// Body/Page Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Body/Page', 'wedding'),
		'id'         => 'skin-bodypage',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_body_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Body Background', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Body background with image, color, etc.', 'wedding' ),
			),
			array(
				'id'       	=> 'zozo_page_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Page Background', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Page background with image, color, etc.', 'wedding' ),
			),
		)
	) );
	
	// Header Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Header', 'wedding'),
		'id'         => 'skin-header',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_header_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Header Background', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Header background with image, color, etc.', 'wedding' ),
				'default' 	=> ''
			),
			array(
				'id'       	=> 'zozo_sticky_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Sticky Background', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Sticky background with image, color, etc.', 'wedding' ),
				'default' 	=> ''
			),
			array(
				'id'       => 'zozo_header_top_background_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Header Top Background Color', 'wedding' ),
				'default'  => '',
				'validate' => 'color',
			),
			array(
				'id'       => 'zozo_sliding_background_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sliding Bar Background Color', 'wedding' ),
				'default'  => '',
				'validate' => 'color',
			),
		)
	) );
	
	// Menu Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Menu', 'wedding'),
		'id'         => 'skin-menu',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'menu_hover',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Menu Hover Colors', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'       => 'zozo_top_menu_hcolor',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Top Menu Link Color', 'wedding' ),
				'subtitle' => esc_html__( 'Choose Top Menu link hover color.', 'wedding' ),
				'regular'   => false,
				'active'   => false,
				'default'  => array(
					'hover'   => '',							
				)
			),
			array(
				'id'       => 'zozo_main_menu_hcolor',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Main Menu Link Hover Color', 'wedding' ),
				'subtitle' => esc_html__( 'Choose Main Menu link hover color.', 'wedding' ),
				'regular'   => false,
				'active'   => false,
				'default'  => array(
					'hover'   => '',							
				)
			),
			array(
				'id'		=> 'submenu_hover',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Menu Dropdown', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_submenu_show_border',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Border', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id' 		=> 'zozo_main_submenu_border',
				'type' 		=> 'border',
				'all' 		=> false,
				'title' 	=> esc_html__( 'Dropdown Menu Border', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Enter border for menu dropdown.', 'wedding' ),
				'required' 	=> array('zozo_submenu_show_border', 'equals', true),
				'default' 	=> array(
					'border-color'  => '',
					'border-style'  => 'solid',
					'border-top'    => '3px',
					'border-right'  => '0px',
					'border-bottom' => '0px',
					'border-left'   => '0px'
				)
			),
			array(
				'id'       => 'zozo_submenu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Color', 'wedding' ),
				'default'  => '#ffffff',
				'validate' => 'color',
			),
			array(
				'id'       => 'zozo_sub_menu_hcolor',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Sub Menu Link Color', 'wedding' ),
				'subtitle' => esc_html__( 'Choose Sub Menu link hover color.', 'wedding' ),
				'regular'   => false,
				'active'   => false,
				'default'  => array(
					'hover'   => '',							
				)
			),
			array(
				'id'       => 'zozo_submenu_hbg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Link Hover Background Color', 'wedding' ),
				'default'  => '',
				'validate' => 'color',
			),
		)
	) );
	
	// Footer Background
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Footer', 'wedding'),
		'id'         => 'skin-footer',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       	=> 'zozo_footer_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Footer Background', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Footer background with image, color, etc.', 'wedding' ),
				'default'  => '',
			),
			array(
				'id'       	=> 'zozo_footer_copy_bg_image',
				'type'     	=> 'background',
				'title'    	=> esc_html__( 'Footer Copyright Background', 'wedding' ),
				'subtitle' 	=> esc_html__( 'Footer copyright bar background with image, color, etc.', 'wedding' ),
				'default'  => '',
			),
		)
	) );
	
	// Social Colors
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Social', 'wedding'),
		'id'         => 'skin-social',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'zozo_social_bg_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Social Icon Background Color', 'wedding' ),
				'subtitle' => esc_html__( 'Choose Social Icon Background color and hover color.', 'wedding' ),
				'active'   => false,
				'default'  => array(
					'regular' => '',
					'hover'   => '',							
				)
			),
			array(
				'id'       => 'zozo_social_icon_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Social Icon Color', 'wedding' ),
				'subtitle' => esc_html__( 'Choose Social Icon color and hover color.', 'wedding' ),
				'active'   => false,
				'default'  => array(
					'regular' => '',
					'hover'   => '',							
				)
			),
		)
	) );
	
	// Social Icons
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social', 'wedding' ),
        'id'     => 'social',
        'desc'   => '',
        'icon'   => 'el el-icon-link',
		'fields' => array(
			array(
				'id'		=> 'zozo_social_icon_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Icon Type', 'wedding'),
				'options' 	=> array(
					'circle' 		=> array('alt' => esc_html__('Circle', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/circle-icon.jpg'),
					'flat' 			=> array('alt' => esc_html__('Square', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/flat-icon.jpg'),
					'rounded' 		=> array('alt' => esc_html__('Rounded', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/rounded-icon.jpg'),
					'transparent' 	=> array('alt' => esc_html__('Transparent', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/transparent-icon.jpg'),
				),
				'default' 	=> 'transparent'
			),
			array(
				'id'		=> 'zozo_facebook_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Facebook', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Facebook icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'zozo_twitter_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Twitter', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Twitter icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'zozo_linkedin_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('LinkedIn', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for LinkedIn icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_pinterest_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Pinterest', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Pinterest icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'zozo_googleplus_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Google Plus+', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Google Plus+ icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_youtube_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Youtube', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Youtube icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_rss_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('RSS', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for RSS icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_tumblr_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Tumblr', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Tumblr icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_reddit_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Reddit', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Reddit icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_dribbble_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Dribbble', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Dribbble icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_digg_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Digg', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Digg icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_flickr_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Flickr', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Flickr icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_instagram_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Instagram', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Instagram icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'zozo_vimeo_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Vimeo', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Vimeo icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_skype_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Skype', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Skype icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_blogger_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Blogger', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Blogger icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_yahoo_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Yahoo', 'wedding'),
				'desc' 		=> esc_html__('Enter the link for Yahoo icon to appear. To remove it, just leave it blank.', 'wedding'),
				'default' 	=> ""
			),
		)
	) );
	
	// Portfolio
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Portfolio', 'wedding' ),
        'id'     => 'portfolio',
        'desc'   => '',
        'icon'   => 'el el-icon-picture',
		'fields' => array(
			array(
				'id'		=> 'zozo_portfolio_archive_count',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Number of Portfolio Items Per Page', 'wedding'),
				'desc' 		=> esc_html__('Enter the number of posts to display per page in archive/category.', 'wedding'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_portfolio_archive_layout',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Portfolio Archive/Category Layout', 'wedding'),
				'options'  	=> array(
					'grid'		=> esc_html__( 'Grid', 'wedding' ),
					'classic'	=> esc_html__( 'Classic', 'wedding' ),
				),
				'default' 	=> 'grid'
			),
			array(
				'id'		=> 'zozo_portfolio_archive_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Portfolio Columns', 'wedding'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'wedding'),
					'3' 		=> esc_html__('3 Columns', 'wedding'),
					'4' 		=> esc_html__('4 Columns', 'wedding')
				),
				'default' 	=> '4'
			),
			array(
				'id'		=> 'zozo_portfolio_archive_gutter',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Items Spacing', 'wedding'),
				'desc' 		=> esc_html__('Enter gap size between portfolio items. Only enter number Ex: 10', 'wedding'),
				'default' 	=> "30"
			),
			array(
				'id'		=> 'portfolio_details_text',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Portfolio Details', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_portfolio_category_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Category Label', 'wedding'),
				'desc' 		=> esc_html__('Change Category label to show in portfolio details.', 'wedding'),
				'default' 	=> esc_html__('Category:', 'wedding')
			),

			array(
				'id'		=> 'zozo_portfolio_tag_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Tag Label', 'wedding'),
				'desc' 		=> esc_html__('Change Tag label to show in portfolio details.', 'wedding'),
				'default' 	=> esc_html__('Tags:', 'wedding')
			),
			array(
				'id'		=> 'zozo_portfolio_client_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Client Label', 'wedding'),
				'desc' 		=> esc_html__('Change Client label to show in portfolio details.', 'wedding'),
				'default' 	=> esc_html__('Client:', 'wedding')
			),
			array(
				'id'		=> 'zozo_portfolio_date_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Date Label', 'wedding'),
				'desc' 		=> esc_html__('Change Date label to show in portfolio details.', 'wedding'),
				'default' 	=> esc_html__('Date:', 'wedding')
			),
			array(
				'id'		=> 'zozo_portfolio_estimation_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Estimation Label', 'wedding'),
				'desc' 		=> esc_html__('Change Estimation label to show in portfolio details.', 'wedding'),
				'default' 	=> esc_html__('Estimation:', 'wedding')
			),
			array(
				'id'		=> 'zozo_portfolio_duration_label',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Duration Label', 'wedding'),
				'desc' 		=> esc_html__('Change Duration label to show in portfolio details.', 'wedding'),
				'default' 	=> esc_html__('Duration:', 'wedding')
			),
			array(
				'id'		=> 'zozo_portfolio_prev_next',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Post Navigation', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_portfolio_related_slider',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Related Works Slider', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_portfolio_related_title',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Related Works Slider Title', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "Related Projects"
			),
			array(
				'id'		=> 'zozo_portfolio_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_portfolio_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_portfolio_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_portfolio_cmobile_land',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_portfolio_cmobile',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_portfolio_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> "20"
			),
			array(
				'id'		=> 'zozo_portfolio_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Autoplay', 'wedding'),
				'default' 	=> true,
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_portfolio_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'required' 	=> array('zozo_portfolio_cautoplay', 'equals', true),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_portfolio_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Infinite Loop', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_portfolio_cpagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Pagination', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_portfolio_cnavigation',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Navigation', 'wedding'),
				'required' 	=> array('zozo_portfolio_related_slider', 'equals', true),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Services
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Services', 'wedding' ),
        'id'     => 'services',
        'desc'   => '',
        'icon'   => 'el el-icon-star-empty',
		'fields' => array(
			array(
				'id'		=> 'zozo_service_archive_count',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Number of Service Items Per Page', 'wedding'),
				'desc' 		=> esc_html__('Enter the number of posts to display per page in archive/category.', 'wedding'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_service_archive_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Service Columns', 'wedding'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'wedding'),
					'3' 		=> esc_html__('3 Columns', 'wedding'),
					'4' 		=> esc_html__('4 Columns', 'wedding')
				),
				'default' 	=> '4'
			),
			array(
				'id'		=> 'icons_service_info',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Services Slider Configuration', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_service_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cmobile_land',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cmobile',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_service_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Autoplay', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_service_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_service_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Infinite Loop', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_service_cpagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Pagination', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_service_cnavigation',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Navigation', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Casestudies
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Case Studies', 'wedding' ),
        'id'     => 'casestudies',
        'desc'   => '',
        'icon'   => 'el el-icon-search-alt',
		'fields' => array(
			array(
				'id'		=> 'zozo_casestudy_archive_count',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Number of Case Study Items Per Page', 'wedding'),
				'desc' 		=> esc_html__('Enter the number of posts to display per page in archive/category.', 'wedding'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_casestudy_archive_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Case Study Columns', 'wedding'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'wedding'),
					'3' 		=> esc_html__('3 Columns', 'wedding'),
					'4' 		=> esc_html__('4 Columns', 'wedding')
				),
				'default' 	=> '4'
			),
			array(
				'id'		=> 'icons_casestudy_info',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Case Studies Slider Configuration', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_casestudy_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_casestudy_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_casestudy_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_casestudy_cmobile_land',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_casestudy_cmobile',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_casestudy_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_casestudy_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Autoplay', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_casestudy_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_casestudy_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Infinite Loop', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_casestudy_cpagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Pagination', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_casestudy_cnavigation',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Navigation', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	
	// Post
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Post', 'wedding' ),
        'id'     => 'post',
        'desc'   => '',
        'icon'   => 'el el-icon-file',
		'fields' => array(
			array(
				'id'		=> 'zozo_disable_blog_pagination',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Scroll', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_read_more_text',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Read More Button Text', 'wedding'),
				'desc' 		=> esc_html__('Enter the custom read more button text.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'blog_excerpt_length',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Excerpt Length', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_blog_excerpt_length_large',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Large Layout', 'wedding'),
				'desc' 		=> esc_html__('Enter the excerpt length for blog style large.', 'wedding'),
				'default' 	=> "80"
			),
			array(
				'id'		=> 'zozo_blog_excerpt_length_grid',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Grid Layout', 'wedding'),
				'desc' 		=> esc_html__('Enter the excerpt length for blog style grid.', 'wedding'),
				'default' 	=> "10"
			),
			array(
				'id'		=> 'zozo_blog_excerpt_length_list',
				'type'     	=> 'text',
				'title' 	=> esc_html__('List Layout', 'wedding'),
				'desc' 		=> esc_html__('Enter the excerpt length for blog style list.', 'wedding'),
				'default' 	=> "30"
			),
			array(
				'id'		=> 'gallery_slider',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Blog Gallery Slider', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_blog_slideshow_autoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Autoplay for Gallery Slider', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_slideshow_timeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'required' 	=> array('zozo_blog_slideshow_autoplay', 'equals', true),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'post_meta',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Blog Post Meta', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_blog_date_format',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Post Meta Date Format', 'wedding'),
				"desc" 		=> "Enter post meta date format. Refer formats from <a href='http://codex.wordpress.org/Formatting_Date_and_Time'>Formatting Date and Time</a>",
				'default' 	=> "d.m.Y"
			),
			array(
				'id'		=> 'zozo_blog_post_featured_image',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Featured Image', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_author',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Author', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_date',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Date', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_categories',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Categories', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_post_meta_comments',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Post Meta Comments', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_read_more',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Disable Read More Link', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Blog Archive
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Blog Archive', 'wedding'),
		'id'         => 'post-blogarchive',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_blog_archive_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Archive Layout', 'wedding'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-left.png'),
				),
				'default' 	=> 'two-col-right'
			),
			array(
				'id'		=> 'zozo_archive_blog_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Post Layout', 'wedding'),
				'options' 	=> array(
					'large' 	=> array('alt' => esc_html__('Large Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-large.jpg'),
					'list' 		=> array('alt' => esc_html__('List Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-list.jpg'),
					'grid' 		=> array('alt' => esc_html__('Grid Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-grid.jpg'),					
				),
				'default' 	=> 'large'
			),
			array(
				'id'		=> 'zozo_archive_blog_grid_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Grid Columns', 'wedding'),
				'required' 	=> array('zozo_archive_blog_type', 'equals', 'grid'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'wedding'),
					'three' 	=> esc_html__('3 Columns', 'wedding'),
					'four' 		=> esc_html__('4 Columns', 'wedding')
				),
				'default' 	=> 'two'
			),
			array(
				'id'		=> 'zozo_show_archive_featured_slider',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Featured Post Slider', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Blog
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Blog', 'wedding'),
		'id'         => 'post-blog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_blog_page_title_bar',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Page title bar for Blog', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_title',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Blog Page Title', 'wedding'),	
				'desc' 		=> esc_html__('Blog Page Title for the main blog page.', 'wedding'),
				'default' 	=> "Our Blog"
			),
			array(
				'id'		=> 'zozo_blog_slogan',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Blog Page Slogan', 'wedding'),	
				'desc' 		=> esc_html__('Blog Page Slogan for the main blog page.', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_blog_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Blog Layout', 'wedding'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-left.png'),
				),
				'default' 	=> 'two-col-right'
			),
			array(
				'id'		=> 'zozo_blog_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Post Layout', 'wedding'),
				'options' 	=> array(
					'large' 	=> array('alt' => esc_html__('Large Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-large.jpg'),
					'list' 		=> array('alt' => esc_html__('List Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-list.jpg'),
					'grid' 		=> array('alt' => esc_html__('Grid Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-grid.jpg'),					
				),
				'default' 	=> 'large'
			),
			array(
				'id'		=> 'zozo_blog_grid_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Grid Columns', 'wedding'),
				'required' 	=> array('zozo_blog_type', 'equals', 'grid'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'wedding'),
					'three' 	=> esc_html__('3 Columns', 'wedding'),
					'four' 		=> esc_html__('4 Columns', 'wedding')
				),
				'default' 	=> 'two'
			),
			array(
				'id'		=> 'zozo_show_blog_featured_slider',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Featured Post Slider', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Single Post Layout
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Single Post', 'wedding'),
		'id'         => 'post-single',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_single_post_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Single Post Layout', 'wedding'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/three-col-left.png'),
				),
				'default' 	=> 'two-col-right'
			),
			array(
				'id'		=> 'zozo_blog_social_sharing',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Social Sharing', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_author_info',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Author Info', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_blog_comments',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Comments', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'related_post_slider',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Related Posts Slider', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_show_related_posts',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Related Posts', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_related_blog_items',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_related_blog_items_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_related_blog_autoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Auto Play', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_related_blog_timeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_related_blog_loop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Loop', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_related_blog_margin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "30"
			),
			array(
				'id'		=> 'zozo_related_blog_tablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_related_blog_landscape',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_related_blog_portrait',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_related_blog_dots',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pagination', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_related_blog_nav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Navigation', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'required' 	=> array('zozo_show_related_posts', 'equals', true),
			),
			array(
				'id'		=> 'zozo_blog_prev_next',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Post Navigation', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'gallery_slider',
				'type' 		=> 'info',
				'title' 	=> esc_html__('Blog Gallery Slider', 'wedding'),
				'notice' 	=> false
			),
			array(
				'id'		=> 'zozo_single_blog_carousel',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Gallery Slider as Carousel globally ?', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_single_blog_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'wedding'),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_single_blog_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'wedding'),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_single_blog_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Auto Play', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_single_blog_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_single_blog_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Loop', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_single_blog_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_single_blog_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'wedding'),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_single_blog_cmlandscape',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'wedding'),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_single_blog_cmportrait',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'wedding'),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_single_blog_cdots',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pagination', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_single_blog_cnav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Navigation', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Featured Post Slider
	Redux::setSection( $opt_name, array(
		'title' 	 => esc_html__('Featured Post Slider', 'wedding'),
		'id'         => 'post-featuredpostslider',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'		=> 'zozo_featured_slider_type',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Featured Post Slider Display', 'wedding'),
				'options'  	=> array(
					'below_header' 		=> esc_html__('Below Header', 'wedding'),
					'above_content' 	=> esc_html__('Above Content', 'wedding'),
					'above_footer' 		=> esc_html__('Above Footer', 'wedding')
				),
				'default' 	=> 'below_header'
			),
			array(
				'id'		=> 'zozo_featured_posts_limit',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Featured Posts Limit', 'wedding'),						
				'default' 	=> "6"
			),
			array(
				'id'		=> 'zozo_featured_slider_citems',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Display', 'wedding'),						
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_featured_slider_citems_scroll',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items to Scrollby', 'wedding'),						
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_featured_slider_cautoplay',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Auto Play', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_featured_slider_ctimeout',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Timeout Duration (in milliseconds)', 'wedding'),
				'default' 	=> "5000"
			),
			array(
				'id'		=> 'zozo_featured_slider_cloop',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Infinite Loop', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_featured_slider_cmargin',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Margin ( Items Spacing )', 'wedding'),
				'default' 	=> ""
			),
			array(
				'id'		=> 'zozo_featured_slider_ctablet',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Tablet', 'wedding'),
				'default' 	=> "3"
			),
			array(
				'id'		=> 'zozo_featured_slider_cmlandscape',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Landscape', 'wedding'),
				'default' 	=> "2"
			),
			array(
				'id'		=> 'zozo_featured_slider_cmportrait',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Items To Display in Mobile Portrait', 'wedding'),
				'default' 	=> "1"
			),
			array(
				'id'		=> 'zozo_featured_slider_cdots',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pagination', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_featured_slider_cnav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Navigation', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Search Page
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Search Page', 'wedding' ),
        'id'     => 'search',
        'desc'   => '',
        'icon'   => 'el el-icon-search',
		'fields' => array(
			array(
				'id'		=> 'zozo_search_page_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Search Results Layout', 'wedding'),
				'options' 	=> array(
					'large' 	=> array('alt' => esc_html__('Large Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-large.jpg'),
					'list' 		=> array('alt' => esc_html__('List Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-list.jpg'),
					'grid' 		=> array('alt' => esc_html__('Grid Layout', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS . '/images/layouts/blog-grid.jpg'),					
				),
				'default' 	=> 'grid'
			),
			array(
				'id'		=> 'zozo_search_grid_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Grid Columns', 'wedding'),
				'required' 	=> array('zozo_search_page_type', 'equals', 'grid'),
				'options'  	=> array(
					'two' 		=> esc_html__('2 Columns', 'wedding'),
					'three' 	=> esc_html__('3 Columns', 'wedding'),
					'four' 		=> esc_html__('4 Columns', 'wedding')
				),
				'default' 	=> 'two'
			),			
			array(
				'id'		=> 'zozo_search_results_content',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Search Results Content', 'wedding'),
				'options'  	=> array(
					'both' 			=> esc_html__('Posts and Pages', 'wedding'),
					'only_posts' 	=> esc_html__('Only Posts', 'wedding'),
					'only_pages' 	=> esc_html__('Only Pages', 'wedding'),
				),
				'default' 	=> 'only_posts'
			),
		)
	) );
	
	// Social Sharing Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Share', 'wedding' ),
        'id'     => 'socialshare',
        'desc'   => '',
        'icon'   => 'el el-icon-share-alt',
		'fields' => array(
			array(
				'id'		=> 'zozo_sharing_facebook',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Facebook Share', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_twitter',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Twitter Share', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_linkedin',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable LinkedIn Share', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_googleplus',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Google Plus Share', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_pinterest',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Pinterest Share', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_tumblr',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Tumblr Share', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_reddit',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Reddit Share', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_digg',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Digg Share', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_sharing_email',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Email Share', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
		
	// Custom Post Type Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Custom Post Types', 'wedding' ),
        'id'     => 'customposttypes',
        'desc'   => '',
        'icon'   => 'el el-icon-adjust-alt',
		'fields' => array(
			array(
				'id' 		=> 'cpt_disable',
				'type' 		=> 'checkbox',
				'title' 	=> esc_html__('Disable Custom Post Types', 'wedding'),
				'subtitle' 	=> esc_html__('You can disable the custom post types used within the theme here, by checking the corresponding box.', 'wedding'),
				'options' 	=> array(
					'zozo_portfolio' 	=> esc_html__( 'Portfolio', 'wedding' ),
					'zozo_services' 	=> esc_html__( 'Services', 'wedding' ),
					'zozo_casestudies' 	=> esc_html__( 'Casestudies', 'wedding' ),
					'zozo_event' 	=> esc_html__( 'Event', 'wedding' ),
					'zozo_testimonial' 	=> esc_html__( 'Testimonials', 'wedding' ),
					'zozo_team_member' 	=> esc_html__( 'Team Member', 'wedding' )
				),
				'default' 	=> array(
					'zozo_portfolio' 	=> '0',
					'zozo_services' 	=> '0',
					'zozo_casestudies' 	=> '0',
					'zozo_event' 	=> '0',
					'zozo_testimonial' 	=> '0',
					'zozo_team_member' 	=> '0',
				)
			),
			array(
				'id'		=> 'portfolio_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Slug', 'wedding'),
				'subtitle' 	=> esc_html__('The slug name cannot be the same name as your portfolio page or the layout will break. This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'default' 	=> "portfolio"
			),
			array(
				'id'		=> 'portfolio_categories_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Categories Slug', 'wedding'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'default' 	=> "portfolio-categories"
			),
			array(
				'id'		=> 'portfolio_tags_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Portfolio Tags Slug', 'wedding'),
				'subtitle' 	=> esc_html__('This is portfolio tag slug.', 'wedding'),
				'default' 	=> "portfolio-tags"
			),
			array(
				'id'		=> 'services_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Services Slug', 'wedding'),
				'subtitle' 	=> esc_html__('The slug name cannot be the same name as your services page or the layout will break. This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "services"
			),
			array(
				'id'		=> 'service_categories_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Service Categories Slug', 'wedding'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "service-categories"
			),
			array(
				'id'		=> 'casestudies_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Case Studies Slug', 'wedding'),
				'subtitle' 	=> esc_html__('The slug name cannot be the same name as your casestudies page or the layout will break. This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "case-studies"
			),
			array(
				'id'		=> 'casestudy_categories_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Casestudy Categories Slug', 'wedding'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "case-study-categories"
			),
			array(
				'id'		=> 'event_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Event Slug', 'wedding'),
				'subtitle' 	=> esc_html__('The slug name cannot be the same name as your event page or the layout will break. This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "event"
			),
			array(
				'id'		=> 'event_categories_slug',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Event Categories Slug', 'wedding'),
				'subtitle' 	=> esc_html__('This option changes the permalink when you use the permalink type as %postname%.', 'wedding'),
				'desc' 		=> "<strong>Make sure to regenerate permalinks.</strong>",
				'default' 	=> "event-categories"
			),
		)
	) );
	
	// Woocommerce Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'wedding' ),
        'id'     => 'woocommerce',
        'desc'   => '',
        'icon'   => 'el el-icon-shopping-cart',
		'fields' => array(
			array(
				'id'		=> 'zozo_woo_enable_catalog_mode',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Catalog Mode', 'wedding'),
				'default' 	=> false,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'desc' 		=> esc_html__('Enable this setting to set the products into catalog mode, with no cart or checkout process.', 'wedding'),
			),
			array(
				'id'		=> 'zozo_woo_archive_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Product Archive Layout', 'wedding'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/three-col-left.png'),
				),
				'default' 	=> 'one-col'
			),
			array(
				'id'		=> 'zozo_woo_single_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__('Single Product Layout', 'wedding'),
				'options' 	=> array(
					'one-col' 			=> array('alt' => esc_html__('Full width', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/one-col.png'),
					'two-col-right' 	=> array('alt' => esc_html__('Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/two-col-right.png'),
					'two-col-left' 		=> array('alt' => esc_html__('Left Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/two-col-left.png'),
					'three-col-middle' 	=> array('alt' => esc_html__('Left and Right Sidebar', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/three-col-middle.png'),
					'three-col-right' 	=> array('alt' => esc_html__('Two Right Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/three-col-right.png'),
					'three-col-left' 	=> array('alt' => esc_html__('Two Left Sidebars', 'wedding'), 'img' => WEDDING_CORE_ADMIN_ASSETS.'/images/layouts/three-col-left.png'),
				),
				'default' 	=> 'two-col-right'
			),
			array(
				'id'		=> 'zozo_loop_products_per_page',
				'type'     	=> 'text',
				'title' 	=> esc_html__('Products Per Page', 'wedding'),
				'default' 	=> "9"
			),
			array(
				'id'		=> 'zozo_loop_shop_columns',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Product Columns', 'wedding'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Columns', 'wedding'),
					'3' 		=> esc_html__('3 Columns', 'wedding'),
					'4' 		=> esc_html__('4 Columns', 'wedding'),
					'5' 		=> esc_html__('5 Columns', 'wedding')
				),
				'default' 	=> '3'
			),
			array(
				'id'		=> 'zozo_related_products_count',
				'type'     	=> 'select',
				'title' 	=> esc_html__('Related Products Count', 'wedding'),
				'options'  	=> array(
					'2' 		=> esc_html__('2 Products', 'wedding'),
					'3' 		=> esc_html__('3 Products', 'wedding'),
					'4' 		=> esc_html__('4 Products', 'wedding'),
					'5' 		=> esc_html__('5 Products', 'wedding')
				),
				'default' 	=> '3'
			),
			array(
				'id'		=> 'zozo_woo_shop_ordering',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Enable Shop Page Ordering', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
			array(
				'id'		=> 'zozo_woo_social_sharing',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Show Woocommerce Social Sharing', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
			),
		)
	) );
	
	// Miscellaneous Options
	Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Miscellaneous', 'wedding' ),
        'id'     => 'miscellaneous',
        'desc'   => '',
        'icon'   => 'el el-icon-wrench',
		'fields' => array(
			array(
				'id'		=> 'zozo_remove_scripts_version',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Remove Version Parameter From JS & CSS Files', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'subtitle' 	=> esc_html__('Most scripts and style-sheets includes query string to identifying the version. This can cause issues with caching and such, which will result in less than optimal load times. You can enable this setting on to remove the query string from such strings.', 'wedding'),
			),
			array(
				'id'		=> 'zozo_minify_css',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Minify CSS', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'subtitle' 	=> esc_html__('This theme makes use of a lot of css styles, use this function to load a single minified file with all the required styles. Disable for testing purposes.', 'wedding'),
			),
			array(
				'id'		=> 'zozo_minify_js',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Minify JS', 'wedding'),
				'default' 	=> true,
				'on' 		=> esc_html__('Yes', 'wedding'),
				'off' 		=> esc_html__('No', 'wedding'),
				'subtitle' 	=> esc_html__('This theme makes use of a lot of js scripts, use this function to load a single minified file with all the required code. Disable for testing purposes.', 'wedding'),
			),
		)
	) );
    /*
     * <--- END SECTIONS
     */