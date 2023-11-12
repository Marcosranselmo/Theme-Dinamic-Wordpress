<?php
// Start of the Design Options
$wp_customize->add_panel('spidermag_design_options', array(
   'capabitity' => 'edit_theme_options',
   'description' => esc_html__('Change the Design Settings from here as you want', 'spidermag'),
   'priority' => 101,
   'title' => esc_html__('Design Layout Settings', 'spidermag')
));
    

	$imagepath =  get_template_directory_uri() . '/assets/images/';

	// Layout for pages only
	$wp_customize->add_section('spidermag_layout_page_setting', array(
		'priority' => 4,
		'title' => esc_html__('Layout for Pages Only', 'spidermag'),
		'panel'=> 'spidermag_design_options'
	));

   	$wp_customize->add_setting('spidermag_page_layout', array(
   		'default' => 'rightsidebar',
         'capability' => 'edit_theme_options',
   		'sanitize_callback' => 'spidermag_layout_sanitize'  //done
   	));

   	$wp_customize->add_control(new Spidermag_Image_Radio_Control($wp_customize, 'spidermag_page_layout', array(
   		'type' => 'radio',
   		'label' => esc_html__('Select layout for Pages. This layout will be reflected in all pages unless unique layout is set for specific page', 'spidermag'),
   		'section' => 'spidermag_layout_page_setting',
   		'settings' => 'spidermag_page_layout',
   		'choices' => array( 
                 'leftsidebar' => $imagepath . 'left-sidebar.png',  
                 'rightsidebar' => $imagepath . 'right-sidebar.png', 
                 'bothsidebar' => $imagepath . 'both-sidebar.png',
                 'nosidebar' => $imagepath . 'no-sidebar.png',
               )
   	   )));


   // Archive or Category page Layout only
   $wp_customize->add_section('spidermag_archive_page_layout_setting', array(
      'priority' => 5,
      'title' => esc_html__('Layout for Archive Page Only', 'spidermag'),
      'panel'=> 'spidermag_design_options'
   ));

      $wp_customize->add_setting('spidermag_archive_page_layout', array(
         'default' => 'rightsidebar',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_layout_sanitize'  //done
      ));

      $wp_customize->add_control(new Spidermag_Image_Radio_Control( $wp_customize, 'spidermag_archive_page_layout', array(
         'type' => 'radio',
         'label' => esc_html__('Select Category Page Layout', 'spidermag'),
         'section' => 'spidermag_archive_page_layout_setting',
         'settings' => 'spidermag_archive_page_layout',
         'choices' => array( 
                 'leftsidebar' => $imagepath . 'left-sidebar.png',  
                 'rightsidebar' => $imagepath . 'right-sidebar.png', 
                 'bothsidebar' => $imagepath . 'both-sidebar.png',
                 'nosidebar' => $imagepath . 'no-sidebar.png',
            )
      )));

      $wp_customize->add_setting('spidermag_archive_page_layout_type', array(
         'default' => 'masonry',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_layout_archive_sanitize'  // done
      ));

      $wp_customize->add_control('spidermag_archive_page_layout_type', array(
         'type' => 'radio',
         'label' => esc_html__('Archive Page Posts Display Style', 'spidermag'),
         'section' => 'spidermag_archive_page_layout_setting',
         'settings' => 'spidermag_archive_page_layout_type',
         'choices' => array(
            'normal' => esc_html__('Normal View','spidermag'),
            'masonry' => esc_html__('Masonry View','spidermag'),
         )
      ));

      $wp_customize->add_setting('spidermag_archive_post_date', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_archive_post_date', array(
         'type' => 'radio',
         'label' => esc_html__('Archive Page Post Date', 'spidermag'),
         'section' => 'spidermag_archive_page_layout_setting',
         'settings' => 'spidermag_archive_post_date',
         'description' => esc_html__('Enable or disable the post date','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

      $wp_customize->add_setting('spidermag_archive_comment_count', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_archive_comment_count', array(
         'type' => 'radio',
         'label' => esc_html__('Archive Page Comment Count', 'spidermag'),
         'section' => 'spidermag_archive_page_layout_setting',
         'settings' => 'spidermag_archive_comment_count',
         'description' => esc_html__('Enable or disable comment number','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

      $wp_customize->add_setting('spidermag_archive_author', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_archive_author', array(
         'type' => 'radio',
         'label' => esc_html__('Archive page Author', 'spidermag'),
         'section' => 'spidermag_archive_page_layout_setting',
         'settings' => 'spidermag_archive_author',
         'description' => esc_html__('Enable or disable comment number','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

	// Layout for single posts
	$wp_customize->add_section('spidermag_single_posts_layout_setting', array(
		'priority' => 6,
		'title' => esc_html__('Layout for Single Posts Only', 'spidermag'),
		'panel'=> 'spidermag_design_options'
	));

   	$wp_customize->add_setting('spidermag_single_posts_layout', array(
   		'default' => 'rightsidebar',
         'capability' => 'edit_theme_options',
   		'sanitize_callback' => 'spidermag_layout_sanitize'  //done
   	));

   	$wp_customize->add_control(new Spidermag_Image_Radio_Control($wp_customize, 'spidermag_single_posts_layout', array(
   		'type' => 'radio',
   		'label' => esc_html__('Select Layout for Single Posts', 'spidermag'),
   		'section' => 'spidermag_single_posts_layout_setting',
   		'settings' => 'spidermag_single_posts_layout',
   		'choices' => array( 
                 'leftsidebar' => $imagepath . 'left-sidebar.png',  
                 'rightsidebar' => $imagepath . 'right-sidebar.png', 
                 'bothsidebar' => $imagepath . 'both-sidebar.png',
                 'nosidebar' => $imagepath . 'no-sidebar.png',
            )
   	)));

      $wp_customize->add_setting('spidermag_featured_image_popup', array(
         'default' => 0,
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_checkbox_sanitize' // done
      ));

      $wp_customize->add_control('spidermag_featured_image_popup', array(
         'type' => 'checkbox',
         'label' => esc_html__('Enable the featured image in lightbox', 'spidermag'),
         'section' => 'spidermag_single_posts_layout_setting',
         'settings' => 'spidermag_featured_image_popup'
      ));

      $wp_customize->add_setting('spidermag_single_post_date', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_single_post_date', array(
         'type' => 'radio',
         'label' => esc_html__('Single Page Post Date', 'spidermag'),
         'section' => 'spidermag_single_posts_layout_setting',
         'settings' => 'spidermag_single_post_date',
         'description' => esc_html__('Enable or disable the post date','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

      $wp_customize->add_setting('spidermag_single_comment_count', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_single_comment_count', array(
         'type' => 'radio',
         'label' => esc_html__('Single Page Comment Count', 'spidermag'),
         'section' => 'spidermag_single_posts_layout_setting',
         'settings' => 'spidermag_single_comment_count',
         'description' => esc_html__('Enable or disable comment number','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

      $wp_customize->add_setting('spidermag_single_author', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_single_author', array(
         'type' => 'radio',
         'label' => esc_html__('Single Page Author', 'spidermag'),
         'section' => 'spidermag_single_posts_layout_setting',
         'settings' => 'spidermag_single_author',
         'description' => esc_html__('Enable or disable comment number','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

      $wp_customize->add_setting('spidermag_single_tags', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_single_tags', array(
         'type' => 'radio',
         'label' => esc_html__('Single Page Tags', 'spidermag'),
         'section' => 'spidermag_single_posts_layout_setting',
         'settings' => 'spidermag_single_tags',
         'description' => esc_html__('Enable or disable comment number','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

      $wp_customize->add_setting('spidermag_single_category', array(
         'default' => 'yes',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_radio_sanitize'  //done
      ));

      $wp_customize->add_control('spidermag_single_category', array(
         'type' => 'radio',
         'label' => esc_html__('Single Page Category', 'spidermag'),
         'section' => 'spidermag_single_posts_layout_setting',
         'settings' => 'spidermag_single_category',
         'description' => esc_html__('Enable or disable category','spidermag'),
         'choices' => array(
            'yes' => esc_html__('Yes', 'spidermag'),
            'no' => esc_html__('No', 'spidermag')
         )
      ));

   // Layout for single posts
   $wp_customize->add_section('spidermag_search_page_layout_setting', array(
      'priority' => 6,
      'title' => esc_html__('Layout for Search Page Only', 'spidermag'),
      'panel'=> 'spidermag_design_options'
   ));

      $wp_customize->add_setting('spidermag_search_page_layout', array(
         'default' => 'rightsidebar',
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'spidermag_layout_sanitize'   //done
      ));

      $wp_customize->add_control(new Spidermag_Image_Radio_Control($wp_customize, 'spidermag_search_page_layout', array(
         'type' => 'radio',
         'label' => esc_html__('Select Layout for Search Page', 'spidermag'),
         'section' => 'spidermag_search_page_layout_setting',
         'settings' => 'spidermag_search_page_layout',
         'choices' => array( 
                 'leftsidebar' => $imagepath . 'left-sidebar.png',  
                 'rightsidebar' => $imagepath . 'right-sidebar.png', 
                 'bothsidebar' => $imagepath . 'both-sidebar.png',
                 'nosidebar' => $imagepath . 'no-sidebar.png',
            )
      )));