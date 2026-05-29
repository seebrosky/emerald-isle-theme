<?php

require_once get_template_directory() . '/inc/image-helper.php';

if ( is_admin() ) {
    require_once get_template_directory() . '/admin/styleguide.php';
}

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
    $splide_css_file     = get_template_directory() . '/assets/vendor/splide/splide.min.css';
    $splide_js_file      = get_template_directory() . '/assets/vendor/splide/splide.min.js';

    wp_enqueue_style(
        'splide',
        get_template_directory_uri() . '/assets/vendor/splide/splide.min.css',
        array(),
        file_exists($splide_css_file) ? filemtime($splide_css_file) : '4.1.4'
    );

    wp_enqueue_style(
        'emerald-isle-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array('splide'),
        file_exists($css_file) ? filemtime($css_file) : '1.0'
    );

    wp_enqueue_script(
        'splide',
        get_template_directory_uri() . '/assets/vendor/splide/splide.min.js',
        array(),
        file_exists($splide_js_file) ? filemtime($splide_js_file) : '4.1.4',
        true
    );

    wp_enqueue_script(
        'emerald-isle-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('splide'),
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

/**
 * Outputs a basic meta description.
 */
function emerald_isle_meta_description() {
    if ( is_admin() ) {
        return;
    }

    if ( is_front_page() ) {
        $description = 'Emerald Isle - A fast, flexible WordPress theme for modern business websites.';
    } elseif ( is_singular() ) {
        $description = get_the_excerpt();

        if ( empty( $description ) ) {
            $description = get_bloginfo( 'description' );
        }
    } elseif ( is_archive() ) {
        $description = get_the_archive_description();
    } else {
        $description = get_bloginfo( 'description' );
    }

    $description = wp_strip_all_tags( $description );
    $description = trim( preg_replace( '/\s+/', ' ', $description ) );
    $description = wp_trim_words( $description, 28, '' );

    if ( empty( $description ) ) {
        $description = get_bloginfo( 'name' ) . ' - A modern WordPress theme crafted for performance, scalability, and clean design.';
    }

    echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
}
add_action( 'wp_head', 'emerald_isle_meta_description', 1 );
