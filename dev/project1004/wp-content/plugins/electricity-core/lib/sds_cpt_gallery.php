<?php
add_action('init', 'register_yourstore_gallery_postype');

function register_yourstore_gallery_postype()
{



    $labels = array(
        'name' => __('Gallery', 'yourstore'),
        'singular_name' => __('Gallery', 'yourstore'),
        'add_new' => __('Add New', 'yourstore'),
        'add_new_item' => __('Add New Gallery', 'yourstore'),
        'edit_item' => __('Edit Gallery', 'yourstore'),
        'new_item' => __('New Gallery', 'yourstore'),
        'view_item' => __('View Gallery', 'yourstore'),
        'search_items' => __('Search Gallery', 'yourstore'),
        'not_found' => __('No Gallery found', 'yourstore'),
        'not_found_in_trash' => __('No Gallery found in Trash', 'yourstore'),
        'parent_item_colon' => ''
    );

    register_post_type('gallery', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => __('gallery', 'yourstore'))
    ));

    $labels = array(
        'name'              => _x( 'Gallery Categories', 'portfolio categories','yourstore' ),
        'singular_name'     => _x( 'Gallery Category', 'portfolio category','yourstore' ),
        'search_items'      => __('Search Gallery Categories' ,'yourstore'),
        'all_items'         => __('All Gallery Categories' ,'yourstore'),
        'parent_item'       => __('Parent Gallery Category' ,'yourstore'),
        'parent_item_colon' => __('Parent Gallery Category:' ,'yourstore'),
        'edit_item'         => __('Edit Gallery Category' ,'yourstore'),
        'update_item'       => __('Update Gallery Category' ,'yourstore'),
        'add_new_item'      => __('Add New Gallery Category' ,'yourstore'),
        'new_item_name'     => __('New Gallery Category Name' ,'yourstore'),
        'menu_name'         => __('Gallery Category' ,'yourstore'),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'gallery-cat' ),
    );
    register_taxonomy( 'gallery-cat', array( 'gallery' ), $args );
    
}

/**
 * Display a Gallery
 *
 * @param  int $post_per_page  The number of Gallerys you want to display
 * @param  string $orderby  The order by setting  https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
 * @param  array $Gallery_id  The ID or IDs of the Gallery(s), comma separated
 *
 * @return  string  Formatted HTML
 */
function get_gallery($posts_per_page = 1, $orderby = 'none', $gallery_id = null, $title = '')
{

    $prefix = 'framework';
    $args = array(
        'posts_per_page' => (int) $posts_per_page,
        'post_type' => 'gallerys',
        'orderby' => $orderby,
        'no_found_rows' => true,
    );
    if ($gallery_id)
        $args['post__in'] = array($gallery_id);

    $query = new WP_Query($args);
     $rand = rand(000000, 999999);
    if ($query->have_posts()) {

        
       echo '<!--======= gallerys =======-->';
       echo '<div class="fill-bg-custom aside-inner color-white">';
           echo '<h4 class="text-center text-uppercase color-white mega">'.$title.'</h4> ';     
           echo '<div class="gallerysAsid nav-dot nav-dot-invert" id="gallerysAsid_'.$rand.'">';
                
                while ($query->have_posts()) : $query->the_post();
                    $post_id = get_the_ID();
                    $client_name = get_post_meta($post_id, '{$prefix}-client-name', true);
                    $client_designation = get_post_meta($post_id, '{$prefix}-client-designation', true);

                    $client_image = get_the_post_thumbnail($post_id, 'full',array('class'=>'img-responsive-inline'));


                    echo '        
            <!-- slide-->
                    <a href="#" class="link-hover-block">
                        <div class="text-center">
                          ' . $client_image . '
                            <p>
                                <span class="icon"></span>' . get_the_content() . '
                            </p>
                            <p>
                                <b>' . $client_name . '</b><br>
                                <em>' . $client_designation . '</em>
                            </p>                                    
                        </div>
                    </a>
            <!-- /slide-->
                    ';
                endwhile;

                
                
           echo '</div> ';                         
       echo '</div>';
        
       echo '<!--======= /gallerys =======-->';

        
        wp_reset_postdata();
    }

    ?>
        <script type="text/javascript"> 

                    var $j = jQuery.noConflict();
                    $j(document).ready(function () {

                        gallerysAsid($j('#gallerysAsid_<?php echo esc_js($rand)?>'), 1, 1, 1, 1, 1);//galleryS


                    });

                </script> 
<?php
}
