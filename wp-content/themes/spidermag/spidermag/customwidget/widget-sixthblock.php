<?php
/**
 ** Adds spidermag_six_block_widget widget.
*/
add_action('widgets_init', 'spidermag_six_block_widget');
function spidermag_six_block_widget() {
    register_widget('spidermag_six_block');
}
class spidermag_six_block extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_six_block',  esc_html__( 'SPMag : Six Block Section','spidermag'), array(
            'description' => esc_html__('A widget that shows category Posts with single large images list view', 'spidermag')
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

            'six_block_title' => array(
                'spidermag_widgets_name' => 'six_block_title',
                'spidermag_widgets_title' => esc_html__('Title', 'spidermag'),
                'spidermag_widgets_field_type' => 'title',
            ),

            'six_block_list_category' => array(
              'spidermag_widgets_name' => 'six_block_list_category',
              'spidermag_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),

            'six_block_number_post' => array(
                'spidermag_widgets_name' => 'six_block_number_post',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'six_block_post_order' => array(
                'spidermag_widgets_name' => 'six_block_post_order',
                'spidermag_widgets_title' => esc_html__('Display Posts Order', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('desc' => 'Deaccessing Order', 'asc' => 'Accessing Order' )
            ),

            'six_block_alternative_show' => array(
                'spidermag_widgets_name' => 'six_block_alternative_show',
                'spidermag_widgets_title' => esc_html__('Check to Display Alternative Post', 'spidermag'),
                'spidermag_widgets_field_type' => 'checkbox',
            )
                 
        );
        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $six_block_title         = empty( $instance['six_block_title'] ) ? '' : $instance['six_block_title'];
        $six_block_number_post   = empty( $instance['six_block_number_post'] ) ? 4 : $instance['six_block_number_post'];
        $six_block_post_order    = empty( $instance['six_block_post_order'] ) ? 'des ' : $instance['six_block_post_order'];
        $six_block_list_category = empty($instance['six_block_list_category']) ? 0 : $instance['six_block_list_category'];        
        $six_block_alternative_show = empty( $instance['six_block_alternative_show'] ) ? '' : $instance['six_block_alternative_show'];


        $multi_left_cat_id = array();
        if(!empty($six_block_list_category)){
            $multi_left_cat_id = array_keys( unserialize($six_block_list_category));
        }

        $get_grid_list_posts = new WP_Query( array(
            'posts_per_page'        => $six_block_number_post,
            'post_type'             => 'post',
            'category__in'          => $multi_left_cat_id,
            'order'                 => $six_block_post_order,
            'ignore_sticky_posts'   => true
        ) );
      
        echo $before_widget; ?>

        <div class="col-md-16 col-sm-16">
           
            <?php if( !empty( $six_block_title ) ){ ?>
                <div class="main-title-outer pull-left">
                    <div class="main-title"><?php echo esc_html( $six_block_title ); ?></div>
                    <div class="span-outer"><span class="pull-right text-danger last-update">
                        <span class="ion-android-data icon"></span><?php esc_html_e('Last update:','spidermag'); ?>
                            <?php spidermag_get_spider_post_update_date( $multi_left_cat_id ); ?>
                        </span>
                    </div>
                </div>
            <?php } ?>

                <?php $count = 0; if( $get_grid_list_posts->have_posts() ){ while( $get_grid_list_posts->have_posts() ){ $get_grid_list_posts->the_post(); ?>
                    <div class="row">

                        <div class="col-sm-8 box img-thumbnail <?php if( !empty( $six_block_alternative_show ) ){ if($count%2 == 0){ echo 'pull-left'; } else { echo 'pull-right'; } } ?>">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                    if( has_post_thumbnail() ){
                                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'spidermag-main-banner', true);
                                ?>
                                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                <?php } ?>
                            </a>
                        </div>

                        <div class="col-sm-8 <?php if( !empty( $six_block_alternative_show ) ){ if($count%2 == 0){ echo 'pull-left'; } else { echo 'pull-right'; } } ?>">     
                            <div class="content-wrap">
                                <div class="sec-info">
                                    <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                    <div class="text-danger sub-info-bordered">
                                        <?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
                                    </div>
                                </div>

                                <div class="spidermag-sixblock-text">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php $count++; } } wp_reset_postdata(); ?>
        </div>
    <?php 
        echo $after_widget;
    }
    
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        // Loop through fields
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            // Use helper function to get updated field values
            $instance[$spidermag_widgets_name] = spidermag_widgets_updated_field_value($widget_field, $new_instance[$spidermag_widgets_name]);
        }

        return $instance;
    }

    public function form($instance) {
        $widget_fields = $this->widget_fields();
        // Loop through fields
        foreach ($widget_fields as $widget_field) {
            // Make array elements available as variables
            extract($widget_field);
            $spidermag_widgets_field_value = !empty($instance[$spidermag_widgets_name]) ? $instance[$spidermag_widgets_name] : '';
            spidermag_widgets_show_widget_field($this, $widget_field, $spidermag_widgets_field_value);
        }
    }
}