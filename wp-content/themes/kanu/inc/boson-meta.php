<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'boson_core_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function boson_core_register_meta_boxes( $meta_boxes ){
    
    /**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
     $boson_perfix = 'boson';
     
     // Page meta box
	$boson_core_meta_box_args[] = array(
		'id' => 'boson_page',
		'title' => __( 'Page Information', 'boson' ),
		'pages' => array( 'page' ),
		'priority' => 'high',
		'autosave' => true,
		'fields' => array( 
            array(
    			'id'    => "{$boson_perfix}_breadcrumb",
    			'type'  => 'checkbox',
                'name'  => __( 'Page Breadcrumb', 'boson' ),
                'desc'  => __( 'Disable Page Breadcrumb', 'boson' ),
    			'option'=> array(
                    '1' => __( 'Disable Page Breadcrumb', 'boson' )
                )
                
     		),
            array(
    			'id'    => "{$boson_perfix}_layout",
    			'type'  => 'select',
                'name'  => __( 'Page Layout', 'boson' ),
                'placeholder' => __( 'Choose Page Layout Style', 'boson' ),
                'desc'  => __( 'Choose Page Layout Style', 'boson' ),
    			'options'  => array(
                    '' => esc_html__( 'Default Layout', 'boson' ),
                    'page' => esc_html__( 'Full Layout', 'boson' ),
                    'left' => esc_html__( 'Lift Sidebar Layout', 'boson' ),   
                    'right' => esc_html__( 'Right Sidebar Layout', 'boson' ),                                
                ),
                'std' => 'page'
     		),
        )
   );
   
   return $boson_core_meta_box_args;
}