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

                <div class="site-header-nav-wrap flex items-center">
                    <?php get_template_part('template-parts/navigation/primary-nav'); ?>

                    <div class="hidden items-center gap-1 border-l border-white/10 pl-4 ml-3 lg:flex">
                        <button
                            type="button"
                            class="site-search-toggle relative inline-flex size-10.5 items-center justify-center text-white/80 transition hover:text-white"
                            aria-label="Open search"
                            aria-expanded="false"
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
                            Get This Theme
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="site-search-panel">
            <div class="mx-auto flex max-w-6xl items-center gap-2 px-6 py-6">

                <form
                    role="search"
                    method="get"
                    action="<?php echo esc_url(home_url('/')); ?>"
                    class="w-full pr-2.5"
                >
                    <div class="relative w-full">
                        <input
                            type="search"
                            name="s"
                            placeholder="Search themes, plugins, docs..."
                            class="h-10 w-full rounded-lg border border-white/10 bg-white/5 pl-4 pr-26 text-sm text-white placeholder:text-white/35 focus:border-emerald-600 focus:outline-none"
                        >

                        <button
                            type="submit"
                            class="absolute right-0 top-1/2 h-10 -translate-y-1/2 rounded-r-md rounded-l-none bg-emerald-600 px-4 text-sm font-bold text-white transition hover:bg-emerald-700"
                        >
                            Search
                        </button>

                    </div>
                </form>

                <button
                    type="button"
                    class="site-search-close inline-flex size-11 h-9 w-9 border rounded-full items-center justify-center text-white/70 transition hover:text-white"
                    aria-label="Close search"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>
        
        <div class="site-search-backdrop"></div>       

        <?php get_template_part('template-parts/navigation/mobile-nav'); ?>