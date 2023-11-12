<?php
 $wp_customize->add_panel('spidermag_color_options', array(
    'priority' => 112,
    'title' => esc_html__('Themes Colors Options', 'spidermag'),
    'description'=> esc_html__('Change the Colors from here as you want', 'spidermag'),
    'capability' => 'edit_theme_options',
 ));

   $wp_customize->get_section('colors' )->panel = 'spidermag_color_options';

   
   // Category Color Options   
   $wp_customize->add_section('spidermag_category_color_setting', array(
      'priority' => 8,
      'title' => esc_html__('Category Color Settings', 'spidermag'),
      'panel' => 'spidermag_color_options'
   ));

   $i = 1;
   $args = array(
       'orderby' => 'id',
       'hide_empty' => 0
   );
   $categories = get_categories( $args );

   $wp_category_list = array();

   foreach ($categories as $category_list ) {

      $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;

      $wp_customize->add_setting('spidermag_category_color_'.get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
         'default' => '',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_color_option_hex_sanitize',
         'sanitize_js_callback' => 'spidermag_color_escaping_option_sanitize'  // done
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spidermag_category_color_'.get_cat_id( $wp_category_list[ $category_list->cat_ID ] ), array(
         'label' => sprintf( '%1$s', $wp_category_list[ $category_list->cat_ID ] ),
         'section' => 'spidermag_category_color_setting',
         'settings' => 'spidermag_category_color_'.get_cat_id( $wp_category_list[ $category_list->cat_ID ] ),
         'priority' => $i
      )));

      $i++;
   }