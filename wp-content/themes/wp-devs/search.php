<?php get_header(); ?>

<div id="primary">
    <div id="main">
        <div class="container">

            <?php
            while( have_posts() ): the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta-info">
                        <p>Posted in <?php echo get_the_date(); ?>by</p>
                        <p>Categories: <?php the_category( ' ' ); ?></p>
                        <p>Tags: <?php the_tags( '', ', ' ); ?></p>
                    </div>
                </header>
                <div class="content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>