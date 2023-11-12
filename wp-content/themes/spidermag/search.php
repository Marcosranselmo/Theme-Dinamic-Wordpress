<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Spider_Mag
 */
get_header();

$spidermag_search_page_layout = esc_attr(get_theme_mod('spidermag_search_page_layout','rightsidebar'));
if($spidermag_search_page_layout =='leftsidebar' || $spidermag_search_page_layout == 'rightsidebar'){
	$spidermag_col = 11;
}else if ($spidermag_search_page_layout == 'bothsidebar') {
	$spidermag_col = 6;
}else{
	$spidermag_col = 16;
}
?>

<?php do_action( 'breadcrumb_add_breadcrumb', 10 ); ?>


<!--data start -->
<div class="container blogging-style">
  <div class="row"> 

    <?php  if ($spidermag_search_page_layout == 'bothsidebar' || $spidermag_search_page_layout == 'leftsidebar') : ?>
      <div class="col-lg-5 col-md-5 col-sm-5 widget-area top-margin pull-left">
      	<?php get_sidebar('right'); ?>
      </div>
    <?php endif; ?><!-- left sec start -->

    <?php  if ($spidermag_search_page_layout == 'bothsidebar') : ?>
        <div class="col-lg-<?php echo esc_attr( $spidermag_col ); ?> col-md-7 col-sm-6 col-xs-16 pull-left">
          <div class="row"> 
            <?php 
                while ( have_posts() ) : the_post();
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
             ?>                
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-sm-16  wow fadeInDown animated'); ?> data-wow-delay="1s" data-wow-offset="50"> 
                  <?php 
                    if( has_post_thumbnail() ) :
                      $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'spidermag-featured-image', true); 
                  ?>
                    <div class="box img-thumbnail">
                      <a class="popup-img" href="<?php echo esc_url( $thumbnail[0] ); ?>">
                        <div class="thumb-box"><span class="<?php spidermag_get_spider_mag_post_format_icon(get_post_format()); ?>"></span>
                          <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                        </div>                          
                      </a>
                    </div>
                  <?php endif; ?>                  
                  <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                  </a>
                  <div class="text-danger sub-info-bordered">
                    <?php spidermag_archive_post_meta(); ?>
                  </div>
                  <?php the_excerpt(); ?>
                  <hr>
                </div><!-- col-sm-16 -->
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
          </div><!-- .row -->
        </div>
    <?php else :  ?>      
      <div class="col-lg-<?php echo esc_attr( $spidermag_col ); ?> col-md-7 col-sm-6 col-xs-16 pull-left">
  	    <div class="row"> 
  	      <div class="col-sm-16">
  	        <div class="row">	        	
    				  <?php if ( have_posts() ) : ?>

    					<?php while ( have_posts() ) : the_post(); ?>

    						<?php get_template_part( 'template-parts/content', 'search' ); ?>

    					<?php endwhile; ?>
            
              <div class="col-sm-16">
                 <?php the_posts_pagination( array(
                      'mid_size' => 2,
                      'prev_text' => __( 'Previous', 'spidermag' ),
                      'next_text' => __( 'Next', 'spidermag' ),
                  ) ); ?>
              </div><!-- pagination block -->

  					<?php else : ?>

  						<?php get_template_part( 'template-parts/content', 'none' ); ?>

  				  <?php endif; ?>	            

  	        </div>
  	      </div>
  	      <!-- post details end --> 	          
  	    </div>
      </div><!-- left sec end --> 
    <?php endif; ?><!-- left sec End -->
    
    <?php  if ($spidermag_search_page_layout == 'bothsidebar' || $spidermag_search_page_layout == 'rightsidebar') : ?>
      <div class="col-sm-5 widget-area right-sec top-margin">
        	<?php get_sidebar('left'); ?>
      </div>
	  <?php endif; ?><!-- right sec end -->

  </div>
</div>
<?php get_footer();