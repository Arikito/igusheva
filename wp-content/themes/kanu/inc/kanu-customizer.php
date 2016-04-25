<?php
/**
 * kenu Theme Customizer
 *
 * @package kenu
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kenu_customize_register( $wp_customize ) {
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



 	// Logo Section
    $wp_customize->add_section('ppt-logo-section', array(
        'title'    => __('Logo', 'kanu'),
        'priority' => 97,
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('ppt-logo',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text'
    )); 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'ppt-logo', array(
        'label'    => __('Logo', 'kanu'),
        'section'  => 'ppt-logo-section',
        'settings' => 'ppt-logo'
    )));
    
    $wp_customize->add_section('slider-section', array(
        'title'    => __('Slider', 'kanu'),
        'priority' => 97,
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('slider-one',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text'
    )); 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slider-one', array(
        'label'    => __('Slide One', 'kanu'),
        'section'  => 'slider-section',
        'settings' => 'slider-one'
    )));
    $wp_customize->add_setting('slider-two',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text'
    ));  
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slider-two', array(
        'label'    => __('Slide Two', 'kanu'),
        'section'  => 'slider-section',
        'settings' => 'slider-two'
    )));
    $wp_customize->add_setting('slider-three',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slider-three', array(
        'label'    => __('Slide Three', 'kanu'),
        'section'  => 'slider-section',
        'settings' => 'slider-three'
    )));
    $wp_customize->add_setting('slider-four',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slider-four', array(
        'label'    => __('Slide Four', 'kanu'),
        'section'  => 'slider-section',
        'settings' => 'slider-four'
    )));
    $wp_customize->add_setting('slider-five',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slider-five', array(
        'label'    => __('Slide Five', 'kanu'),
        'section'  => 'slider-section',
        'settings' => 'slider-five'
    )));


    // Social Networks
    $wp_customize->add_section('ppt-social-section', array(
        'title'    => __('Contact section', 'kanu'),
        'priority' => 98,
        'sanitize_callback' => 'esc_url_raw', 
    ));  
    $wp_customize->add_setting('ppt-twitter-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-twitter-social', array(
        'label'    => __('Twitter Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('ppt-facebook-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-facebook-social', array(
        'label'    => __('Facebook Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('ppt-google-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-google-social', array(
        'label'    => __('Google Plus Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw',
    )); 
    $wp_customize->add_setting('ppt-pinterest-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-pinterest-social', array(
        'label'    => __('Pinterest Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));  

    $wp_customize->add_setting('ppt-instagram-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-instagram-social', array(
        'label'    => __('Instagram Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));
    
    $wp_customize->add_setting('ppt-youtube-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-youtube-social', array(
        'label'    => __('Youtube Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));
    
    $wp_customize->add_setting('ppt-rss-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text', 
    )); 
    $wp_customize->add_control('ppt-rss-social', array(
        'label'    => __('RSS Url', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));  
 

 	// Footer Section
    $wp_customize->add_section('ppt-footer-section', array(
        'title'    => __('Footer Section ', 'kanu'),
        'priority' => 99
    ));  

    $wp_customize->add_setting('ppt-copy-social',
        array( 
            'sanitize_callback' => 'kenu_sanitize_text',  
    )); 
    $wp_customize->add_control('ppt-copy-social', array(
        'label'    => __('Copyright text', 'kanu'),
        'section'  => 'ppt-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'kenu_sanitize_text',   
    ));


}
add_action( 'customize_register', 'kenu_customize_register' );

function kenu_sanitize_text( $str ) {
	return sanitize_text_field( $str );
} 

function kenu_sanitize_textarea( $text ) {
	return esc_textarea( $text );
} 

function kenu_sanitize_number( $int ) {
	return absint( $int );
} 

function kenu_sanitize_email( $email ) {
	if(is_email( $email )){
		return $email;
	}else{
		return '';
	}
} 
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kenu_customize_preview_js() {
	wp_enqueue_script( 'kenu_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'kenu_customize_preview_js' );
