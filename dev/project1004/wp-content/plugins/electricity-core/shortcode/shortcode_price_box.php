<?php

class electrician_price {

    public $col_no;
    public $contact_form_ids=array();
    public $contact_form_title=array();
    public $randdom_number;
    public $randdom_numbers;

    public  function __construct() {
        add_shortcode('electrician_price', array($this, 'electrician_price_func'));
        add_shortcode('electrician_price_item', array($this, 'electrician_price_item_func'));
    }

    public  function electrician_price_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'extra_class' => 0,
           
                        ), $atts));
        
		$content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        ?>
        <div class="price-box-area">
            <div class="price-box-carousel">  
                <?php echo do_shortcode($content); ?>
            </div>    
        </div>    
        <?php
		add_action( 'price_box_hook', array($this,'price_box_hook_func') );
        $output = ob_get_clean();
       
        return $output;
    }

    public  function electrician_price_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title'         => '',
            'currency'     => '',
            'rate'     => '',
            'time'  => '',
            'button'     => '',
            'featured'     => false,
            'target_plan'  =>'',
            'modal_title'  =>'',
            'cf7scode'=>'',
            'modal_button_url'=>'',
        ), $atts));
		

        ob_start();?>
        <div class="col-md-4">
            <div class="price-box <?php echo $featured ? 'price-box-special' : '' ?>">
                <div class="price-box-heading">
                    <div class="price-box-title"><?php echo esc_html($title); ?></div>
                    <div class="price-box-price"><span class="price-currency"><?php echo esc_html($currency);?></span><span class="price-value"><?php echo esc_html($rate);?></span><span class="price-period"><?php echo esc_html($time); ?></span></div>
                </div>
                <div class="price-box-content">
                    <?php 
                        $content = str_replace('<p>', "", $content);
                        $content = str_replace('</p>', "", $content);
                        echo ($content);
                    ?>

                    <div class="text-center">
                    
                    <?php if($target_plan=='3'){ ?>
                    <?php  $href = vc_build_link( $modal_button_url ) ;  ?>
						<a href="<?php echo $href['url'];?>" class="btn btn-border form-popup-link" data-title="<?php echo $href['title']  ?>" target="<?php echo $href['target']  ?>"> <i class="icon icon-lightning"></i><?php echo $href['title']  ?> </a>
                    <?php 	
					}else{ ?>
                    	<div class="form-popup-wrap">
                            <a href="#" class="btn btn-border form-popup-link" data-title="<?php echo $modal_title ?>" data-cid="<?php echo $cf7scode ?>" data-animation="fadeInUp" data-animation-delay="0.5s" data-toggle="modal" data-target="#ModalOrderPackage"> <i class="icon icon-lightning"></i><?php echo esc_html($button);  ?> </a>
                            <div class="form-popup">
                                <div class="request-form-popup">
                                    <h3 class="text-center"><?php echo esc_html('Order Form','electrician'); ?></h3>
                                   
                                    <?php 

                                    echo do_shortcode('[contact-form-7 id="' . $cf7scode . '"]'); 
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    <?php
					}
					?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }
    
}

new electrician_price();