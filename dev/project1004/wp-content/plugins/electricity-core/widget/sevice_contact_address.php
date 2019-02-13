<?php

class SmartContactBox extends WP_Widget {

    public $defaults;

    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Contacts', 'electrician'),
            'phone' => '1 (800) 765-43-21',
            'address' => '8494 Signal Hill Road Manassas, VA, 20110',
            'hours' => 'Mon-Fri: 7:00am-7:00pm
                    <br>Sat-Sun: 10:00am-5:00pm',
            'address_title' => 'Our address:',
            'phone_title' => 'Call us:',
            'hours_title' => 'Work Time:',
        );

        parent::__construct(
                'smart_contact_box', // Base ID  
                esc_html__('Service Contact Box', 'electrician'), // Name  
                array(
            'description' => esc_html__('Side Bar Contact Box.', 'electrician')
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
            <label for="<?php echo esc_attr($this->get_field_id('address_title')); ?>">
                <strong><?php esc_html_e('Address Title', 'electrician') ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('address_title')); ?>" name="<?php echo esc_attr($this->get_field_name('address_title')); ?>" value="<?php echo esc_attr($instance['address_title']); ?>" />
            </label>
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address', 'electrician') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo wp_kses_post($instance['address']); ?></textarea>
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>">
                <strong><?php esc_html_e('Phone Title', 'electrician') ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>" value="<?php echo esc_attr($instance['phone_title']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone', 'electrician') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>"><?php echo wp_kses_post($instance['phone']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours_title')); ?>">
                <strong><?php esc_html_e('Work Time Title', 'electrician') ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('hours_title')); ?>" name="<?php echo esc_attr($this->get_field_name('hours_title')); ?>" value="<?php echo esc_attr($instance['hours_title']); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e('Work Time', 'electrician') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('hours')); ?>" name="<?php echo esc_attr($this->get_field_name('hours')); ?>"><?php echo wp_kses_post($instance['hours']); ?></textarea>
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
		if(isset($instance['address_title'])){
        	$address_title = $instance['address_title'];
		}else{
			 $address_title =$this->defaults['address_title'];
		}
		if(isset($instance['phone_title'])){
        	$phone_title = $instance['phone_title'];
		}else{
			 $phone_title = $this->defaults['phone_title'];
		}
		if(isset($instance['hours_title'])){
        	$hours_title = $instance['hours_title'];
		}else{
			 $hours_title = $this->defaults['hours_title'];
		}

        ?>

        <div class="contact-box">
            <div class="contact-box-row">
                <i class="icon-map-marker"></i>
                <div class="contact-box-row-title"><?php echo wp_kses_post($address_title); ?> </div>
                <div>
                    <?php if (!empty($instance['address'])): ?>
                        <div>  <?php echo wp_kses_post($instance['address']); ?> 
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contact-box-row">
                <i class="icon-telephone"></i>
                <div class="contact-box-row-title"><?php echo wp_kses_post( $phone_title); ?></div>
                <div>
                    <?php if (!empty($instance['phone'])): ?>
                        <div>  <?php echo wp_kses_post($instance['phone']); ?> 
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="contact-box-row">
                <i class="icon-clock"></i>
                <div class="contact-box-row-title"><?php echo wp_kses_post($hours_title ); ?></div>
                <div>
                    <div>
                        <?php if (!empty($instance['hours'])): ?>
                            <div>  <?php echo wp_kses_post($instance['hours']); ?> 
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['phone'] = $new_instance['phone'];
        $instance['address'] = $new_instance['address'];
        $instance['hours'] = $new_instance['hours'];

        $instance['address_title'] = $new_instance['address_title'];
        $instance['phone_title'] = $new_instance['phone_title'];
        $instance['hours_title'] = $new_instance['hours_title'];
        return $instance;
    }

}
function electrician_contact_address_widget() {
    register_widget( 'SmartContactBox' );
}
add_action( 'widgets_init', 'electrician_contact_address_widget' );