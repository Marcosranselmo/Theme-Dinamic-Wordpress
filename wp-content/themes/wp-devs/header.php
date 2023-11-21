<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div id="page" class="site"> 
        <header>
            <section class="top-bar">
                <div class="container">
                    <div class="logo">
                        <?php
                        if( has_custom_logo() ) {
                            the_custom_logo();
                        }else{
                            ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>
                                <?php bloginfo( 'name' ); ?></span></a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="searchbox">
                        <?php get_search_form(); ?>
                    </div>                    
                </div>
            </section>
            <?php if( ! is_page( 'landing-page' )): ?>
            <section class="menu-area">
                <div class="container">
                    <nav class="main-menu">
                        <button class="check-button">
                            <div class="menu-icon">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </button>
                        <?php wp_nav_menu( array( 'theme_location' => 'wp_devs_main_menu', 'depth' => 2 )); ?>
                    </nav>                    
                </div>
            </section>
            <?php endif; ?>
        </header>