<?php
// 404 PAGE
$wp_customize->add_section(
        'blogim_404',
        array(
                'title' => __('Page 404', 'blogim'),
                'priority' => 109,
                'description' => __('Choose page as content for 404 page', 'blogim'),
        )
);
$wp_customize->add_setting(
        'blogim_404_page',
        array(
                'default' => '',
                'sanitize_callback' => 'blogim_sanitize_select_page',
        )
);
$wp_customize->add_control(
        'blogim_404_page',
        array(
                'section' => 'blogim_404',
                'label'      => __('Choose page', 'blogim'),
                'type'       => 'select',
                'choices' => blogim_get_pages(),
                'sanitize_callback' => 'esc_url_raw',
        )
);