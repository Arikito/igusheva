<?php
/**
 * Passionate Theme Customizer.
 *
 * @package Passionate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function passionate_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Header Settings
	$wp_customize->add_panel( 'passionate_header_options', array(
		'priority' 			=> 60,
		'title' 			=> __( 'Header Settings', 'passionate' ),
		'description' 		=> __( 'Header Settings', 'passionate' ),
		'capabitity' 		=> 'edit_theme_options'
	) );

	// Sticky Menu
	$wp_customize->add_section( 'passionate_sticky_menu_section', array(
		'priority' 			=> 100,
		'title' 			=> __( 'Sticky Menu', 'passionate' ),
	) );

	$wp_customize->add_setting( 'passionate_sticky_menu', array(
		'default' 			=> 0,
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'passionate_checkbox_sanitize'
	) );

	$wp_customize->add_control( 'passionate_sticky_menu', array(
		'type' 				=> 'checkbox',
		'label' 			=> __( 'Check to enable the sticky Main menu', 'passionate' ),
		'settings' 			=> 'passionate_sticky_menu',
		'section' 			=> 'passionate_sticky_menu_section'
	) );

	// Main Menu Color
	$wp_customize->add_setting( 'passionate_menu_color', array(
		'priority' 			     => 6,
		'default' 			     => '#273039',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'passionate_color_sanitize',
		'sanitize_js_callback'   => 'passionate_color_escaping_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'passionate_menu_color_picker', array(
		'label' 		=> __( 'Menu Font Color', 'passionate' ),
		'section' 		=> 'colors',
		'settings' 		=> 'passionate_menu_color'
	) ) );

	$wp_customize->add_setting( 'passionate_menu_bg_color', array(
		'priority' 				 => 7,
		'default' 				 => '#ffffff',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'passionate_color_sanitize',
		'sanitize_js_callback'   => 'passionate_color_escaping_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'passionate_menu_bg_color_picker', array(
		'label' 			=> __( 'Menu Background', 'passionate' ),
		'section' 			=> 'colors',
		'settings' 			=> 'passionate_menu_bg_color'
	) ) );

	$wp_customize->add_setting( 'passionate_menu_color_hover', array(
		'priority' 			     => 6,
		'default' 			     => '#17bebb',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'passionate_color_sanitize',
		'sanitize_js_callback'   => 'passionate_color_escaping_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'passionate_menu_hover_color_picker', array(
		'label' 			=> __( 'Menu Hover Font Color', 'passionate' ),
		'section' 			=> 'colors',
		'settings' 			=> 'passionate_menu_color_hover'
	) ) );

	$wp_customize->add_setting( 'passionate_menu_hover_bg_color', array(
		'priority' 				 => 7,
		'default' 				 => '#ffffff',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'passionate_color_sanitize',
		'sanitize_js_callback'   => 'passionate_color_escaping_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'passionate_menu_hover_bg_color_picker', array(
		'label' 			=> __( 'Menu Hover Background', 'passionate' ),
		'section' 			=> 'colors',
		'settings' 			=> 'passionate_menu_hover_bg_color'
	) ) );

	// Layout and Content
	$wp_customize->add_panel( 'passionate_layout_options',array(
		'capabitity' 		=> 'edit_theme_options',
		'description' 		=> __( 'Layout and Content Settings', 'passionate' ),
		'priority' 			=> 201,
		'title' 			=> __( 'Layout and Content', 'passionate' )
	) );

	// Website Default Layout
	$wp_customize->add_section( 'passionate_website_layout', array(
		'priority' 			=> 1,
		'title' 			=> __( 'Website Layout', 'passionate' ),
		'panel'				=> 'passionate_layout_options'
	) );

	$wp_customize->add_setting( 'passionate_default_layout', array(
		'default' 			=> 'boxed_layout',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'passionate_site_layout_sanitize'
	) );

	$wp_customize->add_control( 'passionate_default_layout', array(
		'type'			 	=> 'radio',
		'label' 			=> __( 'Choose layout: The change will make to whole site', 'passionate' ),
		'choices' 			=> array(
			'boxed_layout'  => __( 'Boxed Layout', 'passionate' ),
			'wide_layout'  	=> __( 'Wide Layout', 'passionate' )
		),
		'section'			=> 'passionate_website_layout',
		'settings' 			=> 'passionate_default_layout'
	) );

	// Page Default Layout
	$wp_customize->add_section( 'passionate_page_layout_section', array(
		'priority' 			=> 2,
		'title' 			=> __( 'Single Page Layout', 'passionate' ),
		'panel'				=> 'passionate_layout_options'
	) );

	$wp_customize->add_setting( 'passionate_page_layout', array(
		'default' 			=> 'left_sidebar',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'passionate_page_layout_sanitize'
	) );

	$wp_customize->add_control( 'passionate_page_layout', array(
		'type'			 	=> 'radio',
		'label' 			=> __( 'Choose Default Page layout', 'passionate' ),
		'choices' 			=> array(
			'right_sidebar' => __( 'Right Sidebar', 'passionate' ),
			'left_sidebar'  => __( 'Left Sidebar', 'passionate' ),
			'full_width'  	=> __( 'Full Width', 'passionate' )
		),
		'section'			=> 'passionate_page_layout_section',
		'settings' 			=> 'passionate_page_layout'
	) );

	// Post Default Layout
	$wp_customize->add_section( 'passionate_single_page_layout_section', array(
		'priority' 			=> 3,
		'title' 			=> __( 'Single Post Layout', 'passionate' ),
		'panel'				=> 'passionate_layout_options'
	) );

	// Radio control
	$wp_customize->add_setting( 'passionate_single_page_layout', array(
			'default' 			=> 'left_sidebar',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'passionate_page_layout_sanitize'
	) );

	$wp_customize->add_control( 'passionate_single_page_layout', array(
			'label' 			=> __( 'Choose Default Single Post layout', 'passionate' ),
			'section'			=> 'passionate_single_page_layout_section',
			'type'			 	=> 'radio',
			'choices' 			=> array(
				'right_sidebar' => __( 'Right Sidebar', 'passionate' ),
				'left_sidebar'  => __( 'Left Sidebar', 'passionate' ),
				'full_width'  	=> __( 'Full Width', 'passionate' )
			),
			'settings' 			=> 'passionate_single_page_layout',
			'priority' 			=> 3
	) );

	// Default Font Size
	$wp_customize->add_section( 'passionate_font_size_section',	array(
		'priority' 			=> 5,
		'title' 			=> __( 'Default Font Size', 'passionate' ),
		'panel'				=> 'passionate_layout_options'
	) );

	$wp_customize->add_setting(	'passionate_font_size',	array(
		'default' 			=> '15',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'passionate_sanitize_integer'
	) );

	$wp_customize->add_control(	'passionate_font_size',	array(
		'type'			 	=> 'number',
		'label' 			=> __( 'Set Default Font Size', 'passionate' ),
		'section'			=> 'passionate_font_size_section',
		'settings' 			=> 'passionate_font_size'
	) );

	// Font Colors
	$wp_customize->add_setting(	'passionate_font_color', array(
		'default' 			     => '#2f363e',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'passionate_color_sanitize',
		'sanitize_js_callback'   => 'passionate_color_escaping_sanitize'
	) );

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'passionate_font_color', array(
		'label' 		=> __( 'Font Color', 'passionate' ),
		'section' 		=> 'colors',
		'settings' 		=> 'passionate_font_color'
	) ) );

	// Primary Color
	$wp_customize->add_setting( 'passionate_primary_color', array(
		'default' 			     => '#17bebb',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'passionate_color_sanitize',
		'sanitize_js_callback'   => 'passionate_color_escaping_sanitize'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(	$wp_customize, 'passionate_primary_color', array(
		'label' 		=> __( 'Primary Color', 'passionate' ),
		'section' 		=> 'colors',
		'settings' 		=> 'passionate_primary_color'
	) ) );

	// Checkbox Sanitize
	function passionate_checkbox_sanitize( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	// Color Sanitizate
	function passionate_color_sanitize( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ))
			return '#' . $unhashed;

		return $color;
	}

	// Color Escape Sanitize
	function passionate_color_escaping_sanitize( $input ) {
		$input = esc_attr( $input );
		return $input;
	}

	// Layout Sanitize
	function passionate_site_layout_sanitize( $input ) {
		$valid_keys = array(
			'boxed_layout' => __( 'Boxed Layout', 'passionate' ),
			'wide_layout'  => __( 'Wide Layout', 'passionate' )
		);

		if ( array_key_exists( $input, $valid_keys ) ) {
			return $input;
		} else {
			return '';
		}
	}

	// Page Layout Sanitize
	function passionate_page_layout_sanitize( $input ) {
		$valid_keys = array(
			'right_sidebar' => __( 'Right Sidebar', 'passionate'),
			'left_sidebar'  => __( 'Left Sidebar', 'passionate' ),
			'full_width'  	=> __( 'Full Width', 'passionate' )
		);

		if ( array_key_exists( $input, $valid_keys ) ) {
			return $input;
		} else {
			return '';
		}
	}

	// Number Integer
	function passionate_sanitize_integer( $input ) {
		return absint( $input );
	}

}
add_action( 'customize_register', 'passionate_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function passionate_customize_preview_js() {
	wp_enqueue_script( 'passionate_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'passionate_customize_preview_js' );

/**
 * Enqueue Inline styles generated by customizer
 */
