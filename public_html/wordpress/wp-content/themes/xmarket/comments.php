<?php
/**
 * The template for displaying Comments.
 *
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', ETHEME_DOMAIN ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), ETHEME_DOMAIN ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', ETHEME_DOMAIN ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', ETHEME_DOMAIN ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="comments-list">
				<?php
					wp_list_comments( array( 'callback' => 'etheme_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', ETHEME_DOMAIN ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', ETHEME_DOMAIN ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p><?php _e( 'Comments are closed.', 'blanco' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php $comment_args = array( 
    'title_reply'=>''.__('Leave a Comment', ETHEME_DOMAIN).'',
    'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<div class="formField comment-form-author">' .
                '<label for="author">' . __( 'Your Name' ) . 
                ( $req ? '<span class="required">*</span>' : '' ) .'</label> ' .
                '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" class="required-field" size="30"' . @$aria_req . ' />' .
                '<div class="clear"></div></div><!-- #form-section-author .form-section -->',
    'email'  => '<div class="formField comment-form-email">' .
                '<label for="email">' . __( 'Your Email' ) . 
                ( $req ? '<span class="required">*</span>' : '' ) .'</label> ' .
                '<input id="email" name="email" type="text" class="required-field" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . @$aria_req . ' />' .
		'<div class="clear"></div></div><!-- #form-section-email .form-section -->',
    'url'    => '' ) ),
    'comment_field' => '<div class="formField comment-form-comment">' .
                '<label for="comment">' . __( 'Comment' ) . '<span class="required">*</span></label>' .
                '<textarea id="comment" name="comment" cols="45" rows="8" class="required-field"></textarea>' .
                '<div class="clear"></div></div><!-- #form-section-comment .form-section -->',
    'comment_notes_before' => '<div id="commentsMsgs"></div>',
    'comment_notes_after' => ''
);
comment_form($comment_args); ?>

</div><!-- #comments -->
