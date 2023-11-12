<?php   
/**
 * Start of the Header Options
*/
$wp_customize->add_panel('spidermag_header_options', array(
  'capabitity' => 'edit_theme_options',
  'description' => esc_html__('Change the Header Settings from here as you want', 'spidermag'),
  'priority' => 5,
  'title' => esc_html__('Header Settings', 'spidermag')
));

/**
 * Default Customizer Remove Section 
*/
$wp_customize->get_section('background_image' )->priority = 113;

$wp_customize->get_section('title_tagline' )->panel = 'spidermag_header_options';
$wp_customize->get_section('title_tagline' )->priority = 0;

$wp_customize->get_section('colors' )->panel = 'spidermag_header_options';
$wp_customize->get_section('colors' )->priority = 1;
$wp_customize->get_section('header_image' )->panel = 'spidermag_header_options';


/**
 * Home 1 - Full Width Section
*/
$spidermag_home_section = $wp_customize->get_section( 'sidebar-widgets-spider_home_page_banner' );

if ( ! empty( $spidermag_home_section ) ) {
    $spidermag_home_section->panel = '';
    $spidermag_home_section->title = esc_html__( 'Home 1 - Full Width Section', 'spidermag' );
    $spidermag_home_section->priority = 80;
}

/**
 * Home 2 - 3/1 Main Block Section
*/
$spidermag_home2_section = $wp_customize->get_section( 'sidebar-widgets-spidermag_home_page_block_section' );

if ( ! empty( $spidermag_home2_section ) ) {
    $spidermag_home2_section->panel = '';
    $spidermag_home2_section->title = esc_html__( 'Home 2 - 3/1 Main Block Section', 'spidermag' );
    $spidermag_home2_section->priority = 80;
}

/**
 * Home 3 - Full Width Section
*/
$spidermag_home3_section = $wp_customize->get_section( 'sidebar-widgets-spidermag_home_page_sec_block_section' );

if ( ! empty( $spidermag_home3_section ) ) {
    $spidermag_home3_section->panel = '';
    $spidermag_home3_section->title = esc_html__( 'Home 3 - Full Width Section', 'spidermag' );
    $spidermag_home3_section->priority = 80;
}


/**
 * Top Header News
 */
require spidermag_file_directory('spidermag/customizer/header-section/header-top.php');
/**
 * header breaking news
**/ 
require spidermag_file_directory('spidermag/customizer/header-section/header-breaking.php');

/**
 * header show date and Weather
**/ 
require spidermag_file_directory('spidermag/customizer/header-section/header-utility.php');
