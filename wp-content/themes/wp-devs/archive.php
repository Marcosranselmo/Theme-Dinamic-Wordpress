<?php get_header(); ?>

<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
width="<?php echo get_custom_header()->width; ?>" alt="" />

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                    <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                    <div class="container">
                        <div class="archive-items">
                            <?php 
                                if( have_posts() ):
                                    while( have_posts() ) : the_post();
                                    get_template_part( 'parts/content' );
                                    endwhile;
                                    ?>
                                        <div class="wpdevs-pagination">
                                            <div class="pages new">
                                                <?php previous_posts_link( __( "<< Newer posts" , 'wp-devs' ) ); ?>
                                            </div>
                                            <div class="pages old">
                                                <?php next_posts_link( __( "<< Older posts >>", 'wp-devs' ) ); ?>
                                            </div>
                                        </div>
                                    <?php
                                else: ?>
                                    <p><?php _e( 'Nothing yet to be displayed!', 'wp-devs' ) ?></p>
                            <?php endif; ?>                                
                        </div>
                        <?php get_sidebar(); ?>
                    </div>
                </main>
            </div>
        </div>
<?php get_footer(); ?>