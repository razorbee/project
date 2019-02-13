<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Electrician
 * @since Electrician 1.0
 */
get_header();

?>

<div id="pageContent">
    <?php do_action('electrician_breadcrumb') ?>
    <!-- Content  -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 column-center">
                <?php
                // Start the loop.
                if (have_posts()):
                    while (have_posts()) : the_post();?>
                        <div <?php post_class('blog-post single') ?>>
                            <div class="post-image">
                                <?php get_template_part('content', get_post_format()); ?>
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">
                                    <?php the_title(); ?>
                                </h2>
                                <div class="post-date"><span class="day"><?php echo get_the_date('d') ?></span><span class="month"><?php echo get_the_date('M') ?></span></div>
                                <div class="post-author"><?php printf(esc_html__('by %s', 'electrician'), get_the_author()) ?>&nbsp;&nbsp;<div class="post-meta"><i class="icon icon-speech"></i><span><?php comments_number('0', '1', '%'); ?></span></div></div>
                                <div class="post-teaser">
                                    <?php the_content(esc_html__('Read More', 'electrician'));
										wp_link_pages( array(
											'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'electrician' ) . '</span>',
											'after'       => '</div></div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
											'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'electrician' ) . ' </span>%',
											'separator'   => ', ',
										) );
									?>
                                    <?php
                                    $posttags = get_the_tags();
                                    if ($posttags) {
                                      echo '<ul class="tags-list">';
                                      foreach($posttags as $tag) {
                                        echo '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></li>'; 
                                      }
                                      echo '</ul>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        the_post_navigation(array(
                            'next_text' => '<span class="post-title">%title</span>' . esc_html__('&raquo;', 'electrician'),
                            'prev_text' => esc_html__('&laquo;', 'electrician') . '<span class="post-title">%title</span>',
                        ));
                        
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                        // Previous/next post navigation.
                        

                    // End the loop.
                    endwhile;
                endif;
                ?>
            </div><!-- .col-sm-9-->
            <?php get_sidebar()?>
        </div><!-- .row -->
        </div><!-- .Container -->
    </section><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
