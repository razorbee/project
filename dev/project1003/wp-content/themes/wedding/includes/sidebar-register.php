<?php
/**
 * Register widgetized areas
 */
if ( ! function_exists( 'wedding_widgets_init' ) ) {
	function wedding_widgets_init() {
	
	// Primary Sidebar
	    
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'wedding' ),
		'id'            => 'primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'The default sidebar used in two or three-column layouts.', 'wedding' ),
	) );
	
	// Secondary Sidebar
	
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'wedding' ),
		'id'            => 'secondary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'A secondary sidebar used in three-column layouts.', 'wedding' ),
	) );
	
	
	// Services Sidebar
	
	register_sidebar( array(
		'name'          => esc_html__( 'Services Sidebar', 'wedding' ),
		'id'            => 'services-widget',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'A services sidebar used in one-column layouts.', 'wedding' ),
	) );
	// Footer Widgets Sidebar
	$is_footer_widgets = '';
	$is_footer_widgets = wedding_get_theme_option( 'zozo_footer_widgets_enable' ) ? wedding_get_theme_option( 'zozo_footer_widgets_enable' ) : 0;	
	
	// Footer Top
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Area', 'wedding' ),
		'id'            => 'footer-top',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'A footer top area sidebar used in Footer top.', 'wedding' ),
	) );
	
	if( $is_footer_widgets ) {
		
		$columns = '';
		$columns = 4;
		for ( $i = 1; $i <= intval( $columns ); $i++ ) {
		
			register_sidebar( array(
				'name'          => sprintf( esc_html__( 'Footer %d', 'wedding' ), $i ),
				'id'            => sprintf( 'footer-widget-%d', $i ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
				'description'	=> sprintf( esc_html__( 'Footer widget Area %d.', 'wedding' ), $i ),
			) );
				
		}
		
	}
	// Footer bootom Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom Sidebar', 'wedding' ),
		'id'            => 'footer-bottom',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description'  => esc_html__( 'A footer bottom sidebar used in one-column layouts.', 'wedding' ),
	) );	
	
	// Sliding Widgets Sidebar
	$sliding_widgets = '';
	$sliding_widgets = wedding_get_theme_option( 'zozo_enable_sliding_bar' ) ? wedding_get_theme_option( 'zozo_enable_sliding_bar' ) : 0;
	
	if( $sliding_widgets ) {
	
		$columns = '';
		$columns = wedding_get_theme_option( 'zozo_sliding_bar_columns' );
		
		if ( ! $columns ) $columns = 3;
		for ( $i = 1; $i <= intval( $columns ); $i++ ) {
		
			register_sidebar( array(
				'name'          => sprintf( esc_html__( 'Sliding Bar Widget %d', 'wedding' ), $i ),
				'id'            => sprintf( 'sliding-bar-%d', $i ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
				'description'	=> sprintf( esc_html__( 'Sliding Bar Widget Area %d.', 'wedding' ), $i ),
			) );
				
		}
	}
	
	// Menu Sidebar
	
	register_sidebar( array(
		'name'          => esc_html__( 'Menu Sidebar', 'wedding' ),
		'id'            => 'menu-widget',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'A services sidebar used in one-column layouts.', 'wedding' ),
	) );
		
	/**
	 * Woocommerce Sidebar
	 */
	if( class_exists('Woocommerce') ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'wedding' ),
			'id'            => 'shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			'description' 	=> esc_html__( 'Shop Sidebar to show your widgets on Shop Pages.', 'wedding' ),
		) );
	}
		
	} // End wedding_widgets_init()
}

add_action( 'widgets_init', 'wedding_widgets_init' );  
?>