<?php
/**
 * Template Name: SpiderMag - FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spider_Mag
 */
get_header(); ?>

<!-- top Section start -->
<?php if (is_active_sidebar('spider_home_page_banner')) { ?>
    <div class="container">
        <div class="row">
            <div class="banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
                <div class="row">
                    <?php dynamic_sidebar('spider_home_page_banner'); ?>
                </div>
            </div><!-- banner outer end -->
        </div>
    </div>
<?php } ?>

<!-- Middle Section Start -->
<?php 
    $spidermag_page_layout = esc_attr( get_post_meta( $post->ID, 'spidermag_page_layouts', true ) ); 
    if($spidermag_page_layout == 'nosidebar'){
        $spidermag_col = 16;
    }else{
        $spidermag_col = 11;
    }
?>
<div class="container ">
    <div class="row ">
        <?php  if ($spidermag_page_layout == 'leftsidebar') : ?>
            <div class="col-md-5 col-sm-16 right-sec">
                <div class="bordered">
                    <div class="row">
                    <?php if(is_active_sidebar('sidebar-right')){ ?>
                        <div class="col-sm-16 widget-area wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="100">
                            <?php dynamic_sidebar('sidebar-right'); ?>
                        </div>
                    <?php  } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?><!-- Left sec end -->

        <div class="col-md-<?php echo intval( $spidermag_col ); ?> col-sm-16 ">
            <div class="row spmag">
                    <div class="col-sm-16">
                        <?php 
                            if(is_active_sidebar('spidermag_home_page_block_section')){
                                dynamic_sidebar('spidermag_home_page_block_section');
                            }
                        ?>
                    </div>
            </div>
        </div><!-- left sec end -->

        <?php  if ($spidermag_page_layout == 'rightsidebar') : ?>
            <div class="col-sm-16 col-md-5 right-sec">
                <div class="bordered">
                    <div class="row">
                    <?php if(is_active_sidebar('sidebar-1')){ ?>
                        <div class="col-sm-16 widget-area wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="100">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    <?php  } ?>
                    </div>
                </div>
            </div>
        <?php endif; ?><!-- right sec end -->
    </div>
</div>

<!-- Button Section Start -->
<?php if (is_active_sidebar('spidermag_home_page_sec_block_section')) { ?>
    <div class="container">
        <div class="row">
            <div class="banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
                <div class="row">
                    <?php dynamic_sidebar('spidermag_home_page_sec_block_section'); ?>
                </div>
            </div><!--  Footer fullwidth Section end  -->
        </div>
    </div>
<?php } ?>

<?php get_footer();