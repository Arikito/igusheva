<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" >

    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php esc_attr('RSS 2.0'); ?>" href="<?php esc_url(bloginfo('rss2_url')); ?>" />
    <link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>" />
    <?php wp_head(); ?>   
</head>
<body <?php body_class();?>>
     <div id="shell">
        <header id="top" class="h-1">
            <div id="menubar">
                <div class="container">
                    <div class="row">
                        <nav id="mainmenu" class="col-md-8 col-sm-2 col-xs-3">
                            <div id="mobilemenu"></div>
                            <?php
                                $blogim_args= array(
                                    'theme_location'	=> 'mainmenu',
                                    'container'		=> false,
                                    'menu_class'		=> 'sf-menu',
                                    'fallback_cb'		=> 'blogimMenuFallback'
                                );
                                wp_nav_menu($blogim_args);
                            ?>
                            <div class="clear"></div><!--end of clear-->
                        </nav><!--end of mainmenu -->
                        <div class="social col-md-4 col-xs-9 col-sm-10">
                            <?php get_template_part('views/part/social');?>
                            <?php get_search_form();?>
                        </div><!-- end of util -->
                    </div><!-- end of row -->
                </div><!-- end of container -->
            </div><!-- end of topbar -->
            <?php get_template_part('views/part/logo');?>
        </header><!-- end of top -->
        <div id="body">