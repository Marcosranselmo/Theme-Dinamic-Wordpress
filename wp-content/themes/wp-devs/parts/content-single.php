<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header>
        <h1><?php the_title(); ?></h1>
        <div class="meta-info">
            <p>Posted in <?php echo get_the_date(); ?>by</p>
            <p>Categories: <?php the_category(' '); ?></p>
            <p>Tags: <?php the_tags('', ', '); ?></p>
        </div>
    </header>

    <div class="content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
    
</article>