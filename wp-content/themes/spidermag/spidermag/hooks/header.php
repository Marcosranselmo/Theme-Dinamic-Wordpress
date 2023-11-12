<?php
/**
 * Header Section Skip Area
*/

if ( ! function_exists( 'spidermag_skip_links' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_skip_links() { ?>
            <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'spidermag' ); ?></a>
        <?php
    }
}
add_action( 'spidermag_skip_links', 'spidermag_skip_links', 5 );


if ( ! function_exists( 'spidermag_header_before' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_header_before() {
        ?>
        <header id="masthead" class="site-header" role="banner">        
            <div class="header-container">
        <?php
    }
}
add_action( 'spidermag_header_before', 'spidermag_header_before', 10 );


if ( ! function_exists( 'spidermag_top_header' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_top_header() { 
        if(get_theme_mod('spidermag_top_header_section_enable', 'yes') == 'no') return;
        ?>
        <div class="header-toolbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-16 text-uppercase flex-center">                        
                        <div class="col-sm-10 col-xs-16">

                            <div class="topmain-nav" id="top-nav">                            
                                <?php
                                    $left_option = get_theme_mod('spidermag_left_side_header_setting', 'welcome');
                                    $right_option = get_theme_mod( 'spidermag_right_side_header_setting','date');

                                    if($left_option == 'welcome'):
                                        global $user_ID, $user_identity; wp_get_current_user(); 

                                        if (!$user_ID):

                                            if( esc_attr( get_theme_mod('spidermag_login_display',1 ) ) ): ?>

                                                <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in"><?php esc_html_e( 'login','spidermag' ); ?></a></li>
                                        
                                        <?php endif; 
                                            if( esc_attr( get_theme_mod('spidermag_create_account_display',1 ) ) ): ?>
                                                
                                                <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in"><?php esc_html_e( 'create account','spidermag' ); ?></a></li>
                                        
                                        <?php endif;
                                        else: echo '<li>'.esc_html__( 'Welcome','spidermag' ).', <span class="text-danger">'.esc_attr( $user_identity ).' !!!</span></li>';
                                            
                                        endif;
                                    elseif($left_option == 'topnav'):
                                        wp_nav_menu( array('theme_location' => 'top', 'container' => '' ) );
                                    else:
                                        echo "<div class='hot-news'>";
                                            $breaking = esc_attr( get_theme_mod( 'spidermag_breaking_news_title_options' ,'no' ) );
                                            if ($breaking == 'yes' ): ?>
                                                <span class="pull-left bre-latest"><?php echo esc_html(get_theme_mod("spidermag_breaking_news_title","Latest News")); ?> :</span>
                                            <?php else: ?>
                                                <span class="<?php echo esc_attr(get_theme_mod("spidermag_breaking_news_title","ion-ios7-timer")); ?> icon-news pull-left"></span>
                                            <?php endif;
                                            spidermag_render_spider_hot_news();
                                        echo "</div>";
                                    endif; 
                                ?>


                        
                            </div>
                        </div><!-- top header left section -->

                        <div class="col-sm-6 col-xs-16  <?php if($right_option == 'topnav'): echo 'topmain-nav'; endif; ?>">                           
                            <?php
                            if( $right_option == 'date' ){ ?>
                                
                                <div class="list-inline pull-right"> 
                                    <div id="time-date"></div>
                                </div>

                            <?php }elseif($right_option == 'social') { ?>

                                <div class="f-social pull-right">

                                    <?php do_action( 'spidermag-social', 10 );  ?>

                                </div>

                            <?php  } else{ wp_nav_menu( array('theme_location' => 'top', 'container' => '' ) ); } ?>
                        </div><!-- top header right section -->

                    </div>
                </div> <!-- .row -->
            </div><!-- .container -->
        </div><!-- Top header section end -->
        <?php
    }
}
add_action( 'spidermag_header', 'spidermag_top_header', 15 );

if ( ! function_exists( 'spidermag_main_header' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_main_header() { ?>
            <div class="sticky-header">
                <div class="container header">
                    <div class="row">
                        <div class="col-sm-8 col-md-6">
                            <div class="site-branding">
                                <div class="spidermag-logo">
                                    <?php 
                                        if ( function_exists( 'the_custom_logo' ) ) { 
                                            the_custom_logo();
                                        } 
                                    ?>
                                </div>
                                <div class="spidermag-logotitle">
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </h1>
                                    <?php 
                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) { ?>
                                            <p class="buzz-site-description site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!-- header main logo section -->

                        <div class="col-sm-8 col-md-10">
                            <?php 
                                if( is_active_sidebar( 'spider_header_ads' ) ){
                                    dynamic_sidebar( 'spider_header_ads' );
                                }
                            ?>
                        </div><!-- header ads section -->
                    </div> <!-- .row -->
                </div><!-- container --><!-- header end -->    

                <div class="<?php if ( esc_attr(get_theme_mod('spidermag_primary_sticky_menu', 1 ) ) == 1){ echo 'nav-search-outer'; } ?>">
                    <nav class="navbar navbar-inverse" role="navigation">
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle-target=".header-mobile-menu"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                                                <span class="sr-only"><?php esc_html_e('Toggle navigation','spidermag'); ?></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <?php if ( esc_attr( get_theme_mod( 'spidermag_search_icon_in_menu', 1 ) ) == 1 ){ ?>
                                        <a href="javascript:void(0)" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
                                    <?php } ?>

                                    <div class="collapse navbar-collapse" id="navbar-collapse">
                                        <ul class="nav navbar-nav text-uppercase main-nav ">
                                            <?php
                                                if(esc_attr(get_theme_mod('spidermag_home_icon_display', 1)) == 1) {
                                                    $home_icon_class = 'spider-home spider-home-active';
                                            ?>
                                                <li>
                                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                                       class="<?php echo esc_attr( $home_icon_class ); ?> ion-home">&nbsp;</a>
                                                </li>
                                            <?php
                                                }
                                            ?>                                                              
                                        </ul>
                                        <nav class="box-header-nav main-menu-wapper" aria-label="<?php esc_attr_e( 'Main Menu', 'spidermag' ); ?>" role="navigation">
                                            <?php
                                                wp_nav_menu( array(
                                                        'theme_location'  => 'primary',
                                                        'menu'            => 'primary-menu',
                                                        'container'       => false,
                                                        'container_class' => '',
                                                        'container_id'    => '',
                                                        'menu_class'      => 'main-menu second nav navbar-nav text-uppercase main-nav',
                                                        'fallback_cb' => 'spidermag_menu_default'
                                                    )
                                                );
                                            ?>
                                        </nav>
                                        
                                    </div> <!-- collapse navbar-collapse -->
                                </div><!-- col-sm-16 -->
                            </div><!-- row -->
                        </div><!-- container -->

                        <div class="search-container ">
                            <div class="container">
                                <form method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                                    <input type="search" name="s" id="search-bar" placeholder="<?php esc_attr_e( 'Type & Hit Enter..', 'spidermag' ); ?>" value="<?php echo esc_attr(get_search_query()) ?>" autocomplete="off">
                                </form>
                            </div>
                        </div><!-- search end -->
                    </nav><!--nav end-->
                </div><!-- nav and search end-->
            </div><!-- sticky header end -->
        <?php
    }
}
add_action( 'spidermag_header', 'spidermag_main_header', 20 );

if ( ! function_exists( 'spidermag_header_after' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_header_after() {
        ?>
            </div>
        </header><!-- #masthead -->
        <?php
    }
}
add_action( 'spidermag_header_after', 'spidermag_header_after', 25 );