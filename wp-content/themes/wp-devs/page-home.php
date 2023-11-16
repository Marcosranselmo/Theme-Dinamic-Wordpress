<?php get_header(); ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="hero" style="background-image: url('http://localhost/wp-content/uploads/2023/11/hero1.jpg')">
                        <div class="overlay" style="min-height: 400px">
                            <div class="container">
                                <div class="hero-items">
                                    <h1>Lorem ipsun dolor</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum magnam doloremque nobis repellat officia, cum aspernatur tempore cumque eos quo laboriosam quasi quas voluptatibus porro assumenda temporibus consequatur? Officia, odit?
                                    </p>
                                    <a href="#">Learn More</a>
                                </div>
                            </div>
                        </div>    
                    </section>
                    <section class="services">
                        <h2>Services</h2>
                        <div class="container">
                            <div class="services-item">
                                <?php
                                    if( is_active_sidebar( 'services-1' ) ){
                                        dynamic_sidebar( 'services-1' );
                                    }
                                ?>
                            </div>
                            <div class="services-item">
                                <?php
                                    if( is_active_sidebar( 'services-2' ) ){
                                        dynamic_sidebar( 'services-2' );
                                    }
                                ?>
                            </div>
                            <div class="services-item">
                                <?php
                                    if( is_active_sidebar( 'services-3' ) ){
                                        dynamic_sidebar( 'services-3' );
                                    }
                                ?>
                            </div>
                        </div>
                    </section>
                    <section class="home-blog">
                        <h2>Latest News</h2>
                        <div class="container">
                            <?php 

                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 5,
                                'category__in' => array( 4, 5, 6 ),
                                'category__not_in' => array( 1 )
                            );        

                            $postlist = new WP_Query( $args );

                                if( $postlist->have_posts() ):
                                    while( $postlist->have_posts() ) : $postlist->the_post();
                                    get_template_part( 'parts/content', 'latest-news' );
                                    endwhile;
                                    wp_reset_postdata();
                                else: ?>
                                    <p>Nothing yet to be displayed!</p>
                            <?php endif; ?>                                
                        </div>
                    </section>
                </main>
            </div>
        </div>
<?php get_footer(); ?>