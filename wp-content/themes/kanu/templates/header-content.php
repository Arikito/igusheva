<div class="b-top-bar">
	<div class="layout">
		<!-- Some text -->
		<div class="wrap-left">
            <?php if( bloginfo( 'description' ) != '' ){ ?>
			     <span class="top-bar-text"><?php echo bloginfo( 'description' ); ?></span>
            <?php } ?>
		</div>
		<div class="wrap-right">
			<!-- Phone -->
            <?php if ( get_theme_mod('boson-phone-social') != '') {  ?>
			     <span class="top-bar-phone"><span class="icon-phone"><?php echo __( 'Call us:', 'boson' );?> </span> <?php echo get_theme_mod('boson-phone-social'); ?></span>
			<?php } ?>
            <!-- Social Icons -->
			<div class="top-bar-social">
                <?php if ( get_theme_mod('boson-facebook-social') != '') {  ?>
				    <a class="fb" href="<?php echo get_theme_mod('boson-facebook-social'); ?>"><i class="icon-facebook"></i></a>
                <?php } if ( get_theme_mod('boson-twitter-social') != '') {  ?>
				    <a class="tw" href="<?php echo get_theme_mod('boson-twitter-social'); ?>"><i class="icon-twitter"></i></a>
                <?php } if ( get_theme_mod('boson-google-social') != '') {  ?>
				    <a class="gl" href="<?php echo get_theme_mod('boson-google-social'); ?>"><i class="icon-google-plus"></i></a>
                <?php } if ( get_theme_mod('boson-dribbble-social') != '') {  ?>
				    <a class="dr" href="<?php echo get_theme_mod('boson-dribbble-social'); ?>"><i class="icon-dribbble"></i></a>
                <?php } if ( get_theme_mod('boson-skype-social') != '') { ?>
				    <a class="sk" href="<?php echo get_theme_mod('boson-skype-social'); ?>"><i class="icon-skype"></i></a>
                <?php } if ( get_theme_mod('boson-rss-social') != '') { ?>
				    <a class="rss" href="<?php echo get_theme_mod('boson-rss-social'); ?>"><i class="icon-rss"></i></a>
                <?php } ?>
			</div>
			<!-- End Social Icons -->
		</div>
	</div>
</div>
<div class="header header-alt">
	<div class="layout clearfix">
		<div class="mob-layout wrap-left">
			<!-- Logo -->
            <?php if( get_theme_mod("boson-logo") != '' ){ ?>
			     <a href="<?php echo get_home_url(); ?>" class="logo"><img src="<?php echo get_theme_mod("boson-logo"); ?>" alt="" /></a>
			<?php } ?>
            <!-- Mobile Navigation Button -->
			<div class="btn-menu icon-reorder"></div>
			<?php
                if( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'container' => '',
                        'menu_class' => 'nav_menu',
                        'walker' => new Boson_Walker_Nav_Menu,
                        'theme_location' => 'primary'
                        ));
                }  
            ?>
		</div>
	</div>
	<!-- Mobile Navigation -->
	<?php
        if( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'container' => '',
                'menu_class' => 'mob-menu',
                'walker' => new Boson_Walker_Nav_Menu,
                'theme_location' => 'primary'
                ));
        }  
    ?>
	<!-- End Mobile Navigation -->
</div>