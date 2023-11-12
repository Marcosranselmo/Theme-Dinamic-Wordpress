<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('sec-topic col-sm-16  wow fadeInDown animated'); ?>  data-wow-delay="0.5s">
  <div class="row">
    <div class="col-sm-16">
      <?php
        if(has_post_thumbnail()){
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'spidermag-featured-image', true);
        ?>
            <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
      <?php } ?>
  	</div><!-- col-sm-16 -->
    <div class="col-sm-16 sec-info">
         	<?php the_content(); ?>
          <?php
              wp_link_pages( array(
              'before'            => '<div class="desc-nav">'.esc_html__( 'Pages:', 'spidermag' ),
              'after'             => '</div>',
              'link_before'       => '<span>',
              'link_after'        => '</span>'
              ) );
          ?>
    </div>
  </div> <!-- row -->
</div>
<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;