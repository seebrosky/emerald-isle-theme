<?php

function emerald_isle_enqueue_assets() {
    $css_file = get_template_directory() . '/assets/css/main.css';

    wp_enqueue_style(
        'emerald-isle-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        file_exists($css_file) ? filemtime($css_file) : '1.0'
    );
}
add_action('wp_enqueue_scripts', 'emerald_isle_enqueue_assets');