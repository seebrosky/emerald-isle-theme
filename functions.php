<?php

function emerald_isle_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'emerald-isle'),
    ));
}
add_action('after_setup_theme', 'emerald_isle_theme_setup');

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