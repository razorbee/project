<?php

class electronic_testimonials {

    public static $style;

    public function __construct() {
        add_shortcode('electricity_testimonials', array($this, 'electricity_testimonials_func'));
        add_shortcode('electricity_testimonials_items', array($this, 'electricity_testimonials_items_func'));
    }

    function electricity_testimonials_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'style' => 'slider',
            'title_1' => '',
            'title_color' => '',
                        ), $atts));

        $changed_atts = shortcode_atts( array(
            'slides_to_show' => '1',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '5000',
            'arrows' => 'false',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_testimonial', $changed_atts);

        self::$style = $style;
        ob_start();
        if (self::$style == "grid"):
            $output = '<div class="testimonials-grid">';
            $output .= do_shortcode($content);
            $output .= '</div>';
               $output .= '<div id="testimonialPreload"></div>
                    <div id="moreLoader" class="more-loader">
                    <img src="'. ELECTRICITY_THEME_URI  .'/images/ajax-loader.gif" alt=""></div>
                    <div class="text-center">
                    <a class="btn btn-lg btn-border view-more-testimonials" data-load="">
                    <i class="icon icon-lightning"></i>
                    <span>More Testimonials</span></a>
                    </div>';
        else:
            $output = '<div class="testimonials">';
            $output .= '<h2 class="text-center" style="color:' . ($title_color) . '">' . wp_kses_post($title_1) . '</h2>';
            $output .= '<div class="testimonials-carousel light-arrow">';
            $output .= do_shortcode($content);
            $output .= ' </div>';
            $output .= ' </div>';

        endif;
        self::$style = 0;
        $output .= ob_get_clean();
        return $output;
    }

    function electricity_testimonials_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'rev_name' => '',
            'company' => '',
                        ), $atts));
        $output = '';
        if (self::$style == "grid"):
            $output .= '<div class="testimonials-box">
            <div class="inside">
            <div class="testimonials-box-title">' . wp_kses_post($title) . '</div>
            <div class="testimonials-box-text">' . wp_kses_post($content) . '</div>
            <div class="testimonials-box-username">' . wp_kses_post($rev_name) . wp_kses_post($company
                                ) . '</div>';
            $output .= '</div>';
            $output .= '</div>';
        else:
            $output .= '<div class="testimonials-item">
                        <div class="testimonials-text">' . wp_kses_post($content) . '</div>
                        <div class="testimonials-username">' . wp_kses_post($rev_name) . '</div>
                    </div>';
        endif;
        return $output;
    }

}

new electronic_testimonials();