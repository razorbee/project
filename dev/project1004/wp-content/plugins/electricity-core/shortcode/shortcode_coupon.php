<?php

class electricianCoupns {

    public function __construct() {
        add_shortcode('electrician_coupns', array($this, 'electrician_coupns_func'));
    }

    public function electrician_coupns_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'extra_class' => '',
            'column' => 2,
            'per_page' => -1,
                        ), $atts));


        $orderby = 'DESC';
        $args = array(
            'posts_per_page' => $per_page,
            'post_type' => 'our-coupons',
            'orderby' => $orderby,
            'no_found_rows' => true,
        );

        $column_no = $column;
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-4 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }
        $query = new WP_Query($args);
        ob_start();
        ?>
        <?php
        if ($query->have_posts()) :
            ?>
            <?php
            while ($query->have_posts()) : $query->the_post();
                $post_id = get_the_ID();
                $top_left = get_post_meta(get_the_ID(), '_coupon-top-left', true);
                $top_right_title = get_post_meta(get_the_ID(), '_coupon-top-right-title', true);
                $right_percentance = get_post_meta(get_the_ID(), '_coupon-top-righ-percentance', true);
                $right_content = get_post_meta(get_the_ID(), '_coupon-top-right-content', true);
                $bottom_right = get_post_meta(get_the_ID(), '_coupon-bottom-right', true);
                $bottom_image = get_post_meta(get_the_ID(), '_coupon-bottom-right-mage', true);
                ?>

                <div class="col-lg-6<?php //echo esc_html__($colclass, 'electrician');   ?>">
                    <div class="coupon">
                        <div class="coupon-inside">
                            <div class="coupon-bg">
                                <?php echo get_the_post_thumbnail($post_id, 'electrician_coupon'); ?>
                            </div>
                            <div class="coupon-address">
                                <?php echo wp_kses_post($top_left, 'electrician'); ?>

                            </div>
                            <div class="coupon-print-link">
                                <div><i class="icon icon-print"></i></div>
                                <a href="javascript:void(0)" data-id="<?php echo $post_id; ?>" class="print-link"><?php echo wp_kses_post(__('Print Now!', 'electricity-core')); ?></a>
                                <div id="popUpLoader_<?php echo $post_id; ?>"  class="more-loader-coupon"><img src="<?php echo ELECTRICITY_THEME_URI; ?>/images/ajax-loader.gif" alt=""></div>
                            </div>
                            <div class="coupon-text">
                                <div class="coupon-text-1"><?php echo esc_html__($top_right_title, 'electrician'); ?></div>
                                <div class="coupon-text-2">  <?php echo esc_html__($right_percentance, 'electrician'); ?></div>
                                <div class="coupon-text-3">  <?php echo wp_kses_post($right_content, 'electrician'); ?></div>
                                <div class="coupon-text-4">
                                    <?php echo wp_kses_post($bottom_right, 'electrician'); ?>
                                    <?php
                                    $attachement = wp_get_attachment_image_src((int) $bottom_image, 'full');
                                    ?>
                                    <img src="<?php echo esc_url($attachement[0]); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            ?>
        <?php endif; ?>   
        <?php
        $output = ob_get_clean();
        return $output;
    }

}

new electricianCoupns();