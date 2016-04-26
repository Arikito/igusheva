 <?php
$blogim_loop = new WP_Query(
    array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 1,
        'meta_query' 		=> array(
            array(
                'key' 		=> 'post_featured',
                'value' 	=> 'yes',
                'compare' 	=> 'LIKE'
            )
        ),
    )
);?>
<?php if($blogim_loop->have_posts()){?>
    <div id="featured" class="carousel">
        <div class="container">
            <div class="slick-carousel">
                <?php
                while($blogim_loop->have_posts()):$blogim_loop->the_post();
                    $blogim_thumb = get_post_thumbnail_id();
                    $blogim_img_url = esc_url( wp_get_attachment_url( $blogim_thumb,'full') ); //get img URL
                    $blogim_img = aq_resize( $blogim_img_url, 451, 312, true,true,true ); //resize & crop img
                ?>
                <div class="content">
                    <figure>
                        <figcaption class="trans-layer"></figcaption>
                        <img src="<?php echo $blogim_img;?>" alt="<?php esc_attr(the_title_attribute());?>">
                    </figure>
                    <div class="caption">
                        <h3><a href="<?php esc_url(the_permalink()); ?>"><?php the_title();?></a></h3>
                        <strong class="cat s-10"><?php the_category(' , ');?></strong>
                        <span class="date s-10"><?php the_time('M d, Y') ?></span>
                    </div><!-- end of caption -->
                </div><!-- end of content -->
                <?php  endwhile; ?>
                <?php wp_reset_query(); ?>
            </div><!-- end o f slick -->
        </div><!-- end of container -->
    </div><!-- end of featured -->
<?php } ?>