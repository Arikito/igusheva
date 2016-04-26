<?php
// SOCIAL ICON
$wp_customize->add_section(
        'blogim_social_account',
        array(
                'title' => __('Social Account', 'blogim'),
                'priority' => 102,
                'description' => __('Enter the URL of your social account.Leave it empty to hide the icon', 'blogim'),
        )
);
$blogim_icons = array();
$blogim_icons[] =  array( 'slug'=>'blogim_social_fb', 'default' => 'http://facebook.com', 'label' => __( 'Facebook', 'blogim' ) );
$blogim_icons[] =  array( 'slug'=>'blogim_social_tw', 'default' => 'http://twitter.com', 'label' => __( 'Twitter', 'blogim' ) );

foreach($blogim_icons as $blogim_icon){
        $wp_customize->add_setting(
                $blogim_icon['slug'],
                array(
                        'default' => '',
                        'capability'     => 'edit_theme_options',
                        'sanitize_callback' => 'blogim_sanitize_text',
                )
        );
        
        $wp_customize->add_control(
                $blogim_icon['slug'],
                array(
                        'section' => 'blogim_social_account',
                        'label'      =>   $blogim_icon['label'],
                        'type'       => 'text',
                        'sanitize_callback' => 'esc_url_raw',
                )
        );
}