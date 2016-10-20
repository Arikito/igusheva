<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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