<?php

// GENERAL SETTINGS PANEL
$wp_customize->add_panel(
    'general',
    array(
        'title' => __( 'General', 'blogim' ),
        'description' => __('Customize general theme settings', 'blogim'),
        'priority' => 10,
    )
 );

$wp_customize->get_section('title_tagline')->panel = 'general';

$var1=(object) $wp_customize->get_section('nav');
$var1->panel = esc_html('general');

$var2=(object)$wp_customize->get_section('nav');
$var2->priority = 130;

$wp_customize->get_section('static_front_page')->panel = esc_html('general');
