<?php
/**
 * Boson functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Boson
 * @since Boson 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Boson 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}




if ( ! function_exists( 'boson_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Boson 1.0
 */
function boson_setup() {
 /*
  * Make theme available for translation.
  * Translations can be filed in the /languages/ directory.
  * If you're building a theme based on Boson, use a find and replace
  * to change 'Boson' to the name of your theme in all the template files
  */
  load_theme_textdomain( 'boson', get_template_directory().'/languages' );
  load_child_theme_textdomain( 'boson', get_stylesheet_directory().'/languages');
     
  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );
  
 /*
  * Let WordPress manage the document title.
  * By adding theme support, we declare that this theme does not use a
  * hard-coded <title> tag in the document head, and expect WordPress to
  * provide it for us.
  */
  add_theme_support( 'title-tag' );
  
 /*
  * Enable support for Post Thumbnails on posts and pages.
  *
  * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
  */
  add_theme_support( 'post-thumbnails' );
  
  // This theme uses wp_nav_menu() in two locations.
  register_nav_menus( array(
 	'primary' => esc_html__( 'Primary Menu', 'boson' ),
  ) );
  
 /*
  * Switch default core markup for search form, comment form, and comments
  * to output valid HTML5.
  */
  add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );
  
 /*
  * Enable support for Post Formats.
  *
  * See: https://codex.wordpress.org/Post_Formats
  */
  add_theme_support( 'post-formats', array(
	 'image', 'gallery'
  ) );
  
 /*
  * This theme styles the visual editor to resemble the theme style,
  * specifically font, colors, icons, and column width.
  */
  add_editor_style( array( 'style.css', 'style_rtl.css' ) );
  
  add_theme_support( "custom-header", array() );
  add_theme_support( 'custom-background', array() );
  
}
endif; // boson_setup
add_action( 'after_setup_theme', 'boson_setup' );

/**
 * Register widget area.
 *
 * @since Boson 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function boson_widgets_init() {
    //Primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar Widget Area', 'boson' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Appears in sidebar area.', 'boson' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
	) );


    //Footer Four Sidebar
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar Widget Area', 'boson' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Appears in footer sidebar area.', 'boson' ),
		'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s row-item col-1_4">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'boson_widgets_init' );


/**
 * Custom template tags for this theme.
 *
 * @since Boson 1.0
 */
require_once( get_template_directory() . '/inc/theme-init.php' );