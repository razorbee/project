<?php

class SmartContactList extends WP_Widget {
    public $defaults;
    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Contacts', 'electrician'),
            'land_phone' => '1 (800) 765-43-21',
            'email' => 'info@yourdomain.com',
            'address' => '8494 Signal Hill Road Manassas,VA, 20110',
            'hours' => 'Mon-Fri 08:00 AM - 05:00 PM, Sat-Sun'
        );
        parent::__construct(
                'smart_contact_list', // Base ID  
                esc_html__('Electrician Contact List', 'electrician'), // Name  
                array(
            'description' => esc_html__('This widget will Contact List.', 'electrician')
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

  

        <p>

            <label for="<?php echo esc_attr($this->get_field_id('land_phone')); ?>"><?php esc_html_e('Phone', 'electrician') ?></label>

            <input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id('land_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('land_phone')); ?>" value="<?php echo esc_attr($instance['land_phone']); ?>" />

        </p>
        
   

        <p>

            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email', 'electrician') ?></label>

            <input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo sanitize_email($instance['email']); ?>" />

        </p>
  

        <p>

            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address', 'electrician') ?></label>

            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo wp_kses_post($instance['address']); ?></textarea>

        </p>

        <p>

            <label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e('Hours', 'electrician') ?></label>

            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('hours')); ?>" name="<?php echo esc_attr($this->get_field_name('hours')); ?>"><?php echo wp_kses_post($instance['hours']); ?></textarea>

        </p>



        <?php
    }

    function widget($args, $instance) {
        global $smof_data;

        extract($args);

        echo wp_kses_post($before_widget);

        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            echo wp_kses_post($before_title . $title . $after_title);
        };
        ?>
        <ul class="contact-list">

            <?php
            if (!empty($instance['land_phone'])):
                ?>
               <li>
                   <span class="list-label"><?php echo wp_kses_post(__('<b>P</b>hone:', 'electrician'))?> </span> <span class="text"> <?php echo wp_kses_post($instance['land_phone']); ?></span>

                </li>
            <?php endif; ?>
            <?php
            if (!empty($instance['email'])):
                ?>
             <li><span class="list-label"><?php echo wp_kses_post(__('<b>E</b>mail:', 'electrician'))?> </span> <span class="text"> <?php echo wp_kses_post($instance['email']); ?></span></li>
 
            <?php endif; ?>


            <?php
            if (!empty($instance['address'])):
                ?>
                <li><span class="list-label"><?php echo wp_kses_post(__('<b>A</b>ddress:', 'electrician'))?> </span> <span class="text"> <?php echo wp_kses_post($instance['address']); ?></span></li>
              

            <?php endif; ?>

            <?php
            if (!empty($instance['hours'])):?>
                <li>
                  
                    <?php echo wp_kses_post($instance['hours']); ?>
                </li>
            <?php endif; ?>

             
        </ul>
        <?php
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['address'] = $new_instance['address'];


        $instance['land_phone'] = $new_instance['land_phone'];

        $instance['email'] = $new_instance['email'];

        $instance['hours'] = $new_instance['hours'];



        return $instance;
    }

}

function electrician_Contacts_widget() {
    register_widget( 'SmartContactList' );
}
add_action( 'widgets_init', 'electrician_Contacts_widget' );