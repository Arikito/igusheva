<?php
$wp_customize->add_panel(
  'styling',
  array(
    'title' => __( 'Styling', 'blogim' ),
    'description' => __('styling options', 'blogim'),
    'priority' => 31, 
  )
);
$wp_customize->get_section('background_image')->panel = 'styling';
$wp_customize->get_section('header_image')->panel = 'styling';
$wp_customize->get_section('colors')->panel = 'styling';
$wp_customize->get_setting('background_color')->default = '#FCFFF5';

//Main color
$wp_customize->add_setting(
  'blogim_main_color',
  array(
    'default' => '#193441',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
  )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'blogim_main_color',
    array(
      'label'      => __('Main Color', 'blogim'),
      'section' => 'colors',
      'settings' => 'blogim_main_color',
    )
  )
);