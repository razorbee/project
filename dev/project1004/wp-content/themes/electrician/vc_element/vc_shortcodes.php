<?php
 class ElectricityTeam{
        public static $colno;
        public static function load(){
            add_shortcode( 'electricity_team_carousel', array(__CLASS__, 'electricity_team_carousel_func'));
            add_shortcode( 'electricity_team', array(__CLASS__, 'electricity_team_func'));
        }
        public static function electricity_team_carousel_func ($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'team_col' => '3',
            ), $atts));
            self::$colno = $team_col;
            $output .= '<div class="row bulb-carousel">';
                $output .=  do_shortcode($content);
            $output .= '</div>';
            self::$colno = null;
            return $output;
        }

        
        public static function electricity_team_func ($atts, $content = null)
        {
            extract( shortcode_atts( array(
                'name' => '',
                'designation' => '',
                'image' => '',
            ), $atts ));
            $column_no = self::$colno;

            switch((int)$column_no){
                case 2:
                    $colclass = 'col-sm-6 col-xs-12';
                    break;
                case 4:
                    $colclass = 'col-md-3 col-sm-4 col-xs-12';
                    break;
                default:
                    $colclass = 'col-md-4 col-sm-4 col-xs-12';
                    break;
            }
            $attachement_url = wp_get_attachment_url((int)$image);
            ob_start();
            
            ?>
            <div class="<?php echo esc_attr($colclass)?>">
                <div class="bulb-block">
                    <div class="bulb">
                        <div class="bulb-img">
                            <?php echo wp_get_attachment_image((int)$image, 'full');?>
                        </div>
                        <div class="bulb-mask">
                            <img src="<?php echo esc_url(ELECTRICITY_IMG_URL);?>bulbmask.png" alt="<?php echo esc_attr('Image')?>">
                        </div>
                    </div>
                    <div class="bulb-block-title"><?php echo wp_kses_post($name) ;?></div>
                    <div class="bulb-block-text"><?php echo wp_kses_post($designation);?></div>
                </div>
            </div>
            <?php
            return ob_get_clean();
        }
    }
    ElectricityTeam::load();
    
    add_shortcode( 'electricity_brand_carousel', 'electricity_brand_carousel_func' );
    function electricity_brand_carousel_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
        ), $atts));
        $rand = $slider_id;
        $output .= '<ul class="brands-carousel">';
            $output .=  do_shortcode($content);
        $output .= '</ul>';
        return $output;
    }

    add_shortcode( 'electricity_brand_carousel_items', 'electricity_brand_carousel_items_func' );
    function electricity_brand_carousel_items_func ($atts, $content = null){
        extract(shortcode_atts(array(
            'title' => '',
            'url' => '',
            'image' => '',
        ), $atts ));
        $attachement_url = wp_get_attachment_url((int) $image);
        ob_start();
        ?>
        <li class="slick-slide slick-active" data-slick-index="1" aria-hidden="false">
            <a href="<?php echo esc_url($url) ;?>"><img src="<?php  echo esc_url($attachement_url) ;?>" alt="<?php  echo esc_attr($title) ;?>"></a>
        </li> 
        <?php
        return ob_get_clean();
    }

    add_shortcode( 'electricity_nivo_slider', 'electricity_nivo_slider_func' );
    function electricity_nivo_slider_func ($atts, $content = null){
        extract(shortcode_atts(array(
            'navigation_type' => 0,
        ), $atts));
        $output .= '<div class="slider-wrapper theme-default">';
            $output .= '<div class="nivoSlider">';
                $output .=  do_shortcode($content);
            $output .= '</div>';
        $output .= '</div>';
        return $output;
    }

    add_shortcode( 'electricity_nivo_slider_items', 'electricity_nivo_slider_items_func' );
    function electricity_nivo_slider_items_func ($atts, $content = null){
        extract(shortcode_atts(array(
            'image' => '',
            'heading' => '',
            'sub_heading' => '',
            'slider_button' => '',
            'button_url' => '',
        ), $atts ));
        $attachement_url = wp_get_attachment_url((int) $image);
		$htmlcaption = rand(0000, 9999);
        ob_start();
        ?>
        <div class="slide">
            <img src="<?php echo esc_url($attachement_url) ;?>" title="#nivo-caption-<?php echo esc_attr($htmlcaption) ;?>" data-thumb="<?php echo esc_url($attachement_url) ;?>" alt="<?php echo esc_attr('Image')?>" />
            <div id="nivo-caption-<?php echo esc_attr($htmlcaption) ;?>" class="nivo-caption">
                <div class="vert-wrapper">
                    <div class="vert">
                        <div class="text text1 shahin"><?php echo wp_kses_post($heading);?></div>
                        <div class="text text2 margin-bottom"><?php echo wp_kses_post($sub_heading);?></div>
                        <div class="text text3">
                            <a href="<?php echo esc_url($button_url) ;?>" class="btn btn-lg"><i class="icon icon-lightning"></i><span><?php echo wp_kses_post($slider_button);?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <?php
        return ob_get_clean();
    }


    add_shortcode( 'electricity_work_category', 'electricity_work_category_func' );

    function electricity_work_category_func( $atts ) {
        extract( shortcode_atts( array(
            'image1' => '',
            'title1' => 'something',
            'call_to_action1' => 'something',
            'image2' => '',
            'title2' => 'something',
            'call_to_action3' => 'something',
            'image3' => '',
            'title3' => 'something',
            'call_to_action3' => 'something',
			
			'image4' => '',
            'title4' => 'something',
            'call_to_action4' => 'something',
			'image5' => '',
            'title6' => 'something',
            'call_to_action5' => 'something',
			'image6' => '',
            'title6' => 'something',
            'call_to_action6' => 'something',
        ), $atts ) );
        ob_start();
		print_r($atts );
        ?>
        <div class="skew-wrapper category-carousel light-arrow">
            <?php
            for($n = 1; $n < 7; $n++){
                if(empty(${'image'.$n})) continue;
                $attachement_url = wp_get_attachment_url((int)${'image'.$n});
                $title = ${'title'.$n};
                $call_to_action = ${'call_to_action'.$n};

            ?>
            <div class="skew" style="">
                <span class="straight-image"
                 style="background-image: url(<?php echo esc_url($attachement_url) ?>);">
                </span>
                <span class="straight">
                    <span class="title"><?php echo  wp_kses_post($title);?></span> 
                        <a class="btn btn-sm" href="<?php echo esc_url($call_to_action);?>"><span><?php echo esc_html(__('More info','electrician'));?></span></a>
                </span>
            </div>
            <?php }?>
        </div>
        <?php
        return ob_get_clean();
    }

    add_shortcode('gallaries', 'electricity_gallaries_cb');
    function electricity_gallaries_cb($atts = array())
    {
     extract(shortcode_atts(array(
            'layout_type' => '1',
            'title' => '',
            'showposts' => '-1',
            'orderby' => 'date',
            'order' => 'DESC',
            ), $atts));
        $filter_content_class="";
        ob_start();
        $test_query = new WP_Query("post_type=gallery&showposts={$showposts}&orderby={$orderby}&order={$order}");
    ?>
    <div class="filters-by-category">
        <ul class="option-set" data-option-key="filter">
            <li><a href="#filter" data-option-value="*" class="selected"><?php echo  wp_kses_post(__('All', 'electrician'));?></a></li>
    <?php

    $taxonomy = 'gallery-cat';
    $terms = get_terms($taxonomy, array('orderby'=>$orderby,'order'=>$order));
    if(empty($terms) || is_wp_error($terms)) return false;

        $filters = array('');

        foreach($terms as $term){
            $filters[] = $term->slug;
           
            echo '<li><a href="#filter" data-option-value=".'.$term->slug.'" class="">'.$term->name.'</a></li>';
        }
     echo '</ul></div> ';

    if ($test_query->have_posts()) :
        $rand = rand(000000, 999999);
        $prefix = "framework";

        echo '<div class="gallery gallery-isotope '. $filter_content_class.'" id="gallery"> ';

        while ($test_query->have_posts()): $test_query->the_post();


                $post_id = get_the_ID();


            $terms = get_the_terms( $post_id, 'gallery-cat' );
            $filter_class="";                       
            if ( $terms && ! is_wp_error( $terms ) ) : 
             
                $filter = array();
             
                foreach ( $terms as $term ) {
                    $filter[] = $term->slug;
                }
                                    
                $filter_class = join( " ", $filter );
            endif;

            $gallary_url = get_post_meta($post_id, "{$prefix}-gallery-url", true);

?>
                <div class="gallery__item <?php echo esc_attr($filter_class);?>">
                    <div class="gallery__item__image">
                    <?php 
                        the_post_thumbnail('gallery-thumbnail'); 
                        $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                        ?>
                        <a class="hover" href="<?php echo esc_url($image_url)?>"><div class="inside"><span class="icon icon-technology"></span><?php echo  wp_kses_post(__('View', 'electrician'));?></div></a> 
                    </div>
                </div>

<?php
   
        endwhile;
        echo '</div>';
       endif;
    echo ' <!-- gallery -->';
    echo ' </div>';
 
    wp_reset_postdata();

    $content = ob_get_clean();

    return $content;
}

    add_shortcode( 'electricity_price_list', 'electricity_price_list_func' );
    function electricity_price_list_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => 'Common',
            'costing' => 'Job Cost*',
            'description' => 'Description',
        ), $atts));
        ob_start();
        $output .= '
        <table class="table price-table">
            <tbody>
                <tr class="table-header">
                    <th>'.  wp_kses_post($title) .'</th>
                    <th>'.  wp_kses_post($costing) .'</th>
                    <th>'.  wp_kses_post($description) .'</th>
                </tr>
         ';
        $output .=  do_shortcode($content);
        $output .= '</tbody>
                    </table>';
        echo esc_html($output);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;       
    }

    add_shortcode( 'electricity_price_list_items', 'electricity_price_list_items_func' );
    function electricity_price_list_items_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'job_name' => '',
            'job_costing' => '',
            'job_description' => '',
     
            ), $atts));
        ob_start()
    ?>
    <tr>
        <td> <?php echo wp_kses_post($job_name) ;?></td>
        <td> <?php echo wp_kses_post($job_costing) ;?> </td>
        <td> <?php echo wp_kses_post($job_description) ;?></td>
    </tr>
    <?php
        $content = ob_get_clean();
        return $content;
    }

    add_shortcode( 'electricity_icon_carousel', 'electricity_icon_carousel_func' );
    function electricity_icon_carousel_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'column_no' => '4',
            ), $atts));
        ob_start();
        $output .= '';
        $output .= '<div class="row text-icon-carousel">';
            $output .=  do_shortcode($content);
        $output .= '</div>';
        echo  esc_html($output);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;   
    }

    add_shortcode( 'electricity_icon_carousel_items', 'electricity_icon_carousel_items_func' );
    function electricity_icon_carousel_items_func ($atts, $content = null)
    {
     extract(shortcode_atts(array(
            'icon' => '',
            'heading' => '',
            'description' => '',
            'icon_type' => '',
            'type'=>'electrician',
            'icon_fontawesome' => '',
            'icon_openiconic'=> '',
            'icon_typicons'=> '',
            'icon_entypo'=> '',
            'icon_linecons'=> '',
            'icon_monosocial'=>'',
     
            ), $atts));
if($icon_type=='')
    $icon_type=$type;
if($icon_type != 'electrician' && !empty($icon_type) && function_exists('vc_icon_element_fonts_enqueue')){
       vc_icon_element_fonts_enqueue( $icon_type );
       if(${'icon_'.$icon_type}!='')
       $icon=${'icon_'.$icon_type};
    } 
        ob_start()
    ?>
    <div class="col-sm-4">
        <div class="text-icon">
            <div class="text-icon-icon">
                <span>
                    <i class="icon <?php echo wp_kses_post($icon) ;?>"></i><span class="icon-hover"></span>
                    </span>
                </div>
                <div class="text-icon-title uu"><?php echo wp_kses_post($heading) ;?></div>
                <div class="text-icon-text"><?php echo wp_kses_post($description) ;?></div>
      </div>  
    </div>
    <?php
    $content = ob_get_clean();
    return $content;  
    }
