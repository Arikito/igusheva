<?php
/**
 * Passionate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Passionate
 */

if ( ! function_exists( 'passionate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function passionate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Passionate, use a find and replace
	 * to change 'passionate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'passionate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add Custom Logo Support
	 */
	add_theme_support( 'custom-logo' );

	// Custom Image Crop
	add_image_size( 'passionate-service-img', 96, 96, true );
	add_image_size( 'passionate-works-img', 500, 370, true );
	add_image_size( 'passionate-front-blog-img', 400, 268, true );
	add_image_size( 'passionate-archive-img', 750, 375, true );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'passionate' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'passionate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // passionate_setup
add_action( 'after_setup_theme', 'passionate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function passionate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'passionate_content_width', 640 );
}
add_action( 'after_setup_theme', 'passionate_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function passionate_scripts() {

	// Enqueue Bootstrap Grid
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', '' );

	// Enqueue FontAwesome
	wp_enqueue_style( 'fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0', '' );

	// Enqueue Animate.css
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.4.0', '' );

	// Enqueue Swiper.css
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), '3.2.5', '' );

	// Enqueue Google fonts
	wp_enqueue_style( 'passionate_roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' );

	// Stylesheet
	wp_enqueue_style( 'passionate-style', get_stylesheet_uri() );

	// Enqueue Swiper
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/js/swiper.jquery.min.js', array( 'jquery' ), '3.2.5', '' );

	// Custom JS
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'passionate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Widgets file
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Convert hexdec color string to rgb(a) string
 */
function passionate_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if( empty( $color ) )
		return $default;

	//Sanitize $color if "#" is provided
	if ( $color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if ( strlen( $color ) == 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb =  array_map( 'hexdec', $hex );

	//Check if opacity is set(rgba or rgb)
	if( $opacity ){
		if( abs( $opacity ) > 1 )
			$opacity = 1.0;
		$output = 'rgba( '.implode( ",",$rgb ).','.$opacity.' )';
	} else {
		$output = 'rgb( '.implode( ",",$rgb ).' )';
	}

	//Return rgb(a) color string
	return $output;
}

/**
 * Breadcrumbs
 */
function passionate_breadcrumb() {
	global $post;
	echo '<ul id="dt_breadcrumbs">';
	if ( !is_home() ) {
		echo '<li><a href="';
		echo esc_url( home_url() );
		echo '">';
		echo __( 'Home', 'passionate' );
		echo '</a></li><li class="separator"> / </li>';
		if ( is_category() || is_single() ) {
			echo '<li>';
			the_category( ' </li><li class="separator"> / </li><li> ' );
			if ( is_single() ) {
				echo '</li><li class="separator"> / </li><li>';
				the_title();
				echo '</li>';
			}
		} elseif ( is_page() ) {
			if ( $post->post_parent ){
				$anc = get_post_ancestors( $post->ID );
				$title = get_the_title();
				foreach ( $anc as $ancestor ) {
					$output = '<li><a href="'. esc_url( get_permalink( $ancestor ) ) .'" title="'. esc_attr( get_the_title( $ancestor ) ) .'">'. esc_attr( get_the_title( $ancestor ) ) .'</a></li> <li class="separator"> / </li>';
				}
				echo $output;
				echo esc_attr( $title );
			} else {
				echo '<li>'. the_title_attribute() .'</li>';
			}
		}
	} elseif ( is_tag() ) {
		single_tag_title();
	} elseif ( is_day() ) {
		echo"<li>" . __( 'Archive for', 'passionate' ); the_time( 'F jS, Y' ); echo'</li>';
	} elseif ( is_month() ) {
		echo"<li>" . __( 'Archive for', 'passionate' ); the_time( 'F, Y' ); echo'</li>';
	} elseif ( is_year() ) {
		echo"<li>" . __( 'Archive for', 'passionate' ); the_time( 'Y' ); echo'</li>';
	} elseif ( is_author( ) ) {
		echo"<li>" . __( 'Author Archive', 'passionate' ); echo'</li>';
	} elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) {
		echo "<li>" . __( 'Blog Archive', 'passionate' ); echo'</li>';
	} elseif ( is_search() ) {
		echo"<li>" . __( 'Search Results', 'passionate' ); echo'</li>';
	}
	echo '</ul>';
}

/**
 * Add editor style
 */
function passionate_add_editor_styles() {
	add_editor_style( 'css/dt-editor-style.css' );
}
add_action( 'admin_init', 'passionate_add_editor_styles' );
