<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spider_Mag
 */
    do_action("spidermag_before_footer") ;
    
    do_action('spidermag_top_footer');

    do_action('spidermag_bottom_footer');

    do_action('spidermag_after_footer'); 
?>
<!-- Footer end -->

<!-- call login and registration popup view -->
<?php get_template_part( 'template-parts/login', 'register' ); ?> 

<?php do_action('spidermag_preloader'); ?>
    
<?php wp_footer(); ?> 

	<a href="#" class="scrollup">
		<i class="fa fa-angle-up"></i>
	</a>

</body>

</html>