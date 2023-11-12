<?php
/* Customizer Custom Control Class Layout */

if(class_exists( 'WP_Customize_control')) {
    
    class Spidermag_Image_Radio_Control extends WP_Customize_Control {
        public $type = 'radioimage';
        public function render_content() {
            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
                <?php foreach ( $this->choices as $value => $label ) : ?>                
                        <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                            <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" <?php esc_url( $this->link() ); checked( $this->value(), $value ); ?>>
                            <img src="<?php echo esc_url( $label ); ?>"/>
                        </label>
                <?php endforeach; ?>
            </div>
            <?php 
        }
    } 


    class Spidermag_theme_Info_Text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }  

    /** 
     * Site Preloader 
    */
    class WP_Customize_Preloader_Control extends WP_Customize_Control {  

        public function render_content() {
            $preloaders = array( 'default', 'coffee', 'grid', 'horizon', 'list', 'rhombus', 'setting', 'square', 'text' );
            if ( empty( $preloaders ) )
            return;            
        ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>                
                <div class="cmizer-preloader-container">    
                    <?php foreach($preloaders as $preloader) : ?>
                        <span class="cmizer-preloader <?php if($preloader == $this->value()){ echo "active"; } ?>" preloader="<?php echo esc_attr( $preloader ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ).'/assets/images/preloader/'.esc_attr( $preloader ).'.gif'; ?>" />
                        </span>
                    <?php endforeach; ?>                        
                </div>
                <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </label>
        <?php
        }
    }

}