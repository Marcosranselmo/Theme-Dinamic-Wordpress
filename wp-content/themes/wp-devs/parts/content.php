<article>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(275, 275)); ?></a>
    <div class="meta-info">
        <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
        <p>Categories: <?php the_category(' '); ?></p>
        <p>Tags: <?php the_tags('', ', '); ?></p>
    </div>
    <?php the_excerpt(); ?>
</article>