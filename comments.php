<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
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

<div class="pt-5">
<div class ="comment-content">
	<?php if ( have_comments() ) : ?>
		<h3 class="mb-5">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'nasio' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'Comments',
							'Comments',
							$comments_number,
							'comments title',
							'nasio'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'class' => 'comment-list',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'nasio' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h3>',
			'title_reply'       => __( 'Leave a Comment', 'nasio' ),
			'class_form'      => 'p-5 bg-light',
			'class_submit'      => 'btn btn-primary',
			'label_submit'      => __( 'Submit Query', 'nasio' ),
			'comment_field' => '<p class="comment-form-comment">' .
        	'<label for="comment">' . __( 'Message', 'nasio' ) . '</label>' .
        	'<textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true"></textarea>' .
			'</p>',
		) );
	?>
	</div>
</div><!-- .comments-area -->