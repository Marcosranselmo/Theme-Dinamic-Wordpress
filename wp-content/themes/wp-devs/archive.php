<?php get_header(); ?>

<img src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>"
width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="" />

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="archive-title-d"><?php the_archive_title(); ?></div>
                <div class="container">
                    <div class="archive-items">
                        <?php 
                            if( have_posts() ):
                                while( have_posts() ) : the_post();
                                get_template_part( 'parts/content' );
                                endwhile;
                                ?>
                                    <div class="wpdevs-pagination">
                                        <div class="Avançar">
                                            <?php previous_posts_link( esc_html__( "<< Voltar" , 'wp-devs' ) ); ?>
                                        </div>
                                        <div class="Voltar">
                                            <?php next_posts_link( esc_html__( "Avançar >>", 'wp-devs' ) ); ?>
                                        </div>
                                    </div>
                                <?php
                            else: ?>
                                <p><?php esc_html_e( 'Nada ainda a ser exibido!', 'wp-devs' ) ?></p>
                        <?php endif; ?>                                
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </main>
        </div>
    </div>
        
<?php get_footer(); ?>