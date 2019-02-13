<?php
add_shortcode('electricial_action_button', 'electricial_action_button_func');

function electricial_action_button_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => '',
        'popup_id' => '1',
        'button_action'=>'1',
        'popup_position'=>'bottom',
        'link_url' => '',
        'icon_type' => '',
        'icon' => 'icon-lightning',
        'icon_fontawesome' => '',
        'icon_openiconic'=> '',
        'icon_typicons'=> '',
        'icon_entypo'=> '',
        'icon_linecons'=> '',
        'icon_monosocial'=>'',
        'extra_class' => '',
        'type'=>'electrician',

                    ), $atts));

    $popup_position_class='';
    switch ($popup_position) {
    case "top":
        $popup_position_class = "form-popup--top"; 
        break;
    case "bottom":
            $popup_position_class = ""; 
        break;
    
    default:
         $popup_position_class = ""; 
} 
$href = vc_build_link($link_url);
if($icon_type=='')
    $icon_type=$type;
if($icon_type != 'electrician' && !empty($icon_type) && function_exists('vc_icon_element_fonts_enqueue')){
       vc_icon_element_fonts_enqueue( $icon_type );
       if(${'icon_'.$icon_type}!='')
       $icon=${'icon_'.$icon_type};
    } 
    ob_start();
 ?>  
        <?php if($button_action == '1') : ?>
                
            <?php if(isset($href['url']) && $href['url']!=''){ ?>
                <a class="btn" target="<?php echo esc_url( $href['target']) ;?>" href="<?php echo esc_url( $href['url']) ;?>"><i class="<?php if($icon_type == 'electrician') echo 'icon';?> <?php echo $icon ?>"></i>
                   <span><?php echo esc_html($href['title']); ?></span>
                </a>
            <?php } ?>
            <?php else :?>
             <div class="form-popup-wrap <?php echo esc_attr($extra_class)?>">
                <a href="#" class="btn btn-invert form-popup-link"><i class="icon <?php echo esc_attr($icon)?>"></i><span><?php echo esc_html($title); ?></span></a>
                    <div class="form-popup <?php echo esc_attr($popup_position_class)?> <?php echo esc_attr($extra_class)?>">
                       
                            <?php echo do_shortcode('[contact-form-7 id="' . $popup_id . '"]'); ?>  
                    </div>
            </div>
            <?php endif ;?>
    <?php
    $content = ob_get_clean();
    return $content;
}