<?php
$video_content = get_post_meta(get_the_ID(), 'framework-video-markup', true);
if($video_content){
?>
<div class="post-video">
    <?php echo wp_kses_post($video_content)?>
</div>
<?php
}
