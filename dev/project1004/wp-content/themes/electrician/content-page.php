<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage electrician
 * @since electrician 1.0
 */
 
$show_title = get_post_meta(get_the_ID(), 'framework_show_page_title', true);
$page_layout = get_post_meta(get_the_ID(), 'framework_page_style', true);
if((!$show_title || $show_title == 'on')){
    the_title( '<h1 class="text-center page-title">', '</h1>' );
    echo '<div class="divider"></div>';
}
if($page_layout == 'leftsidebar'){
    echo '<div class="row">';
    get_sidebar('page');
    echo '<div class="col-sm-7 col-md-8">';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'electrician' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'electrician' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( esc_html__( 'Edit', 'electrician' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->

<?php
if($page_layout == 'leftsidebar'){
    echo '</div></div>';
}
