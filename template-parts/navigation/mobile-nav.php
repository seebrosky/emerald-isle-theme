<?php
/**
 * Mobile Navigation Template
 *
 * Renders the mobile navigation panel.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */
?>

<div
    id="mobile-menu"
    class="mobile-nav-panel"
    data-mobile-nav-panel
>
    <div class="mobile-nav-panel-inner">
        <nav aria-label="<?php esc_attr_e('Mobile navigation', 'emerald-isle'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'mobile-menu',
                'fallback_cb'    => false,
            ));
            ?>
        </nav>
    </div>
</div>