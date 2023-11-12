<?php
// Start of the Social Link Options
   $wp_customize->add_section('spidermag_social_link_activate_settings', array(
		'priority' => 112,
		'title' => esc_html__('Social Media Options', 'spidermag'),
	));	

	$spidermag_social_links = array(
		'spidermag_social_facebook' => array(
			'id' => 'spidermag_social_facebook',
			'title' => esc_html__('Facebook', 'spidermag'),
			'default' => ''
		),
		'spidermag_social_twitter' => array(
			'id' => 'spidermag_social_twitter',
			'title' => esc_html__('Twitter', 'spidermag'),
			'default' => ''
		),
		'spidermag_social_googleplus' => array(
			'id' => 'spidermag_social_googleplus',
			'title' => esc_html__('Google-Plus', 'spidermag'),
			'default' => ''
		),
		'spidermag_social_instagram' => array(
			'id' => 'spidermag_social_instagram',
			'title' => esc_html__('Instagram', 'spidermag'),
			'default' => ''
		),
		'spidermag_social_pinterest' => array(
			'id' => 'spidermag_social_pinterest',
			'title' => esc_html__('Pinterest', 'spidermag'),
			'default' => ''
		),
		'spidermag_social_youtube' => array(
			'id' => 'spidermag_social_youtube',
			'title' => esc_html__('YouTube', 'spidermag'),
			'default' => ''
		),
	);

	$i = 20;

	foreach($spidermag_social_links as $spidermag_social_link) {

		$wp_customize->add_setting($spidermag_social_link['id'], array(
			'default' => $spidermag_social_link['default'],
         'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'  // done
		));

		$wp_customize->add_control($spidermag_social_link['id'], array(
			'label' => $spidermag_social_link['title'],
			'section'=> 'spidermag_social_link_activate_settings',
			'settings'=> $spidermag_social_link['id'],
			'priority' => $i
		));

		$wp_customize->add_setting($spidermag_social_link['id'].'_checkbox', array(
			'default' => 0,
         'capability' => 'edit_theme_options',
			'sanitize_callback' => 'spidermag_checkbox_sanitize'  // done
		));

		$wp_customize->add_control($spidermag_social_link['id'].'_checkbox', array(
			'type' => 'checkbox',
			'label' => esc_html__('Open New Tab', 'spidermag'),
			'section'=> 'spidermag_social_link_activate_settings',
			'settings'=> $spidermag_social_link['id'].'_checkbox',
			'priority' => $i
		));

		$i++;

	}
   // End of the Social Link Options