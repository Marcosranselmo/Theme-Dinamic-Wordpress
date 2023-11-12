<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spidermag
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php spidermag_html_tag_schema(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
	/**
	 * @see  spidermag_skip_links() - 5
	 */	
    do_action('spidermag_skip_links');
	do_action( 'spidermag_header_before' ); 

	/**
	 * @see  spidermag_top_header() - 15
	 * @see  spidermag_main_header() - 20
	 */
	do_action( 'spidermag_header' ); 

 	do_action( 'spidermag_header_after' ); 
?>



<?php if ( esc_attr( get_theme_mod('spidermag_breaking_news', 1 )) == 1){ ?>
    <div class="container">
        <div class="hot-news">
            <div class="row width-100 flex-center">
                
                <?php 
                    $breaking = esc_attr( get_theme_mod( 'spidermag_breaking_news_title_options' ,'no' ) );
                    if ($breaking == 'yes' ){ ?>
                    <span class="pull-left bre-latest"><?php echo esc_html(get_theme_mod("spidermag_breaking_news_title","Latest News")); ?> :</span>
                <?php } if ($breaking == 'no') { ?>
                    <span class="<?php echo esc_attr(get_theme_mod("spidermag_breaking_news_title","ion-ios7-timer")); ?> icon-news pull-left"></span>
                <?php } ?>
                <?php spidermag_render_spider_hot_news(); ?>
            
            </div><!-- row -->
        </div><!-- col-sm-16 -->
    </div><!-- container -->
<?php } ?>