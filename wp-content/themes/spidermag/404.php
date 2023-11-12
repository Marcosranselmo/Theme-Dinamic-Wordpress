<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Spider_Mag
 */

get_header(); ?>
<div class="container">
	<div class="row">
	    <div class="col-md-8 col-sm-8 col-md-offset-4 col-sm-offset-4 wrong-page wow fadeInDown animated">
		    <div class="text-center">
			      <h1><?php esc_html_e('Oops! That page can&rsquo;t be found.','spidermag'); ?></h1>
			      <p><?php esc_html_e('Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists','spidermag'); ?></p>
		    </div>
		    <div class="text-center"><span class="ion-sad wrong-icon "></span></div>
		    <div class="text-center">
		    	<a class="btn btn-danger"  href="<?php echo esc_url( home_url( '/' ) ); ?>">
		    		<?php esc_html_e('Go to home page','spidermag'); ?>
		    	</a>
		    </div>
	    </div>
	</div>
</div>
<?php get_footer();