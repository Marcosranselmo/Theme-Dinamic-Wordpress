<?php
/**
 * Spider Mag functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spider_Mag
 */

if ( ! function_exists( 'spidermag_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
**/
function spidermag_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Spider Mag, use a find and replace
	 * to change 'spidermag' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'spidermag', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

    /*
     * Enable support for custom logo.
    */
    add_theme_support( 'custom-logo', array(
        'width'       => 190,
        'height'      => 60,
        'flex-width'  => true,              
        'flex-height' => true,
        'header-text' => array( '.site-title', '.site-description' ),
    ) );

    /*
     * This theme styles the visual editor to resemble the theme style.
    */
    add_editor_style( array( 'assets/css/editor-style.css', spidermag_fonts_url() ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size('spidermag-carousel-slider', 300, 182, true);
    add_image_size('spidermag-block-post', 385, 237, true);
    add_image_size('spidermag-banner-latest', 277, 212, true);
    add_image_size('spidermag-horizontal-banner', 236, 498, true);
	add_image_size('spidermag-main-banner', 565, 342, true);
    add_image_size('spidermag-fullwidth-slider-thumb', 280, 125, true ); // Banner Slider Image Size
    add_image_size('spidermag-banner-slider-thumb', 233, 142, true ); // Banner Slider Thumbnial Image Size
    add_image_size('spidermag-banner-full-width-slider-thumb', 1150, 389, true ); // Banner Slider Thumbnial Image Size
    add_image_size('spidermag-featured-image', 1170, 500, true); // Single Page Featured Image
    add_image_size('spidermag-screenwidthpost-image', 1367, 500, true); // Single Page Featured Image

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(		
        'top' => esc_html__( 'Top Menu', 'spidermag' ),
        'footer' => esc_html__( 'Footer Menu', 'spidermag' ),
        'primary' => esc_html__( 'Primary Menu', 'spidermag' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
        'gallery',
		'video',
        'audio',
		'quote',
		'link',
	) );
	
	// Set up the WordPress core woocommerce 
	add_theme_support( 'woocommerce' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'spidermag_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );

}
endif; // spidermag_setup
add_action( 'after_setup_theme', 'spidermag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'spidermag_content_width' ) ) :
    function spidermag_content_width() {
    	$GLOBALS['content_width'] = apply_filters( 'spidermag_content_width', 640 );
    }
    add_action( 'after_setup_theme', 'spidermag_content_width', 0 );
endif;

/**
 * Enqueue scripts and styles.
*/
if ( ! function_exists( 'spidermag_template_scripts' ) ) :
    function spidermag_template_scripts() {
        
        $spidermag_theme = wp_get_theme();
        $spider_mag_theme = $spidermag_theme->get( 'Version' );

        /* Spidermag Google Font */
        wp_enqueue_style( 'spidermag-fonts', spidermag_fonts_url(), array(), $spider_mag_theme );

        /* Spidermag BootStrap */
        wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/library/bootstrap/css/bootstrap.min.css' );
        
        /* Spidermag Font Awesome */
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css' );

        /* Spidermag Simple Line Icons */
        wp_enqueue_style( 'ionicons', get_template_directory_uri().'/assets/library/ionicons/css/ionicons.min.css' );

        /* Spidermag Lightslider CSS */
        wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.min.css' );
        
        /* Spidermag Owl Carousel CSS*/
        //wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/library/owlcarousel/css/owl.carousel.css' );

        //wp_enqueue_style( 'owl-transitions', get_template_directory_uri().'/assets/library/owlcarousel/css/owl.transitions.css' );

        /* Spidermag Animation */
        wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/library/animate/css/animate.min.css' );

        /* Spidermag Main Style */
        wp_enqueue_style( 'spidermag-style', get_stylesheet_uri() );

        wp_enqueue_style( 'spidermag-responsive', get_template_directory_uri().'/assets/css/responsive.css' );

        if ( has_header_image() ) {
            $custom_css = '.sticky-header{ background-image: url("' . esc_url( get_header_image() ) . '"); background-repeat: no-repeat; background-position: center center; background-size: cover; }';
            wp_add_inline_style( 'spidermag-style', $custom_css );
        }

        /* Spidermag Magnific Popup */
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/library/magnific-popup/css/magnific-popup.css' );

       
        /*********************************
         * Enqueue Java Script Library
        ************************************/

        /* Spidermag html5 */
        wp_enqueue_script('html5', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), esc_attr( $spider_mag_theme ), false);
        wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

        /* Spidermag Respond */
        wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), esc_attr( $spider_mag_theme ), false);
        wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

        /* Spidermag BootStrap */
        wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/library/bootstrap/js/bootstrap.js', array('jquery'), esc_attr( $spider_mag_theme ), true );

        /* Spidermag Lightslider */
        wp_enqueue_script('lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array('jquery'), esc_attr( $spider_mag_theme ), true);
        
        /* Spidermag Owl Carousel js*/
        //wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/library/owlcarousel/js/owl.carousel.min.js', esc_attr( $spider_mag_theme ), true );

        /* Spidermag wow */
        wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/library/animate/js/wow.min.js', esc_attr( $spider_mag_theme ), true );

        /* Spidermag Magnific Popup */
        wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri().'/assets/library/magnific-popup/js/jquery.magnific-popup.min.js', esc_attr( $spider_mag_theme ), true );

        /* Spidermag Enquire */
        wp_enqueue_script( 'enquire', get_template_directory_uri().'/assets/library/enquire/js/enquire.min.js', esc_attr( $spider_mag_theme ), true );

        /* Spidermag Scroll ticker */
        wp_enqueue_script( 'jquery-ticker', get_template_directory_uri().'/assets/library/newsticker/js/jquery.ticker.js', array('jquery'), esc_attr( $spider_mag_theme ), true );

        /* Spidermag Date & Time */
         wp_enqueue_script( 'moment', get_template_directory_uri() . '/assets/js/moment.js', array('masonry'), esc_attr( $spider_mag_theme ), true );

        /* Spidermag Custom Scripts */
        wp_enqueue_script( 'spidermag-custom', get_template_directory_uri() . '/assets/js/custom.js', array('masonry'), esc_attr( $spider_mag_theme ), true );
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
add_action( 'wp_enqueue_scripts', 'spidermag_template_scripts' );
endif;


/**********************************************************************************
 * Register widget area.
 **********************************************************************************
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'spidermag_widgets_init' ) ) {
   
    function spidermag_widgets_init() {
        
        register_sidebar( array(
            'name'          => esc_html__( 'Right Sidebar Widget', 'spidermag' ),
            'id'            => 'sidebar-1',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="main-title-outer-wrap clearfix widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<div class="main-title-outer"><div class="widget-title main-title">',
            'after_title'   => '</div></div>',
        ));
        
        register_sidebar( array(
            'name'          => esc_html__( 'Left Sidebar Widget', 'spidermag' ),
            'id'            => 'sidebar-right',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="main-title-outer-wrap clearfix widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<div class="main-title-outer"><div class="widget-title main-title">',
            'after_title'   => '</div></div>',
        ));

        if ( is_customize_preview() ) {
            $spidermag_home_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'spidermag' ), '<br />','<b><a class="sparkle-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
        }
        else{
            $spidermag_home_description = esc_html__( 'Displays widgets on Front/Home page. Note : First Create Page and Select "Page Attributes Template"( SpiderMag - FrontPage ) then Please go to Setting => Reading, Select "A static page" then "Front page" and add widgets to show on Home Page', 'spidermag' );
        }      
        
        register_sidebar(array(
            'name' => esc_html__('HomePage : Full Banner Section', 'spidermag'),
            'id' => 'spider_home_page_banner',
            'description' => $spidermag_home_description,
            'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => esc_html__('HomePage: Main Block Section', 'spidermag'),
            'id' => 'spidermag_home_page_block_section',
            'description' => $spidermag_home_description,
            'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => esc_html__('HomePage : FullWidth Second Block', 'spidermag'),
            'id' => 'spidermag_home_page_sec_block_section',
            'description' => $spidermag_home_description,
            'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        ));

        register_sidebar(array(
            'name' => esc_html__('HomePage : Header Ads Section', 'spidermag'),
            'id' => 'spider_header_ads',
            'description' => esc_html__('Show the ads in top header section Ads Stander Size 468x60', 'spidermag'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        ));
    

        $number_footer_widget = 4;
        for($i=1; $i<=$number_footer_widget; $i++){
            if( $i == 1 ){ 
                $name = esc_html__('One','spidermag'); 
            } elseif ($i==2) { 
                $name = esc_html__('Two','spidermag'); 
            } elseif ($i==3) { 
                $name = esc_html__('Three','spidermag'); 
            }else { 
                $name = esc_html__('Four','spidermag'); 
            }
            register_sidebar( array(
                'name' => 'Footer Widget Area '.$name.'',
                'id' => 'footer-'.$i.'',
                'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</aside>',
                'before_title' => '<div class="main-title-outer"><div class="widget-title f-title">',
                'after_title' => '</div></div>'
            ) );
        }    
    }
}
add_action( 'widgets_init', 'spidermag_widgets_init' );


/**
 * Call Google Fonts
*/
if ( ! function_exists( 'spidermag_fonts_url' ) ) :
    /**
     * Register default Google fonts
     */
    function spidermag_fonts_url() {
        $fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $Ubuntu = _x( 'on', 'Ubuntu font: on or off', 'spidermag' );

        /* Translators: If there are characters in your language that are not
        * supported by Raleway, translate this to 'off'. Do not translate
        * into your own language.
        */
        $OpenSans = _x( 'on', 'Open Sans font: on or off', 'spidermag' );

        $PlayfairDisplay = _x( 'on', 'Playfair Display font: on or off', 'spidermag' );
        $Roboto = _x( 'on', 'Roboto Display font: on or off', 'spidermag' );

        if ( 'off' !== $Ubuntu || 'off' !== $OpenSans || 'off' !== $PlayfairDisplay ) {
            $font_families = array();

            if ( 'off' !== $Ubuntu ) {
                $font_families[] = 'Ubuntu:300,300i,400,400i,500,500i,700,700i';
            }

            if ( 'off' !== $OpenSans ) {
                $font_families[] = 'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
            }

            if ( 'off' !== $PlayfairDisplay ) {
                $font_families[] = 'Playfair+Display:400,400i,700,700i,900,900i';
            }
            if ( 'off' !== $Roboto ) {
                $font_families[] = 'Roboto:100, 300,400,400i,700,700i,900,900i';
            }

            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }
endif;


/**
 * theme init all things
*/ 
require get_template_directory() . '/spidermag/init.php';
require get_template_directory() . '/dynamic-style.php';


if ( isset( $wp_customize->selective_refresh ) ) {
    
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title',
        'container_inclusive' => false,
        'render_callback' => 'spidermag_customize_partial_blogname',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'container_inclusive' => false,
        'render_callback' => 'spidermag_customize_partial_blogdescription',
    ) );

    $wp_customize->selective_refresh->add_partial( 'spidermag_social_link_activate', array(
        'selector' => '.f-social',
        'container_inclusive' => false,
    ) );
}

function spidermag_customize_partial_blogname() {
    bloginfo( 'name' );
}
function spidermag_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Filter the excerpt length to 50 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function spidermag_excerpt_length( $length ) {
    if ( is_admin() ) {
            return $length;
    }
    return 12;
}
add_filter( 'excerpt_length', 'spidermag_excerpt_length', 999 );

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * compaible for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/** remove widgets block editor */
function spidermag_widget_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'spidermag_widget_theme_support' );