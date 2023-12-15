<section class="home-blog">
    <h2><?php esc_html_e('Últimas Postagens', 'wp-devs') ?></h2>
    <div class="container">
        <?php
        $per_page = get_theme_mod('set_per_page', 3);
        $category_include = get_theme_mod('set_category_include');
        $category_exclude = get_theme_mod('set_category_exclude');

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => esc_html($per_page),
            'category__in'  => explode(",", esc_html($category_include)),
            'category__not_in' => explode(",", esc_html($category_exclude))
        );

        $postlist = new WP_Query($args);

        if ($postlist->have_posts()) :
            while ($postlist->have_posts()) : $postlist->the_post();
                get_template_part('parts/content-home', 'latest-news');
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php esc_html_e('Nada ainda a ser exibido!', 'wp-devs') ?></p>
        <?php endif; ?>
    </div>
</section>