<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) return;
     
    if ( have_comments() ) { 
?>
        <div class="title">
            <h3 class="lined">
    			<?php
                    $num_comments = get_comments_number();
    				if( $num_comments != 1 ){
    				    printf( '<span>%1$s ( %2$s )</span> ', __( 'Response', 'boson' ), number_format_i18n( $num_comments ) );

    				}else{
    				    printf( '<span>%1$s ( %2$s )</span> ', __( 'Responses', 'boson' ), number_format_i18n( $num_comments ) );
    				}
    			?>
            </h3>
        </div>

		<div class="b-comments">
			<?php
                ob_start();
				wp_list_comments( array(
					'short_ping'  => true,
                    'style'=> '<div>',
                    'callback' => 'boson_comment'
				) );
                echo str_replace( 'class="children"', 'class="comment comment-reply np"', ob_get_clean() );
			?>
		</div><!-- .commentlist -->
		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
    		<nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'boson' ); ?></h1>
    			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'boson' ) ); ?></div>
    			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'boson' ) ); ?></div>
    		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation 
         if ( ! comments_open() && get_comments_number() ) : ?>
		      <p class="no-comments"><?php echo __( 'Comments are closed.', 'boson' ); ?></p>
		<?php endif; 
     } else {
        echo '<h3><i class="icon icon-comments"></i>'. __( 'Responses', 'boson' ) .' (0)</h3>';
     }
?>
<div class="b-comment-form">
    <?php
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " ariarequired='true'" : '' );
    
        $fields = array();
        $fields['author'] = '<div class="input-wrap"><i class="icon-user"></i><input type="text" name="author" id="author" placeholder="'. esc_attr__('Name (required)','boson') .'" /></div>';
        $fields['email'] = '<div class="input-wrap"><i class="icon-envelope"></i><input id="email" name="email" type="text" placeholder="'. esc_attr__('Email (required)','boson') .'" /></div>';
        $fields['url'] = '<div class="input-wrap"><i class="icon-link"></i><input id="url" name="url" type="text" placeholder="'. esc_attr__('WebSite','boson') .'"  /></div>';
    
        $args = array(
            'title_reply' => '<h3 class="lined">'. __( 'Leave a reply', 'boson' ) .'</h3>',
            'fields' => $fields,
            'comment_field' => '<div class="textarea-wrap"><i class="icon-pencil"></i><textarea id="comment" name="comment" placeholder="'. esc_attr__('Comment','boson') .'" rows="10" ></textarea></div>',
            'format' => 'html5',
            'label_submit' => __( 'Submit Comment', 'boson' ),
            'comment_notes_before' => '',
            'comment_notes_after' => ''
        );
    
        ob_start();
        comment_form( $args );
        $comment_form = ob_get_clean();
    
        $comment_form = str_replace( 'id="submit"', 'class="btn-submit btn colored" ', $comment_form );
        $comment_form = str_replace( 'class="comment-form"', 'class="b-form comment-form" ', $comment_form );
    
        echo $comment_form;
    ?>
</div>