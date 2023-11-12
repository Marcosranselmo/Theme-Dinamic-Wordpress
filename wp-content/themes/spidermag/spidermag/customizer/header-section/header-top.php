<?php
/**
 * @package SpiderMag
 * @since 1.0.4
 * Header Top Settings
 */
// breaking news enable/disable
$wp_customize->add_section('spidermag_top_header_section', array(
    'title' => esc_html__('Top Header', 'spidermag'),
    'panel' => 'spidermag_header_options'
));
$wp_customize->add_setting('spidermag_top_header_section_enable', array(
    'default' => 'yes',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'  // done
 ));

 $wp_customize->add_control('spidermag_top_header_section_enable', array(
   'type' => 'select',
   'label' => esc_html__('Enable', 'spidermag'),
   'section' => 'spidermag_top_header_section',
   'settings' => 'spidermag_top_header_section_enable',
   'choices' => array(
       'yes'   => esc_html__('Yes','spidermag'),
       'no' => esc_html__('No','spidermag')
    )
));


$wp_customize->add_setting('spidermag_left_side_header_setting', array(
    'default' => 'welcome',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'  // done
 ));

 $wp_customize->add_control('spidermag_left_side_header_setting', array(
   'type' => 'select',
   'label' => esc_html__('Select Options as your choise', 'spidermag'),
   'section' => 'spidermag_top_header_section',
   'settings' => 'spidermag_left_side_header_setting',
   'choices' => array(
       'welcome'   => esc_html__('Welcome','spidermag'),
       'breaking' => esc_html__('Breaking News','spidermag'),
       'topnav' => esc_html__('Top Menu','spidermag'),
    )
));


$wp_customize->add_setting('spidermag_right_side_header_setting', array(
    'default' => 'date',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'  // done
 ));

 $wp_customize->add_control('spidermag_right_side_header_setting', array(
   'type' => 'select',
   'label' => esc_html__('Select Options as your choise', 'spidermag'),
   'section' => 'spidermag_top_header_section',
   'settings' => 'spidermag_right_side_header_setting',
   'choices' => array(
       'date' => esc_html__('Date & Time','spidermag'),
       'social'  => esc_html__('Social Icon','spidermag'),
       'topnav' => esc_html__('Top Menu','spidermag'),
     )
 ));

 $wp_customize->add_setting('spidermag_top_bg_color', array(
    'default' => '#002584',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spidermag_top_bg_color', array(
    'section' => 'spidermag_top_header_section',
    'label' => esc_html__('Background  Color', 'spidermag')
)));

$wp_customize->add_setting('spidermag_top_text_color', array(
    'default' => '#fff',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spidermag_top_text_color', array(
    'section' => 'spidermag_top_header_section',
    'label' => esc_html__('Text  Color', 'spidermag')
)));