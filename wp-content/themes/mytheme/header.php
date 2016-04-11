<!DOCTYPE html>
<html <?php language_attributes(); ?> class="animations">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
	<!--Import Google Icon Font-->
	<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body <?php body_class(); ?>>
	<!-- site-header -->
	<header>
		<div class="page-wrap">
			<a href="<?php echo home_url(); ?>" class="logo"><?php bloginfo('name');?></a>
			<?php wp_nav_menu();?>
			
			<!-- <?php get_search_form();?> -->
		</div>
	</header>
	<div class="page-wrap"> 