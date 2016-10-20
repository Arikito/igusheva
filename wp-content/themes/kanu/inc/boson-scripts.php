<?php
/**
 * Enqueque CSS & JS Scripts
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */
 

if ( ! function_exists( 'boson_register_stylesheets' ) ) :
/**
 * Enqueque CSS Scripts
 *
 * @since Boson 1.0
 */
function boson_register_stylesheets(){
    
    //theme style
    wp_enqueue_style( 'boson-main', boson_assests_css( 'main.css' ), false, false );
    wp_enqueue_style( 'boson-responsive', boson_assests_css( 'responsive.css' ), false, false );
    wp_enqueue_style( 'boson-prettyPhoto', boson_assests_css( 'prettyPhoto.css' ), false, false );
    wp_enqueue_style( 'boson-settings', boson_assests_css( 'settings.css' ), false, false );
    wp_enqueue_style( 'boson-turquoise', boson_assests_css( 'color-scheme/turquoise.css' ), false, false );
    wp_enqueue_style( 'boson-ui', boson_assests_css( 'jquery-ui.css' ) , false, false );

}
endif;


if ( ! function_exists( 'boson_register_scripts' ) ) :
/**
 * Enqueque JS Scripts
 *
 * @since Boson 1.0
 */
function boson_register_scripts(){
    
    // comment reply
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    wp_enqueue_script('jquery');
    
    // Plugins
    wp_register_script( 'boson-jquery-prettyPhoto', boson_assests_js( 'jquery.prettyPhoto.js' ), false, false, true );
    wp_register_script( 'boson-jquery-maps', 'http://maps.google.com/maps/api/js?sensor=true', false, false, true );
    wp_register_script( 'boson-jquery-gmap', boson_assests_js( 'jquery.gmap.min.js' ), false, false, true );
    
    $boson_deps = array(
        'boson-jquery-prettyPhoto',
        'boson-jquery-maps',
        'boson-jquery-gmap'
    );
    
    // custom scripts
    wp_register_script( 'boson-main-script', boson_assests_js( 'main.js' ), $boson_deps, false, true );

    /**
     * Enqueue All
     */
    wp_enqueue_script( 'boson-main-script' );

}
endif;