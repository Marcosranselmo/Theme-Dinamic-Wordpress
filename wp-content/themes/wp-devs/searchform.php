<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php _e( 'Search for', 'wp-devs' )?>:</label>
		<input type="text" value="<?php get_search_query(); ?>" name="s" id="s">
		<input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'wp-devs' )?>">
		<!--<input type="hidden" value="post" name="post_type" id="post_type" /> -->
	</div>
</form>