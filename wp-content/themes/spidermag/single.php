<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Spider_Mag
 */
get_header();

$spidermag_post_settings_metalayouts = esc_attr(get_post_meta( $post->ID, 'spidermag_post_settings_layouts', true ));

$spidermag_singel_layout = esc_attr( get_post_meta( $post->ID, 'spidermag_page_layouts', true ) );
if( empty( $spidermag_singel_layout ) ){
    $spidermag_singel_layout = esc_attr(get_theme_mod('spidermag_single_posts_layout','rightsidebar'));
}
if( !empty( $spidermag_singel_layout ) && $spidermag_singel_layout =='leftsidebar' || !empty( $spidermag_singel_layout ) && $spidermag_singel_layout =='rightsidebar' ){
  $spidermag_col = 11;
}else if ($spidermag_singel_layout == 'bothsidebar') {
  $spidermag_col = 6;
}else{
  $spidermag_col = 16;
}
?>

<?php do_action( 'breadcrumb_add_breadcrumb', 10 ); ?>

<?php
/* Single Post Loops Start */
if ( have_posts() ) : 
  
  if(!empty($spidermag_post_settings_metalayouts) && $spidermag_post_settings_metalayouts == 'screenwidthpost') :   
   $image_popup_id = get_post_thumbnail_id();
   $image_popup_url = wp_get_attachment_url( $image_popup_id );
  if( has_post_thumbnail() ) { 
    $image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'spidermag-screenwidthpost-image', true); 
?>
  <div class="standardpost" style="background-image:url('<?php echo esc_url( $image[0] ); ?>');">
      <div class="stanterpost-single-post">
        <h3> <?php the_title(); ?></h3>
        <div class="text-danger sub-info-bordered">
          <?php spidermag_single_post_meta(); ?> 
        </div>
      </div> <!-- /stanterpost-single-post -->
  </div><!---/ standard -->
  <?php } endif; ?><!-- End Screen Width Post feature image section -->

<!-- End Other Remaining Post feature image section -->
<div class="container blogging-style">
  <div class="row">
    <!-- Start Standard Post feature image section -->
    <?php
     if(!empty($spidermag_post_settings_metalayouts) && $spidermag_post_settings_metalayouts == 'standardpost') :   
       $image_popup_id = get_post_thumbnail_id();
       $image_popup_url = wp_get_attachment_url( $image_popup_id );
       if( has_post_thumbnail() ) { 
    ?>
      <div class="col-sm-16">
          <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'spidermag-featured-image', true); ?>
          <div class="standardpost" style="background-image:url('<?php echo esc_url($image[0]); ?>'); ">
              <div class="stanterpost-single-post">
                <h3> <?php the_title(); ?></h3>
                <div class="text-danger sub-info-bordered">
                  <?php spidermag_single_post_meta(); ?> 
                </div>
              </div> <!-- /stanterpost-single-post -->
          </div><!---/ standard -->
      </div>  <!---/ col-sm-16 -->
    <?php } endif; ?><!-- End Standard Post feature image section -->


    <?php  if ($spidermag_singel_layout == 'bothsidebar' || $spidermag_singel_layout == 'leftsidebar') : ?>
     
      <div class="col-lg-5 col-md-5 col-sm-5 widget-area top-margin pull-left">

        <?php get_sidebar('right'); ?>

      </div>
      
    <?php endif; ?><!-- mid sec end --> 


    <div class="col-lg-<?php echo esc_attr($spidermag_col); ?> col-md-11 col-sm-11 col-xs-16 pull-left">
      <div class="row"> 
        <div class="col-sm-16">
          <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'template-parts/content', 'single' ); ?>             
                
            <?php endwhile; // End of the loop. ?> 
          </div><!-- .row -->
        </div><!-- col-sm-16 --><!-- post details end --><!--big thumbs end-->  
      </div><!-- left sec end --> 
    </div><!-- right sec start -->
    
    <?php  if ($spidermag_singel_layout == 'bothsidebar' || $spidermag_singel_layout == 'rightsidebar') : ?>
      
      <div class="col-sm-5 col-md-5 widget-area right-sec top-margin">

          <?php get_sidebar('left'); ?>

      </div>

    <?php endif; ?><!-- right sec end -->

  </div>

</div>

<?php endif; ?>

<?php get_footer();