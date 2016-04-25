<?php
/**
 * kanu functions and definitions
 *
 * @package kanu
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 726; /* pixels */



if ( ! function_exists( 'kanu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function kanu_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on kanu, use a find and replace
	 * to change 'kanu' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kanu', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    /**
	 * Title
	 */
    add_theme_support( "title-tag" );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kanu' )
	) );

	/**
	 * Custom Header
	 */
    $kanu_defaults = array(
    	'default-image'          => '',
    	'random-default'         => false,
    	'width'                  => 0,
    	'height'                 => 0,
    	'flex-height'            => false,
    	'flex-width'             => false,
    	'default-text-color'     => '',
    	'header-text'            => true,
    	'uploads'                => true,
    	'wp-head-callback'       => '',
    	'admin-head-callback'    => '',
    	'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $kanu_defaults );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'kanu_custom_background_args', array(
		'default-color' => 'f7f7f7',
		'default-image' => '',
	) ) );
	
	add_editor_style( 'custom-editor-style.css' );
}
endif; // kanu_setup
add_action( 'after_setup_theme', 'kanu_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function kanu_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kanu' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kanu_widgets_init' );

/**
 * Enqueue google fonts
 */
function kanu_fonts_url() {
    $kanu_fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Roboto, translate this to 'off'. Do not translate
    * into your own language.
    */
    $kanu_roboto = _x( 'on', 'Roboto font: on or off', 'kanu' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    $kanu_lato = _x( 'on', 'Lato font: on or off', 'kanu' );
    
   if ( 'off' !== $kanu_roboto || 'off' !== $kanu_lato ) {
        $kanu_font_families = array();
 
        if ( 'off' !== $kanu_roboto ) {
            $kanu_font_families[] = 'Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic';
        }
 
        if ( 'off' !== $kanu_lato ) {
            $kanu_font_families[] = 'Lato:400,700';
        }
 
        $kanu_query_args = array(
            'family' => urlencode( implode( '|', $kanu_font_families ) ),
        );
 
        $kanu_fonts_url = add_query_arg( $kanu_query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $kanu_fonts_url );
}
function kanu_scripts_styles() {
    wp_enqueue_style( 'kanu-fonts', kanu_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'kanu_scripts_styles' );

/**
 * Enqueue scripts and styles
 */
function kanu_scripts() {
    /**
     * Enqueue Css Files.
     */ 
    wp_enqueue_style( 'kanu-slider-bxslider', get_template_directory_uri()."/css/jquery.bxslider.css" );
    wp_enqueue_style( 'kanu-style', get_template_directory_uri()."/css/style.css" );
	wp_enqueue_style( 'kanu-fontello', get_template_directory_uri()."/3dParty/fontello/css/fontello.css" );
	
    /**
     * Register Scripts
     */
	wp_enqueue_script('jquery');
    
    // threaded comments
    if ( is_single() && comments_open() && get_option( 'thread_comments' ) ){
        wp_enqueue_script( 'comment-reply' );
    }
    
    // Plugins
    wp_register_script( 'kanu-navigation', get_template_directory_uri() . '/js/navigation.js', false, false, true );    
    wp_register_script( 'kanu-slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', false, false, true ); 
    
    //files dependances.
    $kanu_deps = array(
        'kanu-navigation',
        'kanu-slider',
    );   
    wp_register_script( 'kanu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', $kanu_deps, false, true );    
    
    /**
     * Enqueue All
     */
    wp_enqueue_script( 'kanu-skip-link-focus-fix' );
    
    if ( ( (is_home() == true) || (is_front_page() == true) ) ) {
		wp_enqueue_script( 'kanu-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery','kanu-slider') );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'kanu-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'kanu_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


class kanu_Recent_Posts extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'kanu_rp', // Base ID
			__('kanu Recent Posts', 'kanu'), // Name
			array( 'description' => __( 'Display your recent posts, with a Thumbnail.', 'kanu' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$no_of_posts = apply_filters( 'no_of_posts', $instance['no_of_posts'] );

		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		// WP_Query arguments
		$qa = array (
			'post_type'              => 'post',
			'posts_per_page'		 => 5,
			'offset'				 => 0,
			'ignore_sticky_posts'    => 1

		);
		
		// The Query
		$recent_articles = new WP_Query( $qa );
		if($recent_articles->have_posts()) : ?>
		<ul class="rp">
		<?php
			while($recent_articles->have_posts()) : 
			$recent_articles->the_post();
         ?>
         		 
		         <li class='rp-item'>
		         <?php if( has_post_thumbnail() ) : ?>
		         <div class='rp-thumb'><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
		         <?php 
		         else :
		         ?>
		         <div class='rp-thumb'><a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/nthumb.png"></a></div>
		         <?php
		         endif; ?>	
		         <div class='rp-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		         </li>      
		      
		<?php
		      endwhile;
		   else: 
                echo esc_html__( 'Oops, there are no posts.', 'kanu' );
		   endif;
		?>
		</ul>
		<?php
		
		echo $args['after_widget'];
	}

 	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Latest Articles', 'kanu' );
		}
		if ( isset( $instance[ 'no_of_posts' ] ) ) {
			$no_of_posts = $instance[ 'no_of_posts' ];
		}
		else {
			$no_of_posts = __( '5', 'kanu' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','kanu' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		
		<label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><?php _e( 'No. of Posts:','kanu' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $no_of_posts ); ?>" />
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['no_of_posts'] = ( ! empty( $new_instance['no_of_posts'] ) ) ? strip_tags( $new_instance['no_of_posts'] ) : '5';
		if ( is_numeric($new_instance['no_of_posts']) == false ) {
			$instance['no_of_posts'] = $old_instance['no_of_posts'];
			}
		return $instance;
		
		
	}
}
add_action( 'widgets_init', 'kanu_register_kanu_widget' );  
function kanu_register_kanu_widget() {  
    register_widget( 'kanu_Recent_Posts' );  
}  

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory()  . '/inc/kanu-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
