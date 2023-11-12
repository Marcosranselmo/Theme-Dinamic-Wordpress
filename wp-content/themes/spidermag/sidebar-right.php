<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spider_Mag
 */
?>
<!-- right sec start -->
<div class="bordered">
    <div class="row ">
      <?php 
    		if ( is_active_sidebar( 'sidebar-right' ) ) :
    			dynamic_sidebar( 'sidebar-right' );
    		else:
    		  echo esc_html__( 'No Any widget selected for sidebar', 'spidermag' );
    		endif;
    	?>
    </div>
</div>