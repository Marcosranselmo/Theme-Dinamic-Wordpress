<?php
if( !function_exists('spidermag_file_directory') ){

    function spidermag_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Implement the Custom Header feature.
*/
require spidermag_file_directory('/spidermag/core/custom-header.php');

/**
 ** Custom template tags for this theme.
*/
require spidermag_file_directory('/spidermag/core/template-tags.php');

/**
 ** Custom functions that act independently of the theme templates.
*/
require spidermag_file_directory( '/spidermag/core/extras.php' );

/**
 ** Customizer additions.
*/
require spidermag_file_directory( '/spidermag/customizer/customizer.php' );

/**
 ** Load Jetpack compatibility file.
*/
require spidermag_file_directory( '/spidermag/core/jetpack.php' );

/**
 ** Load spidermag widget section.
*/
require spidermag_file_directory( '/spidermag/customwidget/spidermag-widget.php' );

/**
 * Themes custome functions
*/
require spidermag_file_directory( '/spidermag/functions.php' );

/**
 * Load Header hooks file
*/
require spidermag_file_directory( '/spidermag/hooks/header.php' );

/**
 * Load Footer hooks file
*/
require spidermag_file_directory( '/spidermag/hooks/footer.php' );

/**
 * Load External Plugins Recommend Activation file
*/
require spidermag_file_directory( '/spidermag/hooks/woocommerce.php' );

/**
 * Welcome
 */
require spidermag_file_directory( '/spidermag/welcome/welcome.php' );
/**
 * Load in customizer upgrade to pro
*/
require spidermag_file_directory('spidermag/customizer/customizer-pro/class-customize.php');

/** mobile menu */
require spidermag_file_directory('spidermag/mobile-menu/init.php');