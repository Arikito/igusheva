<div class="footer">
	<!-- Widget Area -->
	<div class="b-widgets">
		<div class="layout">
			<div class="row">
			     <div class="row">
					<!-- Links -->
					<?php dynamic_sidebar('footer'); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Widget Area -->
	<!-- Copyright Area -->
	<div class="b-copyright">
		<div class="layout">
			<!-- Copyright Text -->
            <?php 
                if (get_theme_mod('boson-copy-social') != '') { 
                    echo '<span class="copy">'. get_theme_mod('boson-copy-social') .'</span>';
                }        
            ?>
			<!-- Social Icons -->
			<ul class="b-social bot">
				<li><?php echo __( 'Follow Us:', 'boson' ); ?></li>
                <?php if ( get_theme_mod('boson-facebook-social') != '') {  ?>
				<li><a class="fb" href="<?php echo get_theme_mod('boson-facebook-social'); ?>"><i class="icon-facebook"></i></a></li>
                <?php } if ( get_theme_mod('boson-twitter-social') != '') {  ?>
				<li><a class="tw" href="<?php echo get_theme_mod('boson-twitter-social'); ?>"><i class="icon-twitter"></i></a></li>
                <?php } if ( get_theme_mod('boson-google-social') != '') {  ?>
				<li><a class="gl" href="<?php echo get_theme_mod('boson-google-social'); ?>"><i class="icon-google-plus"></i></a></li>
                <?php } if ( get_theme_mod('boson-dribbble-social') != '') {  ?>
				<li><a class="dr" href="<?php echo get_theme_mod('boson-dribbble-social'); ?>"><i class="icon-dribbble"></i></a></li>
                <?php } if ( get_theme_mod('boson-skype-social') != '') { ?>
				<li><a class="sk" href="<?php echo get_theme_mod('boson-skype-social'); ?>"><i class="icon-skype"></i></a></li>
                <?php } if ( get_theme_mod('boson-rss-social') != '') { ?>
				<li><a class="rss" href="<?php echo get_theme_mod('boson-rss-social'); ?>"><i class="icon-rss"></i></a></li>
                <?php } ?>
			</ul>
		</div>
	</div>
</div>
