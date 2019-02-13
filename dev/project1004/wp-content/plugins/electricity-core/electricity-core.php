<?php

/**
 * Plugin Name: Electricity Core
 * 
 * Description: Electricity  Wordpress Themes Post Type
 * Version: 2.0
 * Author: Smartdatasoft
 * Author URI: http://www.smartdatasoft.com/
 * Requires at least: 4.0
 * Tested up to: 4.4.2
 *
 * Text Domain: electricity-core
 * Domain Path: /i18n/languages/
 *
 * @package smart
 * @category Core
 * @author Smartdatasoft
 */
if (!defined('ELECTRICITY_THEME_URI'))
 define('ELECTRICITY_THEME_URI', get_template_directory_uri());
 
if (!class_exists('electricityCore')) {

    class electricityCore {

        public static $plugindir, $pluginurl;

        function __construct() {

            electricityCore::$plugindir = dirname(__FILE__);

            electricityCore::$pluginurl = plugins_url('', __FILE__);

            add_action('admin_enqueue_scripts', array($this, 'load_smart_shortcodes_admin_scripts'));


            add_filter('wp_kses_allowed_html', array($this, 'add_some_valid_html_tags'), 10, 1);
        }



        public function add_some_valid_html_tags($tags = array()) {
            $tags['iframe'] = array(
                'src' => true,
                'id' => true,
                'class' => true,
                'width' => true,
                'height' => true,
                'style' => true,
                'frameborder' => true,
                'allowfullscreen' => true,
                'mozallowfullscreen' => true,
                'webkitallowfullscreen' => true,
            );
            $tags['i'] = array(
                'class' => true,
                'id' => true,
            );
            $tags['script'] = array(
                'type' => true,
                'src' => false,
            );
            return $tags;
        }

        function load_smart_shortcodes_admin_scripts() {

            wp_enqueue_script('jquery');
        }


        public function insertSiteInfo() {
            $not_required = get_option('electrician_info_updated');
            if ($not_required != 1) {
                if ($_SERVER['SERVER_ADDR'] == '127.0.0.1') {
                    return false;
                }

                $my_theme = wp_get_theme('electrician');
                if ($my_theme->exists()) {
                    $themever = $my_theme->get('Version');
                    $themename = $my_theme->get('Name');
                } else {
                    $themever = '1.2';
                    $themename = 'Electrician';
                }

                $url = 'http://smartdatasoft.net/verify';
                $response = wp_remote_post($url, array(
                    'method' => 'POST',
                    'timeout' => 45,
                    'redirection' => 5,
                    'blocking' => true,
                    'headers' => array(),
                    'body' => array(
                        'purchase_key' => 'null',
                        'operation' => 'insert_site',
                        'domain' => $_SERVER['HTTP_HOST'],
                        'module' => 'wp-electrician',
                        'version' => $themever,
                        'theme_name' => $themename,
                    ),
                    'cookies' => array()
                        )
                );

                if (!is_wp_error($response) && isset($response['response']['code']) && $response['response']['code'] == 200) {
                    // add a option record in options table.
                    update_option('electrician_info_updated', '1');
                }
            }
        }

    }

    $electricityCore = new electricityCore();
    require_once( electricityCore::$plugindir . "/lib/sds_cpt_gallery.php" );
    require_once( electricityCore::$plugindir . "/lib/vc_shortcodes.php" );
    require_once( electricityCore::$plugindir . "/lib/config.meta.box.php" );

    register_activation_hook(__FILE__, array($electricityCore, 'insertSiteInfo'));
}


// Edit by shahin
define('PLUGIN_DIR', dirname(__FILE__) . '/');
$classesDir = array(
    PLUGIN_DIR . 'shortcode/',
    PLUGIN_DIR . 'widget/',
    PLUGIN_DIR . 'post_type/',
);

function __autoloadCustomFolder() {
    global $classesDir;
    if (is_array($classesDir) || is_object($classesDir)){
        foreach ($classesDir as $directory) {
            foreach (glob($directory . '*.php') as $filename) {
                if (file_exists($filename)) {
                    include_once ($filename);
                }
            }
        }
    }
}

__autoloadCustomFolder();



function loadCustomVcMapFile() {
    require_once PLUGIN_DIR . '/vc_element/vc_map_coupns.php';
    require_once PLUGIN_DIR . '/vc_element/vc_map_action_button.php';
    require_once PLUGIN_DIR . '/vc_element/vc_map_service_item.php';
    require_once PLUGIN_DIR . '/vc_element/vc_map_testimonials.php';
    require_once PLUGIN_DIR . '/vc_element/vc_map_latest_news.php';
    require_once PLUGIN_DIR . '/vc_element/vc_map_price_box.php';
    require_once PLUGIN_DIR . '/vc_element/vc_map_counter_block.php';
}

add_action('vc_before_init', 'loadCustomVcMapFile');
register_activation_hook( __FILE__, 'electrician_activation_func' ); 

function electrician_activation_func() {
    file_put_contents(__DIR__.'/error_log.txt', ob_get_contents());
}




add_action( 'plugins_loaded', 'electricity_core_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function electricity_core_load_textdomain() {
  load_plugin_textdomain( 'electricity-core', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}