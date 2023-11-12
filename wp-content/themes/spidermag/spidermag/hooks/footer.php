<?php
/**
 * @since spidermag
 *
 * @param null
 * @return null
 *
 */
if( !function_exists('spidermag_before_footer')) {
    function spidermag_before_footer(){
        echo '<footer>';
    }
}
add_action('spidermag_before_footer', 'spidermag_before_footer', 5);

if( !function_exists('spidermag_top_footer')) {
    function spidermag_top_footer() {
        if(is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')){
    ?>
        <div class="top-sec">
            <div class="container ">
                <div class="row match-height-container">                
                    <div class="col-sm-8 col-md-4  wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
                        <?php if( is_active_sidebar( 'footer-1' ) ): ?>
                            <div class="row">
                                <div class="col-sm-16">                        
                                   <?php dynamic_sidebar( 'footer-1' ); ?>
                                </div>
                            </div>
                       <?php endif; ?>
                    </div>
                    <div class="col-sm-8 col-md-4 wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
                        <?php if( is_active_sidebar( 'footer-2' ) ): ?>
                            <div class="row">
                                <div class="col-sm-16">                        
                                   <?php dynamic_sidebar( 'footer-2' ); ?>
                                </div>
                            </div>
                       <?php endif; ?>
                    </div>
                    <div class="col-sm-8 col-md-4 wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
                        <?php if( is_active_sidebar( 'footer-3' ) ): ?>
                            <div class="row">
                                <div class="col-sm-16">                        
                                   <?php dynamic_sidebar( 'footer-3' ); ?>
                                </div>
                            </div>
                       <?php endif; ?>
                    </div>                
                    <div class="col-sm-8 col-md-4 wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
                        <?php if( is_active_sidebar( 'footer-4' ) ): ?>
                            <div class="row">
                                <div class="col-sm-16">                        
                                   <?php dynamic_sidebar( 'footer-4' ); ?>
                                </div>
                            </div>
                       <?php endif; ?>
                    </div>
                </div><!-- row match-height-container -->
            </div><!-- container -->
        </div><!-- top-sec -->
   <?php }
    }
}
add_action('spidermag_top_footer', 'spidermag_top_footer', 10 );


if( !function_exists('spidermag_bottom_footer')) {
    function spidermag_bottom_footer() { ?>
        <div class="btm-sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-16">
                        <div class="row">
                            <div class="col-sm-8 col-xs-16 f-nav list-inline">
                                <?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => 1, 'items_wrap' => '<ul class="list-inline">%3$s</ul>') ); ?>
                            </div><!-- col-sm-10 col-xs-16 f-nav -->
                            <div class="col-sm-8 col-xs-16 copyrights text-right">
                                <?php spidermag_footer_copyright(); ?>
                            </div>
                        </div><!-- row -->
                    </div><!-- col-sm-16 -->
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- btm-sec -->
    <?php }
}
add_action('spidermag_bottom_footer', 'spidermag_bottom_footer', 15);


if( !function_exists('spidermag_after_footer')) {
    function spidermag_after_footer(){
        echo '</footer>';
    }
}
add_action('spidermag_after_footer', 'spidermag_after_footer', 20);


if( !function_exists('spidermag_preloader')){
    function spidermag_preloader(){
        $preloader = esc_attr( get_theme_mod( 'spidermag_preloader_options', 1 ) ); 
        if( $preloader != 1 ) { 
    ?>
          <div class="spidermag-preloader"></div>

      </div> <!-- wrapper end -->
    <?php }
    }
}
add_action('wp_head', 'spidermag_preloader', 25);