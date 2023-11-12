<?php
/**
 * The template for displaying author pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
get_header(); ?>
<?php if (have_posts()) : ?>

<?php do_action( 'breadcrumb_add_breadcrumb', 10 ); ?>

<section>
    <div class="container">
        <div class="row ">
            <div class="col-md-11 col-sm-11">
                <div class="row">
                    <?php get_template_part( 'template-parts/author', 'none' );  ?>
                    <div class="col-sm-16 wow fadeInDown animated " data-wow-delay="0.5s">
                      <div class="main-title-outer pull-left">
                        <div class="main-title"><?php esc_html_e('Author Posts','spidermag'); ?></div>
                      </div>
                    </div>
                    <?php  $count = 0; while (have_posts()) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class('sec-topic col-sm-16 col-md-8 wow fadeInDown animated'); ?> data-wow-delay="0.5s">                                
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="box img-thumbnail">
                                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                    <div class="thumb-box">
                                      <span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
                                      <?php
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-block-post', true);
                                        ?>
                                          <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                    </div><!-- thumb-box -->
                                  </a>
                                </div><!-- .box img-thumbnail -->
                            <?php endif; ?>
                            <div class="sec-info">
                                <a href="<?php the_permalink(); ?>"><h3><?php the_title();?></h3></a>
                                <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>
                                <div class="text-danger sub-info-bordered">
                                    <div class="author"><span class="ion-android-contact icon"></span><?php the_author_posts_link(); ?></div>
                                    <div class="time"><span class="ion-android-data icon"></span><a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a></div>
                                    <div class="comments"><span class="ion-chatbubbles icon"></span><?php comments_popup_link( '0', '1', '%' );?></div>
                                </div>
                            </div><!-- sec-info -->
                            <?php  the_excerpt(); ?>
                        </div>
                    <?php if($count%2 == 1) : ?>
                    <div class="clearfix"></div>
                    <?php endif; ?>
                    <?php $count++; endwhile; ?>
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
                </div><!-- .row -->
            </div><!-- col-md-11 col-sm-11 left sec end -->
            <?php get_sidebar(); ?>
        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- section -->
<?php endif; ?>
<?php get_footer();