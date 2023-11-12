<?php

/**
 * @package Spider_Mag
 * Display in Tabbed Format Popular, Recent, Comments
 * Adds spidermag_tabbed_format_post_widget widget.
*/
add_action('widgets_init', 'spidermag_tabbed_format_post_widget');
function spidermag_tabbed_format_post_widget() {
    register_widget('spidermag_tabbed_format_post');
}
class spidermag_tabbed_format_post extends WP_Widget {
    /**
     ** Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_tabbed_format_post', esc_html__('SPMag : Tabbed Widgets','spidermag'), array(
            'description' => esc_html__('A widget that display the Recent, Random, Comments in tabbed format', 'spidermag')
          )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
    */
    private function widget_fields() {
        $fields = array(  
            
            'latest_tabbed_post_recent' => array(
                'spidermag_widgets_name' => 'latest_tabbed_post_recent',
                'spidermag_widgets_field_type' => 'checkbox',
                'spidermag_widgets_title' => esc_html__('Show Recent Posts', 'spidermag'),
            ),

            'latest_tabbed_post_random' => array(
                'spidermag_widgets_name' => 'latest_tabbed_post_random',
                'spidermag_widgets_field_type' => 'checkbox',
                'spidermag_widgets_title' => esc_html__('Show Random Posts', 'spidermag'),
            ),

            'latest_tabbed_post_comments' => array(
                'spidermag_widgets_name' => 'latest_tabbed_post_comments',
                'spidermag_widgets_field_type' => 'checkbox',
                'spidermag_widgets_title' => esc_html__('Show Comments', 'spidermag'),
            ),

            'latest_tabbed_number_post' => array(
                'spidermag_widgets_name' => 'latest_tabbed_number_post',
                'spidermag_widgets_title' => esc_html__('Number of Posts to Display', 'spidermag'),
                'spidermag_widgets_field_type' => 'number',
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

        $latest_tabbed_number_post   = empty($instance['latest_tabbed_number_post'])? 4 : $instance['latest_tabbed_number_post'];
        $latest_tabbed_post_popular  = empty($instance['latest_tabbed_post_random'])? '' : $instance['latest_tabbed_post_random'];
        $latest_tabbed_post_recent   = empty($instance['latest_tabbed_post_recent'])? '' : $instance['latest_tabbed_post_recent'];
        $latest_tabbed_post_comments = empty($instance['latest_tabbed_post_comments'])? '' : $instance['latest_tabbed_post_comments'];

        $get_random_posts = new WP_Query( array(
          'posts_per_page'        => $latest_tabbed_number_post,
          'post_type'             => 'post',
          'orderby'               => 'rand',
          'ignore_sticky_posts'   => true
        ));

        $get_recent_posts = new WP_Query( array(
            'post_type'      =>'post',
            'post_status'    =>'publish',
            'posts_per_page' => $latest_tabbed_number_post,
            'order'          => 'DESC',
            'ignore_sticky_posts' => true
        ));        

        echo $before_widget; 
    ?> 

    <div class="col-sm-16 wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="130">

        <div class="row">
          <ul class="nav nav-tabs nav-justified " role="tablist">

            <?php if( $latest_tabbed_post_recent == 1 ){ ?>

                <li><a href="#recent" role="tab" data-toggle="tab"><?php esc_html_e('Recent','spidermag'); ?></a></li>
           
           <?php } if( $latest_tabbed_post_popular == 1 ){ ?>

                <li class="active"><a href="#popular" role="tab" data-toggle="tab"><?php esc_html_e('popular','spidermag'); ?></a></li>
            
            <?php }  if( $latest_tabbed_post_comments == 1 ){ ?>

                <li><a href="#comments-tab" role="tab" data-toggle="tab"><?php esc_html_e('Comments','spidermag'); ?></a></li>
            
            <?php } ?>

          </ul>

        </div>

          <div class="tab-content"> 

            <?php if( $latest_tabbed_post_recent == 1 ){ ?>
              <div class="tab-pane" id="recent">
                <ul class="list-unstyled">
                  <?php 
                      if( $get_recent_posts->have_posts() ){ while( $get_recent_posts->have_posts() ){ $get_recent_posts->the_post();
                  ?>
                  <li> 
                      <div class="row">
                          <div class="col-sm-4 box img-thumbnail">                        
                              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                  <?php 
                                      if( has_post_thumbnail() ){
                                          the_post_thumbnail( array( 150, 150 ) );
                                      }
                                  ?>
                              </a>                                              
                          </div>
                          <div class="col-sm-12">
                              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                              <div class="f-sub-info">
                                  <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                              </div>
                          </div>
                      </div>
                  </li>
                  <?php } } wp_reset_postdata(); ?>               
                </ul>
              </div>
            <?php } ?>

            <?php if( $latest_tabbed_post_popular == 1 ){ ?>
              <div class="tab-pane active" id="popular">            
                  <ul class="list-unstyled">
                      <?php 
                          if( $get_random_posts->have_posts() ){  while( $get_random_posts->have_posts() ){ $get_random_posts->the_post();
                      ?>
                      <li> 
                          <div class="row">
                              <div class="col-sm-4 box img-thumbnail">                        
                                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                      <?php 
                                          if(has_post_thumbnail()){
                                              the_post_thumbnail(array(150, 150));
                                          }
                                      ?>
                                  </a>                                              
                              </div>
                              <div class="col-sm-12">
                                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                  <div class="f-sub-info">
                                      <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <?php } } wp_reset_postdata(); ?>                    
                  </ul>
              </div>
            <?php } ?>


            <div class="tab-pane" id="comments-tab">
              <ul class="list-unstyled">
                <?php 
                    $sp_comments = get_comments( array( 'number' => $latest_tabbed_number_post ) );
                    foreach($sp_comments as $comment  ) {
                ?>
                    <li>
                      <div class="row">
                        <div class="col-sm-5  col-md-4 ">
                            <?php echo get_avatar( get_the_author_meta('email', array( 'class'=>'img-thumbnail pull-left') ), 75 ); ?>
                        </div>
                        <div class="col-sm-11  col-md-12 ">
                          <h4><?php echo esc_html( $comment->comment_author ); ?></h4>
                          <p><?php echo wp_kses_post( $comment->comment_content) ; ?></p>
                        </div>
                      </div>
                    </li>
                <?php } ?>
              </ul>
            </div>

          </div>
        </div><!-- activities end -->
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
        // Loop through fields
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            // Use helper function to get updated field values
            $instance[$spidermag_widgets_name] = spidermag_widgets_updated_field_value($widget_field, $new_instance[$spidermag_widgets_name]);
        }
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    spidermag_widgets_show_widget_field()        defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();
        // Loop through fields
        foreach ($widget_fields as $widget_field) {
            // Make array elements available as variables
            extract($widget_field);
            $spidermag_widgets_field_value = !empty($instance[$spidermag_widgets_name]) ? esc_attr($instance[$spidermag_widgets_name]) : '';
            spidermag_widgets_show_widget_field($this, $widget_field, $spidermag_widgets_field_value);
        }
    }
}