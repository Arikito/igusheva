<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */

get_header();
 
    if( is_front_page() ){
        echo do_shortcode('[rev_slider home-1]');
    }else{
        get_template_part( 'templates/page', 'breadcrumb' ); 
    
    }

		// Start the loop.
		while ( have_posts() ) : the_post();
            
            $boson_page_layout = '';
            //Get Page Meta Data.
            if( function_exists( 'rwmb_meta' ) ){
                //Get Post Meta Value.
                $boson_page_layout = rwmb_meta( 'boson_layout', false, get_the_ID() );
            }
    
			// Include the page content template.
		    get_template_part( 'content', $boson_page_layout );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open( get_queried_object_id() ) || get_comments_number() ) :
                    comments_template();
			endif;

		// End the loop.
		endwhile;
        
     get_footer(); 