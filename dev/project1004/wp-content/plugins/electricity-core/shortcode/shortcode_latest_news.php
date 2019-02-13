<?php

class electrician_latestNews {

    public function __construct() {
        add_shortcode('electrician_latestNews_row', array($this, 'electrician_latestNews_row_func'));
        add_shortcode('electrician_latest_news', array($this, 'electrician_latestNews_func'));
    }


    function electrician_latestNews_row_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts( array(
            'slides_to_show' => '2',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '6000',
            'arrows' => 'false',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_latestNews', $changed_atts);

        ob_start();

            $output = '<div class="row news-preview-carousel '.$extra_class.'">';
            $output .= do_shortcode($content);
            $output .= ' </div>';

            $output .= ob_get_clean();
        return $output;
    }

    public function electrician_latestNews_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'image' => '',
            'text' => '',
            'link_url' => '',
            'extra_class'=>'',

                        ), $atts));
         $href = vc_build_link($link_url);

         $sigle_img = wp_get_attachment_image_src($image, "large");
          ob_start();
         ?>
        <div class="col-sm-12">
            <div class="news-preview">
                <div class="news-preview-image"><img src="<?php echo esc_attr__( $sigle_img[0]) ?>" alt="" class="img-responsive"></div>
                <div class="news-preview-text">
                    <div class="news-preview-date"><?php echo esc_html__($text); ?></div>
                    <h4 class="news-preview-title"><?php echo esc_html__($title); ?></h4>
                </div>
                <div class="news-preview-teaser">
                    <div><?php echo esc_html__($content); ?></div><a href="<?php echo esc_url( $href['url']) ;?>" class="news-preview-link"><?php echo wp_kses_post(__('Read more', 'electricity-core')); ?></a></div>
            </div>
        </div>
        <?php
         $content = ob_get_clean();
        return $content;    
    }
}

new electrician_latestNews();