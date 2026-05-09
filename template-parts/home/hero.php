<?php
/**
 * Homepage Hero Template
 *
 * Renders the homepage hero section.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<section class="hero relative overflow-hidden text-site-text">

    <button
        type="button"
        class="absolute left-6 top-1/2 z-20 hidden size-11 -translate-y-1/2 items-center justify-center rounded-full bg-slate-950/45 text-white/80 backdrop-blur transition-colors duration-200 hover:bg-slate-950/70 hover:text-white lg:inline-flex"
        aria-label="<?php esc_attr_e('Previous slide', 'emerald-isle'); ?>"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5" aria-hidden="true" focusable="false">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 18 9 12l6-6" />
        </svg>
    </button>

    <button
        type="button"
        class="absolute right-6 top-1/2 z-20 hidden size-11 -translate-y-1/2 items-center justify-center rounded-full bg-slate-950/45 text-white/80 backdrop-blur transition-colors duration-200 hover:bg-slate-950/70 hover:text-white lg:inline-flex"
        aria-label="<?php esc_attr_e('Next slide', 'emerald-isle'); ?>"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5" aria-hidden="true" focusable="false">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
        </svg>
    </button>

    <div class="relative z-10 mx-auto flex min-h-[34rem] max-w-7xl items-center px-6 py-14 sm:py-16 lg:min-h-[42rem] lg:gap-12 lg:py-22">
        
        <div class="max-w-xl flex-1 lg:pl-16 xl:max-w-2xl xl:pl-20">
            <p class="mb-4 inline-flex rounded-full bg-brand-primary/15 px-2.5 py-1 text-[0.62rem] font-bold uppercase tracking-[0.16em] text-brand-primary ring-1 ring-brand-primary/20 sm:text-[0.68rem]">
                <?php esc_html_e('Built for WordPress', 'emerald-isle'); ?>
            </p>

            <h1 class="mb-5 text-4xl font-bold leading-[0.98] text-white sm:text-5xl lg:text-6xl xl:text-7xl lg:leading-[0.98]">
                <span class="block"><?php esc_html_e('Build Beautiful', 'emerald-isle'); ?></span>
                <span class="block whitespace-nowrap">
                    <?php esc_html_e('Websites,', 'emerald-isle'); ?>
                    <span class="text-brand-primary"><?php esc_html_e('Faster.', 'emerald-isle'); ?></span>
                </span>
            </h1>

            <p class="mb-8 max-w-[31rem] text-base leading-7 text-white sm:text-lg sm:leading-8">
                <?php esc_html_e('Emerald Isle is a modern, flexible WordPress theme crafted with performance, design, and usability in mind. Build anything. Customize everything.', 'emerald-isle'); ?>
            </p>

            <div class="flex flex-wrap gap-3 sm:gap-4">
                <a href="#" class="btn btn-primary inline-flex items-center gap-2">
                    <?php esc_html_e('View Demos', 'emerald-isle'); ?>
                </a>

                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-light">
                    <?php esc_html_e('Explore Features', 'emerald-isle'); ?>
                </a>
            </div>

            <div class="mt-9 flex items-center gap-2" aria-label="<?php esc_attr_e('Hero slides', 'emerald-isle'); ?>">
                <button type="button" class="h-1.5 w-8 rounded-full bg-white" aria-label="<?php esc_attr_e('Slide 1', 'emerald-isle'); ?>"></button>
                <button type="button" class="size-2 rounded-full bg-white/35" aria-label="<?php esc_attr_e('Slide 2', 'emerald-isle'); ?>"></button>
                <button type="button" class="size-2 rounded-full bg-white/35" aria-label="<?php esc_attr_e('Slide 3', 'emerald-isle'); ?>"></button>
                <button type="button" class="size-2 rounded-full bg-white/35" aria-label="<?php esc_attr_e('Slide 4', 'emerald-isle'); ?>"></button>
            </div>
        </div>

        <div class="hero-media hidden flex-1 items-center justify-end lg:flex">
            <img
                src="<?php echo esc_url(home_url('/wp-content/uploads/hero-image-01-1.webp')); ?>"
                alt=""
                class="hero-media-image"
                loading="eager"
                decoding="async"
            >
        </div>

    </div>

</section>