function passionate_customizer_styles() {
	// Custom Font Size
	$font_size = get_theme_mod( 'passionate_font_size' );

	if ( $font_size != '' &&  $font_size != '15px' ) {
		$dt_font_size = "
	body {
		font-size: {$font_size}px;
	}
	";
	} else {
		$dt_font_size = '';
	}

	// Custom Font Color
	$font_color = get_theme_mod( 'passionate_font_color' );

	if ( $font_color != '' && $font_color != '#2f363e' ) {
		$dt_font_color = "
	body,
	h1 a,
	h2 a,
	h3 a,
	h4 a,
	h5 a,
	h6 a,
	a,
	.dt-logo a {
		color: {$font_color};
	}
	";
	} else {
		$dt_font_color = '';
	}

	// Primary Color
	$primary_color = get_theme_mod( 'passionate_primary_color' );
	$primary_color_rgba95 = passionate_hex2rgba( $primary_color, .95 );

	if ( $primary_color != '' && $primary_color != '#17bebb' ) {
		$dt_primary_color = "
	a:hover,
	.dt-footer-cont li a:hover,
	.dt-sec-menu li a:hover,
	.dt-featured-posts-wrap h2 a:hover,
	.dt-pagination-nav .current,
	.dt-footer .dt-news-layout-wrap a:hover,
	.dt-footer-bar a:hover {
		color: {$primary_color};
	}

	.dt-works-meta h2 span,
	.dt-services-meta h2 span,
	.dt-testimonial-wrap h2 span,
	.dt-news-layout-wrap h2 span,
	.dt-footer h2:after,
	.dt-footer .tagcloud a:hover,
	.dt-call-to-action-btn a:hover,
	.dt-service-more a:hover,
	.dt-nav-md-trigger {
		background: {$primary_color};
	}

	.dt-category-post-readmore a:hover,
	.dt-pagination-nav .current,
	.dt-pagination-nav a:hover,
	.dt-archive-post .dt-archive-post-readmore a:hover {
		border-color: {$primary_color_rgba95};
	}

	#back-to-top:hover,
	.dt-call-to-action-btn a,
	.dt-footer h2 span,
	#back-to-top:hover {
		background: {$primary_color_rgba95};
	}
	";
	} else {
		$dt_primary_color = '';
	}

	// Custom Menu Background Color
	$menu_bg = get_theme_mod( 'passionate_menu_bg_color' );

	if ( $menu_bg != '' && $menu_bg != '#ffffff' ) {
		$dt_menu_bg = "
	.dt-main-menu,
	.dt-main-menu li ul,
	.dt-menu-bar-sticky,
	.dt-main-menu-wrap,
	.dt-nav-md-trigger {
		background: {$menu_bg} !important;
	}
	";
	} else {
		$dt_menu_bg = '';
	}

	// Custom Menu Color
	$menu_color	= get_theme_mod( 'passionate_menu_color' );

	if ( $menu_color != '' && $menu_color != '#273039' ) {
		$dt_menu_color = "
	.dt-main-menu li a,
	.dt-main-menu li:hover,
	.dt-nav-md li a,
	.dt-logo-md a {
		color: {$menu_color};
	}
	";
	} else {
		$dt_menu_color = '';
	}

	// Custom Menu Hover Background Color
	$menu_hover_bg = get_theme_mod( 'passionate_menu_hover_bg_color' );

	if ( $menu_hover_bg != '' && $menu_hover_bg != '#ffffff' ) {
		$dt_menu_hover_bg = "
	.dt-main-menu li:hover,
	.dt-main-menu li a:hover,
	.current-menu-item > a,
	.dt-nav-md li a:hover,
	.current-menu-item a,
	.current_page_item a {
		background: {$menu_hover_bg} !important;
	}
	";
	} else {
		$dt_menu_hover_bg = '';
	}

	// Custom Menu Hover Color
	$menu_color_hover = get_theme_mod( 'passionate_menu_color_hover' );

	if ( $menu_color_hover != '' && $menu_color_hover != '#17bebb' ) {
		$dt_menu_color_hover = "
	.dt-main-menu li:hover,
	.dt-main-menu li a:hover,
	.current-menu-item > a,
	.dt-nav-md li a:hover,
	.current-menu-item a,
	.current_page_item a,
	.current-menu-item.menu-item-has-children:after,
	.current-menu-item.menu-item-has-children:hover:after,
	.menu-item-has-children:hover:after,
	.dt-main-menu li:hover > a {
		color: {$menu_color_hover} !important;
	}
	";
	} else {
		$dt_menu_color_hover = '';
	}

	$custom_css = $dt_font_size . $dt_font_color . $dt_primary_color . $dt_menu_bg . $dt_menu_color . $dt_menu_hover_bg . $dt_menu_color_hover;

	wp_add_inline_style( 'passionate-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'passionate_customizer_styles' );
