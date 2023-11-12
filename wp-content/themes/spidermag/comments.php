<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
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
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
		<div class="col-sm-16 comments-area">
			<div class="main-title-outer pull-left">
			  <div class="main-title"><?php esc_html_e('comments','spidermag'); ?></div>
			</div>
			<div class="opinion pull-left">
				<?php 
					$args = array(
					  'id_form'           => 'commentform',
					  'id_submit'         => 'submit',
					  'class_submit'      => 'submit',
					  'name_submit'       => 'submit',
					  'title_reply'       => esc_html__( 'Leave a Reply','spidermag'),
					  'title_reply_to'    => esc_html__( 'Leave a Reply to %s','spidermag'),
					  'cancel_reply_link' => esc_html__( 'Cancel Reply','spidermag'),
					  'label_submit'      => esc_html__( 'Post Comment','spidermag'),
					  'format'            => 'xhtml',
					  'avatar_size'       => 64,
					  'style'             => 'li',
		
					  'comment_field' =>  '<p class="comment-form-comment">
					  <label for="comment">' . esc_html__( 'Comment', 'spidermag' ) .
					    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
					    '</textarea></p>',
		
					  'must_log_in' => '<p class="must-log-in">' .
					    sprintf(
					      esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.','spidermag' ),
					      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
					    ) . '</p>',
		
					  'logged_in_as' => '<p class="logged-in-as">' .
					    sprintf(
					    esc_html__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','spidermag' ),
					      admin_url( 'profile.php' ),
					      $user_identity,
					      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
					    ) . '</p>',
		
					  'comment_notes_before' => '<p class="comment-notes">' .
					    esc_html__( 'Your email address will not be published.','spidermag' ) . '</p>',
		
					  'comment_notes_after' => '<p class="form-allowed-tags">' .
					    sprintf(
					      esc_html__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s','spidermag' ),
					      ' <code>' . allowed_tags() . '</code>'
					    ) . '</p>',
					);
					wp_list_comments('type=comment&callback=spidermag_comment');
				?>
			</div>
	    </div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'spidermag' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'spidermag' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'spidermag' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'spidermag' ); ?></p>
	<?php endif; ?>
		<?php 
		  $args = array(
		  	'comment_notes_after' => '',
		  	'title_reply'=>'<div><div class="main-title-outer pull-left">
									<div class="main-title">'.esc_html__( 'leave a comment', 'spidermag' ).'</div>
							</div><div class="comment-form"><div class="">',
				'fields' => apply_filters(
		  		'comment_form_default_fields', array(
		  		'author' =>'<div class="row"><div class="form-group col-sm-8 name-field">'. '<input id="author" class="form-control" placeholder="'.__( 'Name *', 'spidermag' ).'" name="author" type="text" value="' .
		  		esc_attr( $commenter['comment_author'] ) . '"  aria-required="true" />'.
		  		'</div>',
		
		  		'email'  => '<div class="form-group col-sm-8 email-field">' . '<input id="email" class="form-control" placeholder="'.__( 'Email Address *', 'spidermag' ).'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		  		'"  aria-required="true" />'  .
		  		'</div></div>',          		
		  		)),
		
				'comment_field' => '<div class="form-group">' .
				'<textarea id="comment" rows="8" class="form-control" name="comment" placeholder="'.esc_html__( 'Comment *', 'spidermag' ).'" aria-required="true"></textarea>' .
				'</div>',
		
				'label_submit' =>esc_html__( 'Post Reply', 'spidermag' ),
				
				'comment_notes_before' => '',
			);
		    comment_form($args);
		?>
</div><!-- #comments -->