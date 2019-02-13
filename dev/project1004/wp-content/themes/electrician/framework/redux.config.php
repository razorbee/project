<?php

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}

	// This is your option name where all the Redux data is stored.
    $opt_name = "electrician_option";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
   	$opt_prefix = 'electrician';

    $args = array(
		// TYPICAL -> Change these values as you need/desire
		'opt_name'             => $opt_name,
		// This is where your data is stored in the database and also becomes your global variable name.
		'display_name'         => $theme->get( 'Name' ),
		// Name that appears at the top of your panel
		'display_version'      => $theme->get( 'Version' ),
		// Version that appears at the top of your panel
		'menu_type'            => 'menu',
		//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
		'allow_sub_menu'       => true,
		// Show the sections below the admin menu item or not
		'menu_title'           => esc_html__('Electrician Options', 'electrician'),
		'page_title'           => esc_html__('Electrician Options', 'electrician'),
		// You will need to generate a Google API key to use this feature.
		// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
		'google_api_key'       => '',
		// Set it you want google fonts to update weekly. A google_api_key value is required.
		'google_update_weekly' => false,
		// Must be defined to add google fonts to the typography module
		'async_typography'     => false,
		// Use a asynchronous font on the front end or font string
		//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
		'admin_bar'            => true,
		// Show the panel pages on the admin bar
		'admin_bar_icon'       => 'dashicons-portfolio',
		// Choose an icon for the admin bar menu
		'admin_bar_priority'   => 50,
		// Choose an priority for the admin bar menu
		'global_variable'      => '',
		// Set a different name for your global variable other than the opt_name
		'dev_mode'             => false,
		// Show the time the page took to load, etc
		'update_notice'        => true,
		// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
		'customizer'           => false,
		// Enable basic customizer support
		//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
		//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
		// OPTIONAL -> Give you extra features
		'page_priority'        => null,
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
		'page_slug'            => '',
		// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
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
		// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
		// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
		'database'             => '',
		// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
		'use_cdn'              => true,
		'disable_google_fonts_link' => true,
		// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		// HINTS
		'hints'                => array(
			'icon'          => 'el el-question-sign',
			'icon_position' => 'right',
			'icon_color'    => 'lightgray',
			'icon_size'     => 'normal',
			'tip_style'     => array(
				'color'   => 'red',
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


	Redux::setArgs( $opt_name, $args );

	Redux::setSection( $opt_name, array(
		'title'            => esc_html__('Header Settings', 'electrician'),
		'id'               => 'header_settings',
		'desc'             => esc_html__('All header settings', 'electrician'),
		'customizer_width' => '400px',
		'icon'             => 'el el-website',
		'fields'           => array(
			array(
				'id'       => $opt_prefix.'-site-preloader',
				'type'     => 'switch',
				'title'    => esc_html__('Display preloader before page load', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable site preloader', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
			array(
				'id'       => $opt_prefix.'_site_preloader_image',
				'type'     => 'media',
				'url'       => true,
				'compiler'  => 'true',
                	'desc'      => esc_html__('Basic media uploader with disabled URL input field.', 'electrician'),
				'subtitle'  => esc_html__('Add/Upload preloader using the WordPress native uploader', 'electrician'),
				'title'    => esc_html__('Site Preloader', 'electrician'),
			),
			array(
				'id'       => $opt_prefix.'-site-sticky',
				'type'     => 'switch',
				'title'    => esc_html__('Sticky header', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable site sticky menu', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),

			array(
				'id'       => $opt_prefix.'-bolt-animation',
				'type'     => 'switch',
				'title'    => esc_html__('Display bolt animation before logo', 'electrician'),
				'subtitle' => esc_html__('Enable or disable bolt animation before logo', 'electrician'),
				'default'  => true,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
			array(
				'id'       => $opt_prefix.'-logo',
				'type'     => 'media',
				'url'       => true,
				'compiler'  => 'true',
                'desc'      => esc_html__('Basic media uploader with disabled URL input field.', 'electrician'),
				'subtitle'  => esc_html__('Add/Upload logo using the WordPress native uploader', 'electrician'),
				'title'    => esc_html__('Site Logo', 'electrician'),
				'default'     => array(
					'url'       => ELECTRICITY_THEME_URI . '/images/logo.png',
				),
			),
			array(
				'id'        => $opt_prefix.'-site-favicon',
				'type'      => 'media',
				'url'       => true,
				'title'     => esc_html__('Favicon URL', 'electrician'),
				'compiler'  => 'true',
				'desc'      => esc_html__('Set favicon for your theme', 'electrician'),
				'subtitle'  => esc_html__('Upload favicon for the theme', 'electrician'),
				'default'   => array('url' => ELECTRICITY_THEME_URI.'/images/favicon.png'),
			),
			array(
                'id'       => $opt_prefix.'_is_cart_in_home',
                'type'     => 'switch',
                'title'    => esc_html__('Disable Cart in Home', 'electrician'),
                'subtitle' => esc_html__('Enable or Disable the cart button in home page?', 'electrician'),
                'default'  => true,
                'on'       => esc_html__('Enable', 'electrician'),
                'off'      => esc_html__('Disable', 'electrician'),
            ),
			array(
                'id'       => $opt_prefix.'_is_cart_in_all_page',
                'type'     => 'switch',
                'title'    => esc_html__('Disable Cart in Full Site', 'electrician'),
                'subtitle' => esc_html__('Disable or Enable the cart button in full Site?', 'electrician'),
                'default'  => false,
                'on'       => esc_html__('Enable', 'electrician'),
                'off'      => esc_html__('Disable', 'electrician'),
            ),
			//header top left area
			array(
				'id'       => $opt_prefix.'-display-header-left',
				'type'     => 'switch',
				'title'    => esc_html__('Display header left text', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable display header left text', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
			array(
				'id'               => $opt_prefix.'-header-left-text',
				'type'             => 'editor',
				'title'            => esc_html__('Header Left Text', 'electrician'), 
				'subtitle'         => esc_html__('Header Left Text', 'electrician'),
				'default'          => '<ul class="icn-list"><li class="address_line"><i class="icon-map-marker"></i>8494 Signal Hill Road Manassas,<span>VA, 20110</span> </li><li><i class="icon-clock"></i>Mon-Fri 08:00 AM - 05:00 PM</li></ul>',
				'args'   => array(
					'teeny'            => true,
					'textarea_rows'    => 10
				)
			),

			//header right text area
            array(
				'id'       => $opt_prefix.'-display-header-contact-text',
				'type'     => 'switch',
				'title'    => esc_html__('Display header contact text', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable display header contact text', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
			array(
				'id'               => $opt_prefix.'-header-contact-text',
				'type'             => 'editor',
				'title'            => esc_html__('Header Contact Text', 'electrician'), 
				'subtitle'         => esc_html__('Header Contact Text', 'electrician'),
				'default'          => '<div class="number"><i class="icon icon-telephone"></i><span>1 (800) 765-43-21</span></div>
                  <div class="under-number">Call us now. Resistance is futile!</div>',
				'args'   => array(
					'teeny'            => true,
					'textarea_rows'    => 10
				)
			),
            array(
				'id'       => $opt_prefix.'-display-header-mobile-contact-text',
				'type'     => 'switch',
				'title'    => esc_html__('Display header mobile contact text', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable display header contact text', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
			array(
				'id'               => $opt_prefix.'-header-mobile-contact-text',
				'type'             => 'editor',
				'title'            => esc_html__('Header Mobile Contact Text', 'electrician'), 
				'subtitle'         => esc_html__('Header Mobile Contact Text', 'electrician'),
				'default'          => '<ul class="icn-list">
				<li><i class="icon-map-marker"></i>8494 Signal Hill Road Manassas, VA, 20110</li>
				<li><i class="icon-envelope"></i><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></li>
				<li><i class="icon-telephone"></i>+1 800 603 6035</li>
				<li><i class="icon-clock"></i>9:00 AM – 6:00 PM / 6 Days</li>
			</ul>',
				'args'   => array(
					'teeny'            => true,
					'textarea_rows'    => 10
				)
			),
            array(
				'id'       => $opt_prefix.'-display-header-social',
				'type'     => 'switch',
				'title'    => esc_html__('Display header social icons', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable header social icons', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
			array(
				'id'       => $opt_prefix.'-header-facebook',
				'type'     => 'text',
				'title'    => esc_html__('Header Facebook Link', 'electrician'),
				'subtitle' => esc_html__('Header Facebook Link', 'electrician'),
				'desc'     => esc_html__('Header Facebook Link', 'electrician'),
				'default'  => '#'
			),
			array(
				'id'       => $opt_prefix.'-header-twitter',
				'type'     => 'text',
				'title'    => esc_html__('Header Twitter Link', 'electrician'),
				'subtitle' => esc_html__('Header Twitter Link', 'electrician'),
				'desc'     => esc_html__('Header Twitter Link', 'electrician'),
				'default'  => '#'
			),
			array(
				'id'       => $opt_prefix.'-header-instagram',
				'type'     => 'text',
				'title'    => esc_html__('Header Instagram Link', 'electrician'),
				'subtitle' => esc_html__('Header Instagram Link', 'electrician'),
				'desc'     => esc_html__('Header Instagram Link', 'electrician'),
				'default'  => '#'
			),
						array(
				'id'       => $opt_prefix.'-header-google-plus',
				'type'     => 'text',
				'title'    => esc_html__('Header Google Plus URL Link', 'electrician'),
				'subtitle' => esc_html__('Header Google Plus URL Link', 'electrician'),
				'desc'     => esc_html__('Header Google Plus URL Link', 'electrician'),
				'default'  => '#'
			),
			array(
				'id'       => $opt_prefix.'-header-linkedin',
				'type'     => 'text',
				'title'    => esc_html__('Header Linkedin Link', 'electrician'),
				'subtitle' => esc_html__('Header Linkedin Link', 'electrician'),
				'desc'     => esc_html__('Header Linkedin Link', 'electrician'),
				'default'  => '#'
			),
			array(
				'id'       => $opt_prefix.'-header-tumblr',
				'type'     => 'text',
				'title'    => esc_html__('Header Tumblr Link', 'electrician'),
				'subtitle' => esc_html__('Header Tumblr Link', 'electrician'),
				'desc'     => esc_html__('Header Tumblr Link', 'electrician'),
				'default'  => '#'
			),
			array(
				'id'       => $opt_prefix.'-main-menu-anim',
				'type'     => 'switch',
				'title'    => esc_html__('Enable or Disable Main Menu Hover Animation', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable Main Menu Hover Animation', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
		)
	) );
    
    Redux::setSection( $opt_name, array(
		'title'            => esc_html__('Blog Settings', 'electrician'),
		'id'               => 'blog_settings',
		'desc'             => esc_html__('Blog Settings', 'electrician'),
		'customizer_width' => '400px',
		'icon'             => 'el el-website',
		'fields'           => array(
            array(
                'id'       => $opt_prefix.'-blog-layout',
                'type'     => 'select',
                'title'    => esc_html__('Blog page layout', 'electrician'), 
                'subtitle' => esc_html__('Blog page layout', 'electrician'),
                'desc'     => esc_html__('Blog page layout', 'electrician'),
                // Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Layout 1',
                    '2' => 'Layout 2',
                ),
                'default'  => '1',
            ),
            array(
				'id'       => $opt_prefix.'-blog-show-breadcrumb',
				'type'     => 'switch',
				'title'    => esc_html__('Enable/Disable Breadcrumb', 'electrician'),
				'subtitle' => esc_html__('Enable/Disable Breadcrumb', 'electrician'),
				'default'  => true,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
    )));
    
    Redux::setSection( $opt_name, array(
		'title'            => esc_html__('Contact', 'electrician'),
		'id'               => 'contact_settings',
		'desc'             => esc_html__('Contact', 'electrician'),
		'customizer_width' => '400px',
		'icon'             => 'el el-th-large',
		'fields'           => array(
            array(
				'id'       => $opt_prefix.'-display-gmap',
				'type'     => 'switch',
				'title'    => esc_html__('Display Google Map', 'electrician'),
				'subtitle' => esc_html__('Display Google Map', 'electrician'),
				'default'  => true,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
            array(
				'id'       => $opt_prefix.'-gmap-api-key',
				'type'     => 'text',
				'title'    => esc_html__('Google Map Api Key', 'electrician'),
				'subtitle' => esc_html__('Set Google Map Api Key', 'electrician'),
				'default'  => ''
			),
            array(
				'id'       => $opt_prefix.'-gmap-zoom',
				'type'     => 'text',
				'title'    => esc_html__('Google Map Zoom Level', 'electrician'),
				'subtitle' => esc_html__('Set Google Map Zoom Level', 'electrician'),
				'default'  => '14'
			),
            array(
				'id'       => $opt_prefix.'-gmap-latitude',
				'type'     => 'text',
				'title'    => esc_html__('Google Map Latitude', 'electrician'),
				'subtitle' => esc_html__('Set Google Map Latitude', 'electrician'),
				'default'  => '55.8610112'
			),
			array(
				'id'       => $opt_prefix.'-gmap-longitude',
				'type'     => 'text',
				'title'    => esc_html__('Google Map Longitude', 'electrician'),
				'subtitle' => esc_html__('Set Google Map Longitude', 'electrician'),
				'default'  => '-4.2547319'
			),
    )));
    
    Redux::setSection( $opt_name, array(
		'title'            => esc_html__('Typography', 'electrician'),
		'id'               => 'fonts_settings',
		'desc'             => esc_html__('Typography', 'electrician'),
		'customizer_width' => '400px',
		'icon'             => 'el el-font',
		'fields'           => array(
            array(
				'id'       => $opt_prefix.'-body-typography',
				'type'     => 'typography',
				'title'    => esc_html__( 'Body Typography', 'electrician' ),
				'subtitle' => esc_html__( 'Select body font family, size, color and weight.', 'electrician' ),
				'text-align' => false,
				'subsets' => false,
				'default'     => array(
					'color'       => '#000',
					'font-weight'  => '400',
					'font-family' => 'Roboto',
					'google'      => true,
					'font-size'   => '16px',
					'line-height' => '22px',
				),
                'line-height' => false,
                'output' => false,
			),
            array(
				'id'       => $opt_prefix.'-heading-typography',
				'type'     => 'typography',
				'title'    => esc_html__( 'Heading Typography', 'electrician' ),
				'subtitle' => esc_html__( 'Select heading font family and weight.', 'electrician' ),
				'text-align' => false,
				'subsets' => false,
				'default'     => array(
					'color'       => '#000',
					'font-weight'  => '500',
					'font-family' => 'Roboto',
					'google'      => true,
				),
                'output' => false,
                'font-size' => false,
                'line-height' => false,
                'color' => false,
			),
    )));
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__('Footer', 'electrician'),
		'id'               => 'footer_settings',
		'desc'             => esc_html__('Footer', 'electrician'),
		'customizer_width' => '400px',
		'icon'             => 'el el-website',
		'fields'           => array(
            array(
				'id'       => $opt_prefix.'-scroll-to-top',
				'type'     => 'switch',
				'title'    => esc_html__('Display scroll to top', 'electrician'),
				'subtitle' => esc_html__('Enable or Disable scroll to top', 'electrician'),
				'default'  => false,
				'on'	   => esc_html__('Enable', 'electrician'),
				'off'	   => esc_html__('Disable', 'electrician'),
			),
    )));
    Redux::setSection( $opt_name, array(
            'title'            => esc_html__( 'Extra Settings', 'electrician' ),
            'id'               => 'extra_settings',
            'desc'             => esc_html__( 'These are really basic fields!', 'electrician' ),
            'customizer_width' => '400px',
            'icon'             => 'el el-share',
            'fields'           => array(
		        array(
		            'id' => $opt_prefix . '-postype_name_electrician_services',
		            'type' => 'text',
		            'title' => esc_html__('Electrician Service Postype Name', 'electrician'),
		            'subtitle' => esc_html__('Change Electrician Service Postype Name', 'electrician'),
		            'default' => ''
		        ),
            	array(
					'id'       => $opt_prefix.'-slug_postype_electrician_services',
					'type'     => 'text',
					'title'    => esc_html__('Slug Electrician Services', 'electrician'),
					'subtitle' => esc_html__('Change Electrician Service Slug Name', 'electrician'),
					'default'  => '' 
				),

                array(
                        'id'       => 'extra_css',
                        'type'     => 'ace_editor',
                        'title'    => esc_html__( 'Extra CSS', 'electrician' ),
                        'subtitle' => esc_html__( 'Extra CSS just after theme styles', 'electrician' ),
                        'mode' => 'css'
                ),
            )
    ));

	