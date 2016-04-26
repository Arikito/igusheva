<?php
if ( ! function_exists( 'blogim_comment' ) ) :

function blogim_comment( $blogim_comment, $blogim_args, $blogim_depth ) {
	$GLOBALS['comment'] = $blogim_comment;
	switch ( $blogim_comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'blogim' ); ?> <?php esc_url(comment_author_link()); ?><?php edit_comment_link( __( 'Edit', 'blogim' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$blogim_avatar_size = 60;
						if ( '0' != $blogim_comment->comment_parent )
							$blogim_avatar_size = 60;

						echo get_avatar( $blogim_comment, $blogim_avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s %2$s', 'blogim' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<time datetime="%2$s">%3$s</time>',
								esc_url( get_comment_link( $blogim_comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'blogim' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
					<?php edit_comment_link( __( 'Edit', 'blogim' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $blogim_comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'blogim' ); ?></em>
					<br >
				<?php endif; ?>
				<div class="clear"></div>
			</footer>
			<div class="comment-content format-text"><?php comment_text(); ?></div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $blogim_args, array( 'reply_text' => __( 'reply', 'blogim' ), 'depth' => $blogim_depth, 'max_depth' => $blogim_args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
			break;
	endswitch;
}
endif;