<?php
// Preloader Enable/Disable
$wp_customize->add_section( 'spidermag_per_loader_settings', array(
    'title' => esc_html__( 'Preloader Settings', 'spidermag' ),
    'priority' => 2,
));

$wp_customize->add_setting( 'spidermag_preloader_options', array( 
    'sanitize_callback' => 'spidermag_checkbox_sanitize' 
));

$wp_customize->add_control( 'spidermag_preloader_options', array(
    'type' => 'checkbox',
    'label' => esc_html__( 'Disable Preloader', 'spidermag' ),
    'section' => 'spidermag_per_loader_settings',
    'settings' => 'spidermag_preloader_options',
));

// Preloader Select Image Options
$wp_customize->add_setting( 'spidermag_preloader' , array( 
    'default' => 'default', 
    'sanitize_callback' => 'spidermag_text_sanitize'
));

$wp_customize->add_control( new WP_Customize_Preloader_Control( $wp_customize, 'spidermag_preloader', array(
    'label'      => esc_html__( 'Preloader', 'spidermag' ),
    'section'    => 'spidermag_per_loader_settings',
    'settings'   => 'spidermag_preloader',
))); 
