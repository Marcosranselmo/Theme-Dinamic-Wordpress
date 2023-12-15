<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h2><?php the_title(); ?></a></h2>

    <div class="blog-central">
        <img class="blog-central-img">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(array(275, 275)); ?></a>
        
        <?php endif; ?>
        <div class="meta-info-p">
            <p>
                <?php esc_html_e('Postado em:', 'wp-devs') ?> <?php echo esc_html(get_the_date()); ?> <br>
                <?php esc_html_e('Por:', 'wp-devs') ?> <span><?php the_author_posts_link(); ?></span>
                <?php if (has_category()) : ?> <br>
                <?php esc_html_e('Categoria:', 'wp-devs') ?>: <?php the_category(' '); ?>
            </p>
            <?php endif; ?>
            <?php if (has_tag()) : ?>
                <p><?php esc_html_e('Tags', 'wp-devs') ?>: <?php the_tags('', ', '); ?></p>
            <?php endif; ?>
            <?php echo the_content(); ?>
        </div>
    </div>

</article>