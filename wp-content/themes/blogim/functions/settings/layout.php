<?php
$wp_customize->add_panel(
        'layout',
        array(
                'title' => __( 'Layout','blogim' ),
                'description' => __('layout options', 'blogim'), 
                'priority' => 41,
        )
);
// HERO LAYOUT
$wp_customize->add_section(
        'blogim_hero_layout',
        array(
                'title' => __('Hero Layout', 'blogim'),
                'priority' => 104,
                'description' => __('Choose one of three layout style.', 'blogim'),
                'panel' => 'layout'
        )
);
$wp_customize->add_setting(
        'blogim_hero_layout_style',
        array(
                'default' => 'tile',
                'sanitize_callback' => 'blogim_sanitize_select_layout',
        )
);
$wp_customize->add_control(
        'blogim_hero_layout_style',
        array(
                'section' => 'blogim_hero_layout',
                'label'      => __('Choose Layout', 'blogim'),
                'type'       => 'select',
                'choices' => array(
                        'none' => __('None', 'blogim'),
                        'tile' => __('Tile', 'blogim'),
                        'carousel' => __('Carousel', 'blogim'),
                        'slideshow' => __('Slideshow', 'blogim'),
                ),
        )
);
// CONTENT LAYOUT
$wp_customize->add_section(
        'blogim_content_layout',
        array(
                'title' => __('Content Layout', 'blogim'),
                'priority' => 105,
                'description' => __('Choose one of five layout style.', 'blogim'),
                'panel' => 'layout'
        )
);
$wp_customize->add_setting(
        'blogim_content_layout_style',
        array(
                'default' => 'full-post-grid',
                'sanitize_callback' => 'blogim_sanitize_select_layout',
        )
);
$wp_customize->add_control(
        'blogim_content_layout_style',
        array(
                'section' => 'blogim_content_layout',
                'label'      => __('Choose Layout', 'blogim'),
                'type'       => 'select',
                'choices' => array(
                        'full-post-grid' => __('Full Post then Grid Style', 'blogim'),
                        'full-post-list' => __('Full Post then List Style', 'blogim'),
                        'full-post' => __('Full Post Style', 'blogim'),
                        'grid' => __('Grid Style', 'blogim'),
                        'list' => __('List Style', 'blogim'),
                ),
        )
);
// SIDEBAR LAYOUT
$wp_customize->add_section(
        'blogim_sidebar_layout',
        array(
                'title' => __('Sidebar Layout', 'blogim'),
                'priority' => 106,
                'description' => __('Choose one of two layout style.', 'blogim'),
                'panel' => 'layout'
        )
);
$wp_customize->add_setting(
        'blogim_sidebar_layout_style',
        array(
                'default' => 'right-sidebar',
                'sanitize_callback' => 'blogim_sanitize_select_layout',
        )
);
$wp_customize->add_control(
        'blogim_sidebar_layout_style',
        array(
                'section' => 'blogim_sidebar_layout',
                'label'      => __('Choose Layout', 'blogim'),
                'type'       => 'select',
                'choices' => array(
                        'none' => __('None', 'blogim'),
                        'right-sidebar' => __('Right Sidebar', 'blogim'),
                        'left-sidebar' => __('Left Sidebar', 'blogim'),
                ),
        )
);
// FOOTER WIDGET LAYOUT
$wp_customize->add_section(
        'blogim_footer_widget_layout',
        array(
                'title' => __('Footer Widget Layout', 'blogim'),
                'priority' => 107,
                'description' => __('Choose one of five layout style.', 'blogim'),
                'panel' => 'layout'
        )
);
$wp_customize->add_setting(
        'blogim_footer_widget_layout_style',
        array(
                'default' => 'col-6-3-3',
                'sanitize_callback' => 'blogim_sanitize_select_layout',
        )
);
$wp_customize->add_control(
        'blogim_footer_widget_layout_style',
        array(
                'section' => 'blogim_footer_widget_layout',
                'label'      => __('Choose Layout', 'blogim'),
                'type'       => 'select',
                'choices' => array(
                        'none' => __('None', 'blogim'),
                        'col-6-3-3' => __('Column : 50% + 25% + 25%', 'blogim'),
                        'col-3-3-3-3' => __('Column : 25% + 25% + 25% + 25%', 'blogim'),
                        'col-3-3-6' => __('Column : 25% + 25% + 50%', 'blogim'),
                        'col-4-4-4' => __('Column : 33% + 33% + 33%', 'blogim'),
                        'col-6-6' => __('Column : 50% + 50%', 'blogim')
                
                ),
        )
);