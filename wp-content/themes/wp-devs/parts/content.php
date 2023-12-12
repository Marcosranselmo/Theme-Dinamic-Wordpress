<article>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <div class="blog-central">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
            <div class="blog-central-img"><?php the_post_thumbnail(array(275, 275)); ?></a></div>
        <?php endif; ?>
        <div class="meta-info">
            <p>
                <?php esc_html_e('Postado em:', 'wp-devs') ?> <?php echo esc_html(get_the_date()); ?> <br>
                <?php esc_html_e('Por:', 'wp-devs') ?> <span><?php the_author_posts_link(); ?></span>
                <?php if (has_category()) : ?> <br>
                <?php esc_html_e('Categories', 'wp-devs') ?>: <?php the_category(' '); ?>
            </p>
            <?php endif; ?>
            <?php if (has_tag()) : ?>
                <p><?php esc_html_e('Tags', 'wp-devs') ?>: <?php the_tags('', ', '); ?></p>
            <?php endif; ?>
        </div>
        <div class="info-excerpt"><?php the_excerpt(); ?></div>
    </div>

</article> 