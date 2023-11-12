<?php
/**
 ** Adds Spider Mag Carousel Slider Posts Widget.
*/
add_action('widgets_init', 'spidermag_slider_carousel_widget');
function spidermag_slider_carousel_widget() {
    register_widget('spidermag_slider_carousel_block');
}
class spidermag_slider_carousel_block extends WP_Widget {

    /**
     ** Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_slider_carousel_block', esc_html__( 'SPMag : Banner Carousel FullWidth','spidermag' ), array(
            'description' => esc_html__('A widget that show carousel slider view', 'spidermag')
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
            'banner_start_group_left' => array(
                'spidermag_widgets_name' => 'banner_start_group_left',
                'spidermag_widgets_title' => esc_html__('Carousel Slider Banner Section', 'spidermag'),
                'spidermag_widgets_field_type' => 'group_start',
            ),
            'banner_carousel_block_category' => array(
              'spidermag_widgets_name' => 'banner_carousel_block_category',
              'spidermag_mulicheckbox_title' => esc_html__('Select Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),                       
            'banner_carousel_block_number_post' => array(
                'spidermag_widgets_name' => 'banner_carousel_block_number_post',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),
            'banner_carousel_block_post_order' => array(
                'spidermag_widgets_name' => 'banner_carousel_block_post_order',
                'spidermag_widgets_title' => esc_html__('Display Posts Orderby', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('desc' => 'Descending Order', 'asc' => 'Accessing Order')
            ),
            'banner_carousel_category_show' => array(
                'spidermag_widgets_name' => 'banner_carousel_category_show',
                'spidermag_widgets_title' => esc_html__('Check to Display Category', 'spidermag'),
                'spidermag_widgets_field_type' => 'checkbox',
            ),                      
            'banner_end_group_left' => array(
                'spidermag_widgets_name' => 'banner_end_group_left',
                'spidermag_widgets_field_type' => 'group_end',
            )
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        
        $banner_carousel_block_number_post = empty($instance['banner_carousel_block_number_post']) ? 6 : $instance['banner_carousel_block_number_post'] ;
        $banner_carousel_block_category    = empty($instance['banner_carousel_block_category']) ? 0 : $instance['banner_carousel_block_category'];
        $banner_carousel_block_post_order  = isset($instance['banner_carousel_block_post_order']) ? $instance['banner_carousel_block_post_order']:'desc';
        $banner_carousel_category_show     = isset($instance['banner_carousel_category_show']) ? $instance['banner_carousel_category_show'] : 0;
        

        
        $multi_left_cat_id = array();
        if(!empty($banner_carousel_block_category)){
            $multi_left_cat_id = array_keys(unserialize($banner_carousel_block_category));
        }

        $get_carousel_posts = new WP_Query( array(
            'posts_per_page'      => $banner_carousel_block_number_post,
            'post_type'           => 'post',
            'category__in'        => $multi_left_cat_id,
            'order'               => $banner_carousel_block_post_order,
            'ignore_sticky_posts' => true
        ));
        echo $before_widget;
    ?>   
        <div class="banner-outer-thumb  pull-left  wow fadeInLeft animated" data-wow-delay="0.5s" data-wow-offset="50">
            <div id="banner-thumbs" class="owlcarousel banner-thumbs">
                <?php if( $get_carousel_posts->have_posts() ) : while( $get_carousel_posts->have_posts() ): $get_carousel_posts->the_post(); ?>
                    <div class="item1">
                        <div class="box">
                            <h3 class="carousel-caption">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                    if( has_post_thumbnail() ){
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-carousel-slider', true);
                                ?>
                                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                <?php } ?>
                            </a>
                            <div class="overlay"></div>
                            <div class="overlay-info">
                                <?php if( $banner_carousel_category_show == 1) : ?>
                                    <div class="cat">
                                        <div class="category-caption">
                                            <?php spidermag_colored_category(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="info slider-meta">
                                    <?php spidermag_meta_options( array( 'time','comments' ) ); ?>                            
                                </div>
                            </div>
                        </div>
                    </div>                   
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div><!-- carousel end -->
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