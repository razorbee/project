<?php
$quote = get_post_meta(get_the_ID(), 'framework-quote', true);
$quote_author = get_post_meta(get_the_ID(), 'framework-quote-author', true);
$quote_link = get_post_meta(get_the_ID(), 'framework-quote-author-link', true);
if($quote){
?>
<a href="<?php echo esc_url($quote_link)?>"><?php the_post_thumbnail()?>
    <div class="post-quote">
        <div class="vert-wrap">
            <div class="vert">
                <p><?php echo wp_kses_post($quote)?></p>
                <div class="quote-author"><?php echo esc_html($quote_author)?></div>
            </div>
        </div>
    </div>
</a>
<?php
}
