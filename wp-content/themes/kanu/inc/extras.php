<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package kanu
 */
 
 /**
 *Display Header Meta Tags.
 */
function kanu_display_meta_tags() {
    
    echo "\t".'<meta charset="' . get_bloginfo( 'charset' ) . '" />'."\n";
    echo "\t".'<meta name="viewport" content="width=device-width, initial-scale=1">'."\n";
    echo "\t".'<link rel="profile" href="http://gmpg.org/xfn/11">'."\n";
    echo "\t".'<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '" />'."\n";
    
}
add_action( 'wp_head', 'kanu_display_meta_tags' );
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function kanu_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'kanu_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function kanu_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'kanu_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function kanu_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'kanu_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function kanu_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'kanu' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'kanu_wp_title', 10, 2 );