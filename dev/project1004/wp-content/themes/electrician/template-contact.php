<?php
/**
 * Template Name: Contact
 */
$electrician_option = electrician_options();
$page_layout = get_post_meta(get_the_ID(), 'framework_page_style', true);
get_header();
?>

	<div id="page-content">
        <?php do_action('electrician_breadcrumb')?>
        <div class="block">
            <?php
            $show_title = get_post_meta(get_the_ID(), 'framework_show_page_title', true);
            if($show_title == 'on'){
                the_title( '<h1 class="text-center">', '</h1>' );
                echo '<div class="divider"></div>';
            }?>
            <?php if(isset($electrician_option['electrician-display-gmap']) && $electrician_option['electrician-display-gmap']){?>
            <div id="map"></div>
            <?php }?>
        </div>
		<div class="block">
            <div class="container">
        <?php if($page_layout == 'leftsidebar'){
            echo '<div class="row">';
            get_sidebar('contact');
            echo '<div class="col-sm-1 visible-lg"></div>';
            echo '<div class="col-sm-7 col-md-8">';
        }
		// Start the loop.
		while ( have_posts() ) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'electrician' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'electrician' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                    ?>
                </div><!-- .entry-content -->

                <?php edit_post_link( esc_html__( 'Edit', 'electrician' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

            </article><!-- #post-## -->
            <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
        if($page_layout == 'leftsidebar'){
            echo '</div></div>';
        }
		?>

    		</div><!-- .container -->
		</div><!-- .block -->
	</div><!-- #page-content -->

<?php get_footer(); ?>
