<?php
/**
 ** Adds spidermag_five_block_widget widget.
*/
add_action('widgets_init', 'spidermag_five_block_widget');
function spidermag_five_block_widget() {
    register_widget('spidermag_five_block');
}
class spidermag_five_block extends WP_Widget {
    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_five_block', esc_html__( 'SPMag : Five Block Section','spidermag' ), array(
            'description' => esc_html__('A widget that shows category Posts with one large image and thumbnail in list view', 'spidermag')
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

            'five_block_title' => array(
                'spidermag_widgets_name' => 'five_block_title',
                'spidermag_widgets_title' => esc_html__('Title', 'spidermag'),
                'spidermag_widgets_field_type' => 'title',
            ),

            'five_block_list_category' => array(
              'spidermag_widgets_name' => 'five_block_list_category',
              'spidermag_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),

            'five_block_number_post' => array(
                'spidermag_widgets_name' => 'five_block_number_post',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'five_block_post_order' => array(
                'spidermag_widgets_name' => 'five_block_post_order',
                'spidermag_widgets_title' => esc_html__('Display Posts Order', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('desc' => 'Deaccessing Order', 'asc' => 'Accessing Order' )
            ),

            'five_block_category_show' => array(
                'spidermag_widgets_name' => 'five_block_category_show',
                'spidermag_widgets_title' => esc_html__('Check to Display Category', 'spidermag'),
                'spidermag_widgets_field_type' => 'checkbox',
            )

        );
        return $fields;
    }
    public function widget($args, $instance) {
        extract( $args );
        extract($instance);
        $five_block_number_post   = empty($instance['five_block_number_post'])? 5 : $instance['five_block_number_post'];
        $five_block_list_category = empty($instance['five_block_list_category']) ? 0 : $instance['five_block_list_category'];
        $five_block_post_order = empty($five_block_post_order) ? "asc": $five_block_post_order;
        $multi_left_cat_id = array();
        if(!empty($five_block_list_category)){
            $multi_left_cat_id = array_keys( unserialize($five_block_list_category));
        }
        $get_grid_list_posts = new WP_Query( array(
            'posts_per_page'        => $five_block_number_post,
            'post_type'             => 'post',
            'category__in'          => $multi_left_cat_id,
            'order'                 => $five_block_post_order,
            'ignore_sticky_posts'   => true
        ) );
      
        echo $before_widget; 
        $five_block_title = empty($five_block_title) ? "" : $five_block_title;
        $five_block_category_show = empty($five_block_category_show) ? 0 : $five_block_category_show;
        ?>

        <div class="five-block-section">
            <?php if( $five_block_title ) : ?>
                <div class="main-title-outer pull-left">
                    <div class="main-title"><?php echo esc_html( $five_block_title ); ?></div>
                    
                    <div class="span-outer">
                        <span class="pull-right text-danger last-update">
                        <span class="ion-android-data icon"></span><?php esc_html_e('Last update:','spidermag'); ?> 
                            <?php spidermag_get_spider_post_update_date( $multi_left_cat_id );?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="margin-left">
                <?php 
                    $i = 1;
                        while( $get_grid_list_posts->have_posts() ){ $get_grid_list_posts->the_post();
                    if ($i == 1) {
                ?>
                <div class="col-md-8 col-sm-8 col-xs-16 wow fadeInLeft animated science animated first-col">
                    <div class="topic">
                        <div class="box img-thumbnail">
                            <a href="<?php the_permalink(); ?>">                                     
                                <?php 
                                    if(has_post_thumbnail()){
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-main-banner', true);
                                ?>
                                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                
                                <?php } ?>
                            </a>
                        </div>
                        <?php if($five_block_category_show == 1){ ?>
                            <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>
                        <?php } ?> 
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

                        <div class="text-danger sub-info-bordered">
                            <?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
                        </div>

                        <?php the_excerpt(); ?>

                    </div>
                </div>                          
                <?php } else{ 
                        if ( $i==2 ) 
                        echo '<div class="col-md-8 col-sm-8 col-xs-16 wow fadeInRight animated animated second-col"><ul class="list-unstyled">'; ?>
                            <li>                                        
                                <div class="row">
                                    <div class="col-lg-5 col-sm-4 col-md-4 box img-thumbnail hidden-sm">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php 
                                                if(has_post_thumbnail()){
                                                    the_post_thumbnail( array(150, 150) );
                                                }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="col-lg-11 col-sm-12 col-md-12">
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="text-danger sub-info-bordered">
                                            <?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                <?php }  $i++; } if ( $i > 2 ) { echo '</ul></div>'; }?>
            </div>                
        </div>
        <?php  wp_reset_postdata();

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