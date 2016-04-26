<div id="logo">
        <a href="<?php echo esc_url(home_url('/'));?>">
                <?php
                        $blogim_logo = '';
                        $blogim_img = get_theme_mod('blogim_logo_small');
                        if($blogim_img != '' && !empty($blogim_img)){
                                $blogim_retina_img =  get_theme_mod('blogim_logo_small_retina');
                                list($blogim_width, $blogim_height) = getimagesize($blogim_img);
                                if($blogim_retina_img != '' && !empty($blogim_retina_img)){
                                        $blogim_logo = '<img src="'.$blogim_retina_img.'" alt="'.esc_attr(get_bloginfo("name")).'" width="'.esc_attr($blogim_width).'">';
                                }else{
                                        $blogim_logo = '<img src="'.$blogim_img.'" alt="'.esc_attr(get_bloginfo("name")).'" width="'.esc_attr($blogim_width).'">';
                                }
                                
                        }else{
                                $blogim_logo = '<span>'.get_bloginfo('name').'</span>';
                        }
                        echo $blogim_logo;
                ?>
        </a>
</div><!-- end of logo -->