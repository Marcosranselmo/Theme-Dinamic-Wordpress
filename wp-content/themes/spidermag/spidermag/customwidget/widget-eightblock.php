<?php
/**
 ** Adds spidermag_eight_block_widget widget.
*/
add_action('widgets_init', 'spidermag_eight_block_widget');
function spidermag_eight_block_widget() {
    register_widget('spidermag_eight_block');
}
class spidermag_eight_block extends WP_Widget {
    /**
     * Register widget with WordPress.
    */
    public function __construct() {        
        parent::__construct(
            'spidermag_eight_block', esc_html__( 'SPMag : Eight Block Section','spidermag' ), array(
            'description' => esc_html__( 'A Widget that shows posts with different layout View', 'spidermag' )
        ));
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $args = array(
              'type'       => 'post',
              'child_of'   => 0,
              'orderby'    => 'name',
              'order'      => 'ASC',
              'hide_empty' => 1,
              'taxonomy'   => 'category',
        );

        $multi_categories = get_categories( $args );
        $mag_categories_lists = array();
        foreach( $multi_categories as $multi_categorie ) {
            $mag_categories_lists[$multi_categorie->term_id] = $multi_categorie->name;
        }

        $fields = array(   

            'eight_block_title' => array(
                'spidermag_widgets_name' => 'eight_block_title',
                'spidermag_widgets_title' => esc_html__('Title', 'spidermag'),
                'spidermag_widgets_field_type' => 'title',
            ),

            'eight_block_list_category' => array(
              'spidermag_widgets_name' => 'eight_block_list_category',
              'spidermag_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),

            'eight_block_view_layout' => array(
                'spidermag_widgets_name' => 'eight_block_view_layout',
                'spidermag_widgets_title' => esc_html__('Choose Post Display Layout', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('masonry' => 'Masonry View Layout', 'grid' => 'Grid View Layout')
            ),

            'eight_block_number_column' => array(
                'spidermag_widgets_name' => 'eight_block_number_column',
                'spidermag_widgets_title' => esc_html__('Display Number of Column', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('0'=>'Select the Number of Column','16'=>'One','8'=>'Two','5'=>'Three','4'=>'Four')
            ),

            'eight_block_number_post' => array(
                'spidermag_widgets_name' => 'eight_block_number_post',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ) );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);

        $eight_block_number_post   = empty($instance['eight_block_number_post']) ? 12 : $instance['eight_block_number_post'];
        $eight_col                 = empty($instance['eight_block_number_column']) ? 5 : $instance['eight_block_number_column'];
        $eight_block_list_category = empty($instance['eight_block_list_category']) ? 0 : $instance['eight_block_list_category'];
        $eight_layout              = empty($instance['eight_block_view_layout']) ? 'masonry' : $instance['eight_block_view_layout'];
        
        $multi_left_cat_id = array();
        if(!empty($eight_block_list_category)){
            $multi_left_cat_id = array_keys( unserialize($eight_block_list_category ));
        }

        $args =  array(
            'posts_per_page'     => $eight_block_number_post,
            'post_type'          => 'post',
            'category__in'       => $multi_left_cat_id,
            'ignore_sticky_post' => true
        );
        $eight_block_q = new WP_Query($args);

        echo $before_widget; 
        $eight_block_title = empty($eight_block_title) ? "" : $eight_block_title;
        ?>
        <div class="row">
            <div class="spidermag-seven-block col-sm-16 col-md-16">
              <?php if( $eight_block_title ) : ?>
                    <div class="main-title-outer pull-left">
                        <div class="main-title"><?php echo esc_html( $eight_block_title ); ?></div>
                    
                        <div class="span-outer">
                            <span class="pull-right text-danger last-update">
                                <span class="ion-android-data icon"></span>
                                <?php esc_html_e('Last update:','spidermag'); ?> <?php spidermag_get_spider_post_update_date( $multi_left_cat_id );?>
                            </span>
                        </div>
                    </div>
              <?php endif; ?>
              <div class="row">
                  <?php 
                      if(!empty( $eight_layout ) && $eight_layout =='masonry') { 
                          if($eight_col == '8'){
                              echo '<style>.masonry-item{ width: 560px; }</style>';
                              echo '<style>.spmag .widget_spidermag_eight_block .masonry-item{width: 380px !important;}</style>';                            
                          }else if($eight_col == '5'){
                              echo '<style>.masonry-item{ width: 370px; }</style>';
                              echo '<style>.spmag .widget_spidermag_eight_block .masonry-item{width: 246px !important;}</style>';
                          }else if($eight_col == '4'){
                              echo '<style>.masonry-item{ width: 270px; }</style>';
                              echo '<style>.spmag .widget_spidermag_eight_block .masonry-item{width: 180px !important;}</style>';
                          }else {
                              echo '<style>.masonry-item{ width: 1140px; }</style>';
                              echo '<style>.spmag .widget_spidermag_eight_block .masonry-item{width: 780px !important;}</style>';
                          }
                  ?>
                      <div class="col-sm-16">
                        <div class="grid-container">
                            <div class="grid">
                              <?php if( $eight_block_q->have_posts() ) :  while( $eight_block_q->have_posts() ) : $eight_block_q->the_post(); ?>
                                <div id="post-<?php the_ID(); ?>" <?php post_class('masonry-item sec-topic col-sm-16 col-md-'.$eight_col.' wow fadeInDown animated'); ?> data-wow-delay="0.5s">
                                    <div class="title-icon">
                                        <span class="<?php spidermag_get_spider_mag_post_format_icon( get_post_format() ); ?>"></span>
                                    </div><!-- .title-icon -->
                                    <?php
                                      if( has_post_thumbnail() ){
                                        if($eight_col =='16'):
                                              $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'spidermag-featured-image', true);
                                          else:
                                              $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'spidermag-main-banner', true);
                                          endif;
                                    ?>
                                      <div class="box img-thumbnail">
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                              <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                          </a>
                                      </div><!-- box img-thumbnail -->
                                    <?php }  ?>
                                    <div class="contents-wrap">
                                        <div class="sec-info">
                                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
                                            <div class="text-danger sub-info-bordered">
                                                <?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
                                            </div>
                                        </div>                                    
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                <?php endwhile; endif; wp_reset_postdata(); ?>
                                
                            </div>
                        </div>
                      </div><!-- Masonry Layout .col-sm-16 -->

                  <?php } else if(!empty($eight_layout) && $eight_layout =='grid') { ?>
                      <div class="spmgrid">
                          <?php $count = 1; if( $eight_block_q->have_posts() ) : while ( $eight_block_q->have_posts() ) : $eight_block_q->the_post(); ?>
                              <div id="post-<?php the_ID(); ?>" <?php post_class('sec-topic col-sm-16 col-md-'.$eight_col.' spmag-button wow fadeInDown animated'); ?>  data-wow-delay="0.5s">
                                  <div class="box img-thumbnail">
                                      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                          <div class="thumb-box">
                                            <span class="<?php spidermag_get_spider_mag_post_format_icon(get_post_format()); ?>"></span>
                                            <?php 
                                              if( has_post_thumbnail() ){ 
                                                  if($eight_col =='16') :
                                                      $image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'spidermag-featured-image', true);
                                                  else:
                                                      $image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'spidermag-main-banner', true);
                                                  endif;
                                            ?>
                                                <img class="img-responsive" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                              <?php } ?>
                                          </div>                                            
                                      </a>
                                  </div> <!-- box img-thumbnail -->
                                  <div class="sec-info">
                                      <h3>
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                                              <?php the_title();?>
                                          </a>
                                      </h3>
                                      <div class="text-danger sub-info-bordered">
                                        <?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
                                      </div>
                                  </div><!-- sec-info -->
                                <?php the_excerpt(); ?>
                              </div> <!-- sec-topic col-sm-16 col-md-8 wow fadeInDown animated -->
                              <?php if($eight_col == 8) { if($count % 2 == 0 ) : ?>
                                  <div class="clearfix"></div>
                              <?php endif; }  else if($eight_col == 5) { if($count % 3 == 0 ) : ?>
                                  <div class="clearfix"></div>
                              <?php endif; }  else if($eight_col == 4) { if($count % 4 == 0 ) : ?>
                                  <div class="clearfix"></div>
                              <?php endif; } ?>
                          <?php $count++; endwhile; endif; wp_reset_postdata(); ?> <!-- Grid Layout -->
                      </div>

                  <?php } ?>
                 
              </div><!-- .row -->

            </div>
        </div>
    <?php         
        echo $after_widget;
    }
    
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $instance[$spidermag_widgets_name] = spidermag_widgets_updated_field_value($widget_field, $new_instance[$spidermag_widgets_name]);
        }
        return $instance;
    }
    public function form($instance) {
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $spidermag_widgets_field_value = !empty($instance[$spidermag_widgets_name]) ? $instance[$spidermag_widgets_name] : '';
            spidermag_widgets_show_widget_field($this, $widget_field, $spidermag_widgets_field_value);
        }
    }
}