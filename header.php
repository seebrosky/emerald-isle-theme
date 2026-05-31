<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php $theme_uri = get_template_directory_uri(); ?>

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#0f5c3f">

        <link rel="icon" type="image/svg+xml" href="<?php echo esc_url($theme_uri . '/assets/favicon/favicon.svg'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url($theme_uri . '/assets/favicon/favicon-96x96.png'); ?>">
        <link rel="shortcut icon" href="<?php echo esc_url($theme_uri . '/assets/favicon/favicon.ico'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($theme_uri . '/assets/favicon/apple-touch-icon.png'); ?>">
        <link rel="manifest" href="<?php echo esc_url($theme_uri . '/assets/favicon/site.webmanifest'); ?>">

        <?php wp_head(); ?>
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
                        <a href="#">Style Guide</a>
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
                    <a
                        href="<?php echo esc_url(home_url('/')); ?>"
                        class="site-logo flex origin-left items-center no-underline"
                        aria-label="<?php echo esc_attr(sprintf(__('%s home', 'emerald-isle'), get_bloginfo('name'))); ?>"
                    >
                        <span class="site-logo-wrap">
                            <img
                                src="<?php echo esc_url(home_url('/wp-content/uploads/emerald-isle-logo-dark_570x120.png')); ?>"
                                alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                width="570" height="120"
                                class="site-logo-img site-logo-default block w-auto shrink-0 object-contain"
                            >

                            <img
                                src="<?php echo esc_url(home_url('/wp-content/uploads/emerald-isle-logo-dark_475x100.png')); ?>"
                                alt=""
                                width="475" height="100"
                                class="site-logo-img site-logo-scrolled block w-auto shrink-0 object-contain"
                                aria-hidden="true"
                            >
                        </span>
                    </a>
                </div>

                <div class="site-header-nav-wrap flex items-center">
                    <?php get_template_part('template-parts/navigation/primary-nav'); ?>

                    <div class="hidden items-center gap-1 border-l border-white/10 pl-4 ml-3 lg:flex">
                        <button
                            type="button"
                            class="site-search-toggle relative inline-flex size-10.5 items-center justify-center text-white/80 transition hover:text-white"
                            aria-label="Open search"
                            aria-expanded="false"
                            aria-controls="site-search-panel"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>

                        <a href="#" class="relative inline-flex size-10.5 items-center justify-center text-white/80 no-underline transition hover:text-white" aria-label="Cart">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span class="site-header-cart-count absolute right-1 top-1 flex h-4 min-w-4 items-center justify-center rounded-full bg-orange-500 px-1 text-[10px] font-bold leading-none text-white">
                                3
                            </span>
                        </a>

                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary ml-4 min-h-10.5 px-5">
                            Get In Touch
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Search Component -->
        <?php get_template_part('template-parts/search/search'); ?>
        <div class="site-search-backdrop"></div>       

        <!-- Mobile Nav -->
        <?php get_template_part('template-parts/navigation/mobile-nav'); ?>