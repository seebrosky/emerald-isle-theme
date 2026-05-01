<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>

        <!-- SVG favicon (modern browsers) -->
        <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.svg">

        <!-- Standard PNG fallback -->
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png">

        <!-- ICO fallback (older browsers) -->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico">

        <!-- Apple Touch Icon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png">

        <!-- Web App Manifest -->
        <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest">

        <!-- Theme color (optional but recommended) -->
        <meta name="theme-color" content="#0f5c3f">
    </head>

    <body <?php body_class(); ?>>

        <header data-site-header class="site-header sticky top-0 z-50 bg-site-header border-b border-black/20 lg:border-b-0">
            <div class="site-header-inner flex w-full items-center justify-between px-6 lg:mx-auto lg:max-w-6xl">
                <div class="site-branding flex items-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo flex origin-left items-center gap-4 no-underline transition-transform duration-200 will-change-transform">
                        <img
                            src="/wp-content/uploads/logo-color-with-text_770x170.png"
                            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                            class="block h-17 w-auto shrink-0 object-contain"
                        >
                    </a>
                </div>

                <?php get_template_part('template-parts/navigation/primary-nav'); ?>
            </div>
        </header>

        <?php get_template_part('template-parts/navigation/mobile-nav'); ?>