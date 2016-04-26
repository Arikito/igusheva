<?php
    $blogim_fb = get_theme_mod('blogim_social_fb');
    $blogim_tw = get_theme_mod('blogim_social_tw');        
 ?>
<?php if($blogim_fb != '' && !empty($blogim_fb)): ?>
    <a href="<?php echo esc_url($blogim_fb); ?>" class="fb" title="<?php _e('Facebook','blogim');?>"><i class="fa fa-facebook"></i></a>
<?php endif; ?>
<?php if($blogim_tw != '' && !empty($blogim_tw)): ?>
    <a href="<?php echo esc_url($blogim_tw); ?>"  class="tw" title="<?php _e('Twitter','blogim');?>"><i class="fa fa-twitter"></i></a>
<?php endif; ?>