<?php
$audio_content = get_post_meta(get_the_ID(), 'framework-audio-markup', true);
if($audio_content){
?>
<div class="post-audio">
    <?php echo  sprintf(__('%s','electrician'), $audio_content)  ?>
</div>
<?php
}
