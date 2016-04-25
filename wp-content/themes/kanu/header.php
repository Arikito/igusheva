<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package kanu
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <div class="pi-section-w pi-section-header-w pi-section-dark pi-section-header-sm-w">
        	<div class="pi-section pi-section-header pi-section-header-sm pi-clearfix">
        		<div class="pi-header-block pi-pull-right pi-hidden-2xs" style="margin-right: 0px;">
        			<ul class="pi-social-icons pi-stacked pi-jump pi-full-height pi-bordered pi-small pi-colored-bg clearFix">
        				<?php if ( get_theme_mod('ppt-facebook-social') != '') { ?>
        				<li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-facebook-social') ); ?>" class="pi-social-icon-facebook"><i class="icon-facebook"></i><i class="icon-facebook"></i></a></li>
        	             <?php } ?>	
            			 <?php if ( get_theme_mod('ppt-twitter-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-twitter-social') ); ?>" title="Twitter" class="pi-social-icon-twitter"><i class="icon-twitter"></i><i class="icon-twitter"></i></a></li>
                         <?php } ?>
                         <?php if ( get_theme_mod('ppt-google-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-google-social') ); ?>" title="Google Plus" class="pi-social-icon-gplus"><i class="icon-gplus"></i><i class="icon-gplus"></i></a></li>
                         <?php } ?>
                         <?php if ( get_theme_mod('ppt-pinterest-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-pinterest-social') ); ?>" title="Pinterest" class="pi-social-icon-pinterest"><i class="icon-pinterest"></i><i class="icon-pinterest"></i></a></li>
                         <?php } ?>
                         <?php if ( get_theme_mod('ppt-linkedin-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-linkedin-social') ); ?>" title="Linked In" class="pi-social-icon-linkedin"><i class="icon-linkedin"></i><i class="icon-linkedin"></i></a></li>
                         <?php } ?>
                         <?php if ( get_theme_mod('ppt-instagram-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-instagram-social') ); ?>" title="Instagram" class="pi-social-icon-instagram"><i class="icon-instagram"></i><i class="icon-instagram"></i></a></li>
                         <?php } ?>
                         <?php if ( get_theme_mod('ppt-youtube-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-youtube-social') ); ?>" title="YouTube" class="pi-social-icon-youtube"><i class="icon-youtube"></i><i class="icon-youtube"></i></a></li>
                         <?php } ?>
                         <?php if ( get_theme_mod('ppt-rss-social') != '' ) { ?>
            			 <li><a target="_blank" href="<?php echo esc_url( get_theme_mod('ppt-rss-social') ); ?>" title="RSS Feed" class="pi-social-icon-rss"><i class="icon-rss"></i><i class="icon-rss"></i></a></li>
                         <?php } ?>
        			</ul>
        		</div>
        	</div>
        </div>
    	<?php do_action( 'kanu-before' ); ?>
    	<header id="masthead" class="site-header" role="banner">
    		<div class="site-branding">
                <?php if( get_theme_mod("ppt-logo") != '' ){ ?>
    			     <h1 class="site-title logo-container"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <?php
            			echo "<img class='main_logo' src='". esc_url( get_theme_mod("ppt-logo") ) ."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";	
     			      }else { 
                ?>
    			     <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> 
                <?php }?>
    		</div>
    		
    		<div class="topMenu">  
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div id="nav-container">
    			         <h1 class="menu-toggle"><?php _e( 'Menu', 'kanu' ); ?></h1>
    			         <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'kanu' ); ?>"><?php _e( 'Skip to content', 'kanu' ); ?></a></div>
    			         <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </div>  
                 </nav><!-- #site-navigation -->
            </div>
    	</header><!-- #masthead -->
        
         
    	<div id="content" class="site-content">
        <?php  if( get_theme_mod("slider-one") != '' || get_theme_mod("slider-two") != '' || get_theme_mod("slider-three") != '' || get_theme_mod("slider-four") != '' || get_theme_mod("slider-five") != '' ){ ?>
            <div id="slider-wrapper">
                <ul class="bxslider">
                	<?php
                        if( get_theme_mod("slider-one") != '' ){
                            echo "<li><a href='#'><img src='". esc_url( get_theme_mod("slider-one") ) ."' ></a></li>";    
                        }
                        if( get_theme_mod("slider-two") != '' ){
                            echo "<li><a href='#'><img src='". esc_url( get_theme_mod("slider-two") ) ."' ></a></li>";    
                        }
                        if( get_theme_mod("slider-three") != '' ){
                            echo "<li><a href='#'><img src='". esc_url( get_theme_mod("slider-three") ) ."' ></a></li>";    
                        }
                        if( get_theme_mod("slider-four") != '' ){
                            echo "<li><a href='#'><img src='". esc_url( get_theme_mod("slider-four") ) ."' ></a></li>";    
                        }
                        if( get_theme_mod("slider-five") != '' ){
                            echo "<li><a href='#'><img src='". esc_url( get_theme_mod("slider-five") ) ."' ></a></li>";    
                        }
                       ?>
                 </ul>   
        	</div>
         <?php } ?>