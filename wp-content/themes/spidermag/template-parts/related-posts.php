<?php 
  $spidermag_singel_layout = esc_attr(get_post_meta( $post->ID, 'spidermag_page_layouts', true ));
  if(empty($spidermag_singel_layout)){
    $spidermag_singel_layout = esc_attr(get_theme_mod('spidermag_single_posts_layout','rightsidebar'));
  }
  $related_posts = spidermag_related_posts_function(); 
?>
<?php if ( $related_posts->have_posts() ): ?>
<div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
  
  <div class="main-title-outer">
    <div class="main-title"><?php esc_html_e('Related Posts', 'spidermag'); ?></div>
  </div>

  <div id="owl-lifestyle" class="owlcarousel cS-hidden owl-lifestyle">
    <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
      <div class="item topic">
        <div class="box img-thumbnail">
        	<a href="<?php the_permalink(); ?>">
            <div class="thumb-box"><span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
              <?php
                if( has_post_thumbnail() ){
                  if($spidermag_singel_layout =='nosidebar') :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-main-banner', true);
                  else :
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-carousel-slider', true);
                  endif;
                ?>
                    <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                <?php } ?>
            </div>
          </a>
        </div>        
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="text-danger sub-info-bordered remove-borders">
          <div class="time"><span class="ion-android-data icon"></span><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></div>
        	<div class="time"><span class="ion-chatbubbles icon"></span><?php comments_popup_link( '0', '1', '%' ); ?></div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
<?php endif; wp_reset_postdata();