<?php 
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */
 get_header(); 
    get_template_part( 'templates/page', 'breadcrumb' ); 
?>
<div class="content shortcodes">
    <div class="layout">
        <div class="row">
            <?php
                while( have_posts() ) {
                    the_post();
            
             ?><!-- content -->
                	<div class="row-item col-3_4">
                        <div class="post">
                            <h2><?php the_title(); ?></h2>
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
		                    </div><!-- End Post Title & Meta -->

                            <?php if ( has_post_format( 'gallery' )) { 

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
                                }elseif( has_post_thumbnail() ) { ?>
                                <div class="post-image-wrap">
                                    <a href="<?php the_permalink(); ?>" class="post-image">
                                        <?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-responsive' ) ); ?>
                                    </a>
                                </div>
                            <?php } ?>
                                <div class="post-content">
            						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boson' )); ?>
                                    <div class="b-tag-cloud">
    								    <span><?php _e( 'Tags:', 'boson' )?></span>
                                        <?php the_tags('' ,',','' ); ?>
    							     </div>
                                </div>
                                <?php comments_template( '', true ); ?>
        				</div>
                	</div>
                    <?php
                 }
            
                ?>
                
                <div class="row-item col-1_4 sidebar">
                    <?php dynamic_sidebar( 'primary' ); ?>
                </div>
            </div>           
        </div>
    </div>
<?php get_footer();
	