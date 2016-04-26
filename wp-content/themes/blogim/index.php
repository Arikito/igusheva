<?php
get_header();
    $blogim_hero_layout = (get_theme_mod('blogim_hero_layout_style') == '') ? 'tile' : get_theme_mod('blogim_hero_layout_style') ;
    if($blogim_hero_layout != 'none'){
    	get_template_part('views/featured/'.$blogim_hero_layout);
    }
    get_template_part('views/main');                
get_footer();
?>