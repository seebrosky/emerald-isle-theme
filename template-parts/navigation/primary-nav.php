<?php
/**
 * Primary Navigation Template
 *
 * Renders the desktop navigation and mobile toggle button.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */
?>

<button
    class="mobile-nav-toggle lg:hidden"
    type="button"
    aria-expanded="false"
    aria-controls="mobile-menu"
    data-mobile-nav-toggle
>
    <span class="sr-only"><?php esc_html_e('Toggle navigation', 'emerald-isle'); ?></span>
    <span class="mobile-nav-toggle-icon"></span>
</button>

<nav class="site-nav hidden lg:block" aria-label="<?php esc_attr_e('Primary navigation', 'emerald-isle'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'menu',
        'fallback_cb'    => false,
    ));
    ?>
</nav>