<?php
/**
 ** Adds spidermag_first_block_widget widget.
*/
add_action('widgets_init', 'spidermag_first_block_widget');
function spidermag_first_block_widget() {
    register_widget('spidermag_first_block');
}
class spidermag_first_block extends WP_Widget {
    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_first_block', esc_html__('SPMag : First Block Section','spidermag'), array(
            'description' => esc_html__('A widget that shows category with thumbinal posts with video post format options', 'spidermag')
        ));
    }
    
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
                'spidermag_widgets_title' => esc_html__('First Block Section', 'spidermag'),
                'spidermag_widgets_field_type' => 'group_start',
            ),

            'first_block_title' => array(
                'spidermag_widgets_name' => 'first_block_title',
                'spidermag_widgets_title' => esc_html__('Block Title', 'spidermag'),
                'spidermag_widgets_field_type' => 'title',
            ),

            'first_block_category_left' => array(
              'spidermag_widgets_name' => 'first_block_category_left',
              'spidermag_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),

            'first_block_number_post_left' => array(
                'spidermag_widgets_name' => 'first_block_number_post_left',
                'spidermag_widgets_title' => esc_html__('Number of Posts to Display', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'first_block_post_left_order' => array(
                'spidermag_widgets_name' => 'first_block_post_left_order',
                'spidermag_widgets_title' => esc_html__('Display Posts Order', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('asc' => 'Accessing Order', 'desc' => 'Deaccessing Order')
            ),

            'first_block_category_show' => array(
                'spidermag_widgets_name' => 'first_block_category_show',
                'spidermag_widgets_title' => esc_html__('Check to Display Category', 'spidermag'),
                'spidermag_widgets_field_type' => 'checkbox',
            ), 

            'banner_end_group_left' => array(
                'spidermag_widgets_name' => 'banner_end_group_left',
                'spidermag_widgets_field_type' => 'group_end',
            ),
            
            //right side group (video)
            'banner_start_group_right' => array(
                'spidermag_widgets_name' => 'banner_start_group_right',
                'spidermag_widgets_title' => esc_html__('First Block Post Format Section', 'spidermag'),
                'spidermag_widgets_field_type' => 'group_start',
            ),

            'first_block_post_format_category' => array(
              'spidermag_widgets_name' => 'first_block_post_format_category',
              'spidermag_mulicheckbox_title' => esc_html__('Select Post Format Category', 'spidermag'),
              'spidermag_widgets_field_type' => 'multicheckboxes',
              'spidermag_widgets_field_options' => $mag_categories_lists
            ),
            
            'first_block_post_format_type' => array(
                'spidermag_widgets_name' => 'first_block_post_format_type',
                'spidermag_widgets_title' => esc_html__('Select Posts Format Type', 'spidermag'),
                'spidermag_widgets_field_type' => 'select',
                'spidermag_widgets_field_options' => array('image' => 'Image Type', 'link' => 'Link Type', 'video' => 'Video Type')
            ), 

            'first_block_right_number_post' => array(
                'spidermag_widgets_name' => 'first_block_right_number_post',
                'spidermag_widgets_title' => esc_html__('Number of Posts to Display', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
            ),

            'banner_end_group_right' => array(
                'spidermag_widgets_name' => 'banner_end_group_right',
                'spidermag_widgets_field_type' => 'group_end',
            ),           
        );
        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
    /**
     ** wp query for first block
    */
        $first_block_number_post_left = empty($instance['first_block_number_post_left']) ? 5 : $instance['first_block_number_post_left'];
        $first_block_category_left    = empty($instance['first_block_category_left']) ? 0 : $instance['first_block_category_left'];
        $first_block_post_left_order  = empty($first_block_post_left_order) ? 0: $first_block_post_left_order;
        
        $multi_left_cat_id = array();
        if(!empty($first_block_category_left)){
            $multi_left_cat_id = array_keys( unserialize($first_block_category_left));
        }

        $get_first_block_left_posts = new WP_Query( array(
            'posts_per_page'        => $first_block_number_post_left,
            'post_type'             => 'post',
            'category__in'          => $multi_left_cat_id,
            'order'                 => $first_block_post_left_order,
            'ignore_sticky_posts'   => true
        ));

        $first_block_right_number_post    = empty( $instance['first_block_right_number_post'] ) ? 5 : $instance['first_block_right_number_post'];
        $first_block_post_format_category = empty($instance['first_block_post_format_category'] ) ? 0: $instance['first_block_post_format_category'];        
        $first_block_post_format_type = empty($first_block_post_format_type) ? '': $first_block_post_format_type;
        $multi_right_cat_id = array();
        if(!empty($first_block_post_format_category)){
            $multi_right_cat_id = array_keys( unserialize( $first_block_post_format_category) );
        }
        $get_first_block_right_posts = new WP_Query( array(
            'posts_per_page'        => $first_block_right_number_post,
            'post_type'             => 'post',
            'category__in'          => $multi_right_cat_id,
            'ignore_sticky_posts'   => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array(
                        'post-format-'.$first_block_post_format_type,
                    )
                )
            )
        ));

        switch( $first_block_post_format_type ):
            case 'video':
                $right_post_icon = 'ion-ios7-film';
                break;
            case 'image':
                $right_post_icon = 'ion-image';
                break;
            case 'link':
                $right_post_icon = 'ion-link';
                break;
            default:
                $right_post_icon = 'ion-ios7-film';
        endswitch;

        echo $before_widget;
        $first_block_title = empty($first_block_title) ? "": $first_block_title;
        $first_block_category_show = empty($first_block_category_show) ? '': $first_block_category_show;
    ?>
        <div class="wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="50">
                <div class="main-title-outer pull-left">
                    <div class="main-title"><?php echo esc_html( $first_block_title ); ?></div>
                
                    <div class="span-outer">
                        <span class="pull-right text-danger last-update">
                            <span class="ion-android-data icon"></span>
                            <?php esc_html_e('Last update:','spidermag'); ?> 
                            <?php spidermag_get_spider_post_update_date( $multi_left_cat_id ); ?>
                        </span>
                    </div>
                </div>
                <div class="row margin-left">
                    <div class="col-md-11 col-sm-16">
                        <div class="row">
                            <?php $first_block_count = 1; if( $get_first_block_left_posts->have_posts() ){ while( $get_first_block_left_posts->have_posts() ){  $get_first_block_left_posts->the_post(); ?>
                            <?php if( $first_block_count == 1 ) { ?>
                            <div class="col-md-8 col-sm-9 col-xs-16">
                                <div class="topic">                                    
                                    <div class="box img-thumbnail">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php 
                                                if( has_post_thumbnail() ){
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-block-post', true);
                                            ?>
                                                <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                            
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <?php if( $first_block_category_show == 1 ){ ?>
                                        <div class="sub-info-bordered1"><?php spidermag_colored_category(); ?></div>
                                    <?php } ?>

                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    
                                    

                                    <div class="text-danger sub-info-bordered">
                                        <?php spidermag_meta_options( array( 'author','time','comments' ) ); ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8 col-sm-7 col-xs-16 spmag-hidden">
                                <ul class="list-unstyled">
                                    <?php } else { ?>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-5 box img-thumbnail">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                        <?php 
                                                            if( has_post_thumbnail() ){
                                                                the_post_thumbnail( array( 76,76 ), array( 'class'=>'pull-left' ) );
                                                            }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="col-sm-16 col-md-16 col-lg-11">
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="text-danger sub-info-bordered">
                                                    <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } $first_block_count++; } } wp_reset_postdata(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-16 hidden-sm hidden-xs left-bordered">
                        <div id="vid-thumbs" class="owlcarousel vid-thumbs">
                            <?php $right_count = 2; while( $get_first_block_right_posts->have_posts() ){ $get_first_block_right_posts->the_post(); ?>
                                <?php if($right_count % 2 == 0){ ?>
                                    <div class="item1">
                                        <div class="vid-thumb-outer">
                                    <?php } ?>
                                    <div class="vid-thumb">
                                        <div class="vid-box">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="thumb-box">
                                                    <span class="<?php echo esc_attr( $right_post_icon ); ?>"></span>
                                                    <?php 
                                                        if( has_post_thumbnail() ){
                                                            the_post_thumbnail( array( 385,237 ), array( 'class'=>'img-thumbnail img-responsive' ) );
                                                        }
                                                    ?>
                                                </div>
                                            </a>
                                        </div>
                                        <h4>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                    </div>
                                <?php if( $right_count%2 != 0 ){ ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php $right_count++; } wp_reset_postdata(); ?>
                        </div>
                    </div>
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