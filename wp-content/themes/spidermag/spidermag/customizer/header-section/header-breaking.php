<?php
 // breaking news enable/disable
   $wp_customize->add_section('spidermag_breaking_news_section', array(
      'title' => esc_html__('Breaking News', 'spidermag'),
      'panel' => 'spidermag_header_options'
   ));

   $wp_customize->add_setting('spidermag_breaking_news', array(
      'priority' => 1,
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize' //done
   ));

   $wp_customize->add_control('spidermag_breaking_news', array(
      'type' => 'checkbox',
      'label' => esc_html__('Enable the breaking news section', 'spidermag'),
      'section' => 'spidermag_breaking_news_section',
      'settings' => 'spidermag_breaking_news'
   ));


   $wp_customize->add_setting('spidermag_breaking_news_title_options', array(
      'default' => 'no',
      'priority' => 2,     
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_radio_sanitize' // done
   ));

   $wp_customize->add_control('spidermag_breaking_news_title_options', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the option that you want', 'spidermag'),
      'section' => 'spidermag_breaking_news_section',
      'choices' => array(
         'yes' => esc_html__('Label', 'spidermag'),
         'no' => esc_html__('Omega Icons', 'spidermag'),        
      ),
      'description' => sprintf( esc_html__( 'If you choose label then enter text what you want to dispaly as Label or Choose Omega Icons and enter the icon class name : %1$s %2$sicon list here%3$s', 'spidermag' ), '','<a href="'.esc_url('http://ionicons.com/').'" target="_blank">','</a>' ),
        
   ));
   
   // Breaking News Text field
   $wp_customize->add_setting('spidermag_breaking_news_title', array(     
      'default' => '',
      'priority' => 3,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_text_sanitize' //done
   ));

   $wp_customize->add_control('spidermag_breaking_news_title', array(
      'type' => 'text',
      'label' => esc_html__('Enter Breaking News Title', 'spidermag'),
      'section' => 'spidermag_breaking_news_section',
      'settings' => 'spidermag_breaking_news_title'
   ));