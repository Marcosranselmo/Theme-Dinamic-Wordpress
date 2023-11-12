<?php
add_action( 'wp_enqueue_scripts', 'spidermag_dynamic_css', 99 );
function spidermag_dynamic_css(){
    $dynamic_css = "";
    /** top header */
    $top_bg_color = get_theme_mod('spidermag_top_bg_color', '#002584');
    $top_tex_color = get_theme_mod('spidermag_text_bg_color', '#fff');
    if($top_bg_color){
        $dynamic_css .= "
            .header-toolbar .ticker-swipe,
            .header-toolbar{ background-color: $top_bg_color; color: $top_tex_color; }

            .header-toolbar .ticker-content a{
                color: $top_tex_color;
            }
        ";
    }



    wp_add_inline_style( 'spidermag-style', spidermag_strip_whitespace($dynamic_css) );
}
function spidermag_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}