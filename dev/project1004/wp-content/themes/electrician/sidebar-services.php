<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPresss
 * @subpackage Electrician
 * @since Electrician 1.0
 */

if(is_active_sidebar('servicesidebar')){
    ?>
        <?php dynamic_sidebar('servicesidebar')?>
    <?php
}