<?php
/**
 * Boson Theme Customizer
 *
 * @package Boson
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function boson_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



 	// Logo Section
    $wp_customize->add_section('boson-logo-section', array(
        'title'    => __('Logo', 'boson'),
        'priority' => 97,
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('boson-logo',
        array( 
            'sanitize_callback' => 'boson_sanitize_text'
    )); 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'boson-logo', array(
        'label'    => __('Logo', 'boson'),
        'section'  => 'boson-logo-section',
        'settings' => 'boson-logo'
    )));
    
    $wp_customize->add_setting('boson-favicon',
        array( 
            'sanitize_callback' => 'boson_sanitize_text'
    )); 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'boson-favicon', array(
        'label'    => __('Favicon', 'boson'),
        'section'  => 'boson-logo-section',
        'settings' => 'boson-favicon'
    )));


    // Social Networks
    $wp_customize->add_section('boson-social-section', array(
        'title'    => __('Contact section', 'boson'),
        'priority' => 98,
        'sanitize_callback' => 'esc_url_raw', 
    ));  
    $wp_customize->add_setting('boson-twitter-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text', 
    )); 
    $wp_customize->add_control('boson-twitter-social', array(
        'label'    => __('Twitter Url', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('boson-facebook-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text', 
    )); 
    $wp_customize->add_control('boson-facebook-social', array(
        'label'    => __('Facebook Url', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    )); 
    $wp_customize->add_setting('boson-google-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text', 
    )); 
    $wp_customize->add_control('boson-google-social', array(
        'label'    => __('Google Plus Url', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw',
    )); 
    $wp_customize->add_setting('boson-dribbble-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text', 
    )); 
    $wp_customize->add_control('boson-dribbble-social', array(
        'label'    => __('Dribbble Url', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));  

    $wp_customize->add_setting('boson-skype-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text', 
    )); 
    $wp_customize->add_control('boson-skype-social', array(
        'label'    => __('Skype Url', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));
    
    $wp_customize->add_setting('boson-rss-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text', 
    )); 
    $wp_customize->add_control('boson-rss-social', array(
        'label'    => __('RSS Url', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'esc_url_raw', 
    ));  

    $wp_customize->add_setting('boson-phone-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text',  
    )); 
    $wp_customize->add_control('boson-phone-social', array(
        'label'    => __('Phone', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'boson_sanitize_number',  
         
    ));  
 

 	// Footer Section
    $wp_customize->add_section('boson-footer-section', array(
        'title'    => __('Footer Section ', 'boson'),
        'priority' => 99
    ));  

    $wp_customize->add_setting('boson-copy-social',
        array( 
            'sanitize_callback' => 'boson_sanitize_text',  
    )); 
    $wp_customize->add_control('boson-copy-social', array(
        'label'    => __('Copyright text', 'boson'),
        'section'  => 'boson-social-section',
        'type'    => 'text',
        'sanitize_callback' => 'boson_sanitize_text',   
    ));

}
add_action( 'customize_register', 'boson_customize_register' );

function boson_sanitize_text( $str ) {
	return sanitize_text_field( $str );
} 

function boson_sanitize_textarea( $text ) {
	return esc_textarea( $text );
} 

function boson_sanitize_number( $int ) {
	return absint( $int );
} 

function boson_sanitize_email( $email ) {
	if(is_email( $email )){
		return $email;
	}else{
		return '';
	}
} 
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function boson_customize_preview_js() {
	wp_enqueue_script( 'boson_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'boson_customize_preview_js' );
