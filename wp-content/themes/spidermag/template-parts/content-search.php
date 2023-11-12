<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('sec-topic col-sm-16 wow fadeInDown animated'); ?> data-wow-delay="0.5s">
    <div class="row">
        <?php
            if(has_post_thumbnail()){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', true);
        ?>
            <div class="col-sm-8">
                <div class="box img-thumbnail">
                  <a href="<?php the_permalink(); ?>">
                    <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>                    
                  </a>
                </div><!-- box img-thumbnail -->
            </div><!-- col-sm-8 -->
        <?php } ?>
        <div class="col-sm-<?php if( has_post_thumbnail() ){ echo '8'; } else { echo '16'; } ?>">                                    
                <div class="sec-info">
                    <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

                    <div class="text-danger sub-info-bordered">
                          <?php spidermag_archive_post_meta(); ?>
                    </div><!-- sec-info -->

                </div><!-- sec-info -->
                <div class="spidermag-serarch-text">
                    <?php the_excerpt(); ?>
                </div>
        </div><!-- col-sm-8 -->
    </div> <!-- main row -->
</div><!-- main container -->