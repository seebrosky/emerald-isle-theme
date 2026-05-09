<?php
/**
 * Primary Navigation Template
 *
 * Renders the desktop primary navigation and mobile navigation toggle.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<button
    class="mobile-nav-toggle lg:hidden"
    type="button"
    aria-expanded="false"
    aria-controls="mobile-menu"
    aria-label="<?php esc_attr_e('Toggle navigation', 'emerald-isle'); ?>"
    data-mobile-nav-toggle
>
    <span class="mobile-nav-toggle-icon" aria-hidden="true"></span>
</button>

<nav class="site-nav hidden lg:block" aria-label="<?php esc_attr_e('Primary navigation', 'emerald-isle'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'menu',
        'fallback_cb'    => false,
        'depth'          => 3,
    ));
    ?>
</nav>
