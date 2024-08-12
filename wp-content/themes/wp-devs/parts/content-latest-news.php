<article class="latest-news" style="background-color: #f7f7f7; border-radius: 6px;">
    <?php if( has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
    <?php endif; ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div>
        <div class="meta-info">
            <p>
                <?php esc_html_e( 'Postado em:', 'devs' ) ?>: <span><?php echo esc_html( get_the_date() ); ?></span>
                <?php esc_html_e( 'Por:', 'devs' ) ?> <span><?php the_author_posts_link(); ?></span> <br>
                <?php if( has_category()): ?>
                    <?php esc_html_e( 'Categoria:', 'devs' ) ?>: <span><?php the_category( ' ' ); ?></span>
                <?php endif; ?>
                <?php if( has_tag()): ?>
                    <?php esc_html_e( 'Tags', 'devs' ) ?>: <?php the_tags( '', ', ' ); ?>
                <?php endif; ?> <br>
            </p>
        </div>
        <div class="excerpt-news">
        <?php the_excerpt(); ?>
        </div>

</article>