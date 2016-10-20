<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('content shortcodes'); ?>>
    <div class="layout">
        <?php 
            //Page Contents
            the_content(); 
    		
            //Page Pagination
            wp_link_pages( array(
    			'before'      => '<ul class="pagenav-style"><li>',
    			'after'       => '</li></ul>',
    			'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'separator'        => '</li><li>',
                'nextpagelink'     => esc_html__( 'Next <span>&rarr;</span>', 'boson' ),
                'previouspagelink' => esc_html__( '<span></span> Preve', 'boson' ),
                'pagelink'         => '%',
    		) );
    	?>
    </div>
</div>