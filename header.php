<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header data-site-header class="site-header sticky top-0 z-50 border-b border-slate-200 bg-site-header">
            <div class="site-header-inner mx-auto flex max-w-6xl items-center justify-between px-6">
                <div class="site-branding flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php echo emerald_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-link font-bold text-brand-primary">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <button
                    class="mobile-nav-toggle inline-flex h-11 w-11 items-center justify-center rounded-md text-site-text-dark lg:hidden"
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
            </div>

            <div
                id="mobile-menu"
                class="mobile-nav-panel lg:hidden"
                data-mobile-nav-panel
                hidden
            >
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
        </header>