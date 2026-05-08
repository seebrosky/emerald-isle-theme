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

    <body <?php body_class(); ?> id="top">

        <header data-site-header class="site-header sticky top-0 z-50 bg-site-header border-b border-black/20 lg:border-b-0">
            <div class="site-header-top">
                <div class="mx-auto flex max-w-6xl items-center justify-between px-6">
                    <p class="site-header-kicker">
                        <span aria-hidden="true">✦</span>
                        Premium WordPress Theme for Modern Businesses
                    </p>

                    <nav class="site-header-utility" aria-label="Utility navigation">
                        <a href="#">Documentation</a>
                        <a href="<?php echo esc_url(home_url('/style-guide')); ?>">Style Guide</a>
                        <a href="#">Support</a>

                        <span class="site-header-socials">
                            <a href="#" aria-label="GitHub">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/github.svg" alt="">
                            </a>
                            <a href="#" aria-label="X">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/x.svg" alt="">
                            </a>
                            <a href="#" aria-label="LinkedIn">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/linkedin.svg" alt="">
                            </a>
                        </span>
                    </nav>
                </div>
            </div>




            <div class="site-header-inner flex w-full items-center justify-between px-6 lg:mx-auto lg:max-w-6xl">
                <div class="site-branding flex items-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo flex origin-left items-center no-underline">
                        <span class="site-logo-wrap">
                            <img
                                src="/wp-content/uploads/emerald-isle-logo-dark_570x120.png"
                                alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                class="site-logo-img site-logo-default block w-auto shrink-0 object-contain"
                            >

                            <img
                                src="/wp-content/uploads/emerald-isle-logo-dark_475x100.png"
                                alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                class="site-logo-img site-logo-scrolled block w-auto shrink-0 object-contain"
                                aria-hidden="true"
                            >
                        </span>
                    </a>
                </div>

                <?php get_template_part('template-parts/navigation/primary-nav'); ?>
            </div>
        </header>

        <?php get_template_part('template-parts/navigation/mobile-nav'); ?>