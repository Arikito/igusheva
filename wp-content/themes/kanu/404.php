<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */
 get_header(); 
    get_template_part( 'templates/page', 'breadcrumb' ); 
?>
    <div class="content shortcodes">
    	<div class="layout">
    		<h2 class="centered error-404"><?php echo __( '404', 'boson' ); ?></h2>
    		<p class="centered p-20" style="marginbottom: 25px;"><?php echo __( 'Error 404! Sorry, the page you requested was not found.', 'boson' ); ?></p>
    		<p class="centered"><a href="<?php echo get_home_url();?>" class="btn big colored"><i class="iconcirclearrowleft"></i><?php echo __( 'Back to Home', 'boson' ); ?></a></p>
    	</div>
    </div>
<?php get_footer(); 