<?php
/**
 * Spider Mag Theme Customizer.
 *
 * @package Spider_Mag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function spidermag_customize_register($wp_customize) {
  
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/*sorting core and widget for ease of theme use*/
$wp_customize->get_section( 'static_front_page' )->priority = 2;

/**
 * Important Link
*/
$wp_customize->add_section( 'spidermag_implink_section', array(
  'title'       => esc_html__( 'Important Links', 'spidermag' ),
  'priority'      => 2
) );

    $wp_customize->add_setting( 'spidermag_imp_links', array(
      'sanitize_callback' => 'spidermag_text_sanitize'
    ));

    $wp_customize->add_control( new Spidermag_theme_Info_Text( $wp_customize,'spidermag_imp_links', array(
        'settings'    => 'spidermag_imp_links',
        'section'   => 'spidermag_implink_section',
        'description' => '<a class="pro-implink" href="http://docs.sparklewpthemes.com/spidermag/" target="_blank">'.esc_html__('Documentation', 'spidermag').'</a><a class="pro-implink" href="http://demo.sparklewpthemes.com/spidermag/demos/" target="_blank">'.esc_html__('Live Demo', 'spidermag').'</a><a class="pro-implink" href="http://sparklewpthemes.com/support/" target="_blank">'.esc_html__('Support Forum', 'spidermag').'</a><a class="pro-implink" href="https://www.facebook.com/sparklewpthemes/" target="_blank">'.esc_html__('Like Us in Facebook', 'spidermag').'</a>',
      )
    ));


    $wp_customize->add_setting( 'spidermag_rate_us', array(
      'sanitize_callback' => 'spidermag_text_sanitize'
    ));

    $wp_customize->add_control( new Spidermag_theme_Info_Text( $wp_customize, 'spidermag_rate_us', array(
          'settings'    => 'spidermag_rate_us',
          'section'   => 'spidermag_implink_section',
          'description' => sprintf(__( 'Please do rate our theme if you liked it %1$s', 'spidermag'), '<a class="pro-implink" href="https://wordpress.org/support/theme/spidermag/reviews/?filter=5" target="_blank">'.esc_html__('Rate/Review','spidermag').'</a>' ),
        )
    ));

    $wp_customize->add_setting( 'spidermag_setup_instruction', array(
          'sanitize_callback' => 'spidermag_text_sanitize'
        ));

        $wp_customize->add_control( new Spidermag_theme_Info_Text( $wp_customize, 'spidermag_setup_instruction', array(
            'settings'    => 'spidermag_setup_instruction',
            'section'   => 'spidermag_implink_section',
            'description' => __( '<span class="customize-text_editor_desc">
                <h2 class="customize-title">'.esc_html__('spidermag Pro Features','spidermag').'</h2>                
                <ul class="admin-pro-feature-list">   
                    <li><span>'.esc_html__('WordPress Live Customizer','spidermag').'</span></li>
                    <li><span>'.esc_html__('One Click Demo Import','spidermag').'</span></li>
                    <li><span>'.esc_html__('Unlimited theme colors ( Primary Colors)','spidermag').'</span></li>
                    <li><span>'.esc_html__('Smart header with 3 different layout','spidermag').'</span></li>
                    <li><span>'.esc_html__('Background configuration','spidermag').'</span></li>
                    <li><span>'.esc_html__('14+ Inbuilt custom widgets','spidermag').'</span></li>
                    <li><span>'.esc_html__('Highly configurable home page','spidermag').'</span></li>
                    <li><span>'.esc_html__('Custom CSS Section','spidermag').'</span></li>
                    <li><span>'.esc_html__('Responsive retina ready theme','spidermag').'</span></li>
                    <li><span>'.esc_html__('Fully SEO optimized (schema)','spidermag').'</span></li>
                    <li><span>'.esc_html__('Fast loading','spidermag').'</span></li>
                    <li><span>'.esc_html__('Advance Typography & Google Fonts','spidermag').'</span></li>
                    <li><span>'.esc_html__('Webpage Boxed/Full width Options','spidermag').'</span></li>
                    <li><span>'.esc_html__('Unique Post Format Options','spidermag').'</span></li>
                    <li><span>'.esc_html__('WooCommerce Compatible','spidermag').'</span></li>
                    <li><span>'.esc_html__('Contact Form 7 Plugin Compatible','spidermag').'</span></li>
                    <li><span>'.esc_html__('A perfect theme to start your magazine store of any kind !!!','spidermag').'</span></li>
                </ul>                    
                <a href="'.esc_url('https://www.sparklewpthemes.com/wordpress-themes/spidermagpro').'" class="button button-primary buynow" target="_blank">'.esc_html__('Buy Now','spidermag').'</a>
            </span>', 'spidermag'),
          )
        ));

 
  /**
   * Preloader section
  **/
  require spidermag_file_directory('spidermag/customizer/preloader.php');

  /**
   * header section
  **/
  require spidermag_file_directory('spidermag/customizer/header-section/header-pannel.php');

  /**
   * Design layouts
  **/
  require spidermag_file_directory('spidermag/customizer/design-section/design-layouts.php');
     
  /**
   * color options
  **/
  require spidermag_file_directory('spidermag/customizer/color-section/color-options.php');
      
  /**
   * social sections
  **/
  require spidermag_file_directory('spidermag/customizer/social-section/social-icons.php');

  /**
   * additional section
  **/
  require spidermag_file_directory('spidermag/customizer/additional-section/additional-options.php');

  /** 
   * sanitization works
  **/
  require spidermag_file_directory('spidermag/customizer/sanitize-functions.php');

}
add_action('customize_register', 'spidermag_customize_register');

/**
 * custome controller
**/
require spidermag_file_directory('spidermag/customizer/custome-controller.php');
 
/**
 * Enqueue scripts for customizer
*/
function spidermag_customizer_js() {
   wp_enqueue_script( 'spidermag_customizer_script', get_template_directory_uri() . '/assets/js/customizer.js', array("customize-preview"), true  );
}
add_action( 'customize_preview_init', 'spidermag_customizer_js' );

/**
 * Enqueue scripts and style for customizer
*/
function spidermag_customize_backend_scripts() {
  wp_enqueue_script( 'spidermag-sp-admin', get_template_directory_uri() . '/assets/js/sp-admin.js', array( 'jquery', 'customize-controls' ), '20160714', true );
}
add_action( 'customize_controls_enqueue_scripts', 'spidermag_customize_backend_scripts', 10 );
