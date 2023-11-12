<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="sec-topic col-sm-16 col-md-8 wow fadeInDown animated " data-wow-delay="0.5s">
	    <?php if( has_post_thumbnail() ){  ?>
		    <div class="box img-thumbnail">
			    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	        
			        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-block-post', true ); ?>
		            <div class="thumb-box">
		            	<span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
		                <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
		            </div>
			    </a>
			</div><!-- box img-thumbnail -->
		<?php } ?>
        <div class="sec-info">
            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h3>
            <div class="cat">
                <div class="category-caption"><?php spidermag_colored_category(); ?></div>
            </div>
            <div class="text-danger sub-info-bordered">
            	<?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
            </div>
        </div>	    
	    <?php the_excerpt();?>
	</div>
</article>