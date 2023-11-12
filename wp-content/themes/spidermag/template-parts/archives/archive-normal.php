<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
$spidermag_archive_page_layout = esc_attr( get_theme_mod( 'spidermag_archive_page_layout','rightsidebar' ) );
if($spidermag_archive_page_layout == 'nosidebar') {
    $archive_col = 16;
}else if( !empty( $spidermag_archive_page_layout ) && $spidermag_archive_page_layout =='leftsidebar' || !empty( $spidermag_archive_page_layout ) && $spidermag_archive_page_layout =='rightsidebar'){
    $archive_col = 11;
}else{
  $archive_col = 6;
}

?>
<!-- data start -->
<div class="container blogging-style">
    <div class="row ">
        <?php  if ($spidermag_archive_page_layout == 'bothsidebar' || $spidermag_archive_page_layout == 'leftsidebar') : ?>
          <div class="col-lg-5 col-md-5 col-sm-5 widget-area top-margin pull-left">
            <?php get_sidebar('right'); ?>
          </div>
        <?php endif; ?><!-- left sec start -->

        <?php  if ( $spidermag_archive_page_layout == 'bothsidebar' ) : ?>
            <div class="col-lg-<?php echo intval( $archive_col ); ?> col-md-7 col-sm-6 col-xs-16 pull-left">
              <div class="row"><!-- big thumbs start -->
                <?php 
                    while ( have_posts() ) : the_post();
                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                 ?>                
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-16 wow fadeInDown animated' ); ?> data-wow-delay="1s" data-wow-offset="50"> 
                      <?php 
                        if(has_post_thumbnail()) :
                          $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-featured-image', true );
                      ?>
                        <div class="box img-thumbnail">
                          <a class="popup-img" href="<?php echo esc_url( $thumbnail[0] ); ?>">
                              <div class="thumb-box">
                                <span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
                                <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                              </div><!-- thumb-box -->
                          </a>
                        </div>
                      <?php endif; ?>                   
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <div class="text-danger sub-info-bordered">
                          <?php spidermag_archive_post_meta(); ?>
                      </div>
                      <?php the_excerpt(); ?>
                       <hr>
                    </div><!--big thumbs end--> 
                <?php endwhile; wp_reset_postdata(); ?>
                  <div class="col-sm-16">
                    <?php 
                      the_posts_pagination( 
                          array(
                            'prev_text' => esc_html__( 'Prev', 'spidermag' ),
                            'next_text' => esc_html__( 'Next', 'spidermag' ),
                          )
                      );
                    ?>
                  </div>
              </div><!-- row -->
            </div>
        <?php else :  ?>
            <div class="col-md-<?php echo intval( $archive_col ); ?> col-sm-<?php echo intval( $archive_col ); ?> pull-left">
                <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class( 'sec-topic col-sm-16 col-md-16 wow fadeInDown animated' ); ?>  data-wow-delay="0.5s">
                                    <?php if( has_post_thumbnail() ){ 
                                          $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-featured-image', true);
                                    ?>
                                      <div class="box img-thumbnail">
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                              <div class="thumb-box"><span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
                                                <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                              </div>                                            
                                          </a>
                                      </div> <!-- box img-thumbnail -->
                                    <?php } ?>

                                    <h3>
                                        <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute();?>">
                                            <?php the_title();?>
                                        </a>
                                    </h3>

                                    <div class="text-danger sub-info-bordered">
                                          <?php spidermag_archive_post_meta(); ?>
                                    </div><!-- sec-info -->

                                    <?php the_excerpt(); ?>

                            </div> <!-- sec-topic col-sm-16 col-md-16 wow fadeInDown animated -->                       
                        <?php endwhile; wp_reset_postdata(); ?>
                        
                        <div class="col-sm-16">
                             <?php 
                                the_posts_pagination( 
                                    array(
                                     'prev_text' => esc_html__( 'Prev', 'spidermag' ),
                                     'next_text' => esc_html__( 'Next', 'spidermag' ),
                                    )
                                );
                             ?>
                        </div><!--  end of pagination-->
                </div><!-- row -->
            </div>
        <?php endif; ?><!-- left sec end -->

        <!-- right sec start -->
        <?php  if($spidermag_archive_page_layout == 'bothsidebar' || $spidermag_archive_page_layout == 'rightsidebar') : ?>
          <div class="col-sm-5 widget-area right-sec top-margin">
              <?php get_sidebar('left'); ?>
          </div>
        <?php endif; ?><!-- right sec end -->
    </div>
</div><!-- data end -->