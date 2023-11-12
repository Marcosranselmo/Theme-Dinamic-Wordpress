<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-16 wow fadeInDown animated'); ?> data-wow-delay="0.5s">
  <div class="row">
    <?php
     $spidermag_post_settings_metalayouts = esc_attr(get_post_meta( $post->ID, 'spidermag_post_settings_layouts', true ));
     if(!empty($spidermag_post_settings_metalayouts) && $spidermag_post_settings_metalayouts  == 'classicpost') :
       $image_popup_id = get_post_thumbnail_id();
       $image_popup_url = wp_get_attachment_url( $image_popup_id );
      if ( has_post_thumbnail() ) { ?>
       <div class="classicpost">
          <?php if ( get_theme_mod('spidermag_featured_image_popup', 0 ) == 1 ) { ?>
            <a class="popup-img" href="<?php echo esc_url( $image_popup_url ); ?>">
              <div class="thumb-box"><span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
                <?php               
                      $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-featured-image', true );
                  ?>
                      <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
               </div>
            </a>
          <?php } else { ?>
          <?php
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-featured-image', true );
            ?>
              
                <div class="thumb-box"><span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
                  <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                </div>
              
          <?php } ?>
          <div class="stanterpost-single-post">
            <h3> <?php the_title(); ?></h3>
            <div class="text-danger sub-info-bordered">
              <?php spidermag_single_post_meta(); ?> 
            </div>
          </div>
       </div>   
    <?php } endif; ?>
    <!-- End Classic Post feature image section -->

    <!-- postmeta section -->
    <div class="sec-info">
        <?php  if(! has_post_thumbnail() ) { ?> 
          <h3> <?php the_title(); ?></h3>
          <div class="text-danger sub-info-bordered">
            <?php spidermag_single_post_meta(); ?> 
          </div>
        <?php } 
            the_content( sprintf(
              /* translators: %s: Name of current post. */
              wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'spidermag' ), array( 'span' => array( 'class' => array() ) ) ),
              the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );

            wp_link_pages( array(
            'before'            => '<div class="desc-nav">'.esc_html__( 'Pages:', 'spidermag' ),
            'after'             => '</div>',
            'link_before'       => '<span>',
            'link_after'        => '</span>'
            ) );
        ?>
    </div>
  </div>
</div>

<?php if ( get_theme_mod( 'spidermag_post_author', 1 ) == 1 )
  get_template_part( 'template-parts/author', 'none' ); 
?><!-- Author Details section -->

<?php if ( get_theme_mod( 'spidermag_related_posts_activate', 1 ) == 1 )
  get_template_part( 'template-parts/related', 'posts' ); 
?> <!-- related post section -->

<div class="spidermagnav-links clearfix col-sm-16">
  <?php
    previous_post_link( '<div class="nav-previous">%link</div>', '%title', TRUE );
    next_post_link( '<div class="nav-next">%link</div>', '%title', TRUE );
  ?>
</div><!-- .nav-links -->

<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;