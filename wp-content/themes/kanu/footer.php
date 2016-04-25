<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package kanu
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer pi-section-w pi-section-header-w pi-section-dark pi-border-top-light pi-border-bottom-strong-base pi-section-header-lg-w" role="contentinfo">
        <div id="footer-container">         
            <div class="site-info">
                <?php 
                if( get_theme_mod("ppt-copy-social") != '' ){ 
        	       echo  get_theme_mod("ppt-copy-social");
                }
            ?>
            </div><!-- .site-info -->
        </div><!--#footer-container--> 
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>