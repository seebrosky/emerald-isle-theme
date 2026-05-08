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
    class="mobile-nav-panel lg:hidden"
    data-mobile-nav-panel
>
    <div class="mobile-nav-panel-shell">
        <div class="mobile-nav-panel-inner">
            <div class="mobile-nav-panel-scroll">

                <div class="mobile-nav-actions border-b border-black/20" aria-label="<?php esc_attr_e('Mobile actions', 'emerald-isle'); ?>">
                    <button
                        type="button"
                        class="site-search-toggle mobile-nav-action"
                        aria-label="<?php esc_attr_e('Open search', 'emerald-isle'); ?>"
                        aria-expanded="false"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                        <span><?php esc_html_e('Search', 'emerald-isle'); ?></span>
                    </button>

                    <a
                        href="<?php echo esc_url(home_url('/cart')); ?>"
                        class="mobile-nav-action mobile-nav-cart"
                        aria-label="<?php esc_attr_e('View cart', 'emerald-isle'); ?>"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007Z" />
                        </svg>
                        <span><?php esc_html_e('Cart', 'emerald-isle'); ?></span>
                        <span class="mobile-nav-cart-count">3</span>
                    </a>
                </div>
                
                <div class="mobile-nav-menu">
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
        </div>
    </div>
</div>