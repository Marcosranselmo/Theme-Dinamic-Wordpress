<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
get_header(); 

	if ( have_posts() ) : ?>

		<?php do_action( 'breadcrumb_add_breadcrumb', 10 ); ?>
		
	<?php
	
	    $page_layout = esc_attr( get_theme_mod( 'spidermag_archive_page_layout_type','masonry' ) );

	    get_template_part( 'template-parts/archives/archive', $page_layout );

	endif; 

get_footer();