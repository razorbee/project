<?php
add_filter( 'rwmb_meta_boxes', 'electricity_register_framework_post_meta_box' );
/**
* Register meta boxes
*
* Remember to change "your_prefix" to actual prefix in your project
*
* @return void
*/
function electricity_register_framework_post_meta_box( $meta_boxes )
{
        global $wp_registered_sidebars;
        //$electricity_option = electricity_get_options();

        /**
        * prefix of meta keys (optional)
        * Use underscore (_) at the beginning to make keys hidden
        * Alt.: You also can make prefix empty to disable it
        */
        // Better has an underscore as last sign
        $prefix = 'framework';
        
        $sidebars = array();
        
        foreach($wp_registered_sidebars as $key=>$value){
            $sidebars[$key] = $value['name'];            
        }
        
        $opacities = array();

        for($o = 0.0, $n = 0; $o <= 1.0; $o += 0.1, $n++){
            $opacities[$n] = $o;
        }
        

        $meta_boxes[] = array(
            'id' => 'framework-meta-box-post-format-quote',
            'title' => esc_html__('Post Format Data', 'electrician'),
            'pages' => array(
                'post',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(
                array(
                    'name' => esc_html__('Quote Author', 'electrician'),
                    'desc' => esc_html__('Insert quote author name.', 'electrician'),
                    'id' => "{$prefix}-quote-author",
                    'type' => 'text',                    
                ),
                array(
                    'name' => esc_html__('Quote Author Url', 'electrician'),
                    'desc' => esc_html__('Insert author url.', 'electrician'),
                    'id' => "{$prefix}-quote-author-link",
                    'type' => 'text',                    
                ),
                array(
                    'name' => esc_html__('Quote Text', 'electrician'),
                    'desc' => esc_html__('Insert Quote Text.', 'electrician'),
                    'id' => "{$prefix}-quote",
                    'type' => 'textarea',                    
                ),
        ));
                    

        $meta_boxes[] = array(
            'id' => 'framework-meta-box-post-format-video',
            'title' => esc_html__('Post Format Data', 'electrician'),
            'pages' => array(
                'post',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(        
                array(
                    'name' => esc_html__('Video Markup', 'electrician'),
                    'desc' => esc_html__('Put embed src of video. i.e. youtube, vimeo', 'electrician'),
                    'id' => "{$prefix}-video-markup",
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 3,                    
                    // 'clone' => true                            
                ),
        ));

        $meta_boxes[] = array(
            'id' => 'framework-meta-box-post-format-audio',
            'title' => esc_html__('Post Format Data', 'electrician'),
            'pages' => array(
                'post',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(        
                array(
                    'name' => esc_html__('Audio Markup', 'electrician'),
                    'desc' => esc_html__('Put embed src of video. i.e. youtube, vimeo', 'electrician'),
                    'id' => "{$prefix}-audio-markup",
                    'type' => 'textarea',
                    'cols' => 20,
                    'rows' => 3,                    
                    // 'clone' => true                            
                ),
        ));


        $meta_boxes[] = array(
            'id' => 'framework-meta-box-post-format-link',
            'title' => esc_html__('Post Format Data', 'electrician'),
            'pages' => array(
                'post',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(
                array(
                    'name' => esc_html__('Link', 'electrician'),
                    'desc' => esc_html__('Works with link post format.', 'electrician'),
                    'id' => "{$prefix}-link",
                    'type' => 'text',                    
                ),
                array(
                    'name' => esc_html__('Link title', 'electrician'),
                    'desc' => esc_html__('Works with link post format.', 'electrician'),
                    'id' => "{$prefix}-link-title",
                    'type' => 'text',                    
                ),
        ));

        $meta_boxes[] = array(
            'id' => 'framework-meta-box-post-format-image',
            'title' => esc_html__('Post Format Data', 'electrician'),
            'pages' => array(
                'post',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(        
                
                 array(
                    'name' => esc_html__('Upload Gallery Images', 'electrician'),
                    'id' => "{$prefix}-image",
                    'desc' => '',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 24,
                    
                ),
        )); 




        $meta_boxes[] = array(
            'id' => 'framework-meta-box-post-format-gallery',
            'title' => esc_html__('Post Format Data', 'electrician'),
            'pages' => array(
                'post',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(        
                

                 array(
                    'name' => esc_html__('Upload Gallery Images', 'electrician'),
                    'id' => "{$prefix}-gallery",
                    'desc' => '',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 24,
                    
                ),
        ));   
        
           $meta_boxes[] = array(
            'id' => 'framework-meta-box-gallery',
            'title' => esc_html__('Manage Gallery Meta Fields', 'electrician'),
            'pages' => array(
                'gallery',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(        

                array(
                    'name' => esc_html__('Gallery Url', 'electrician'),
                    'desc' => esc_html__('Enter Your Gallary Details Url.', 'electrician'),
                    'id' => "{$prefix}-gallery-url",
                    'type' => 'text',                    
                ),


        )); 

        
    $meta_boxes[] = array(
        'id' => $prefix .'_service_meta_box',
        'title' => esc_html__('Service Design Settings', 'electrician'),
        'pages' => array(
            'electrician_services',
        ),
        'context' => 'normal',
        'priority' => 'core',
        'fields' => array(

                array(
                    'id' => "{$prefix}_show_service_breadcrumb",
                    'name' => esc_html__('Show Breadcrumb', 'electrician'),
                    'desc' => '',
                    'type' => 'radio',
                    'std' => "on",
                    'options' => array('on' => 'Yes', 'off' => 'No'),
                ),
                array(
                    'id' => "{$prefix}_show_service_sidebar",
                    'name' => esc_html__('Show SideBar', 'electrician'),
                    'desc' => '',
                    'type' => 'radio',
                    'std' => "on",
                    'options' => array('on' => 'Yes', 'off' => 'No'),
                ),
    ));



        $meta_boxes[] = array(
            'id' => 'framework-meta-box-testimonials',
            'title' => esc_html__('Manage Testimonial Meta Fields', 'electrician'),
            'pages' => array(
                'testimonials',
            ),            
            'context' => 'normal',
            'priority' => 'high',
            'tab_style' => 'left',
            
            'fields' => array(        

                array(
                    'name' => esc_html__('Customer Name', 'electrician'),
                    'desc' => esc_html__('Customer Name.', 'electrician'),
                    'id' => "{$prefix}-client-name",
                    'type' => 'text',                    
                ),
                array(
                    'name' => esc_html__('Customer Designation', 'electrician'),
                    'desc' => esc_html__('Enter Customer designation.', 'electrician'),
                    'id' => "{$prefix}-client-designation",
                    'type' => 'text',                    
                ),

        )); 
      
        $posts_page = get_option('page_for_posts');

        if(!isset($_GET['post']) || intval($_GET['post']) != $posts_page){

            $meta_boxes[] = array(
                'id' => 'framework_page_meta_box',
                'title' => esc_html__('Page Design Settings', 'electrician'),
                'pages' => array(
                    'page',
                ),
                'context' => 'normal',
                'priority' => 'core',
                'fields' => array(
                    array(
                        'id' => "framework_show_page_title",
                        'name' => esc_html__('Show page titlebar', 'electrician'),
                        'desc' => '',
                        'type' => 'radio',
                        'std' => "on",
                        'options' => array('on'=>'Yes','off'=>'No'),
                    ),
                    array(
                        'id' => "framework_show_breadcrumb",
                        'name' => esc_html__('Show Breadcrumb', 'electrician'),
                        'desc' => '',
                        'type' => 'radio',
                        'std' => "on",
                        'options' => array('on'=>'Yes','off'=>'No'),
                    ),
                    array(
                        'id' => "framework_page_style",
                        'name' => esc_html__('Page Style', 'electrician'),
                        'desc' => '',
                        'type' => 'image_select',
                        'std' => "nosidebar",
                        'options' => array(
                            'leftsidebar' => ELECTRICITY_THEME_URI.'/images/admin/left.jpg',
                            'nosidebar' => ELECTRICITY_THEME_URI.'/images/admin/no.jpg',
                        ),
                        'allowClear' => true,
                        'placeholder' => esc_html__('Select', 'electrician'),
                    ),
                    
                )
            );
       }
       $product_page_layout = isset($electricity_option['electricity_product_page_layout']) ? $electricity_option['electricity_product_page_layout'] : 1;

        return $meta_boxes;
}


