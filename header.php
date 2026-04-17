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

                <nav class="site-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu flex items-center gap-6 text-site-text-dark',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>
            </div>
        </header>