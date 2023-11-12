<?php
// Start of the Additional Options
   $wp_customize->add_panel('spidermag_additional_options', array(
   	'capability' => 'edit_theme_options',
   	'description'=> esc_html__('Change the Additional Settings from here as you want', 'spidermag'),
   	'priority' => 111,
   	'title' => esc_html__('Additional Options', 'spidermag')
	));

   // Author Options
   $wp_customize->add_section('spidermag_author_posts_section', array(
      'priority' => 4,
      'title' => esc_html__('Author Options', 'spidermag'),
      'panel' => 'spidermag_additional_options'
   ));

   $wp_customize->add_setting('spidermag_post_author', array(
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize'  // done
   ));

   $wp_customize->add_control('spidermag_post_author', array(
      'type' => 'checkbox',
      'label' => esc_html__('Activate the Author posts', 'spidermag'),
      'section' => 'spidermag_author_posts_section',
      'settings' => 'spidermag_post_author'
   ));

   $wp_customize->add_setting('spidermag_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_related_posts_sanitize'  // done
   ));

   $wp_customize->add_control('spidermag_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Must Be Shown As:', 'spidermag'),
      'section' => 'spidermag_related_posts_section',
      'settings' => 'spidermag_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'spidermag'),
         'tags' => esc_html__('Related Posts By Tags', 'spidermag')
      )
   ));
	
   // related posts
   $wp_customize->add_section('spidermag_related_posts_section', array(
      'priority' => 4,
      'title' => esc_html__('Related Posts', 'spidermag'),
      'panel' => 'spidermag_additional_options'
   ));

   $wp_customize->add_setting('spidermag_related_posts_activate', array(
      'default' => 1,
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_checkbox_sanitize'  // done
   ));

   $wp_customize->add_control('spidermag_related_posts_activate', array(
      'type' => 'checkbox',
      'label' => esc_html__('Activate the related posts', 'spidermag'),
      'section' => 'spidermag_related_posts_section',
      'settings' => 'spidermag_related_posts_activate'
   ));

   $wp_customize->add_setting('spidermag_related_posts', array(
      'default' => 'categories',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'spidermag_related_posts_sanitize'  // done
   ));

   $wp_customize->add_control('spidermag_related_posts', array(
      'type' => 'radio',
      'label' => esc_html__('Related Posts Must Be Shown As:', 'spidermag'),
      'section' => 'spidermag_related_posts_section',
      'settings' => 'spidermag_related_posts',
      'choices' => array(
         'categories' => esc_html__('Related Posts By Categories', 'spidermag'),
         'tags' => esc_html__('Related Posts By Tags', 'spidermag')
      )
   ));
