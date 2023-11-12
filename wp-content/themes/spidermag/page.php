<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
get_header();

$spidermag_page_layout = esc_attr(get_post_meta( $post->ID, 'spidermag_page_layouts', true ));
if(empty($spidermag_page_layout)){
  $spidermag_page_layout = esc_attr(get_theme_mod('spidermag_page_layout','rightsidebar'));;
}
if( !empty( $spidermag_page_layout ) && $spidermag_page_layout =='leftsidebar' || !empty( $spidermag_page_layout ) && $spidermag_page_layout =='rightsidebar'){
  $spidermag_col = 11;
}else if ( !empty( $spidermag_page_layout ) && $spidermag_page_layout == 'bothsidebar') {
  $spidermag_col = 6;
}else{
  $spidermag_col = 16;
}
?>
<?php if ( have_posts() ) : ?>

<?php do_action( 'breadcrumb_add_breadcrumb', 10 ); ?>

<div class="container blogging-style">
  <div class="row">
    <?php if($spidermag_page_layout == 'bothsidebar' || $spidermag_page_layout == 'leftsidebar' ) : ?>
      <div class="col-lg-5 col-md-5 col-sm-5 widget-area top-margin pull-left">
        <?php get_sidebar('right'); ?>
      </div><!-- col-lg-5 col-md-5 col-sm-5 widget-area top-margin pull-left -->
    <?php endif; ?><!-- left sec start -->

    <div class="col-lg-<?php echo esc_attr( $spidermag_col ); ?> col-md-7 col-sm-11 col-xs-16 pull-left">
      <!-- big thumbs start -->
        <div class="row"> 
          <!-- post details start -->
          <div class="col-sm-16">
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'page' ); ?>             

                <?php endwhile; // End of the loop. ?>
            </div> <!-- .row -->
          </div><!-- col-sm-16 --><!-- post details end -->             
        </div><!--big thumbs end .col-sm-16-->   
    </div>

    <?php  if ($spidermag_page_layout == 'bothsidebar' || $spidermag_page_layout == 'rightsidebar') : ?>
      <div class="col-md-5 col-sm-16 right-sec widget-area top-margin">
          <?php get_sidebar('left'); ?>
      </div><!-- right section col-sm-5 hidden-xs right-sec widget-area top-margin -->
    <?php endif; ?>

  </div> <!-- . main row -->
</div><!-- main container -->
<!-- data end -->
<?php endif; ?>
<?php get_footer();