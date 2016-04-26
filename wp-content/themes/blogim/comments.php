	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'blogim' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="widget-title">
			<?php
				printf( _n( 'One %2$s', '%1$s %2$s', get_comments_number(), 'blogim' ),
				//wp_kses( __(  'One %2$s', '%1$s %2$s', get_comments_number(), 'blogim' ), $allowed_html_array ); 
				number_format_i18n( get_comments_number() ), __('Comments','blogim') );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'blogim' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'blogim' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'blogim' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		<div class="puller-left">
			
		
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'blogim_comment' ) ); ?>
		</ol>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'blogim' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'blogim' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'blogim' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'blogim' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	<div class="comment-form form-column">
		<div class="dynamic-form-holder">
	<?php
	$blogim_commenter = wp_get_current_commenter();
	$blogim_req = get_option( 'require_name_email' );
	$blogim_aria_req = ( $blogim_req ? " aria-required='true'" : '' );
		comment_form(); ?>
		</div>
	</div>
</div><!-- #comments -->