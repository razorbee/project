<?php
    class ElectricityTeam{
        public static $colno, $mask;
        public static function load(){
            add_shortcode( 'electricity_team_carousel', array(__CLASS__, 'electricity_team_carousel_func'));
            add_shortcode( 'electricity_team', array(__CLASS__, 'electricity_team_func'));
        }
        public static function electricity_team_carousel_func ($atts = array(), $content = null)
        {
            extract(shortcode_atts(array(
                'team_col' => '3',
                'slider_swich' => 'true',
                'mask_image' => ELECTRICITY_IMG_URL.'bulbmask.png',
            ), $atts));

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'false',
            'slides_to_show' => '3',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '6000',
            'arrows' => 'false',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_bulb', $changed_atts);

            self::$colno = $team_col;
            self::$mask = $mask_image;
            if($slider_swich != 'false'){
                 $output = '<div class="row bulb-carousel">';
             }else{
                 $output = '<div class="row">';
             }
           
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
                'call_action'=>'',

            ), $atts ));
            $column_no = self::$colno;

            switch((int)$column_no){
                case 2:
                    $colclass = 'col-sm-6 col-xs-12';
                    break;
                case 4:
                    $colclass = 'col-md-3 col-sm-3 col-xs-12';
                    break;
                default:
                    $colclass = 'col-md-4 col-sm-4 col-xs-12';
                    break;
            }
            $attachement_url = wp_get_attachment_url((int)$image);
            $mask = self::$mask;
            if(is_numeric($mask)){
                $mask = wp_get_attachment_url((int)$mask);
            }
            ob_start();

            ?>
            <div class="<?php echo esc_attr($colclass)?>">
                <div class="bulb-block">
                    <div class="bulb">
                        <div class="bulb-img">
                            <?php echo wp_get_attachment_image((int)$image, 'full');?> 
                        </div>
                        <?php if(!empty($mask)){?>
                        <div class="bulb-mask">
                            <?php  
                            $href = vc_build_link( $call_action ) ;
                            if( !empty($href['url'])&&( $href['url']!='')) : ?>

                            <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?> 
                              rel="<?php echo $href['rel'];?>"  >
                            <?php endif;?>
                            <img src="<?php echo esc_url($mask)?>" alt="<?php esc_attr_e('Mask Image', 'electricity-core')?>" />
                             <?php    if( !empty($href['url'])&&( $href['url']!='')) : ?>

                                </a>
                            <?php endif;?>
                        </div>
                        <?php }?>
                    </div>
                    <h5 class="bulb-block-title"><?php echo wp_kses_post($name) ;?></h5>
                    <div class="bulb-block-text"><?php echo wp_kses_post($designation);?></div>
                </div>
            </div>
            <?php
            return ob_get_clean();
        }
    }
    //ElectricityTeam::load();
    add_action('init', array('ElectricityTeam', 'load'));
    
    add_shortcode( 'electricity_brand_carousel', 'electricity_brand_carousel_func' );
    function electricity_brand_carousel_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
        ), $atts));

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'true',
            'slides_to_show' => '7',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'arrows' => 'false',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_brand', $changed_atts);

        $output = '<ul class="brands-carousel">';
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
            <a target="_blank" href="<?php echo esc_url($url) ;?>"><img src="<?php  echo esc_url($attachement_url) ;?>" alt="<?php  echo esc_url($title) ;?>"></a>
        </li>
        <?php
        return ob_get_clean();
    }

    class class_electricity_nivo_slider{
        public static $textlayers;
        public static function init(){
            add_shortcode( 'electricity_nivo_slider', array(__CLASS__, 'electricity_nivo_slider_func') );
            add_shortcode( 'electricity_nivo_slider_items', array(__CLASS__, 'electricity_nivo_slider_items_func') );
        }
        public static function electricity_nivo_slider_func ($atts, $content = null){
            extract(shortcode_atts(array(
                'navigation_type' => 0,
            ), $atts));

        $changed_atts = shortcode_atts(array(
            'anim_speed' => '500',
            'pause_time' => '6000',
            'pause_on_hover' => 'true',
            'effect' => 'sliceUpDown',
            'prev_text' => '',
            'next_text' => '',
            'control_nav' => 'false',
            'autoplay'  => 'true',
            'direction_nav' => 'true'
        ), $atts);

        wp_localize_script( 'electrician-custom', 'ajax_nivoslider', $changed_atts);

            self::$textlayers = '';
            $output = '<div class="slider-wrapper theme-default">';
                $output .= '<div class="nivoSlider">';
                    $output .=  do_shortcode($content);
                $output .= '</div>';
                $output .= self::$textlayers;
            $output .= '</div>';

            return $output;
        }


        public static function electricity_nivo_slider_items_func ($atts, $content = null){
            extract(shortcode_atts(array(
                'image' => '',
                'heading' => '',
                'sub_heading' => '',
            ), $atts ));
            $attachement_url = wp_get_attachment_url((int) $image);
            $htmlcaption = rand(0000,9999);
            ob_start();
            ?>
            <img src="<?php echo esc_url($attachement_url) ;?>" title="#nivo-caption-<?php echo $htmlcaption ;?>" data-thumb="<?php echo esc_url($attachement_url) ;?>" alt="" />
            <?php
            $output = ob_get_clean();
            ob_start();
            ?>
            <div id="nivo-caption-<?php echo $htmlcaption ;?>" class="nivo-caption">
                <div class="vert-wrapper">
                    <div class="vert">
                        <div class="text text1"><?php echo wp_kses_post($heading);?></div>
                        <div class="text text2 margin-bottom"><?php echo wp_kses_post($sub_heading);?></div>                        
                    </div>
                </div>
            </div>
            <?php
            self::$textlayers .= ob_get_clean();
            return $output;
        }
    }
    class_electricity_nivo_slider::init();
    

    add_shortcode( 'electricity_work_category', 'electricity_work_category_func' );

    function electricity_work_category_func( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'image1' => '',
            'title1' => '',
            'call_to_action1' => '',
            'image2' => '',
            'title2' => '',
            'call_to_action2' => '',
            'image3' => '',
            'title3' => '',
            'call_to_action3' => '',
            'button_text1' => '',
            'button_text2' => '',
            'button_text3' => '',
            'image4' => '',
            'title4' => 'something',
            'call_to_action4' => 'something',
            'image5' => '',
            'title5' => 'something',
            'call_to_action5' => 'something',
            'image6' => '',
            'title6' => 'something',
            'call_to_action6' => 'something',
            'button_text4' => '',
            'button_text5' => '',
            'button_text6' => '',
        ), $atts ) );

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'true',
            'slides_to_show' => '1',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'arrows' => 'true',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_cat_car', $changed_atts);


        ob_start();
        ?>
        <div class="skew-wrapper category-carousel light-arrow custom-css-add">
             <div class="container custom-css-add-container">
            <?php
            $number=0;
            for($n = 1; $n < 7; $n++){
                if(empty(${'image'.$n})) continue;
                $number++;
                $attachement_url = wp_get_attachment_url((int)${'image'.$n});
                $title = ${'title'.$n};
                $button_text = ${'button_text'.$n};
                $call_to_action = isset(${'call_to_action'.$n}) ? ${'call_to_action'.$n} : '';
            ?>
            <div class="skew" style="" data-num="<?php echo $n ;?>">
                <span class="straight-image"
                 style="background-image: url(<?php echo esc_url($attachement_url) ?>);">
                </span>
                <span class="straight">
                    <span class="title"><?php echo  wp_kses_post($title);?></span>
                    <?php if (isset($button_text) && !empty($button_text)) { ?>
                    <a class="btn btn-sm" href="<?php echo $call_to_action;?>"><span><?php echo $button_text;?></span></a>
                    <?php } ?>
                </span>
            </div>
            <?php 
            } ?>
            </div>
            </div>
            <?php
            $mainwidth=100/$number;
            if(is_int($mainwidth)){
                echo '<style>'.'.skew-wrapper.custom-css-add .skew{ width:'.$mainwidth.'% !important }</style>';
            }else{
                //var_dump(round($mainwidth, 2)-0.01);
                echo '<style>'.'.skew-wrapper.custom-css-add .skew{ width:'.(round($mainwidth, 2)-0.01) .'% !important }</style>';
            }
            $hoverwidth=100/($number+1);
           
            if(is_int($hoverwidth)){
                
                echo '<style>'.'.skew-wrapper.custom-css-add .skew.min{ width:'.$hoverwidth.'% !important }</style>';
                echo '<style>'.'.skew-wrapper.custom-css-add .skew.active{ width:'.$hoverwidth*2 .'% !important }</style>';
            }else{
                echo '<style>'.'.skew-wrapper.custom-css-add .skew.min{ width:'.(round($hoverwidth, 2)-0.01).'% !important }</style>';
                echo '<style>'.'.skew-wrapper.custom-css-add .skew.active{ width:'.$hoverwidth*2 .'% !important }</style>';
            }
            
            

        ?>
            
        
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
            <li><a href="#filter" data-option-value="*" class="selected"><?php echo  wp_kses_post(__('All', 'electricity-core'));?></a></li>
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
                        the_post_thumbnail('electrician-gallery-thumbnail'); 
                        $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                        ?>
                        <a class="hover" href="<?php echo esc_url($image_url)?>"><div class="inside"><span class="icon icon-technology"></span><?php echo  wp_kses_post(__('View', 'electricity-core'));?></div></a> 
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
        return $output;
        
    }

    add_shortcode( 'electricity_price_list_items', 'electricity_price_list_items_func' );
    function electricity_price_list_items_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'job_name' => '',
            'job_costing' => '',
            'job_description' => '',
     
            ), $atts));
        ob_start();
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

