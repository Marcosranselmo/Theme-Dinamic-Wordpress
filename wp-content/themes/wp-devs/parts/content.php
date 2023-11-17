<article>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(275, 275)); ?></a>
    <?php endif; ?>
    <div class="meta-info">
        <p><?php _e( 'Posted in', 'wp-devs' ) ?> <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
        <?php if (has_category()) : ?>
            <p><?php _e( 'Categories', 'wp-devs' ) ?>: <?php the_category(' '); ?></p>
        <?php endif; ?>
        <?php if (has_tag()) : ?>
            <p><?php _e( 'Targs', 'wp-devs' ) ?>: <?php the_tags('', ', '); ?></p>
        <?php endif; ?>
    </div>
    <?php the_excerpt(); ?>
</article> 