<?php 
    $blogim_sidebar	= __("Main", 'blogim');
    $blogim_sidebar	= (is_page())								? __("Single Page", 'blogim')	: $blogim_sidebar;
    $blogim_sidebar	= (is_singular('post'))						? __("Single Post", 'blogim')	: $blogim_sidebar;
    $blogim_sidebar	= (is_category())							? __("Category Page", 'blogim')	: $blogim_sidebar;
    $blogim_sidebar	= (is_search())								? __("Search Result", 'blogim')	: $blogim_sidebar;
    $blogim_sidebar	= (is_404())								? __("404 Page", 'blogim')		: $blogim_sidebar;
    
    if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($blogim_sidebar) ) :
    endif;
?>