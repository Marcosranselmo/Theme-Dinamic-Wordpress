<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */

get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<?php if ( have_posts() ) : ?>	
	<section>
	    <div class="container blogging-style">
	        <div class="row ">
	            <!-- left sec start -->
	            <div class="col-md-11 col-sm-11">
	                <div class="row">
						<?php /* Start the Loop */ ?>
						<?php $count = 0; while ( have_posts() ) : the_post(); ?>
							<?php
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content');
							?>
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
					</div><!-- row -->
				</div><!-- col-md-11 col-sm-11 -->
				<!-- left sec end -->
				<?php get_sidebar(); ?>
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->
<?php else : ?>
	<?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>
</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();