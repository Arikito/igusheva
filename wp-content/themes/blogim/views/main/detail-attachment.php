<?php
if (have_posts()) : 
    while (have_posts()) : the_post();
        $blogim_thumb = get_post_thumbnail_id();
        $blogim_img = esc_url( wp_get_attachment_url($blogim_thumb, 'full') ); //get img URL
        ?>
        <div class="content single-content">
            <div class="meta">
                <h1 itemprop="name"  class="title"><?php the_title(); ?></h1>
            </div><!-- end of meta -->       
            <div class="format-text">
                <?php if ($blogim_img != ''): ?>
                    <img src="<?php echo $blogim_img; ?>" alt="<?php esc_attr(the_title_attribute()); ?>">
                <?php endif; ?>
            </div><!-- end of format text -->
        </div><!-- end of content -->
    <?php endwhile; ?>
<?php else : ?>
    <div class="no-post-found">
        <div class="format-text the-content">
            <p><?php _e('Sorry, no posts matched your criteria. Try something else. ', 'blogim') ?></p>
        </div>
    </div>
<?php endif; ?>