</div><!-- end of body -->
  <footer id="bottom">
    <?php
		  $blogim_footer_widget_layout = (get_theme_mod('blogim_footer_widget_layout_style') == '') ? 'col-6-3-3' : get_theme_mod('blogim_footer_widget_layout_style') ;
			if($blogim_footer_widget_layout != 'none'){
        get_template_part('views/footer-widget/'.$blogim_footer_widget_layout);
			}
		?>
    <div id="tribute" class="copy-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-6">
            <?php printf( __( 'Powered by','blogim' )); ?> <a href="<?php echo esc_url('https://indigothemes.com/products/blogim-wordpress-theme/'); ?>"><?php printf( __( 'BlogIM WordPress Theme','blogim' )); ?></a>                            
          </div><!-- end of col -->
          <div class="col-md-5 col-sm6">
            <?php
              $blogim_args= array(
                'theme_location'	=> 'footer_menu',
                'container'		=> false,
                'menu_class'		=> '',
                'fallback_cb'		=> 'blogimMenuFallback'
              );
              wp_nav_menu($blogim_args);
            ?>
          </div><!-- end of col -->
        </div><!-- end of row -->
      </div><!-- end of container -->
    </div><!-- end of tribute -->                    
  </footer><!-- end of bottom -->              
</div><!-- end of shell -->
<?php wp_footer();?>
</body>
</html>