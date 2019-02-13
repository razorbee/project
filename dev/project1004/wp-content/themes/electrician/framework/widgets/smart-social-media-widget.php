<?php

class Electricity_Social_Media_Widget extends WP_Widget {

    public $defs, $fieldlabels, $fieldicon;

    public function __construct() {

        $this->defs = array(
            'title' => '',
            'facebook' => '',
            'twitter' => '',
            'google' => '',
            //'rss' => '',
            //'pinterest' => '',
            //'vimeo' => '',
            //'flickr' => '',
            'linkedin' => '',
            //'youtube' => '',
            //'dribbble' => '',
            'instagram' => '',
            //'behance' => '',
            //'skype' => '',
            'tumblr' => '',
                //'reddit' => '',
        );

        $this->fieldicon = array(
            'title' => ' ',
            'facebook' => 'icon icon-facebook',
            'twitter' => 'icon icon-twitter',
            'google' => 'icon-google-plus',
            //'rss' => 'icon icon-rss',
            //'pinterest' => 'icon icon-pinterest',
            //'vimeo' => 'icon icon-vimeo',
            //'flickr' => 'icon icon-flickr',
            'linkedin' => 'icon icon-linkedin',
            //'youtube' => 'icon icon-youtube',
            //'dribbble' => 'icon icon-dribbble',
            'instagram' => 'icon icon-instagram',
            //'behance' => 'icon icon-behance',
            // 'skype' => 'icon icon-skype',
            'tumblr' => 'icon icon-tumblr',
                //'reddit' => 'icon icon-reddit',
        );

        $this->fieldlabels = array(
            'title' => 'Widget Title: ',
            'facebook' => 'Facebook: ',
            'twitter' => 'Twitter: ',
            'google' => 'Google Plus: ',
            //'rss' => 'RSS: ',
            //'pinterest' => 'Pinterest: ',
            //'vimeo' => 'Vimeo: ',
            //'flickr' => 'Flickr: ',
            'linkedin' => 'Linkedin: ',
            //'youtube' => 'Youtube: ',
            //'dribbble' => 'Dribbble: ',
            'instagram' => 'Instagram: ',
            //'behance' => 'Behance: ',
            //'skype' => 'Skype: ',
            'tumblr' => 'Tumblr:',
                //'reddit' => 'Reddit: ',
        );
        parent::__construct(
                'electricity-social-media', // Base ID  
                esc_html__('Electrician Social Media Widget', 'electrician'), array(
            'description' => esc_html__('Electrician Social Media Widget', 'electrician')
                )
        );
    }

    public function form($instance) {

        wp_parse_args((array) $instance, $this->defs);
        foreach ($this->fieldlabels as $key => $label):
            if (!isset($instance[$key]))
                $fieldval = $this->defs[$key];
            else
                $fieldval = $instance[$key];
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id($key)); ?>"><?php echo esc_html($label) ?></label><BR/>
                <input type="text" id="<?php echo esc_attr($this->get_field_id($key)); ?>" name="<?php echo esc_attr($this->get_field_name($key)); ?>" value="<?php echo esc_attr($fieldval) ; ?>" style="width:275px; height:30px" />
            </p>
            <?php
        endforeach;
    }

    public function update($new_instance, $old_instance) {

        $instance['title'] = strip_tags($new_instance['title']);
        $k = 0;
        foreach ($this->defs as $key => $val):
            $k++;
            if ($k > 1)
                $instance[$key] = $new_instance[$key];

        endforeach;

        return $instance;
    }

    public function widget($args, $instance) {
        extract($args);
        echo wp_kses_post($before_widget);
        if (!empty($instance['title']))
            echo wp_kses_post($before_title . apply_filters('widget_title', $instance['title']) . $after_title);
        ?>
        <div class="social-links">
            <ul>        
                <?php
                $k = 0;
                foreach ($this->defs as $key => $val):
                    $k++;
                    if ($k > 1 && $instance[$key] != '')
                        print "<li class=''><a href='{$instance[$key]}' class='{$this->fieldicon[$key]}' title='" . ucfirst($key) . "' target='_blank'></a></li>";
                endforeach;
                ?>
            </ul>
        </div>        
        <?php
        echo wp_kses_post($after_widget);
    }

}

function electrician_social_media_widget() {
    register_widget( 'Electricity_Social_Media_Widget' );
}
add_action( 'widgets_init', 'electrician_social_media_widget' );