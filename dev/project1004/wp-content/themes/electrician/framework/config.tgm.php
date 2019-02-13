<?php
/*
 * TGM
 */
class TGMRequiredPlugins
{
    use pluginlist;
    public function __construct()
    {
        add_action('tgmpa_register', array($this,'electricity_register_required_plugins'));
    }

    public function electricity_register_required_plugins() {

        $plugins = array(
            array(
                'name' => esc_html__('Envato Market', 'electrician'), // The plugin name
                'slug' => 'envato-market', // The plugin slug (typically the folder name)
                'source' => get_template_directory() . '/framework/plugins/envato-market.zip', // The plugin source
                'required' => true, // If false, the plugin is only 'recommended' instead of required    
                'version' => '2.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.        
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),
            array(
                'name' => esc_html__('Woocommerce', 'electrician'), // The plugin name
                'slug' => 'woocommerce', // The plugin slug (typically the folder name)            
                'required' => true, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Redux Framework', 'electrician'), // The plugin name
                'slug' => 'redux-framework', // The plugin slug (typically the folder name)
                'required' => true, // If false, the plugin is only 'recommended' instead of required            
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Meta Box', 'electrician'), // The plugin name
                'slug' => 'meta-box', // The plugin slug (typically the folder name)
                'required' => true, // If false, the plugin is only 'recommended' instead of required            
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Contact Form 7', 'electrician'), // The plugin name
                'slug' => 'contact-form-7', // The plugin slug (typically the folder name)
                'required' => true, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Really Simple CAPTCHA', 'electrician'), // The plugin name
                'slug' => 'really-simple-captcha', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),        
    
            array(
                'name' => esc_html__('Regenerate Thumbnails', 'electrician'), // The plugin name
                'slug' => 'regenerate-thumbnails', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
    
            array(
                'name' => esc_html__('Yoast SEO', 'electrician'), // The plugin name
                'slug' => 'wordpress-seo', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
    
            array(
                'name' => esc_html__('MailChimp for WordPress', 'electrician'), // The plugin name
                'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Customizer Export/Import', 'electrician'), // The plugin name
                'slug' => 'customizer-export-import', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Widget Importer & Exporter', 'electrician'), // The plugin name
                'slug' => 'widget-importer-exporter', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name' => esc_html__('Cookie Notice for GDPR', 'electrician'), // The plugin name
                'slug' => 'cookie-notice', // The plugin slug (typically the folder name)            
                'required' => false, // If false, the plugin is only 'recommended' instead of required
                'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url' => '', // If set, overrides default API URL and points to an external URL
            ),
        );
    
    $purchase_key = trim(get_option('envato_theme_license_key'));
    $token = get_option('envato_theme_license_token');
    // Change this to your theme text domain, used for internationalising strings
    foreach($this->plugin_org_name as $key=>$value){
        $array=array();
        $array['name']=wp_kses_post($value);
        $array['slug']=$key;
        $array['source']=$this->update_url."ck-ensl-api?licence_action=downloadzip&ck-ensl-purchase-key=" . $purchase_key . "&item_id=" .$this->themeitem_id . "&site_url=" . get_site_url()."&filename=".$key."&token=".$token;
        $array['required']=true;
        $array['force_activation']=false;
        $array['force_deactivation']=false;
        $array['external_url']='';
        $plugins[]=$array;
        
    }

    
        $config = array(
            'domain' => 'electrician', // Text domain - likely want to be the same as your theme.
            'default_path' => '', // Default absolute path to pre-packaged plugins
            'parent_slug' => 'admin.php?page='.$this->menu_slug_dashboard,
            'capability' => 'edit_theme_options',
            'menu' => 'install-required-plugins', // Menu slug
            'has_notices' => true, // Show admin notices or not
            'is_automatic' => false, // Automatically activate plugins after installation or not
            'message' => '', // Message to output right before the plugins table
            'strings' => array(
                'page_title' => esc_html__('Install Required Plugins', 'electrician'),
                'menu_title' => esc_html__('Install Plugins', 'electrician'),
                'installing' => esc_html__('Installing Plugin: %s', 'electrician'), // %1$s = plugin name
                'oops' => esc_html__('Something went wrong with the plugin API.', 'electrician'),
                'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'electrician'), // %1$s = plugin name(s)
                'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'electrician'), // %1$s = plugin name(s)
                'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'electrician'), // %1$s = plugin name(s)
                'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'electrician'), // %1$s = plugin name(s)
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'electrician'), // %1$s = plugin name(s)
                'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'electrician'), // %1$s = plugin name(s)
                'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'electrician'), // %1$s = plugin name(s)
                'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'electrician'), // %1$s = plugin name(s)
                'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'electrician'),
                'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'electrician'),
                'return' => esc_html__('Return to Required Plugins Installer', 'electrician'),
                'plugin_activated' => esc_html__('Plugin activated successfully.', 'electrician'),
                'complete' => esc_html__('All plugins installed and activated successfully. %s', 'electrician'), // %1$s = dashboard link
                'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );
    
        tgmpa($plugins, $config);
    }

}

new TGMRequiredPlugins;


