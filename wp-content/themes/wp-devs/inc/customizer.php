<?php

function wpdevs_customizer( $wp_customize ) {
    // 1 Copyright Section
    $wp_customize->add_section(
        'sec_copyright',
        array (
            'title' => 'Copyright Settings',
            'description' => 'Copyright Settings'
        )
    );

    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            'default' =>   'Copyright X - All Rights Rserved',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_copyright',
        array(
            'label' => 'Copyright Information',
            'description' => 'Please, type your copyright here',
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );

    // 2 Hero
    $wp_customize->add_section(
        'sec_hero',
        array(
            'title' => 'Hero Section'
        )
    );

            // Title
            $wp_customize->add_setting(
                'set_hero_title',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Please, add some title',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_title',
                array(
                    'label' => 'Hero Title',
                    'description' => 'Please, type your here title here',
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );  
            
            // Subtitle
            $wp_customize->add_setting(
                'set_hero_subtitle',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Please, add some subtitle',
                    'sanitize_callback' => 'sanitize_textarea_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_subtitle',
                array(
                    'label' => 'Hero Subtitle',
                    'description' => 'Please, type your subtitle here',
                    'section' => 'sec_hero',
                    'type' => 'textarea'
                )
            );

            // Button Text
            $wp_customize->add_setting(
                'set_hero_button_text',
                array(
                    'type' => 'theme_mod',
                    'default' => 'Learn More',
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text',
                array(
                    'label' => 'Hero button test',
                    'description' => 'Please, type your button text here',
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );

            // Button Link
            $wp_customize->add_setting(
                'set_hero_button_link',
                array(
                    'type' => 'theme_mod',
                    'default' => '#',
                    'sanitize_callback' => 'esc_url_raw'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_link',
                array(
                    'label' => 'Hero button link',
                    'description' => 'Please, type your button link here',
                    'section' => 'sec_hero',
                    'type' => 'url'
                )
            );

            // Hero Height
            $wp_customize->add_setting(
                'set_hero_height',
                array(
                    'type' => 'theme_mod',
                    'default' => '400',
                    'sanitize_callback' => 'absint'
                )
            );

            $wp_customize->add_control(
                'set_hero_height',
                array(
                    'label' => 'Hero height',
                    'description' => 'Please, type your here height',
                    'section' => 'sec_hero',
                    'type' => 'number'
                )
            );

            // Hero Background
            $wp_customize->add_setting(
            'set_hero_background',
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,
            'set_hero_background',
            array(
                'label' => 'Hero Image',
                'section' => 'sec_hero',
                'mine_type' => 'image'
            )));

            // 3. Blog
$wp_customize->add_section( 
    'sec_blog', 
    array(
        'title' => 'Blog Section'
) );

        // Posts per page
        $wp_customize->add_setting( 
            'set_per_page', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'absint'
        ) );

        $wp_customize->add_control( 
            'set_per_page', 
            array(
                'label' => 'Posts per page',
                'description' => 'How many items to display in the post list?',			
                'section' => 'sec_blog',
                'type' => 'number'
        ) );

        // Post categories to include
        $wp_customize->add_setting( 
            'set_category_include', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_include', 
            array(
                'label' => 'Post categories to include',
                'description' => 'Comma separated values or single category ID',
                'section' => 'sec_blog',
                'type' => 'text'
        ) );	

        // Post categories to exclude
        $wp_customize->add_setting( 
            'set_category_exclude', 
            array(
                'type' => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 
            'set_category_exclude', 
            array(
                'label' => 'Post categories to exclude',
                'description' => 'Comma separated values or single category ID',			
                'section' => 'sec_blog',
                'type' => 'text'
        ) ); 
}
add_action( 'customize_register', 'wpdevs_customizer' );