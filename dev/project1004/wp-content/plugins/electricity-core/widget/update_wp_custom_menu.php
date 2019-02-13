<?php
/**
 * Widget API: WP_Nav_Menu_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement the Custom Menu widget.
 *
 * @since 3.0.0
 *
 * @see WP_Widget
 */
class WP_Service_Nav_Menu_Widget extends WP_Widget {

    /**
     * Sets up a new Custom Menu widget instance.
     *
     * @since 3.0.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'description' => __('Add a service custom menu to your sidebar.'),
            'customize_selective_refresh' => true,
        );
        parent::__construct('WP_Service_Nav_Menu_Widget', __('Service Custom Menu'), $widget_ops);
    }

    /**
     * Outputs the content for the current Custom Menu widget instance.
     *
     * @since 3.0.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Custom Menu widget instance.
     */
    public function widget($args, $instance) {
        // Get menu
        $nav_menu = !empty($instance['nav_menu']) ? wp_get_nav_menu_object($instance['nav_menu']) : false;
        $checked = $instance['ser_checked'] ? TRUE : FALSE;
        // if (!$nav_menu)
        //    return;
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $instance['title'] = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        echo $args['before_widget'];
        $menu_no = wp_get_nav_menu_items($nav_menu);

        if (!empty($instance['title']))
            if (!empty ($menu_no)) {
				$instance_title_id = str_replace(' ', '', $instance['title']);
                echo '<a class="service-btn collapsed customwidget_'.basename($instance['slug']).'" type="button" data-toggle="collapse" href="#' . $instance_title_id . '" aria-expanded="false">' . $instance['title'] . '</a><div class="collapse ul_wapper" id="' .$instance_title_id. '">';
                //$nav_menu_args = array('fallback_cb' => '', 'menu' => $nav_menu);
                echo '<ul class="service-list">';
                $primaryNav = wp_get_nav_menu_items($nav_menu); // Get the array of wp objects, the nav items for our queried location.  
                foreach ($primaryNav as $navItem) {
                    $menu_post_slug = get_post_field( 'post_name',$navItem->object_id);
                    echo '<li class="customwidget_'.$menu_post_slug.'"><a class="customwidget_'.$menu_post_slug.'-a" href="' . $navItem->url . '" title="' . $navItem->title . '">' . $navItem->title . '</a></li>';
                }
                if ($checked) {
                    echo '<li><a href="' . $instance['menu_link'] . '">' . $instance['menu_title'] . '</li></a>';
                }
                echo "</ul>";
                // wp_nav_menu(apply_filters('widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance));
                echo '</div>';
            } else {
                echo '<a href="' . $instance['menu_link'] . '" class="service-btn collapsed empty-menu-widget  customwidget_'.basename($instance['slug']).'">' . $instance['title'] . '</a>';
            }
        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance) {

        $instance = array();
        if (!empty($new_instance['title'])) {
            $instance['title'] = sanitize_text_field($new_instance['title']);
        }
        if (!empty($new_instance['nav_menu'])) {
            $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        }
        $instance['slug'] = $new_instance['slug'];
        $instance['ser_checked'] = $new_instance['ser_checked'];
        $instance['menu_title'] = $new_instance['menu_title'];
        $instance['menu_link'] = $new_instance['menu_link'];
        return $instance;
    }

    public function form($instance) {
        global $wp_customize;
        $title = isset($instance['title']) ? $instance['title'] : '';
        $slug = isset($instance['slug']) ? $instance['slug'] : '';
        
        $nav_menu = isset($instance['nav_menu']) ? $instance['nav_menu'] : '';
        $menu_link = isset($instance['menu_link']) ? $instance['menu_link'] : '';
        $menu_title = isset($instance['menu_title']) ? $instance['menu_title'] : '';
        // Get menus
        $menus = wp_get_nav_menus();
        // If no menus exists, direct the user to go and create some.
        ?>
        <p class="nav-menu-widget-no-menus-message" <?php
        if (!empty($menus)) {
            echo ' style="display:none" ';
        }
        ?>>
               <?php
               if ($wp_customize instanceof WP_Customize_Manager) {
                   $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
               } else {
                   $url = admin_url('nav-menus.php');
               }
               ?>
               <?php echo sprintf(__('No menus have been created yet. <a href="%s">Create some</a>.'), esc_attr($url)); ?>
        </p>
        <div class="nav-menu-widget-form-controls" <?php
        if (empty($menus)) {
            echo ' style="display:none" ';
        }
        ?>>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>"/>
            </p>
             <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Menu Link:') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('slug'); ?>" name="<?php echo $this->get_field_name('slug'); ?>" value="<?php echo esc_attr($slug); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
                <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                    <option value="0"><?php _e('&mdash; Select &mdash;'); ?></option>
                    <?php foreach ($menus as $menu) : ?>
                        <option value="<?php echo esc_attr($menu->term_id); ?>" <?php selected($nav_menu, $menu->term_id); ?>>
                            <?php echo esc_html($menu->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['ser_checked'], 'on'); ?> id="<?php echo $this->get_field_id('ser_checked'); ?>" name="<?php echo $this->get_field_name('ser_checked'); ?>" /> 
                <label for="<?php echo $this->get_field_id('ser_checked'); ?>">Embed at the end  of the above menu list</label>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('menu_title'); ?>"><?php _e('Menu Title:') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('menu_title'); ?>" name="<?php echo $this->get_field_name('menu_title'); ?>" value="<?php echo esc_attr($menu_title); ?>"/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('menu_link'); ?>"><?php _e('Menu Link:') ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('menu_link'); ?>" name="<?php echo $this->get_field_name('menu_link'); ?>" value="<?php echo esc_attr($menu_link); ?>"/>
            </p>

            <?php if ($wp_customize instanceof WP_Customize_Manager) : ?>
                <p class="edit-selected-nav-menu" style="<?php
                if (!$nav_menu) {
                    echo 'display: none;';
                }
                ?>">
                    <button type="button" class="button"><?php _e('Edit Menu') ?></button>
                </p>
            <?php endif; ?>
        </div>
        <?php
    }

}

function wpb_service_custom_menu_widget() {
    register_widget('WP_Service_Nav_Menu_Widget');
}

add_action('widgets_init', 'wpb_service_custom_menu_widget');
