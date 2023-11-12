<?php
$spidermag_singel_layout = esc_attr( get_post_meta( $post->ID, 'spidermag_page_layouts', true ) );
if(empty($spidermag_singel_layout)){
  $spidermag_singel_layout = esc_attr( get_theme_mod( 'spidermag_single_posts_layout','rightsidebar' ) );
}
if($spidermag_singel_layout =='leftsidebar' || $spidermag_singel_layout == 'rightsidebar'){
  $author_col = 4;
  $author_colfull = 12;
}else if ($spidermag_singel_layout == 'bothsidebar') {
  $author_col = 3;
  $author_colfull = 13;
}else{
  $author_col = 2;
  $author_colfull = 14;
  $add_class = 'no-author';
}
?>
<!-- Author Detail's -->
<div class="author-box">
    <div class="author-info clearfix">
      <div class="col-xs-16 col-sm-<?php echo esc_attr( $author_col ); ?>">
          <?php echo wp_kses_post( get_avatar( get_the_author_meta('email'), 160) ); ?>
      </div>
      <div class="col-xs-16 col-sm-<?php echo esc_attr( $author_colfull ); ?>">
        <h4><?php the_author_meta('display_name'); ?></h4>
        <p><?php the_author_meta('description'); ?></p>
        <ul class="list-inline">
          <?php
            $authoremail = esc_attr( antispambot( get_the_author_meta('email') ) ); 
            $authorurl = esc_url( get_the_author_meta('url') ); 
            if( !empty( $authoremail ) ){ ?>
              <li><a href="mailto:<?php esc_attr( antispambot( the_author_meta('email') ) ); ?>"><span class="ion-email"></span></a></li>
            <?php } if( !empty( $authorurl ) ){ ?>
              <li><a href="<?php the_author_meta('url'); ?>" target="_blank"><span class="ion-link"></span></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
</div>