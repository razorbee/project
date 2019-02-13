<?php



/**



 * Custom Meta Boxes and Fields for Post, Pages and other custom post types



 *



 * @package Zozothemes



 */ 



 



class WeddingThemeMetaboxes {



	



	public function __construct() 



	{



		add_action('add_meta_boxes', array($this, 'wedding_add_meta_boxes'));



		add_action('save_post', array($this, 'wedding_save_meta_boxes'));



		add_action('admin_enqueue_scripts', array($this, 'wedding_load_admin_script'));



	}







	// Load Admin Scripts



	function wedding_load_admin_script() {



		global $pagenow;



		



		if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {



		



			wp_enqueue_style('wedding-admin-style', WEDDING_ADMIN_URL .'/css/admin-custom.css');



			



			wp_enqueue_style('wedding-select2-style', WEDDING_ADMIN_URL . '/css/select2.css');



			



	    	wp_enqueue_media();



			



			wp_enqueue_script('jquery-ui-core');



			wp_enqueue_script('jquery-ui-tabs');



			wp_enqueue_script('jquery-ui-slider');



			



			wp_enqueue_script( 'jquery-ui-datepicker' );



			



			wp_enqueue_script( 'wp-color-picker' );



			wp_enqueue_style( 'wp-color-picker' );



			



			wp_enqueue_script('wedding-admin-media', WEDDING_ADMIN_URL .'/js/metabox.js', array('jquery'), null, true); 



			



			wp_enqueue_script('wedding-select2', WEDDING_ADMIN_URL . '/js/select2.js', array('jquery'), null, true);



		}



		



		if( is_admin() ) {



			wp_enqueue_style('wedding-zozo-admin-css', WEDDING_ADMIN_URL .'/css/admin.css');



		}



	}



	



	// Add Meta Boxes for different Post types



	public function wedding_add_meta_boxes()



	{



		$this->wedding_add_meta_box('post_options', 'Post Options', 'post_metabox', 'post');



		$this->wedding_add_meta_box('page_options', 'Page Options', 'page_metabox', 'page');



		if( WEDDING_WOOCOMMERCE_ACTIVE ) {



			$this->wedding_add_meta_box('product_options', 'Product Options', 'product_metabox', 'product');



		}



		$this->wedding_add_meta_box('testimonial_options', 'Testimonial Options', 'testimonial_metabox', 'zozo_testimonial');



		$this->wedding_add_meta_box('portfolio_options', 'Portfolio Options', 'portfolio_metabox', 'zozo_portfolio', 'advanced');



		$this->wedding_add_meta_box('portfolio_page_options', 'Page Options', 'portfolio_page_metabox', 'zozo_portfolio', 'advanced');



		$this->wedding_add_meta_box('service_options', 'Services Options', 'service_metabox', 'zozo_services', 'advanced');



		$this->wedding_add_meta_box('casestudy_options', 'Casestudies Options', 'casestudy_metabox', 'zozo_casestudies', 'advanced');



		$this->wedding_add_meta_box('event_options', 'Event Options', 'event_metabox', 'zozo_event', 'advanced');



		$this->wedding_add_meta_box('team_options', 'Team Member Options', 'team_metabox', 'zozo_team_member');



	}



	



	// Add Meta Box for each types



	public function wedding_add_meta_box($id, $title, $callback, $post_type, $context = 'normal')



	{



	    add_meta_box( 'wedding_' . $id, $title, array($this, 'wedding_' . $callback), $post_type, $context, 'high' );		 



	}



	



	// Save meta box fields



	public function wedding_save_meta_boxes($post_id)



	{



		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {



			return;



		}



				



		// check permissions



		if( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {



			if( !current_user_can('edit_page', $post_id) )



			return $post_id;



		} elseif( !current_user_can('edit_post', $post_id) ) {



			return $post_id;



		}



		



		$portfolio = array();



		



		if( isset( $_POST['zozoportfolio_options'] ) && is_array( $_POST['zozoportfolio_options'] ) ) {







			foreach( $_POST['zozoportfolio_options'] as $i => $fields ) {



				// skip the hidden "repeatable" div



				if( $i != '%r' ) {



					$portfolio[$i] = $fields;



				}



			}



			



			if( ! empty( $portfolio ) ) {



				update_post_meta($post_id, 'zozoportfolio_options', $portfolio);



			}



		



		}



		foreach($_POST as $key => $value) {



			if(strstr($key, 'zozo_')) {



				update_post_meta($post_id, $key, $value);



			}



		}



	}







	public function wedding_post_metabox()



	{



		$zozopostfields = new WeddingMetaboxFields();



		$zozopostfields->render_fields( $zozopostfields->render_post_fields() );



	}







	public function wedding_page_metabox()



	{



		$zozopagefields = new WeddingMetaboxFields();



		$zozopagefields->render_fields( $zozopagefields->render_page_fields() );



	}



		



	public function wedding_testimonial_metabox()



	{



		$zozotestimonialfields = new WeddingMetaboxFields();



		$zozotestimonialfields->render_fields( $zozotestimonialfields->render_testimonial_fields() );



	}



	



	public function wedding_portfolio_metabox()



	{



		$zozoportfoliofields = new WeddingMetaboxFields();		



		$zozoportfoliofields->render_portfolio_fields();



	}



	



	public function wedding_portfolio_page_metabox()



	{



		$zozopagefields = new WeddingMetaboxFields();



		$zozopagefields->render_fields( $zozopagefields->render_portfolio_page_fields() );



	}



		



	public function wedding_team_metabox()



	{



		$zozoteamfields = new WeddingMetaboxFields();



		$zozoteamfields->render_fields( $zozoteamfields->render_team_fields() );



	}



	



	public function wedding_casestudy_metabox()



	{



		$casestudy_fields = new WeddingMetaboxFields();		



		$casestudy_fields->render_fields( $casestudy_fields->render_casestudy_fields() );



	}



	



	public function wedding_event_metabox()



	{



		$event_fields = new WeddingMetaboxFields();		



		$event_fields->render_fields( $event_fields->render_event_fields() );



	}



	



	public function wedding_service_metabox()



	{



		$service_fields = new WeddingMetaboxFields();		



		$service_fields->render_fields( $service_fields->render_service_fields() );



	}



	public function wedding_product_metabox()



	{



		$product_fields = new WeddingMetaboxFields();



		$product_fields->render_fields( $product_fields->render_product_fields() );



	}







}







$metaboxes = new WeddingThemeMetaboxes;