<?php
if ( post_password_required() ) {
	return;
}
?>


<?php if ( have_comments() && comments_open()){ ?>
	<div id="comments" class="comments-area block">
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought', '%1$s thoughts', get_comments_number(), 'comments title', 'litelife' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>			
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
					'callback' 	  => 'custom_comments',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>
	</div><!-- .comments-area -->
<?php } // Check for have_comments(). ?>

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if(!comments_open()) { ?>
	<div id="comments" class="comments-area block">
		<p class="no-comments"><?php _e( 'Comments are closed.', 'litelife' ); ?></p>
	</div><!-- .comments-area -->
<?php } ?>

	

<div class="newCommentForm block">
	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		) );
	?>
</div>