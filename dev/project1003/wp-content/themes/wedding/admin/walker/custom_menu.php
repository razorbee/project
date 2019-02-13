<?php



class WeddingCustomMenu {







	private $wedding_menu_fields; 







	function __construct() {



	



		$this->wedding_menu_fields = array( 'megamenu', 'megacols', 'menuico', 'bgimg', 'bgpat', 'megafull', 'megawidget', 'megatithide' );



		



		//add custom menu styles and scripts



		add_action( 'admin_menu', array( $this, 'wedding_menu_enqueue_scripts' ) ); 



		



		// add custom menu fields to menu



		add_filter( 'wp_setup_nav_menu_item', array( $this, 'wedding_add_custom_nav_fields' ) );



		



		// save menu custom fields



		add_action( 'wp_update_nav_menu_item', array( $this, 'wedding_update_custom_nav_fields'), 10, 3 );



		



		// edit menu walker



		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'wedding_edit_walker'), 10, 2 );



		



	} // end constructor



	



	



	/**



	 * Register Megamenu stylesheets and scripts		



	 */



	function wedding_menu_enqueue_scripts() {



		// scripts



		wp_register_script( 'wedding-megamenu-script', get_template_directory_uri() . '/admin/js/zozo-megamenu.js' , array( 'jquery' ), false, true );



		wp_enqueue_script( 'wedding-megamenu-script' );



		



		wp_register_style( 'wedding-megamenu-script', get_template_directory_uri() . '/admin/css/zozo-megamenu.css');



		wp_enqueue_style( 'wedding-megamenu-script' );



		



	}



	



	/**



	 * Add custom fields to $item nav object



	 * in order to be used in custom Walker



	 *



	 * @access      public



	 * @since       1.0 



	 * @return      void



	*/



	function wedding_add_custom_nav_fields( $menu_item ) {



	



		//_menu_item_zozo_megamenu_menutype



		$menu_fields = $this->wedding_menu_fields;



		



		foreach( $menu_fields as $field ){



			$menu_item->$field = get_post_meta( $menu_item->ID, '_menu_item_' . $field , true );	



		}		



	



	    return $menu_item;



	    



	}



	



	/**



	 * Save menu custom fields



	 *



	 * @access      public



	 * @since       1.0 



	 * @return      void



	*/



	function wedding_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {



	



		$cf_name_suffix = $this->wedding_menu_fields;



		



		foreach ( $cf_name_suffix as $key ) {



			$opt_key = isset( $_REQUEST['menu-item-'.$key][$menu_item_db_id] ) ? $_REQUEST['menu-item-'.$key][$menu_item_db_id] : '' ;



			update_post_meta( $menu_item_db_id, '_menu_item_'.$key, $opt_key );



		}







	}



	



	/**



	 * Define new Walker edit



	 *



	 * @access      public



	 * @since       1.0 



	 * @return      void



	*/



	function wedding_edit_walker($walker,$menu_id) {



	



	    return 'Wedding_Walker_Nav_Menu_Edit';



	    



	}



	



}



// instantiate plugin's class



$FinCusMenu = new WeddingCustomMenu();



get_template_part( 'admin/walker/edit_custom_walker' );



