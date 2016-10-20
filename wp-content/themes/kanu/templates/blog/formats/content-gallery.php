<div class="post-preview <?php if( is_sticky() )echo "sticky"; ?>">
    <h2><a href="<?php the_permalink(); ?>" class="dark-link"><?php the_title(); ?></a></h2>
    <div class="post-meta">
         <?php _e( 'Posted by', 'boson' )?> <span class="meta-author"><a href="<?php the_author_link(); ?>"><?php echo  ucwords( get_the_author() ); ?></a></span>
        <span class="meta-date"><?php _e( 'On', 'boson' );?> <?php echo get_the_date( 'M d, Y' ); ?></span>
        <span class="meta-tags"><?php the_tags('' ,',','' ); ?></span>

        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <span class="meta-comment"><?php comments_popup_link(
            __( '0 comment', 'boson' ),
            __( '1 Comment', 'boson' ),
            __( '% Comments', 'boson' )
        ); ?></span>
        <?php endif; ?>
    </div>
    <?php
        // running this in the view so it can be used by multiple functions
        $boson_attachments = get_posts(array(
        	'post_type' => 'attachment',
        	'numberposts' => -1,
        	'post_status' => null,
        	'post_parent' => get_the_ID(),
        	'order' => 'ASC',
        	'orderby' => 'menu_order ID',
        ));
        if ($boson_attachments) {
        	if (is_ssl()) {
        		add_filter('wp_get_attachment_image_attributes', 'cfpf_ssl_gallery_preview', 10, 2);
        	} ?>
        	<div class="post-image-wrap">
                <div class="b-carousel">
                   <div class="carousel-content">
                        <?php
                            foreach ($boson_attachments as $boson_attachment) {
                        		echo wp_get_attachment_image($boson_attachment->ID, 'full', false, array( 'class' => 'carousel-item' ) );
                        	}
                        ?>
                   </div>
                </div>
            </div>
            	
            <?php
        }

        echo boson_get_excerpt(); 
    ?>
</div>
















