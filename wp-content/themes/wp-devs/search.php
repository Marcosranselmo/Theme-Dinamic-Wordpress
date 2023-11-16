<?php get_header(); ?>

<div id="primary">
    <div id="main">
        <div class="container">

        <h2>Search results for: <?php echo get_search_query(); ?> </h2>

            <?php

            get_search_form();

            while (have_posts()) : 
                the_post();
                get_template_part( 'parts/content', 'search' );
            endwhile;
            the_posts_pagination();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>