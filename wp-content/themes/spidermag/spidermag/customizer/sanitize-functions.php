<?php
// archive layout sanitization
function spidermag_layout_archive_sanitize($input) {
  $valid_keys = array(
     'normal'  => esc_html__('Normal View','spidermag'),
     'masonry' => esc_html__('Masonry View','spidermag')
  );

  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

// web layout sanitization
function spidermag_web_layout_sanitize($input) {
  $valid_keys = array(
     'boxed' => esc_html__('Boxed', 'spidermag'),
     'fullwidth' => esc_html__('Full Width', 'spidermag')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

// Text sanitization
function spidermag_text_sanitize( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// Excerpt radio button sanitization
function spidermag_radio_sanitize_light($input) {
  $valid_keys = array(
     'photoswiper' => esc_html__('Photo Swiper Lightbox', 'spidermag'),
     'lightgallery' => esc_html__('Light Gallery', 'spidermag')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

// Excerpt radio button sanitization
function spidermag_radio_sanitize_excerpt($input) {
  $valid_keys = array(
     'onwords' => esc_html__('On Words', 'spidermag'),
     'onletter' => esc_html__('On Letters', 'spidermag')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

// Radio button sanitization
function spidermag_related_posts_sanitize($input) {
  $valid_keys = array(
     'categories' => esc_html__('Related Posts By Categories', 'spidermag'),
     'tags'       => esc_html__('Related Posts By Tags', 'spidermag')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

function spidermag_header_image_position_sanitize($input) {
  $valid_keys = array(
     'position_one' => esc_html__('Display the Header image just above the site title/text.', 'spidermag'),
     'position_two' => esc_html__('Default: Display the Header image between site title/text and the main/primary menu.', 'spidermag'),
     'position_three' => esc_html__('Display the Header image below main/primary menu.', 'spidermag')
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}


function spidermag_layout_sanitize($input) {
  $imagepath =  get_template_directory_uri() . '/assets/images/';
  $valid_keys = array( 
      'leftsidebar' => $imagepath . 'left-sidebar.png',  
      'rightsidebar' => $imagepath . 'right-sidebar.png', 
      'bothsidebar' => $imagepath . 'both-sidebar.png',
      'nosidebar' => $imagepath . 'no-sidebar.png',
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

function spidermag_woo_layout_sanitize($input) {
  $imagepath =  get_template_directory_uri() . '/assets/images/';
  $valid_keys = array( 
      'leftsidebar' => $imagepath . 'left-sidebar.png',  
      'rightsidebar' => $imagepath . 'right-sidebar.png',
      'nosidebar' => $imagepath . 'no-sidebar.png',
  );
  if ( array_key_exists( $input, $valid_keys ) ) {
     return $input;
  } else {
     return '';
  }
}

// Spidermag sanitization
function spidermag_color_option_hex_sanitize($color) {
  if ($unhashed = sanitize_hex_color_no_hash($color))
     return '#' . $unhashed;

  return $color;
}

function spidermag_color_escaping_option_sanitize($input) {
  $input = esc_attr($input);
  return $input;
}

// checkbox sanitization
function spidermag_checkbox_sanitize($input) {
  if ( $input == 1 ) {
     return 1;
  } else {
     return 0;
  }
}

// radio button yes/no sanitization
function spidermag_radio_sanitize($input) {
   $valid_keys = array(
     'yes' => esc_html__('Yes', 'spidermag'),
     'no'  => esc_html__('No', 'spidermag')
   );
   if ( array_key_exists( $input, $valid_keys ) ) {
      return $input;
   } else {
      return '';
   }
}