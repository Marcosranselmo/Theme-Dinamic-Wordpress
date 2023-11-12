<?php
/**
 * @package Spider_Mag
 */
function spidermag_widgets_show_widget_field($instance = '', $widget_field = '', $spidermag_field_value = '') {
   
    /**
     * list category list in array
    */
    $spidermag_category_list[0] = array(
        'value' => 0,
        'label' => '--choose--'
    );
    $spidermag_posts = get_categories();
    foreach ($spidermag_posts as $spidermag_post) :
        $spidermag_category_list[$spidermag_post->term_id] = array(
            'value' => $spidermag_post->term_id,
            'label' => $spidermag_post->name
        );
    endforeach;

    extract($widget_field);

    switch ($spidermag_widgets_field_type) {

        /**
         * Standard text field
        */
        case 'text' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ) ; ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" type="text" value="<?php echo esc_attr( $spidermag_field_value ) ; ?>" />

                <?php if ( isset( $spidermag_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * title fields
        */
        case 'title' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" type="text" value="<?php echo esc_attr( $spidermag_field_value ); ?>" />

                <?php if ( isset( $spidermag_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * Group Start
        */
        case 'group_start' :
        ?>
            <div class="bizintro-main-group" id="ap-font-awesome-list <?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>">
                <div class="bizintro-main-group-heading" style="font-size: 15px;  font-weight: bold;  padding-top: 12px;"><?php echo esc_html( $spidermag_widgets_title ) ; ?><span class="toogle-arrow"></span></div>
                <div class="bizintro-main-group-wrap">

        <?php
        break;

        case 'group_end':
        ?></div>
        </div><?php
        break;

        /**
         * Standard url field
        */
        case 'url' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" type="text" value="<?php echo esc_url( $spidermag_field_value ); ?>" />

                <?php if ( isset( $spidermag_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * Textarea field
        */
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?>:</label>
                <textarea class="widefat" rows="<?php echo esc_attr( $spidermag_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_field_value ); ?></textarea>
            </p>
            <?php
            break;

        /**
         * Checkbox field
        */
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" type="checkbox" value="1" <?php checked('1', $spidermag_field_value); ?>/>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?></label>

                <?php if ( isset( $spidermag_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * Radio fields
        */
        case 'radio' :
            ?>
            <p>
                <?php
                    echo esc_html( $spidermag_widgets_title );
                    echo '<br />';
                    foreach ( $spidermag_widgets_field_options as $spidermag_option_name => $athm_option_title ) {
                ?>
                    <input id="<?php echo esc_attr( $instance->get_field_id( $spidermag_option_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" type="radio" value="<?php echo esc_attr( $spidermag_option_name ); ?>" <?php checked($spidermag_option_name, $spidermag_field_value); ?> />
                    <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_option_name ) ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
                    <br />
                <?php } ?>

                <?php if ( isset( $spidermag_widgets_description ) ) { ?>
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * Select field
        */
        case 'select' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?>:</label>
                <select name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" class="widefat">
                    <?php foreach ( $spidermag_widgets_field_options as $spidermag_option_name => $athm_option_title) { ?>
                        <option value="<?php echo esc_attr( $spidermag_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_option_name ) ); ?>" <?php selected($spidermag_option_name, $spidermag_field_value); ?>><?php echo esc_html( $athm_option_title ); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($spidermag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /**
         * Number field
        */
        case 'number' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?>:</label><br />
                <input name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" type="number" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" value="<?php echo intval( $spidermag_field_value ); ?>" class="widefat" />

                <?php if (isset($spidermag_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;        

        /**
         * Select category field
        */
        case 'select_category' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>"><?php echo esc_html( $spidermag_widgets_title ); ?>:</label>
                <select name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" class="widefat">
                    <?php foreach ( $spidermag_category_list as $spidermag_single_post ) { ?>
                        <option value="<?php echo esc_attr( $spidermag_single_post['value'] ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $spidermag_single_post['label'] ) ); ?>" <?php selected( $spidermag_single_post['value'], $spidermag_field_value); ?>><?php echo esc_html( $spidermag_single_post['label'] ); ?></option>
                    <?php } ?>
                </select>

                <?php if ( isset( $spidermag_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $spidermag_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        /** 
         * Multi checkboxes
        */
        case 'multicheckboxes':
            $spidermag_field_value = unserialize($spidermag_field_value);
            if( isset( $spidermag_mulicheckbox_title ) ) {
            ?>
                <label><?php echo esc_html( $spidermag_mulicheckbox_title ); ?>:</label>
            <?php
            }
            echo '<div class="spidermag-multiplecat">';
                foreach ( $spidermag_widgets_field_options as $spidermag_option_name => $athm_option_title) {
                    if( isset( $spidermag_field_value[$spidermag_option_name] ) ) {
                        $spidermag_field_value[$spidermag_option_name] = 1;
                    }else{
                        $spidermag_field_value[$spidermag_option_name] = 0;
                    }                
                ?>
                    <p>
                        <input id="<?php echo esc_attr( $instance->get_field_id( $spidermag_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $spidermag_widgets_name ).'['.$spidermag_option_name.']' ); ?>" type="checkbox" value="1" <?php checked('1', $spidermag_field_value[$spidermag_option_name]); ?>/>
                        <label for="<?php echo esc_attr( $instance->get_field_id( $spidermag_option_name ) ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
                    </p>
                <?php
                    }
            echo '</div>';
                if ( isset( $spidermag_widgets_description ) ) {
            ?>
                    <small><em><?php echo esc_html( $spidermag_widgets_description ); ?></em></small>
            <?php
                }            
        break;

        /**
         * Image Upload field
        */
        case 'upload' :

            $output = '';
            $id = $instance->get_field_id($spidermag_widgets_name);
            $class = '';
            $int = '';
            $value = $spidermag_field_value;
            $name = $instance->get_field_name($spidermag_widgets_name);

            if ($value) {
                $class = ' has-file';
            }
            $output .= '<div class="sub-option section widget-upload">';
            $output .= '<label for="'.$instance->get_field_id($spidermag_widgets_name).'">'.$spidermag_widgets_title.'</label><br/>';
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . esc_attr__('No file chosen', 'spidermag') . '" />' . "\n";
            
            if (function_exists('wp_enqueue_media')) {
                if (( $value == '')) {
                    $output .= '<input id="upload-' . $id . '" class="upload-button-wdgt button" type="button" value="' . esc_attr__('Upload', 'spidermag') . '" />' . "\n";
                } else {
                    $output .= '<input id="remove-' . $id . '" class="remove-file button" type="button" value="' . esc_attr__('Remove', 'spidermag') . '" />' . "\n";
                }
            } else {
                $output .= '<p><i>' . esc_html__('Upgrade your version of WordPress for full media support.', 'spidermag') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . $id . '-image">' . "\n";
            if ($value != '') {
                $remove = '<a class="remove-image">' . esc_html__('Remove', 'spidermag') . '</a>';
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                    $output .= '<img src="' . $value . '" alt="" />' . $remove;
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }
                    $output .= '';
                    $title = esc_html__('View File', 'spidermag');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";

            echo wp_kses_data( $output );

            break;
    }
}

function spidermag_widgets_updated_field_value($widget_field, $new_field_value) {
    extract($widget_field);

    if ($spidermag_widgets_field_type == 'number') {
        return absint($new_field_value);

    } elseif ($spidermag_widgets_field_type == 'textarea') {
        if (!isset($spidermag_widgets_allowed_tags)) {
            $spidermag_widgets_allowed_tags = '<p><strong><em><a>';
        }
        return wp_kses_data($new_field_value, $spidermag_widgets_allowed_tags);
    } 
    elseif ($spidermag_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    }
    elseif ($spidermag_widgets_field_type == 'title') {
        return wp_kses_post($new_field_value);
    }
    elseif ($spidermag_widgets_field_type == 'multicheckboxes') {
        return serialize($new_field_value);
    }
    else {
        return wp_kses_data($new_field_value);
    }
}

/** 
 * widget-banner-carousel-fullwidth
*/
require spidermag_file_directory('spidermag/customwidget/widget-banner-carousel-fullwidth.php');

/** 
 * widget-banner-slider
*/
require spidermag_file_directory('spidermag/customwidget/widget-banner-slider.php');

/** 
 * widget-latest random
*/
require spidermag_file_directory('spidermag/customwidget/widget-latest-random.php');

/** 
 * widget-tabbed
*/
require spidermag_file_directory('spidermag/customwidget/widget-tabbed.php');

/** 
 * widget-first block
*/
require spidermag_file_directory('spidermag/customwidget/widget-firstblock.php');

/** 
 * widget-second block
*/
require spidermag_file_directory('spidermag/customwidget/widget-secondblock.php');

/** 
 * widget-third block
*/
require spidermag_file_directory('spidermag/customwidget/widget-thirdblock.php');

/** 
 * widget-five block
*/
require spidermag_file_directory('spidermag/customwidget/widget-fifthblock.php');

/** 
 * widget-six block
*/
require spidermag_file_directory('spidermag/customwidget/widget-sixthblock.php');

/** 
 * widget-eight block
*/
require spidermag_file_directory('spidermag/customwidget/widget-eightblock.php');


/**
 * Enqueue scripts for file uploader
*/
if ( ! function_exists( 'spidermag_media_scripts' ) ) {
    function spidermag_media_scripts( $hook ) {
        if( 'widgets.php' != $hook )
        return;
        if ( function_exists( 'wp_enqueue_media') )
        wp_enqueue_media();
        wp_enqueue_style( 'spidermag_customizer_style', get_template_directory_uri() . '/assets/css/spidermag-customizer.css');
        wp_register_script('media-uploader', get_template_directory_uri() . '/assets/js/media-uploader.js', array('jquery'), 1.70);
        wp_enqueue_script('media-uploader');
        wp_localize_script('media-uploader', 'spidermag_remove', array(
            'upload' => esc_html__('Upload', 'spidermag'),
            'remove' => esc_html__('Remove', 'spidermag')
        ));    
    }
}
add_action('admin_enqueue_scripts', 'spidermag_media_scripts');