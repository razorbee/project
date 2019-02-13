<?php

class FooterGoogleMap extends WP_Widget {

    public $defaults;

    public function __construct() {
        $this->defaults = array(
            'title' => '',
        );
        parent::__construct(
                'footer_map', // Base ID  
                esc_html__('Electrician Footer Map', 'electrician'), // Name  
                array(
            'description' => esc_html__('Footer Google Map.', 'electrician')
                )
        );
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, $this->defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'electrician') ?>:</strong><br /><input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </label>
        </p> 
        <?php
    }

    function widget($args, $instance) {
        extract($args);
        echo wp_kses_post($before_widget);
        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            echo wp_kses_post($before_title . $title . $after_title);
        };
        if(function_exists('electrician_options')){
            $electrician_option = electrician_options();
         if (isset($electrician_option['electrician-display-gmap']) && $electrician_option['electrician-display-gmap'] && !empty($electrician_option['electrician-gmap-api-key'])
            ){
               echo ' <div id="footer-map"></div>';
            }
        }
         
        ?>
       
        <?php
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

}

function electrician_FooterGoogleMap() {
    register_widget('FooterGoogleMap');
}

add_action('widgets_init', 'electrician_FooterGoogleMap');
