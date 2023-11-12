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
<div class="bordered authorleft">
    <div class="row ">
        <?php 
        	if ( is_active_sidebar( 'sidebar-1' ) ) :
        		dynamic_sidebar( 'sidebar-1' );
        	else:
        	    echo esc_html__( 'No Any widget selected for sidebar', 'spidermag' );
        	endif;
        ?>
    </div>
</div>