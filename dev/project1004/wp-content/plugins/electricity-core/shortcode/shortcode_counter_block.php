<?php
class electrician_counterbox {

    public function __construct() {
        add_shortcode('electrician_counterbox', array($this, 'electrician_counterbox_func'));
        add_shortcode('electrician_counterbox_item', array($this, 'electrician_counterbox_item_func'));
    }


    function electrician_counterbox_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts( array(
            'slides_to_show' => '4',
            'slides_to_scroll' => '1',
            'infinite' => 'false',
            'autoplay' => 'true',
            'autoplay_speed' => '4000',
            'arrows' => 'false',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_counterbox', $changed_atts);

        ob_start();

            $output = '<div class="row counter-carousel '.$extra_class.'">';
            $output .= do_shortcode($content);
            $output .= ' </div>';

            $output .= ob_get_clean();
        return $output;
    }



    function electrician_counterbox_item_func ($atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'count_number' => '',
            'number_scrolling_speed' => '',
            'extra_class' => '',
        ), $atts )); 
        
        ob_start();
        ?>
    <!-- Counters Block -->
    <div class="col-sm-12 <?php echo esc_attr($extra_class)?>">
        <div class="counter-box">
            <div class="counter-box-number">
                <span class="count" data-to="<?php if( $count_number != '' ){ echo esc_html( $count_number ); } ?>" 
                    <?php if( $number_scrolling_speed != '' ){ echo 'data-speed="'. intval( $number_scrolling_speed ) .'"'; } ?>>
                    <?php if( $count_number ){ echo $count_number; } ?></span><?php echo esc_html('+','electrician');?>
                </div>
            <div class="decor"></div>
            <div class="counter-box-text"><?php if( $title != '' ){ echo esc_attr( $title ); } ?></div>
        </div>
    <!-- //Counters Block -->
    </div>
        <?php 
         $content = ob_get_clean();
         return $content;  
    }

}

new electrician_counterbox();