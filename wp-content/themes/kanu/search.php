<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */
 get_header(); 
    get_template_part( 'templates/page', 'breadcrumb' ); 
    
    ?>
    <!-- content -->
    <div class="main">
        <?php get_template_part( 'templates/blog/blog', 'content' ); ?>
    </div>
    <!-- /content -->
    <?php
 
 get_footer(); 