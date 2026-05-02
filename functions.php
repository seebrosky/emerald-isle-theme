<?php

require_once get_template_directory() . '/inc/image-helper.php';

// require get_template_directory() . '/admin/styleguide.php';

add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

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

    add_theme_support('custom-logo', array(
        'height'      => 120,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary'           => __('Primary Menu', 'emerald-isle'),
        'footer_navigation' => __('Footer Navigation', 'emerald-isle'),
    ));
}
add_action('after_setup_theme', 'emerald_isle_theme_setup');

function emerald_isle_enqueue_assets() {
    $css_file            = get_template_directory() . '/assets/css/main.css';
    $main_js_file        = get_template_directory() . '/assets/js/main.js';
    $desktop_js_file     = get_template_directory() . '/assets/js/navigation-desktop.js';
    $mobile_js_file      = get_template_directory() . '/assets/js/navigation-mobile.js';

    wp_enqueue_style(
        'emerald-isle-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        file_exists($css_file) ? filemtime($css_file) : '1.0'
    );

    wp_enqueue_script(
        'emerald-isle-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        file_exists($main_js_file) ? filemtime($main_js_file) : '1.0',
        true
    );

    wp_enqueue_script(
        'emerald-isle-navigation-desktop',
        get_template_directory_uri() . '/assets/js/navigation-desktop.js',
        array('emerald-isle-main'),
        file_exists($desktop_js_file) ? filemtime($desktop_js_file) : '1.0',
        true
    );

    wp_enqueue_script(
        'emerald-isle-navigation-mobile',
        get_template_directory_uri() . '/assets/js/navigation-mobile.js',
        array('emerald-isle-main'),
        file_exists($mobile_js_file) ? filemtime($mobile_js_file) : '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'emerald_isle_enqueue_assets');