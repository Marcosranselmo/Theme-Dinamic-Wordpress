<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spider_Mag
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<!-- right sec start -->
<div class="col-md-5 col-sm-16 right-sec widget-area">
    <div class="bordered">
        <div class="row ">
            <?php 
	        	if ( is_active_sidebar( 'sidebar-1' ) ) :
	        		dynamic_sidebar( 'sidebar-1' );
	        	endif;
	        ?>
        </div>
    </div>
</div>