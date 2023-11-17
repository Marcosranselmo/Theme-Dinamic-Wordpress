<?php

function wpdevs_customizer( $wp_customize ) {
    // 1 Copyright Section
    $wp_customize->add_section(
        'sec_copyright',
        array (
            'title' => __( 'Copyright Settings', 'devs' ),
            'description' => __( 'Copyright Settings', 'devs' ), 
        )
    );

    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            'default' => __( 'Copyright X - All Rights Rserved', 'devs' ),
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_copyright',
        array(
            'label' => __( 'Copyright Information', 'devs' ),
            'description' => __( 'Please, type your copyright here', 'devs' ),
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );

    // 2 Hero
    $wp_customize->add_section(
        'sec_hero',
        array(
            'title' => __( 'Hero Section', 'devs' )
        )
    );

            // Title
            $wp_customize->add_setting(
                'set_hero_title',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Please, add some title', 'devs' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_title',
                array(
                    'label' => __( 'Hero Title', 'devs' ),
                    'description' => __( 'Please, type your here title here', 'devs' ),
                    'section' => 'sec_hero',
                    'type' => 'text'
                )
            );  
            
            // Subtitle
            $wp_customize->add_setting(
                'set_hero_subtitle',
                array(
                    'type' => 'theme_mod',
                    'default' => __( 'Please, add some subtitle', 'devs' ),
                    'sanitize_callback' => 'sanitize_textarea_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_subtitle',
                array(
                    'label' => __( 'Hero Subtitle', 'devs' ), 
                    'description' => __( 'Please, type your subtitle here', 'devs' ),
                    'section' => 'sec_hero',
                    'type' => 'textarea'
                )
            );

            // Button Text
            $wp_customize->add_setting(
                'set_hero_button_text',
                array(
                    'type' => __( 'theme_mod', 'devs' ),
                    'default' => __( 'Learn More', 'devs' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );

            $wp_customize->add_control(
                'set_hero_button_text',
                array(
                    'label' => __( 'Hero button test', 'devs' ),
                    'description' => __( 'Please, type your button text here', 'devs' ),
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
                    'label' => __( 'Hero button link', 'devs' ),
                    'description' => __( 'Please, type your button link here', 'devs' ),
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
                    'label' => __( 'Hero height', 'devs' ),
                    'description' => __( 'Please, type your here height', 'devs' ),
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
                'label' => __( 'Hero Image', 'devs' ),
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
                'label' => __( 'Posts per page', 'devs' ),
                'description' => __( 'How many items to display in the post list?', 'devs' ),			
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
                'label' => __( 'Post categories to include', 'devs' ),
                'description' => __( 'Comma separated values or single category ID', 'devs' ),
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
                'label' => __( 'Post categories to exclude', 'devs' ),
                'description' => __( 'Comma separated values or single category ID', 'devs' ),			
                'section' => 'sec_blog',
                'type' => 'text'
        ) ); 
}
add_action( 'customize_register', 'wpdevs_customizer' );