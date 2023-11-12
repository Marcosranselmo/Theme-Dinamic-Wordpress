<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
?>

<div class="col-sm-16">
  <h3><?php esc_html_e( 'Sorry, we didnt find any result but you can still try:', 'spidermag' ); ?></h3>
</div>
<div class="col-sm-16">
  <ul class="icn-list">
    <li><?php esc_html_e('Check your spelling.', 'spidermag'); ?></li>
    <li><?php esc_html_e('Try more general words.', 'spidermag'); ?></li>
    <li><?php esc_html_e('Try different words that mean the same thing.', 'spidermag'); ?></li>
    <li><a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Post a request', 'spidermag'); ?></a> <?php esc_html_e('and we will help you.', 'spidermag'); ?></li>
  </ul>
  <?php get_search_form(); ?>
  <hr>
  <h3><?php esc_html_e('Or you can discover popular topics in:', 'spidermag'); ?></h3>
  <ul class="icn-list">
  	<?php 
  		$search_random_post = new WP_Query( array(
          'posts_per_page'        => 5,
          'post_type'             => 'post',
          'ignore_sticky_posts'   => true,
          'orderby'               => 'rand'
      ));
  	?>
  	<?php 
        if($search_random_post->have_posts()) : while( $search_random_post->have_posts() ): $search_random_post->the_post();
    ?>
    	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; endif; ?>
  </ul>
</div>