<?php
function blogim_add_metabox(){
    add_meta_box( 'blogim-post-metabox', esc_html__('Post Options','blogim'), 'blogim_meta_box', 'post', 'normal', 'high' );
	add_meta_box( 'blogim-page-metabox', esc_html__('Page Options','blogim'), 'blogim_page_meta_box', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'blogim_add_metabox' );

function blogim_meta_box(){
    global $post;
    $blogim_values = get_post_custom( $post->ID );
    wp_nonce_field( 'blogim_post_meta_box_nonce', 'post_meta_box_nonce' );
    ?>
	<p class="post-featured">
		<label for="post-featured">
			<input type="checkbox" name="post_featured" id="post_featured" value="yes" <?php if ( isset ( $blogim_values['post_featured'] ) ) checked( $blogim_values['post_featured'][0], 'yes' ); ?> />
			<?php _e( 'Set as featured ?', 'blogim' )?>
		</label>
	</p>
	<p class="post-sidebar">
	    <label for="post-sidebar">
			<input type="checkbox" name="post_sidebar" id="post_sidebar" value="yes" <?php if ( isset ( $blogim_values['post_sidebar'] ) ) checked( $blogim_values['post_sidebar'][0], 'yes' ); ?> />
			<?php _e( 'Set as full width ?', 'blogim' )?>
	    </label>
	</p>
<?php }

function blogim_page_meta_box(){
	global $post;
        $blogim_values = get_post_custom( $post->ID );
        wp_nonce_field( 'blogim_meta_box_nonce', 'meta_box_nonce' );
        ?>
	<p class="page-title">
		<label for="page-title">
			<input type="checkbox" name="page_title" id="page_title" value="yes" <?php if ( isset ( $blogim_values['page_title'] ) ) checked( $blogim_values['page_title'][0], 'yes' ); ?> />
			<?php _e( 'Hide page title ?', 'blogim' )?>
		</label>
	</p>
	<p class="page-sidebar">
	    <label for="page-sidebar">
			<input type="checkbox" name="page_sidebar" id="page_sidebar" value="yes" <?php if ( isset ( $blogim_values['page_sidebar'] ) ) checked( $blogim_values['page_sidebar'][0], 'yes' ); ?> />
			<?php _e( 'Set as full width ?', 'blogim' )?>
	    </label>
	</p>
<?php }

function blogim_meta_box_save( $blogim_post_id ){
   // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
    	return;
    }
    // AJAX? Not used here
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'blogim_meta_box_nonce' ) ) {
    	return;
    }
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) {
		return;
    }
    $page_title = sanitize_text_field($_POST['page_title']);
    $page_sidebar = sanitize_text_field($_POST['page_sidebar']);

	update_post_meta( $blogim_post_id, 'page_title', $page_title );
	update_post_meta( $blogim_post_id, 'page_sidebar', $page_sidebar );	
}
add_action( 'save_post', 'blogim_meta_box_save' );

function blogim_post_meta_box_save( $blogim_post_id ){
   // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
    	return;
    }
    // AJAX? Not used here
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['post_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['post_meta_box_nonce'], 'blogim_post_meta_box_nonce' ) ) {
    	return;
    }
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) {
		return;
    }
 	$post_featured = sanitize_text_field($_POST['post_featured']);
 	$post_sidebar = sanitize_text_field($_POST['post_sidebar']);

	update_post_meta( $blogim_post_id, 'post_featured', $post_featured );
	update_post_meta( $blogim_post_id, 'post_sidebar', $post_sidebar );	
}
add_action( 'save_post', 'blogim_post_meta_box_save' );