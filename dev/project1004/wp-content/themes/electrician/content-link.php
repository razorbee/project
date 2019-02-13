<?php
$link_title = get_post_meta(get_the_ID(), 'framework-link-title', true);
$link = get_post_meta(get_the_ID(), 'framework-link', true);
if($link){
?>
<a href="<?php the_permalink()?>"><?php the_post_thumbnail('post-thumbnail')?></a>
<div class="post-link-wrapper">
    <div class="vert-wrap">
        <div class="vert"> <a href="<?php echo esc_url($link)?>" class="post-link"><?php echo sprintf(__('%s','electrician'),$link_title) ;?></a> </div>
    </div>
</div>
<?php
}
