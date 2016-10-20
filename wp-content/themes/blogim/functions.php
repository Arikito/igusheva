<?php
require_once (dirname(__FILE__) . '/functions/cssjs.php');
require_once (dirname(__FILE__) . '/functions/breadcrumbs.php');
require_once (dirname(__FILE__) . '/functions/comment.php');
require_once (dirname(__FILE__) . '/functions/metabox.php');
require_once (dirname(__FILE__) . '/functions/customization.php');
require_once (dirname(__FILE__) . '/functions/aq_resizer.php');

function blogim_localize(){
	load_theme_textdomain('blogim', get_template_directory() . '/languages');
	add_editor_style();
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_theme_support( 'post-formats', array( 'image','gallery','video','audio','quote','link','status') );
}
add_action('after_setup_theme', 'blogim_localize');

function blogim_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) { return $title; } // end if
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	} // end if
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'blogim' ), max( $paged, $page ) ) . " $sep $title";
	} // end if
	return $title;
} // end blogim_wp_title
add_filter( 'wp_title', 'blogim_wp_title', 10, 2 );

function blogim_custom_read_more() {
	return '... <a class="more-post" href="'. esc_url(get_permalink(get_the_ID())).'">'.__('read more','blogim').'</a>';
}
function new_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function blogim_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'blogim_excerpt_length', 999 );

function blogim_pro_menu_settings() {
    $blogim_menu = array(
        'page_title' => __('BlogIM Pro Features', 'blogim'),
        'menu_title' => __('BlogIM Pro Features', 'blogim'),
        'capability' => 'edit_theme_options',
        'menu_slug' => 'blogimpro',
        'callback' => 'blogim_pro_page'
    );
    return apply_filters('blogim_pro_menu', $blogim_menu);
}

add_action('admin_menu', 'blogim_options_add_page');

function blogim_options_add_page() {
    $blogim_menu = blogim_pro_menu_settings();
    add_theme_page($blogim_menu['page_title'], $blogim_menu['menu_title'], $blogim_menu['capability'], $blogim_menu['menu_slug'], $blogim_menu['callback']);
}

function blogim_pro_page(){?>

<div class="blogim_proversion">
	<a href="https://indigothemes.com/products/blogim-pro-wordpress-theme-jvzoo/" title="Download BlogIM Pro Now">
		<img src ="<?php echo get_template_directory_uri();?>/assets/img/Pro_1_01.png"/>
		<img src ="<?php echo get_template_directory_uri();?>/assets/img/Pro_1_02.png" />
	</a>
</div>

<?php
}
function blogim_RegisterMenu(){
    register_nav_menu('mainmenu',esc_html__('Main Menu','blogim'));
	register_nav_menu('footer_menu',esc_html__('Footer Menu','blogim'));
}
add_action('after_setup_theme','blogim_RegisterMenu');

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support('post-thumbnails' );
	add_theme_support('automatic-feed-links' );
	add_theme_support('custom-background' );
	add_theme_support('title-tag' );
	add_theme_support('custom-header' );
	set_post_thumbnail_size( 300, 300);
}
if ( ! isset( $content_width ) ) {
	$content_width = intval(1170);
}
	
function blogim_register_sidebar(){
	$blogim_args = array();
	
	$blogim_args['main']= array(
		'name' 			=> esc_html__('Main','blogim'),
		'id'			=> 'sidebar',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>', 
	);
	
	$blogim_args['single-page']				= $blogim_args['main'];	
	$blogim_args['single-page']['name']		= esc_html__('Single-page','blogim');
	$blogim_args['single-page']['id']		= 'single-page';
	
	$blogim_args['single-post']				= $blogim_args['main'];	
	$blogim_args['single-post']['name']		= esc_html__('Single-post','blogim');
	$blogim_args['single-post']['id']		= 'single-post';
	
	$blogim_args['category-page']			= $blogim_args['main'];	
	$blogim_args['category-page']['name']	= esc_html__('Category-page','blogim');
	$blogim_args['category-page']['id']		= 'category-page';	
	
	$blogim_args['404-page']				= $blogim_args['main'];	
	$blogim_args['404-page']['name']		= esc_html__('404-page','blogim');
	$blogim_args['404-page']['id']			= '404-page';
	
	$blogim_args['search-page']				= $blogim_args['main'];	
	$blogim_args['search-page']['name']		= esc_html__('Search-page','blogim');
	$blogim_args['search-page']['id']		= 'search-page';
	
	$blogim_args['footer-widget-1']	= array(
		'name' 			=> 'Footer Widget 1',
		'id'			=> 'footer-widget-1',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>', 
	);
	
	$blogim_args['footer-widget-2']				= $blogim_args['footer-widget-1'];	
	$blogim_args['footer-widget-2']['name']		= esc_html__('Footer Widget 2','blogim');
	$blogim_args['footer-widget-2']['id']		= 'footer-widget-2';	
	
	$blogim_args['footer-widget-3']				= $blogim_args['footer-widget-1'];	
	$blogim_args['footer-widget-3']['name']		= esc_html__('Footer Widget 3','blogim');
	$blogim_args['footer-widget-3']['id']		= 'footer-widget-3';
	
	$blogim_args['footer-widget-4']				= $blogim_args['footer-widget-1'];	
	$blogim_args['footer-widget-4']['name']		= esc_html__('Footer Widget 4','blogim');
	$blogim_args['footer-widget-4']['id']		= 'footer-widget-4';
	
	foreach($blogim_args as $blogim_arg)register_sidebar($blogim_arg);
}
add_action('widgets_init','blogim_register_sidebar');

function blogim_profile_field_save( $blogim_user_id ) {
	if ( !current_user_can( 'edit_user', $blogim_user_id ) ){
		return false;
	}
	update_user_meta( $blogim_user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $blogim_user_id, 'twitter', $_POST['twitter'] );
}
add_action( 'personal_options_update', 'blogim_profile_field_save' );
add_action( 'edit_user_profile_update', 'blogim_profile_field_save' );