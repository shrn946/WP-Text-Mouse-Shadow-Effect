<?php
/*
Plugin Name: WP Text Mouse Shadow Effect
Description: Add mouse Shadow effect to text. [custom_hero text="Your Text" font_size="100px" text_align="left"]
Version: 1.0
Author: Your Name
*/

// Enqueue scripts and styles
function text_mouse_effect_enqueue_scripts() {
    // Enqueue JavaScript
    wp_enqueue_script('text-mouse-effect-script', plugins_url('/script.js', __FILE__), array('jquery'), '1.0', true);

    // Enqueue CSS
    wp_enqueue_style('text-mouse-effect-style', plugins_url('/style.css', __FILE__), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'text_mouse_effect_enqueue_scripts');


// functions.php or your custom plugin file

function custom_hero_shortcode($atts, $content = null) {
    // Parse shortcode attributes
    $atts = shortcode_atts(
        array(
            'text' => 'Star!',
            'font_size' => '24px',
            'text_align' => 'center',
        ),
        $atts,
        'custom_hero'
    );

    // Generate HTML output
    $output = '<div class="hero" style="text-align: ' . esc_attr($atts['text_align']) . ';">';
    $output .= '<h1 contenteditable style="font-size: ' . esc_attr($atts['font_size']) . ';">' . esc_html($atts['text']) . '</h1>';
    $output .= '</div>';

    return $output;
}
add_shortcode('custom_hero', 'custom_hero_shortcode');
