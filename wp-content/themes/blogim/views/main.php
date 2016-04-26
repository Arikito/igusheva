<div id="main" <?php if(is_singular('post') || is_singular('attachment')  || is_page() || is_404()){ echo 'class="single-detail"';}?>>
    <div class="container">
        <div class="row">
            <?php
                $blogim_sidebar_layout = (get_theme_mod('blogim_sidebar_layout_style') == '') ? 'right-sidebar' : get_theme_mod('blogim_sidebar_layout_style') ;
                $blogim_content_layout = (get_theme_mod('blogim_content_layout_style') == '') ? 'full-post-grid' : get_theme_mod('blogim_content_layout_style') ;
                    
                if(is_singular('post')){
                    $blogim_content_layout =  'single-post';
                    global $post;
                    $blogim_sidebar_layout = ( get_post_meta($post->ID,'post_sidebar',true) == 'yes' ) ? 'none' : $blogim_sidebar_layout;
                }
                 if(is_singular('attachment')){
                    $blogim_content_layout =  'detail-attachment';
                }
                if(is_page()){
                    $blogim_content_layout =  'single-page';
                    global $post;
                    $blogim_sidebar_layout = ( get_post_meta($post->ID,'page_sidebar',true) == 'yes' ) ? 'none' : $blogim_sidebar_layout;
                }
                 if(is_404()){
                    $blogim_content_layout =  'single-404';
                }
                $blogim_class = array();
                switch($blogim_sidebar_layout){
                    case 'none' :
                        $blogim_class['article'] = 'col-md-12';
                        break;
                    case 'right-sidebar' :
                        $blogim_class['article'] = 'col-md-8';
                        $blogim_class['sidebar'] = 'col-md-4';
                        $blogim_class['puller'] = 'puller-left';
                        break;
                    case 'left-sidebar' :
                        $blogim_class['article'] = 'col-md-8 col-md-push-4';
                        $blogim_class['sidebar'] = 'col-md-4 col-md-pull-8';
                        $blogim_class['puller'] = 'puller-right';
                        break;
                    default:
                        break;
                }
            ?>
            <article id="posts-wrap" class="<?php echo $blogim_class['article'];?>">
                <?php  get_template_part('views/main/'.$blogim_content_layout);?>
            </article>
            <?php
            if($blogim_sidebar_layout != 'none'):?>
                <aside id="sidebar" class="<?php echo $blogim_class['sidebar'];?>">
                    <div class="<?php echo $blogim_class['puller'];?>">
                        <?php get_sidebar();?>
                    </div>
                </aside>
            <?php endif;?>
        </div><!-- end of row -->
    </div><!-- end of container -->
</div><!-- end  of main -->