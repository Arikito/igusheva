 <?php
$blogim_i = 1;
$blogim_loop = new WP_Query(
    array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 5,
        'ignore_sticky_posts' => 1,
        'meta_query' 		=> array(
        array(
            'key' 		=> 'post_featured',
            'value' 	=> 'yes',
            'compare' 	=> 'LIKE'
            )
        ),
    )
); ?>
<?php if($blogim_loop->have_posts()){?>
    <div id="featured" class="tile">
        <div class="container">
            <?php
                while($blogim_loop->have_posts()):$blogim_loop->the_post();
                $blogim_img = '';
                $blogim_thumb = get_post_thumbnail_id();
                if($blogim_i <= 1){
                    $blogim_img_url = esc_url( wp_get_attachment_url( $blogim_thumb,'full') ); //get img URL
                    $blogim_img = aq_resize( $blogim_img_url, 676, 500, true,true,true ); //resize & crop img
                }else{
                    $blogim_img_url = esc_url( wp_get_attachment_url( $blogim_thumb,'full') ); //get img URL
                    $blogim_img = aq_resize( $blogim_img_url, 338, 250, true,true,true ); //resize & crop img
                }
            ?>
            <?php
                if($blogim_i <= 1): ?>
                <div class="big-col half">
                    <div class="content">
                        <figure>
                            <figcaption class="trans-layer"></figcaption>
                            <img src="<?php echo $blogim_img;?>" alt="<?php esc_attr(the_title_attribute());?>">
                        </figure>
                        <div class="caption">
                            <h2><a href="<?php esc_url(the_permalink());?>"><?php the_title();?></a></h2>
                            <strong class="cat s-10"><?php the_category(' , ');?></strong>
                            <span class="date s-11"><?php the_time('M d, Y') ?></span>
                        </div><!-- end of caption -->
                    </div><!-- end of content -->
                </div><!-- end of big col -->
            <div class="small-col half">
        <?php else: ?>
               <div class="content">
                    <figure>
                        <figcaption class="trans-layer"></figcaption>
                        <img src="<?php echo $blogim_img;?>" alt="<?php esc_attr(the_title_attribute());?>">
                    </figure>
                    <div class="caption">
                        <h3><a href="<?php esc_url(the_permalink());?>"><?php the_title();?></a></h3>
                        <strong class="cat s-10"><?php the_category(' , ');?></strong>
                        <span class="date s-10"><?php the_time('M d, Y') ?></span>
                    </div><!-- end of caption -->
                </div><!-- end of content -->
        <?php endif; ?>
        <?php $blogim_i++; endwhile; ?>
                <div class="clear"></div>
            </div><!-- end of small col -->
        <div class="clear"></div>
        <?php wp_reset_query(); ?>
    </div><!-- end of container -->
</div><!-- end of featured -->
<?php } ?>