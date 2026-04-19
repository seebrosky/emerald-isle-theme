<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <header data-site-header class="site-header sticky top-0 z-50 bg-site-header border-b border-black/50 lg:border-0">
            <div class="site-header-inner flex w-full items-center justify-between px-6 lg:mx-auto lg:max-w-6xl">
                <div class="site-branding flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php echo emerald_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title-link font-bold text-brand-primary">
                            <?php bloginfo('name'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php get_template_part('template-parts/navigation/primary-nav'); ?>
            </div>
        </header>

        <?php get_template_part('template-parts/navigation/mobile-nav'); ?>