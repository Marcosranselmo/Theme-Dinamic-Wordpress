<?php
// home icon enable/disable in primary menu
$wp_customize->add_section('spidermag_utility_display_section', array(
   'title' => esc_html__('Header Advance Utility', 'spidermag'),
   'panel' => 'spidermag_header_options'
));
   
   $wp_customize->add_setting('spidermag_home_icon_display', array(
      'priority' => 3,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize',  //done
       'transport' => 'refresh',
   ));

   $wp_customize->add_control('spidermag_home_icon_display', array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable home icon in the primary menu', 'spidermag'),
      'section' => 'spidermag_utility_display_section',
      'settings' => 'spidermag_home_icon_display'
   ));

   // primary sticky menu enable/disable
   $wp_customize->add_setting('spidermag_primary_sticky_menu', array(
      'priority' => 4,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize'  //done
   ));

   $wp_customize->add_control('spidermag_primary_sticky_menu', array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable the sticky behavior of the primary menu', 'spidermag'),
      'section' => 'spidermag_utility_display_section',
      'settings' => 'spidermag_primary_sticky_menu'
   ));

   // search icon in menu enable/disable
   $wp_customize->add_setting('spidermag_search_icon_in_menu', array(
      'priority' => 5,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize'   //done
   ));

   $wp_customize->add_control('spidermag_search_icon_in_menu', array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable Search Icon in the primary menu', 'spidermag'),
      'section' => 'spidermag_utility_display_section',
      'settings' => 'spidermag_search_icon_in_menu'
   ));

   $wp_customize->add_setting('spidermag_login_display', array(
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize'  //done
   ));

   $wp_customize->add_control('spidermag_login_display', array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable Login in header', 'spidermag'),
      'section' => 'spidermag_utility_display_section',
      'settings' => 'spidermag_login_display'
   ));
   
   //Create Account enable/disabled
   $wp_customize->add_setting('spidermag_create_account_display', array(
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize'  // done
   ));

   $wp_customize->add_control('spidermag_create_account_display', array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable Create Account in header', 'spidermag'),
      'section' => 'spidermag_utility_display_section',
      'settings' => 'spidermag_create_account_display'
   ));