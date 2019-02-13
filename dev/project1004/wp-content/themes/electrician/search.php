<?php
get_header(); 

$electrician_option = electrician_options();
$blogisotope = false;
$blogcolumn = 'col-md-9 column-center';
$bloglayoutno = 1;
if(isset($_GET['layout']) && is_numeric($_GET['layout'])){
    $bloglayoutno = (int)$_GET['layout'];
}
if((isset($electrician_option['electrician-blog-layout']) && $electrician_option['electrician-blog-layout'] == 2) || $bloglayoutno == 2){
    $blogcolumn = 'blog-isotope';
    $blogisotope = true;
}

?>
<div id="pageContent">
    <?php do_action('electrician_breadcrumb')?>
	<!-- Content  -->
	<section class="content">
		<div class="container">
        
		<h1 class="text-center page-title"><?php printf( esc_html__( 'Search Results for: %s', 'electrician' ), get_search_query() ); ?></h1>
		<div class="divider-sm"></div>
        <?php if(!$blogisotope){?>
        <div class="row">
        <?php }?>
            <div class="<?php echo esc_attr($blogcolumn)?>">
		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
            
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
            ?>
                <div <?php post_class('blog-post')?>>
                    
                    <div class="post-image">
                        <?php get_template_part( 'content', get_post_format() );?>
                    </div>
                    <div class="post-content">
                        <h2 class="post-title">
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </h2>
                        <div class="post-date"><a href="<?php the_permalink();?>"><span class="day"><?php echo get_the_date('d')?></span><span class="month"><?php echo get_the_date('M')?></span></a></div>
                        <div class="post-author"><?php printf(esc_html__('by %s', 'electrician'), get_the_author())?>&nbsp;&nbsp;<div class="post-meta"><i class="icon icon-speech"></i><span><?php comments_number( '0', '1', '%' ); ?></span></div></div>
                        <div class="post-teaser">
                            <?php the_content(esc_html__('Read More', 'electrician'))?>
                        </div>
                        
                    </div>
                </div>

			<?php

			// End the loop.
			endwhile;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
            if($blogisotope){
		?>
	
            </div><!-- //blog column -->
            <div class="col-xs-12">
            <?php
            }
            // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( '&laquo; Previous', 'electrician' ),
				'next_text'          => esc_html__( 'Next &raquo;', 'electrician' ),
				'before_page_number' => '',
			) );
            ?>
            </div>
            <?php 
            if(!$blogisotope){
                get_sidebar();
            ?>
            </div><!-- .row -->
            <?php }?>
        </div><!-- .content -->
	</section><!-- .content -->
</div><!-- #pageContent-->
<?php get_footer(); ?>