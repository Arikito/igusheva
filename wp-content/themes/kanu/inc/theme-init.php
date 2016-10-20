<?php
/**
 * Theme Init class.
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */

if ( ! defined( 'ABSPATH' ) ){
  exit;  
}  // Exit if accessed directly

if ( ! class_exists( 'Boson' ) ) :

class Boson {
    
    public function __construct() {

        // after theme setup functions.
        add_action( 'after_setup_theme', array( $this, 'boson_hooks' ), 1 );    // Front End Header Hooks
        add_action( 'after_setup_theme', array( $this, 'boson_includes' ), 2 ); // Includes Files.
    }
    
    function boson_hooks(){
        
       add_action( 'wp_head', 'boson_display_meta_tags' );
       add_action( 'wp_head', 'boson_touch_icons' ); 
       
    }
    
    function boson_includes(){ 
        
         //Theme Dir Path   
         $boson_path = get_template_directory().'/inc/';
         
         //Include Template Files
         require_once( "{$boson_path}class-tgm-plugin-activation.php" );
         require_once( "{$boson_path}boson-functions.php" );
         require_once( "{$boson_path}boson-pagination.php" );
         require_once( "{$boson_path}boson-customizer.php" );
         require_once( "{$boson_path}boson-nav.php" );
         require_once( "{$boson_path}boson-meta.php" );
         
         if ( ! is_admin() || defined( 'DOING_AJAX' ) ){
            require_once( "{$boson_path}boson-scripts.php" );
            $this->boson_fornt_scripts();
         }
    
    }
    
    function boson_fornt_scripts(){
        
        add_action( 'wp_enqueue_scripts', 'boson_register_stylesheets' );
        add_action( 'wp_enqueue_scripts', 'boson_register_scripts' );
    } 
}

$GLOBALS['boson'] = new Boson();

endif;