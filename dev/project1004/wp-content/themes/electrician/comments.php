<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'electrician' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php electrician_comment_nav(); ?>

    	<ol class="commentlist comments">
        	<?php
                    $GLOBALS['ncc'] = 1;
                    $args = array( 'short_ping' => true, 'style'=>'' );
                    wp_list_comments($args);
                ?>
        </ol><!--.commentList -->

		<?php electrician_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'electrician' ); ?></p>
	<?php endif;

    $user = wp_get_current_user();
    $user_identity = $user->display_name;
    $req = get_option( 'require_name_email' );
    $aria_req = $req ? " aria-required='true'" : '';

	$formargs = array(
		
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => esc_html__( 'Leave a Comment','electrician' ),
	  'title_reply_to'    => esc_html__( 'Leave a Comment to %s','electrician' ),
	  'cancel_reply_link' => esc_html__( 'Cancel Reply','electrician' ),
	  'label_submit'      => esc_html__( 'Reply','electrician' ),
	  'submit_button'     =>'<button type="submit" name="%1$s" id="%2$s" class="%3$s btn btn-main btn-sm  btn-top btn--ys">%4$s</button>',

	  'comment_field' =>  '<div class="form-group"><label for="comment"><strong>' . _x( 'Comment', 'noun', 'electrician' ) . ( $req ? '<span class="required">*</span> ' : '' ) .
	    '</strong></label><textarea   class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
	    '</textarea></div>',

	  'must_log_in' => '<div>' .
	    sprintf(
	      wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.','electrician' ), array( 'a' => array( 'href' => array() ) )),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</div><br /><br />',

	  'logged_in_as' => '<div>' .
	    sprintf(
	    wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','electrician' ), array( 'a' => array( 'href' => array() ) )),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</div><br /><br />',

	  'comment_notes_before' => '<p>' .
	    esc_html__( 'Your email address will not be published.','electrician' ) . ( $req ? '<span class="required">*</span>' : '' ) .
	    '</p>',
		'comment_notes_after' => '',
	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<div class="form-group"><label for="author"><strong>' . esc_html__( 'Name', 'electrician' ) . ( $req ? '<span class="required">*</span> ' : '' ) . '</strong></label>'  .
	      '<input id="author"  class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . ' /></div>',

	    'email' =>
	      '<div class="form-group"><label for="email"><strong>' . esc_html__( 'Email', 'electrician' ) .
	      ( $req ? '<span class="required">*</span> ' : '' ) . '</strong></label>' .
	      '<input id="email" name="email"  class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' /></div>',

	    'url' =>
	      '<div class="form-group"><label for="url"><strong>' .
	      esc_html__( 'Website', 'electrician' ) . '</strong></label>' .
	      '<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	      '" size="30" /></div>'
	    )
	  ),
	);
	
	comment_form($formargs); 
	 ?>

</div><!-- .comments-area -->
