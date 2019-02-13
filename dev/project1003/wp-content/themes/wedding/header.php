<?php



/**



 * The Header for our theme.



 *



 * Displays all of the header section



 *



 * @package Zozothemes



 */



?>



<!DOCTYPE html>



<html <?php language_attributes(); ?>>



<head>



	<meta charset="<?php bloginfo( 'charset' ); ?>">



	



	<!-- Latest IE rendering engine & Chrome Frame Meta Tags -->



	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->



	



	<link rel="profile" href="http://gmpg.org/xfn/11">



	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">



	



	<?php wp_head(); ?>



</head>







<body <?php body_class(); ?>>



	<?php



		/**



		 * @hooked - wedding_page_loader - 5



		 * @hooked - wedding_zmm_wrapper - 10



		 * @hooked - wedding_secondary_menu - 20



		 * @hooked - wedding_mobile_search_wrapper - 40



		**/



		do_action('wedding_before_page_wrapper');



	?>







<div id="zozo_wrapper" class="wrapper-class zozo-main-wrapper">



	<?php



		/**



		 * @hooked - wedding_sliding_bar - 5



		 * @hooked - wedding_mobile_header_wrapper - 15



		 * @hooked - wedding_header_wrapper - 20



		 * @hooked - wedding_header_top_anchor - 30



		 * @hooked - wedding_page_slider_wrapper - 40



		 * @hooked - wedding_featured_post_slider - 50



		**/



		do_action('wedding_header_wrapper_start');



	?>



	



	<div class="zozo-main-wrapper">



	<div id="main" class="main-section">



	



		<!-- ============ Page Header ============ -->



		<?php get_template_part('partials/page', 'header' ); ?>