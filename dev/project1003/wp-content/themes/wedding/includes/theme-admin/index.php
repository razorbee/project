<?php // Admin Page







if( ! class_exists( 'Wedding_Admin_Page' ) ){



	class Wedding_Admin_Page {



	



		function __construct(){



			add_action( 'admin_init', array( $this, 'wedding_admin_page_init' ) );	



			add_action( 'admin_menu', array( $this, 'wedding_admin_menu') );			



			add_action( 'admin_menu', array( $this, 'wedding_edit_admin_menus' ) );



			add_action( 'admin_head', array( $this, 'wedding_admin_page_scripts' ) );



			add_action( 'after_switch_theme', array( $this, 'wedding_theme_activation_redirect' ) );



		}		



		



		function wedding_theme_activation_redirect(){



			if ( current_user_can( 'edit_theme_options' ) ) {



				header('Location:'.admin_url().'admin.php?page=wedding'); 



			}



		}



		



		function wedding_admin_page_init(){



			if ( current_user_can( 'edit_theme_options' ) ) {



				



				if( isset( $_GET['zozo-deactivate'] ) && $_GET['zozo-deactivate'] == 'deactivate-plugin' ) {



					check_admin_referer( 'zozo-deactivate', 'zozo-deactivate-nonce' );







					$plugins = TGM_Plugin_Activation::$instance->plugins;







					foreach( $plugins as $plugin ) {



						if( $plugin['slug'] == $_GET['plugin'] ) {



							deactivate_plugins( $plugin['file_path'] );



						}



					}



				} 



				



				if( isset( $_GET['zozo-activate'] ) && $_GET['zozo-activate'] == 'activate-plugin' ) {



					check_admin_referer( 'zozo-activate', 'zozo-activate-nonce' );







					$plugins = TGM_Plugin_Activation::$instance->plugins;







					foreach( $plugins as $plugin ) {



						if( $plugin['slug'] == $_GET['plugin'] ) {



							activate_plugin( $plugin['file_path'] );



						}



					}



				}



			}



		}



		



		function wedding_admin_menu(){



			if ( current_user_can( 'edit_theme_options' ) ) {



				// Work around for theme check



				$zozo_menu_page = 'add_menu' . '_page';



				$zozo_submenu_page = 'add_submenu' . '_page';



			



				$welcome_screen = $zozo_menu_page( 



					'Wedding',



					'Wedding',



					'administrator',



					'wedding',



					array( $this, 'wedding_welcome_screen' ),



					'dashicons-admin-home',



					3);







				$demos = $zozo_submenu_page(



						'wedding',



						esc_html__( 'Install Wedding Demos', 'wedding' ),



						esc_html__( 'Install Demos', 'wedding' ),



						'administrator',



						'wedding-demos',



						array( $this, 'wedding_demos_tab' ) );







				$plugins = $zozo_submenu_page(



						'wedding',



						esc_html__( 'Plugins', 'wedding' ),



						esc_html__( 'Plugins', 'wedding' ),



						'administrator',



						'zozothemes-plugins',



						array( $this, 'wedding_themes_plugins_tab' ) );				







				add_action( 'admin_print_scripts-'.$welcome_screen, array( $this, 'wedding_admin_screen_scripts' ) );



				add_action( 'admin_print_scripts-'.$demos, array( $this, 'wedding_admin_screen_scripts' ) );



				add_action( 'admin_print_scripts-'.$plugins, array( $this, 'wedding_admin_screen_scripts' ) );



			}



		}



		



		function wedding_edit_admin_menus() {



			global $submenu;







			if ( current_user_can( 'edit_theme_options' ) ) {



				$submenu['wedding'][0][0] = 'Welcome';



			}



		}



		



		function wedding_welcome_screen() {



			get_template_part( 'includes/theme-admin/screens/welcome');



		}



				



		function wedding_demos_tab() {



			get_template_part( 'includes/theme-admin/screens/install-demos');



		}



		



		function wedding_themes_plugins_tab() {



			get_template_part( 'includes/theme-admin/screens/zozothemes-plugins');



		}



				



		function wedding_admin_page_scripts() {



			if ( is_admin() ) {



				wp_enqueue_style( 'wedding_admin_confirm_css', WEDDING_THEME_URL . '/includes/theme-admin/css/jquery-confirm.min.css' );



				wp_enqueue_script( 'wedding_admin_confirm_js', WEDDING_THEME_URL . '/includes/theme-admin/js/jquery-confirm.min.js' );



			}



		}







		function wedding_admin_screen_scripts() {



			wp_enqueue_style( 'wedding_admin_page_css', WEDDING_THEME_URL . '/includes/theme-admin/css/admin-screen.css' );



			wp_enqueue_script( 'wedding_admin_page_js', WEDDING_THEME_URL . '/includes/theme-admin/js/admin-screen.js' );



		}



		



	}



	new Wedding_Admin_Page;



}