<?php
/**
 * Template Name: Single Service
 * Template Post Type: post
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package WordPress
 * @subpackage Electrician
 * @since Electrician 1.0
 */
get_header();


$show_sidebar = get_post_meta(get_the_ID(), 'framework_show_service_sidebar', true);

if(empty($show_sidebar) ||($show_sidebar=='')){
   $show_sidebar= 'on';
}
$show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_service_breadcrumb', true);

?>

<div id="page-content">
    <?php

        if ($show_breadcrumb != 'off') {
            do_action('electrician_breadcrumb');
        }


    ?>

    <!-- Block -->
    <div class="block">
        <div class="container">
            <div class="row">
            <?php if ($show_sidebar == 'on' && isset($show_sidebar ) && is_active_sidebar('servicesidebar')) : ?>
                <div class="col-md-4 col-lg-3">
                    <?php get_sidebar('services'); ?>
                </div>

                <div class="divider-lg visible-xs"></div>
            <div class="col-md-8 col-lg-9">
            <?php else: ?>
                <div class="col-md-8 col-md-offset-2 ">
            <?php endif; ?>

                    <div class="category-text">
                        <div class="category-image">
                            <?php the_post_thumbnail('electrician_service_image') ?>
                            <h1>
                                <?php
                                while (have_posts()) : the_post();
                                    the_title();
                                endwhile;
                                ?>
                            </h1></div>
                        <div class="divider-lg"></div>
                        <?php
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Block -->
</div>
<?php
get_footer();
