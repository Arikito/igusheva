<div id="logo">
        <div class="container">
                <a href="<?php echo esc_url(home_url('/'));?>">
                        <?php 
                                $logo_image = '';
                                if (function_exists('get_custom_logo')) {
                                    $logo_image = has_custom_logo(); 
                                    $output_logo = get_custom_logo();
                                } 
                                if(empty($logo_image)){
                                        echo $blogim_logo = '<span>'.get_bloginfo('name').'<small>'.get_bloginfo('description').'</small></span>';
                                 }else{ echo $output_logo;}
                                
                        ?>
                </a>
        </div><!-- end of container -->
</div><!-- end of logo -->