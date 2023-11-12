<?php
/**
 * Load spidermag pro woocommerce Action and Filter.
*/
function spidermag_woocommerce_breadcrumb(){
  do_action( 'breadcrumb-woocommerce' );
}
add_action( 'woocommerce_before_main_content','spidermag_woocommerce_breadcrumb', 9 );

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/**
 * WooCommerce add content primary div function
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
if (!function_exists('spidermag_woocommerce_output_content_wrapper')) {
    function spidermag_woocommerce_output_content_wrapper(){ ?>
    	<div class="container blogging-style">
	  		<div class="row">
	            <div class="col-md-11 col-sm-16 content-area">
            		<div class="row">
            			<div class="col-sm-16">
    <?php }
}
add_action( 'woocommerce_before_main_content', 'spidermag_woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
if (!function_exists('spidermag_woocommerce_output_content_wrapper_end')) {
    function spidermag_woocommerce_output_content_wrapper_end(){ ?>
              			</div>
              		</div>
            	</div>
            	<?php get_sidebar('woocommerce'); ?>
        	</div>
      	</div>
    <?php }
}
add_action( 'woocommerce_after_main_content', 'spidermag_woocommerce_output_content_wrapper_end', 10 );
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * Woo Commerce Number of row filter Function
*/
add_filter('loop_shop_columns', 'spidermag_loop_columns');
if (!function_exists('spidermag_loop_columns')) {
    function spidermag_loop_columns() {
        return 3;
    }
}

add_action( 'body_class', 'spidermag_woo_body_class');
if (!function_exists('spidermag_woo_body_class')) {
    function spidermag_woo_body_class( $class ) {
           $class[] = 'columns-'.spidermag_loop_columns();
           return $class;
    }
}

/**
 * WooCommerce display related product.
*/
if (!function_exists('spidermag_related_products_args')) {
  function spidermag_related_products_args( $args ) {
      $args['posts_per_page']   = 6;
      $args['columns']          = 3;
      return $args;
  }
}
add_filter( 'woocommerce_output_related_products_args', 'spidermag_related_products_args' );

/**
 * WooCommerce display upsell product.
*/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
if ( ! function_exists( 'spidermag_woocommerce_upsell_display' ) ) {
  function spidermag_woocommerce_upsell_display() {
      woocommerce_upsell_display( 6, 3 ); 
  }
}
add_action( 'woocommerce_after_single_product_summary', 'spidermag_woocommerce_upsell_display', 15 );
