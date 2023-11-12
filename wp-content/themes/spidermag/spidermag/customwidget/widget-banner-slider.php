<?php
/**
 * Banner Slider with Latest Posts Widget.
*/
add_action('widgets_init', 'spidermag_slider_block_widget');
function spidermag_slider_block_widget() {
    register_widget('spidermag_slider_block');
}
class spidermag_slider_block extends WP_Widget {
    /**
     ** Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_slider_block', esc_html__('SPMag : Banner Slider With Latest Posts', 'spidermag' ), array(
            'description' => esc_html__('A widget that show category slider thumbinal posts with latest posts', 'spidermag')
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

            'carousel_block_category' => array(
              'spidermag_widgets_name' => 'carousel_block_category',
              'spidermag_mulicheckbox_title' => esc_html__('Select Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ), 

            'carousel_block_number_post' => array(
                'spidermag_widgets_name' => 'carousel_block_number_post',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'carousel_block_post_order' => array(
                'spidermag_widgets_name' => 'carousel_block_post_order',
                'spidermag_widgets_title' => esc_html__('Display Posts Orderby', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array( 'desc' => 'Descending Order' , 'asc' => 'Accessing Order' )
            ),

            'banner_block_category_show' => array(
                'spidermag_widgets_name' => 'banner_block_category_show',
                'spidermag_widgets_title' => esc_html__('Check to Display Category', 'spidermag'),
                'spidermag_widgets_field_type' => 'checkbox',
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
        $carousel_number_post        = empty( $instance['carousel_block_number_post'] ) ? 5 : $instance['carousel_block_number_post'];
        $carousel_category           = empty( $instance['carousel_block_category'] ) ? '' : $instance['carousel_block_category'];
        $carousel_block_post_order   = empty( $instance['carousel_block_post_order'] ) ? 'desc' : $instance['carousel_block_post_order'];
        $banner_block_category_show  = empty( $instance['banner_block_category_show'] ) ? '' : $instance['banner_block_category_show'];
        
        $multi_left_cat_id = array();
        if(!empty($carousel_category)){
            $multi_left_cat_id = array_keys( unserialize($carousel_category ));
        }

        $get_featured_posts = new WP_Query( array(
            'posts_per_page' => $carousel_number_post,
            'post_type'      => 'post',
            'category__in'   => $multi_left_cat_id,
            'order'          => $carousel_block_post_order,
            'ignore_sticky_posts' => true
        ));

        $latest_posts = new WP_Query( array(
            'posts_per_page'      => 4,
            'post_type'           => 'post',
            'ignore_sticky_posts' => true          
        )); 

    echo $before_widget; ?>

        <div class="col-sm-16 col-md-8 col-lg-8">

            <div id="sync1" class="owlcarousel cS-hidden spider_slider">
                
                <?php 
                    if( $get_featured_posts->have_posts() ){ while( $get_featured_posts->have_posts() ){ $get_featured_posts->the_post(); 
                    $thumninal = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-block-post', true);
                ?>
                
                <div class="box item" data-thumb="<?php echo esc_url( $thumninal[0] ); ?>">  

                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                        <h3 class="carousel-caption"><?php the_title(); ?></h3>

                        <?php if( has_post_thumbnail() ){

                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-main-banner', true );
                        ?>
                            <img class="img-responsive" src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                        
                        <?php } ?>
                    </a>

                    <div class="overlay"></div>
                    
                    <?php if( $banner_block_category_show == 1 ){ ?>
                        <div class="cat">
                            <div class="category-caption"><?php spidermag_colored_category(); ?></div>
                        </div>
                    <?php } ?> 

                    <div class="slider-meta">
                        <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                    </div>

                </div>

                <?php } } wp_reset_postdata(); ?>

            </div>

        </div>

        <div class="col-sm-16 col-md-8 col-lg-8">
            <div class="row">
                <?php 
                    if( $latest_posts->have_posts() ){ while( $latest_posts->have_posts() ){ $latest_posts->the_post();

                    if( has_post_thumbnail() ){
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-banner-latest', true);
                    }
                ?>
                    <div class="col-sm-8 right-img-top">

                        <div class="box" style="background-image:url('<?php echo esc_url( $image[0] ); ?>'); ">
                            
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="carousel-caption"><?php the_title();?></h3>
                            </a>

                            <div class="overlay"></div>

                            <?php if($banner_block_category_show ==1) { ?>
                                <div class="cat">
                                    <div class="category-caption"><?php spidermag_colored_category(); ?></div>
                                </div>
                            <?php } ?>   

                            <div class="slider-meta">
                                <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                            </div>

                        </div>

                    </div>

                <?php } } wp_reset_postdata(); ?>
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
