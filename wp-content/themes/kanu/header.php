<?php
/*
 * Core boson header template
 *
 * Customise this in your child theme by:
 * - Using hooks and your own functions
 * - Using the 'header-content' template part
 * - For example 'header-content-category.php' for category view or 'header-content.php' (fallback if location specific file not available)
 * - Copying this file to your child theme and customising - it will over-ride this file
 *
 * @package boson
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="main">   
      <?php 
        //Header Content Template.
        get_template_part( 'templates/header', 'content' );
      ?> 