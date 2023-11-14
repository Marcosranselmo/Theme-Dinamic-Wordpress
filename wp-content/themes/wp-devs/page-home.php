<?php get_header(); ?>
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="hero">
                        Hero
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
                                    ?>
                                    <article class="lastet-news">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="meta-info">
                                            <p>
                                                by <span><?php the_author_posts_link(); ?></span> 
                                                Categories: <span><?php the_category( ' ' ); ?></span>
                                                Tags: <?php the_tags( '', ', '); ?>
                                            </p>
                                            <p><span><?php echo get_the_date(); ?></span></p>
                                        </div>
                                        <?php the_excerpt(); ?>
                                    </article>
                                    <?php

                                    if( comments_open() || get_comments_number() ){
                                        comments_template();
                                    }

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