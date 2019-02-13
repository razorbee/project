<?php

class electronic_servicesTestimonials {

    public static $col_no;
    
    public function __construct() {
        add_shortcode('electrician_thumb_link', array($this, 'electrician_thumb_link_func'));
        add_shortcode('electronic_thumb_link_item', array($this, 'electrician_thumb_link_item_func'));
    }

    function electrician_thumb_link_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'extra_class' => '',
            'col_no' => '',
                        ), $atts));

 
        self::$col_no = $col_no;
        $output = '';
        $output .= '<div class="row">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        self::$col_no = 0;
        return $output;
    }

    function electrician_thumb_link_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'description' => '',
            'image' => '',
            'call_action' => '',
            'extra_class' => '',
            'css_animation' => '',
                        ), $atts));


        $column_no = self::$col_no;
        switch ((int) $column_no) {
            case 1:
                $colclass = 'col-sm-3';
                break;
            case 2:
                $colclass = 'col-sm-6 col-md-6';
                break;
            case 4:
                $colclass = 'col-sm-6 col-md-3';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }

        $attachement = wp_get_attachment_image_src((int) $image, 'full');
        ob_start();
        ?>
        <div class="col-sm-6 col-md-4">
            <?php
            $href = vc_build_link($call_action);
            ?>
            <a <?php if(!empty($href['url'])){ ?> href="<?php echo $href['url']; ?>" rel="<?php echo $href['rel']; ?>" <?php } ?>  class="category-item">
                <div class="category-image">
                    <img alt="<?php echo esc_attr($href['title']); ?>"  src="<?php
                    if ($attachement != array()) {
                        echo esc_url($attachement[0]);
                    }
                    ?>" alt="" class="img-responsive">
                </div>
                <h5 class="category-title"><?php echo esc_html($title); ?></h5>
                <div class="category-text"><?php echo esc_html($description); ?> </div>
            </a>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}

new electronic_servicesTestimonials();