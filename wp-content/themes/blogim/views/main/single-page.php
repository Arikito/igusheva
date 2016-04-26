<?php
if(have_posts()) : while(have_posts()) : the_post();

$blogim_page_title = get_post_meta(get_the_ID(), 'page_title',true);
$blogim_thumb = get_post_thumbnail_id();
$blogim_img_url = esc_url(wp_get_attachment_url($blogim_thumb, 'full')); //get img URL
$blogim_img = aq_resize($blogim_img_url, 220, 150, true, true, true); //resize & crop img
$blogim_img = ($blogim_img == '') ? esc_url(get_template_directory_uri()) . '/assets/img/fallback-220x150.jpg' : $blogim_img;
?>
<div class="content single-content">
	 <?php if($blogim_page_title != 'yes'): ?>
        <div class="meta">
            <h1 itemprop="name"  class="title"><?php the_title();?></h1>
        </div><!-- end of meta -->
    <?php endif; ?>
       
	<div class="format-text">
		<?php the_content(); ?>
	</div><!-- end of format text -->
	 <div class="single-util">
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><strong class="page-links-title">' . __( 'Pages:', 'blogim' ) . '</strong>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		?>
	<div class="clear"></div>
	</div><!-- end of single util -->
</div><!-- end of content -->

<?php if(comments_open()):?>
	<div class="comment-area form-basic">
		<?php comments_template(); ?>
	</div>
<?php endif;?>

<?php endwhile;?>
<?php else : ?>
        <div class="no-post-found">
            <div class="format-text the-content">
                <p><?php _e('Sorry, no posts matched your criteria. Try something else. ','blogim')?></p>
            </div>
        </div>
<?php endif;?>