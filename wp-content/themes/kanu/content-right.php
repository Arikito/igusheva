<?php
/**
 * The template used for displaying page content with left sidebar
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */
?>
<div class="content shortcodes">
    <div class="layout">
        <div class="row">
            <div class="row-item col-3_4">
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
            <div class="row-item col-1_4 sidebar">
                    <?php dynamic_sidebar( 'primary' ); ?>
            </div>
        </div>
    </div>
</div>