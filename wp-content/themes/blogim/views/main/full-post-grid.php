<h3 class="widget-title"><?php _e('Latest Posts', 'blogim'); ?></h3>
<div class="wrap">
    <?php
    $blogim_i = 1;
    $blogim_clear = 0;
    if (have_posts()) : 
        while (have_posts()) : 
            the_post();
            $blogim_thumb = get_post_thumbnail_id();
            $blogim_img = '';
            $blogim_class_format = '';
            if ($blogim_i <= 1) {
                $blogim_img_url = esc_url( wp_get_attachment_url($blogim_thumb, 'full') ); //get img URL
                $blogim_img = aq_resize($blogim_img_url, 1140, 666, true, true, true); //resize & crop img
                $blogim_img = ($blogim_img == '') ? esc_url( get_template_directory_uri() ) . '/assets/img/fallback-1140x666.jpg' : $blogim_img;
                $blogim_class_format = 'content full-post';
            } else {
                $blogim_img_url = esc_url( wp_get_attachment_url($blogim_thumb, 'full') ); //get img URL
                $blogim_img = aq_resize($blogim_img_url, 555, 375, true, true, true); //resize & crop img
                $blogim_img = ($blogim_img == '') ? esc_url( get_template_directory_uri() ) . '/assets/img/fallback-555x375.jpg' : $blogim_img;
                $blogim_class_format = 'content grid-post col-xs-6';
            }
            ?>
            <?php if ($blogim_i <= 1): ?>
            <div <?php post_class($blogim_class_format); ?>>
                <?php if ($blogim_img != ''): ?>
                    <figure><a href="<?php esc_url(the_permalink()); ?>"><img src="<?php echo $blogim_img; ?>" alt="<?php esc_attr(the_title_attribute()); ?>"></a></figure>
                <?php endif; ?>
                <div class="caption">
                    <div class="meta">
                        <h2 class="title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
                        <strong class="cat s-10"><?php the_category(' , '); ?></strong>
                        <span class="date s-11"><?php the_time('M d, Y') ?></span>
                        <span class="date s-11"><a href="<?php esc_url(the_permalink()); ?>#comments"><?php comments_number(__('No Comments', 'blogim'), __('1 Comment', 'blogim'), __('% Comments', 'blogim')); ?></a></span>
                    </div>
                    <div class="format-text">
                        <p><?php the_excerpt(); ?></p>
                    </div><!-- end of format text -->
                    <a href="<?php esc_url(the_permalink()); ?>" class="button"><?php _e('Read More', 'blogim'); ?></a>
                </div><!-- end of caption -->
            </div><!-- end of content -->
            <div class="row">
            <?php else: ?>
                <div <?php post_class($blogim_class_format); ?>>
                    <?php if ($blogim_img != ''): ?>
                        <figure><a href="<?php esc_url(the_permalink()); ?>"><img src="<?php echo $blogim_img; ?>" alt="<?php esc_attr(the_title_attribute()); ?>"></a></figure>
                    <?php endif; ?>
                    <div class="caption">
                        <div class="meta">
                            <h3 class="title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                            <strong class="cat s-10"><?php the_category(' , '); ?></strong>
                            <span class="date s-11"><?php the_time('M d, Y') ?></span>
                        </div>
                        <div class="format-text">
                            <p><?php the_excerpt(); ?></p>
                        </div><!-- end of format text -->
                    </div><!-- end of caption -->
                </div><!-- end of content -->
                <?php if (($blogim_clear % 2) == 0): ?>
                    <div class="clear"></div>
                <?php endif; ?>
            <?php endif; ?>
            <?php
            $blogim_i++;
            $blogim_clear++;
        endwhile; ?>
    </div><!-- end of row -->
<?php else : ?>
        <div class="no-post-found">
            <div class="format-text the-content">
                <p><?php _e('Sorry, no posts matched your criteria. Try something else. ', 'blogim') ?></p>
            </div>
        </div>
<?php endif; ?>
</div><!-- end of wrap -->
<?php get_template_part('views/part/pagination'); ?>