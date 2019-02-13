<?php



/**



 * Archive Template



 *



 * @package Zozothemes



 */



 



get_header();



 



$container_class = $scroll_type = $scroll_type_class = '';



$post_type_layout = $excerpt_limit = '';



$data_attr = '';







$original_layout = '';



$original_layout = wedding_get_theme_option( 'zozo_archive_blog_type' );



$grid_columns = wedding_get_theme_option( 'zozo_archive_blog_grid_columns' );







$column_width = '';



$display_mode = '';







// Grid Style



if( $original_layout == 'grid' ) {



	$container_class = 'zozo-isotope-layout ';



	if( $grid_columns != '' ) {



		if( $grid_columns == 'two' ) {



			$container_class .= 'grid-layout grid-col-2';



			$grid_columns_num = 2;



		} elseif( $grid_columns == 'three' ) {



			$container_class .= 'grid-layout grid-col-3';



			$grid_columns_num = 3;



		} elseif( $grid_columns == 'four' ) {



			$container_class .= 'grid-layout grid-col-4';



			$grid_columns_num = 4;



		}



	}



	$post_class = 'isotope-post grid-posts ';



	$column_width = 12 / $grid_columns_num;



	$post_class .= 'post-iso-w' . $column_width;



	$post_class .= ' post-iso-h' . $column_width;



	



	$image_size = 'wedding-blog-medium';



	$page_type_layout = 'grid';



	$display_mode = 'isotope';



	$excerpt_limit = wedding_get_theme_option( 'zozo_blog_excerpt_length_grid' );



	$data_attr = 'data-layout=masonry data-columns='. $grid_columns_num .' data-gutter=30';



}



// Large Style



elseif( $original_layout == 'large' ) {



	$container_class = 'large-layout';



	$post_class = 'large-posts';



	$image_size = 'wedding-blog-large';



	$post_type_layout = 'large';



	$excerpt_limit = wedding_get_theme_option( 'zozo_blog_excerpt_length_large' );



}



// List Style



elseif( $original_layout == 'list' ) {



	$container_class = 'list-layout';



	$post_class = 'list-posts clearfix';	



	$image_size = 'wedding-blog-medium';



	$page_type_layout = 'list';



	$excerpt_limit = wedding_get_theme_option( 'zozo_blog_excerpt_length_list' );



} 







if( wedding_get_theme_option( 'zozo_disable_blog_pagination' ) ) {



	$scroll_type = "infinite";



	if( isset( $display_mode ) && $display_mode == 'isotope' ) {



		$scroll_type_class = " posts-isotope-infinite";



	} else {



		$scroll_type_class = " posts-infinite";



	}



} else {



	$scroll_type = "pagination";



	$scroll_type_class = " posts-pagination";



} 







// Meta 



$morelink = $post_author = $post_comments = $post_date = $thumbnail = '';



$meta_array = array();







$morelink = wedding_get_theme_option( 'zozo_blog_read_more' );



$post_author = wedding_get_theme_option( 'zozo_blog_post_meta_author' );



$post_comments = wedding_get_theme_option( 'zozo_blog_post_meta_comments' ); 



$post_date = wedding_get_theme_option( 'zozo_blog_post_meta_date' ); 



$post_cat = wedding_get_theme_option( 'zozo_blog_post_meta_categories' ); 



$thumbnail = wedding_get_theme_option( 'zozo_blog_post_featured_image' );







$meta_array = array( 'more' 	=> $morelink, 



					'thumbnail' => $thumbnail,



					'author' 	=> $post_author, 



					'comments' 	=> $post_comments, 



					'date' 		=> $post_date,



					'categories' => $post_cat );



					



?>







<div class="container">



	<div id="main-wrapper" class="zozo-row row">



		<div id="single-sidebar-container" class="single-sidebar-container <?php wedding_content_sidebar_classes(); ?>">



			<div class="zozo-row row">	



				<div id="primary" class="content-area <?php wedding_primary_content_classes(); ?>">



					<div id="content" class="site-content">



						<?php // Featured Post Slider



						if( wedding_get_theme_option( 'zozo_show_archive_featured_slider' ) == 1 && wedding_get_theme_option( 'zozo_featured_slider_type' ) == 'above_content' ) {



							get_template_part('partials/blog/featured', 'slider' );	



						} ?>



									



						<?php $category = '';



						$category = get_queried_object();



						if( isset( $category->term_id ) && $category->term_id != '' ) {



						   	$term_meta = get_option( "taxonomy_$category->term_id" );



						} ?>



						



						<?php if( isset( $term_meta['zozo_thumbnail_image'] ) && $term_meta['zozo_thumbnail_image'] != '' ) { ?>



							<div class="archive-header">



								<div class="category-image">



									<img class="img-responsive" src="<?php echo esc_url($term_meta['zozo_thumbnail_image']); ?>" alt="" />



								</div>



							</div>



						<?php } ?>



						



						<?php if( isset( $category->term_id ) && is_tag( $category->term_id  ) ) {								



							$args['tax_query'] = array( array( 



													'taxonomy' => 'post_tag', 



													'field' => 'id', 



													'terms' => $category->term_id 



												));



						} elseif( isset( $category->term_id ) ) {



							$args['tax_query'] = array( array( 



													'taxonomy' => 'category', 



													'field' => 'id', 



													'terms' => $category->term_id 



												));



						}



						



						if( ! empty( $args ) ) {



							new WP_Query($args); 



						} ?>



						



						<div id="zozo-blog-posts-container" class="zozo-blog-posts-wrapper zozo-isotope-grid-system">



						



							<?php if( isset( $display_mode ) && $display_mode == 'isotope' ) { ?>



								<div class="zozo-isotope-wrapper blog-isotope-wrapper">



							<?php } ?>



						



							<div id="archive-posts-container" class="zozo-posts-container <?php echo esc_attr($container_class); ?><?php echo esc_attr($scroll_type_class); ?> clearfix"<?php echo esc_attr( $data_attr ); ?>>



								<?php if ( have_posts() ):



									while ( have_posts() ): the_post();



										if( isset( $original_layout ) && ( $original_layout == 'large' || $original_layout == 'list' ) ) {



											echo wedding_output_blog_large_layout( $post->ID, $post_class, $image_size, $excerpt_limit, $meta_array, $original_layout );



										} 



										



										else if( isset( $original_layout ) && $original_layout == 'grid' ) {



											echo wedding_output_blog_grid_layout( $post->ID, $post_class, $image_size, $excerpt_limit, $meta_array );



										}										



										



									endwhile;



									



									else :



										get_template_part( 'content', 'none' );



								endif; ?>



							</div>



							



							<?php if( isset( $display_mode ) && $display_mode == 'isotope' ) { ?>



								</div>



							<?php } ?>



							



							<div class="zozo-blog-pagination-wrapper">



							<?php echo wedding_pagination( $pages = '', $scroll_type ); ?>



							</div>



							



						</div>



						



						<?php wp_reset_postdata(); ?>



					



					</div><!-- #content -->



				</div><!-- #primary -->



			



				<?php get_sidebar(); ?>



			</div>		



		</div><!-- #single-sidebar-container -->







		<?php get_sidebar( 'second' ); ?>



		



	</div><!-- #main-wrapper -->



</div><!-- .container -->



<?php get_footer(); ?>