class ElectricityIconCarousel{
        public static $colno, $mask;
        public static function load(){
            add_shortcode( 'electricity_icon_carousel', array(__CLASS__, 'electricity_icon_carousel_func'));
            add_shortcode( 'electricity_icon_carousel_items', array(__CLASS__, 'electricity_icon_carousel_items_func'));
        }

   public static function electricity_icon_carousel_func ($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'column_no' => '4',
            'mobileslide' => '',
            ), $atts));

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'true',
            'slides_to_show' => '1',
            'slides_to_scroll' => '1',
            'infinite' => 'true',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'arrows' => 'true',
            'dots' => 'true'
        ), $atts );

        wp_localize_script( 'electrician-custom', 'ajax_text_icon', $changed_atts);

        self::$colno = $column_no;
        if($mobileslide){
            $mobileslide ='text-icon-carousel';
        }else{
            $mobileslide = '';
        }


        $output = '';
        $output .= '<div class="row '.$mobileslide.' text-icon-grid-flex">';
        $output .=  do_shortcode($content);
        $output .= '</div>';
        self::$colno = null;
        return $output;
    }

    public static  function electricity_icon_carousel_items_func ($atts, $content = null)
    {
     extract(shortcode_atts(array(
            'type' => 'electrician',
            'option_icon' => 'icon',
            'icon' => '',
            'thumbnail'=>'',
            'heading' => '',
            'description' => '',
            'call_action'=>'',
            'icon_fontawesome' => '',
            'icon_openiconic'=> '',
            'icon_typicons'=> '',
            'icon_entypo'=> '',
            'icon_linecons'=> '',
            'icon_monosocial'=>'',
            'icon_type' => '',


            ), $atts));
    $thumbnail_img = wp_get_attachment_image_src((int) $thumbnail, 'full');
    $column_no = self::$colno;

            switch((int)$column_no){
                case 2:
                    $colclass = 'col-sm-6 col-xs-12';
                    break;
                case 3:
                    $colclass = 'col-md-4 col-sm-6 col-xs-12';
                    break;
                case 4:
                    $colclass = 'col-md-3 col-sm-4 col-xs-12';
                    break;
                case 6:
                    $colclass = 'col-xs-6 col-sm-4 col-md-3 col-5';
                    break;
                default:
                    $colclass = 'col-md-4 col-sm-4 col-xs-12';
                    break;
            }
if($icon_type=='')
    $icon_type=$type;
if($icon_type != 'electrician' && !empty($icon_type) && function_exists('vc_icon_element_fonts_enqueue')){
    vc_icon_element_fonts_enqueue( $icon_type );
    if(${'icon_'.$icon_type}!='')
        $icon=${'icon_'.$icon_type};
}
        ob_start();
    ?>
    <div class="<?php echo esc_attr($colclass)?>">
        <div class="text-icon">
        <?php  $href = vc_build_link( $call_action ) ;
        if( !empty($href['url'])&&( $href['url']!='')) : ?>

                         <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?>   rel="<?php echo $href['rel'];?>"  >
         <?php endif;?>
        <div class="text-icon-icon">
             <span>
            <?php
                if($option_icon=='image'){

                    echo '<img src="'.  $thumbnail_img[0] .'" alt="photo" />';

                }else{
                        ?>

                            <i class="icon <?php echo wp_kses_post($icon) ;?>"></i><span class="icon-hover"></span>

                        <?php
                }

             ?>
              </span>
        </div>
        <?php    if( !empty($href['url'])&&( $href['url']!='')) : ?>

             </a>
        <?php endif;?>

            <div class="text-icon-title sdd">

                <?php   if( !empty($href['url'])&&( $href['url']!='')) : ?>

                         <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?>   rel="<?php echo $href['rel'];?>"  >
                    <?php endif;?>
                    <?php echo wp_kses_post($heading) ;?>
                    <?php   if( !empty($href['url'])&&( $href['url']!='')) : ?>
                    </a>
                    <?php endif;?>
            </div>
            <div class="text-icon-text"><?php echo wp_kses_post($description) ;?></div>
      </div>
    </div>
    <?php
    $content = ob_get_clean();
    return $content;
    }
    }
    //ElectricityIcon::load();
    add_action('init', array('ElectricityIconCarousel', 'load'));