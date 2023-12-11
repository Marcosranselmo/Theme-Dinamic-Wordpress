<article class="latest-news">
    <?php if( has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
    <?php endif; ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="meta-info">
    <p>
        <?php esc_html_e( 'Postado por:', 'devs' ) ?> <span><?php the_author_posts_link(); ?></span> <br>
        <?php if( has_category()): ?>
            <?php esc_html_e( 'Categories', 'devs' ) ?>: <span><?php the_category( ' ' ); ?></span>
        <?php endif; ?>
        <?php if( has_tag()): ?>
            <?php esc_html_e( 'Tags', 'devs' ) ?>: <?php the_tags( '', ', ' ); ?>
        <?php endif; ?> <br>
        <?php esc_html_e( 'Data', 'devs' ) ?>: <span><?php echo esc_html( get_the_date() ); ?></span>
    </p>
    </div>
    <?php the_excerpt(); ?>
</article>