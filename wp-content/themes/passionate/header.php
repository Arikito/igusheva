<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Passionate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="dt-layout-boxed<?php if ( get_theme_mod( 'passionate_default_layout', 0 ) == 'wide_layout' ) : ?> dt-layout-wide<?php endif; ?>">
		<header class="dt-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="dt-logo">

							<?php if ( get_theme_mod( 'passionate_logo', 0 ) != '' ) : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'passionate_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
							<?php else : ?>
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; ?></p>
								<?php endif; ?>
							<?php endif ?>

						</div><!-- .dt-logo -->
					</div><!-- .col-lg-4 .col-md-4 .col-sm-4 .col-xs-12 -->

					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="dt-top-social">

							<?php if ( is_active_sidebar( 'dt-top-bar-social' ) ) : ?>
								<span class="dt-social-icons-lg">
									<?php dynamic_sidebar( 'dt-top-bar-social' ); ?>
								</span>
							<?php endif; ?>

							<?php if ( is_active_sidebar( 'dt-top-bar-search' ) ) : ?>
								<span class="dt-search-wrap transition5">

									<?php dynamic_sidebar( 'dt-top-bar-search' ); ?>

									<span class="dt-search-icon">
										<i class="fa fa-search transition35"></i>
									</span><!-- .dt-search-wrap -->
								</span><!-- .dt-search-wrap -->
							<?php endif; ?>

							<div class="dt-search-md-wrap transition35">
								<?php dynamic_sidebar( 'dt-top-bar-search' ); ?>
							</div><!-- .dt-search-md-wrap -->

						</div><!-- .dt-top-social -->
					</div><!-- .col-lg-8 .col-md-8 .col-sm-9 .col-xs-12 -->
				</div><!-- .row -->
			</div><!-- .container -->
		</header><!-- .dt-header -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>

			<div class="dt-header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php esc_url( header_image()); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="header image" />
				</a>
			</div><!-- .dt-header-image -->

		<?php endif; ?>

		<nav class="<?php if ( get_theme_mod( 'passionate_sticky_menu', 0 ) == 1 ) { ?> transition35 dt-sticky<?php } ?>">
			<div class="dt-main-menu-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="dt-main-menu">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</div><!-- .dt-main-menu -->

							<div class="dt-nav-md-trigger">
								<?php _e( 'Menu', 'passionate' ); ?> <i class="fa fa-bars"></i>
							</div><!-- .dt-nav-md-trigger -->

							<div class="dt-nav-md">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</div><!-- .dt-nav-md .transition35 -->
						</div><!-- .col-lg-12 .col-md-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .dt-main-menu-wrap -->
		</nav><!-- .dt-sticky -->

		<?php if( ! is_front_page() ) : ?>
			<div class="dt-breadcrumbs">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php passionate_breadcrumb(); ?>
						</div><!-- .col-lg-12 -->
					</div><!-- .row-->
				</div><!-- .container-->
			</div><!-- .dt-breadcrumbs-->
		<?php endif; ?>

