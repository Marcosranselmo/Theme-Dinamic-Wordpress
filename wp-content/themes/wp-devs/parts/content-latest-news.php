<article class="latest-news">
    <?php if( has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
    <?php endif; ?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="meta-info">
    <p>
        <?php _e( 'by', 'devs' ) ?> <span><?php the_author_posts_link(); ?></span> 
        <?php if( has_category()): ?>
            <?php _e( 'Categories', 'devs' ) ?>: <span><?php the_category( ' ' ); ?></span>
        <?php endif; ?>
        <?php if( has_tag()): ?>
            <?php _e( 'Tags', 'devs' ) ?>: <?php the_tags( '', ', ' ); ?>
        <?php endif; ?>
    </p>
    <p><span><?php echo get_the_date(); ?></p>
    </div>
    <?php the_excerpt(); ?>
</article>