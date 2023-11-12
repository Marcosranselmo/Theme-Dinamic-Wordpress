<?php
/**
 ** Adds spidermag_second_block_widget widget.
*/
add_action('widgets_init', 'spidermag_second_block_widget');
function spidermag_second_block_widget() {
    register_widget('spidermag_second_block');
}
class spidermag_second_block extends WP_Widget {
    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_second_block', esc_html__( 'SPMag : Second Block Section','spidermag' ), array(
            'description' => esc_html__('A widget that shows category with thumbinal posts right and left side', 'spidermag')
        ) );
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
                'spidermag_widgets_title' => esc_html__('Left Block Section', 'spidermag'),
                'spidermag_widgets_field_type' => 'group_start',
            ),

            'second_block_title_left' => array(
                'spidermag_widgets_name' => 'second_block_title_left',
                'spidermag_widgets_title' => esc_html__('Title', 'spidermag'),
                'spidermag_widgets_field_type' => 'title',
            ),

            'second_block_category_left' => array(
              'spidermag_widgets_name' => 'second_block_category_left',
              'spidermag_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ), 

            'second_block_number_post_left' => array(
                'spidermag_widgets_name' => 'second_block_number_post_left',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'second_block_post_order_left' => array(
                'spidermag_widgets_name' => 'second_block_post_order_left',
                'spidermag_widgets_title' => esc_html__('Display Posts Order', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('desc' => 'Deaccessing Order', 'asc' => 'Accessing Order')
            ),
                        
            'banner_end_group_left' => array(
                'spidermag_widgets_name' => 'banner_end_group_left',
                'spidermag_widgets_field_type' => 'group_end',
            ),
            
            //right section block
            'banner_start_group_right' => array(
                'spidermag_widgets_name' => 'banner_start_group_right',
                'spidermag_widgets_title' => esc_html__('Right Block Section', 'spidermag'),
                'spidermag_widgets_field_type' => 'group_start',
            ),

            'second_block_title_right' => array(
                'spidermag_widgets_name' => 'second_block_title_right',
                'spidermag_widgets_title' => esc_html__('Title', 'spidermag'),
                'spidermag_widgets_field_type' => 'title',
            ),

            'second_block_category_right' => array(
              'spidermag_widgets_name' => 'second_block_category_right',
              'spidermag_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),

            'second_block_number_post_right' => array(
                'spidermag_widgets_name' => 'second_block_number_post_right',
                'spidermag_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'second_block_post_order_right' => array(
                'spidermag_widgets_name' => 'second_block_post_order_right',
                'spidermag_widgets_title' => esc_html__('Display Posts Order', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('desc' => 'Deaccessing Order', 'asc' => 'Accessing Order' )
            ), 

            'banner_end_group_right' => array(
                'spidermag_widgets_name' => 'banner_end_group_right',
                'spidermag_widgets_field_type' => 'group_end',
            ),

            'second_block_category_show' => array(
                'spidermag_widgets_name' => 'second_block_category_show',
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
        extract($instance);

        $second_block_number_post_left = empty( $instance['second_block_number_post_left'] ) ? 4 : $instance['second_block_number_post_left'];
        $second_block_post_order_left  = empty( $instance['second_block_post_order_left'] ) ? 'desc' : $instance['second_block_post_order_left'];
        $second_block_category_left    = empty($instance['second_block_category_left']) ? 0 : $instance['second_block_category_left'];   

        $multi_left_cat_id = array();
        if(!empty($second_block_category_left)){
            $multi_left_cat_id = array_keys( unserialize($second_block_category_left));
        }

        // left section
        $get_left_section_posts = new WP_Query( array(
            'posts_per_page'        => $second_block_number_post_left,
            'post_type'             => 'post',
            'category__in'          => $multi_left_cat_id,
            'order'                 => $second_block_post_order_left,
            'ignore_sticky_posts' => true
        ) );

        $second_block_number_post_right = empty( $instance['second_block_number_post_right'] ) ? 4 : $instance['second_block_number_post_right'];
        $second_block_post_order_right  = empty( $instance['second_block_post_order_right'] ) ? 'desc' : $instance['second_block_post_order_right'];
        $second_block_category_right    = empty($instance['second_block_category_right']) ? 0 : $instance['second_block_category_right'];       

        $multi_right_cat_id = array();
        if(!empty($second_block_category_right)){
            $multi_right_cat_id = array_keys( unserialize($second_block_category_right));
        }
        // right section
        $get_right_section_posts = new WP_Query( array(
            'posts_per_page'        => $second_block_number_post_right,
            'post_type'             => 'post',
            'category__in'          => $multi_right_cat_id,
            'order'                 => $second_block_post_order_right,
            'ignore_sticky_posts' => true
        ) );
      
        echo $before_widget;
        $second_block_title_left = empty( $second_block_title_left ) ? "" : $second_block_title_left;
        $second_block_title_right = empty($second_block_title_right) ? "" : $second_block_title_right;
        $second_block_category_show = empty($second_block_category_show) ? 0 : $second_block_category_show;
        ?>
        <div class="col-sm-16">
            <div class="row">
                <div class="col-xs-16 col-sm-8  wow fadeInLeft animated science" data-wow-delay="0.5s" data-wow-offset="130">
                    <div class="main-title-outer pull-left">
                        <di class="col-md-16 col-sm-16">
                            <div class="main-title"><?php echo esc_html( $second_block_title_left ); ?></div>
                            <div class="span-outer">
                                <span class="pull-right text-danger last-update">
                                <span class="ion-android-data icon"></span><?php esc_html_e('Last update:','spidermag'); ?> 
                                <?php spidermag_get_spider_post_update_date($multi_left_cat_id); ?>
                                </span>
                            </div>
                        </di>
                    </div>
                    <div class="row">
                    <?php $i=1; while( $get_left_section_posts->have_posts() ){ $get_left_section_posts->the_post();
                        if ($i == 1) { 
                    ?>
                        <div class="topic col-sm-16">
                            <div class="box img-thumbnail">
                                <a href="<?php the_permalink();?>">                                
                                    <?php 
                                        if(has_post_thumbnail()){
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'spidermag-main-banner', true);
                                    ?>
                                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                   
                                    <?php } ?>
                                </a>
                            </div>
                            <?php if($second_block_category_show == 1){ ?>
                                <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>
                            <?php } ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            
                                <div class="text-danger sub-info-bordered ">
                                    <?php spidermag_meta_options( array( 'author','time','comments') ); ?>
                                </div>

                            <?php the_excerpt();?>

                        </div>
                        <div class="col-sm-16">
                            <ul class="list-unstyled">
                                <?php } else { ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-5 col-sm-4 col-md-4 box img-thumbnail">
                                                <a href="<?php the_permalink();?>">
                                                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( array( 150,150 ), array( 'class' => 'pull-left') ); } ?>
                                                </a>
                                            </div>
                                            <div class="col-lg-11 col-sm-12 col-md-12">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                                <div class="text-danger sub-info-bordered">
                                                   <?php spidermag_meta_options( array( 'author','time' ) ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } $i++; } wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-xs-16 wow fadeInRight animated" data-wow-delay="0.5s" data-wow-offset="130">
                    <div class="main-title-outer pull-left">
                        <div class="col-md-16 col-sm-16">
                            <div class="main-title"><?php echo esc_html($second_block_title_right); ?></div>
                        </div>
                        <div class="span-outer">
                            <span class="pull-right text-danger last-update">
                                <span class="ion-android-data icon"></span><?php esc_html_e('Last update:','spidermag'); ?> <?php spidermag_get_spider_post_update_date($multi_right_cat_id);?></span>
                        </div>
                    </div>
                    <div class="row left-bordered">
                    <?php 
                        $j=1; while( $get_right_section_posts->have_posts() ){ $get_right_section_posts->the_post();
                        if ($j == 1) {
                    ?>
                            <div class="topic col-sm-16">
                                <div class="box img-thumbnail">
                                    <a href="<?php the_permalink();?>">
                                        <?php 
                                            if( has_post_thumbnail() ){
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'spidermag-main-banner', true);
                                        ?>
                                            <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                        <?php } ?>
                                    </a>
                                </div>
                                <?php if( $second_block_category_show == 1 ){ ?>
                                    <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>
                                <?php }  ?>
                                 <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>

                                

                                    <div class="text-danger sub-info-bordered ">
                                        <?php spidermag_meta_options( array( 'author','time','comments') ); ?>
                                    </div>

                                <?php the_excerpt();?>

                            </div>

                            <div class="col-sm-16">
                                <ul class="list-unstyled">
                                    <?php } else { ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-4 col-md-4 box img-thumbnail">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( array( 150,125 ), array( 'class' => 'pull-left' ) ); } ?>
                                                    </a>
                                                </div>
                                                <div class="col-lg-11 col-sm-12 col-md-12">     

                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

                                                    <div class="text-danger sub-info-bordered">

                                                        <?php spidermag_meta_options( array( 'author','time' ) ); ?>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } $j++; } wp_reset_postdata(); ?>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>            
        </div>
        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    spidermag_widgets_updated_field_value()      defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
    */
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