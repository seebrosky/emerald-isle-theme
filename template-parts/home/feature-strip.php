<?php
/**
 * Feature Strip Template
 *
 * Renders the compact homepage feature strip below the hero.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<section
    class="border-y border-white/[0.08] bg-[linear-gradient(180deg,rgba(34,41,52,0.98)_0%,rgba(27,36,48,0.98)_100%)]"
    aria-label="<?php esc_attr_e('Theme highlights', 'emerald-isle'); ?>"
>
    <div class="mx-auto max-w-6xl px-6">
        <div class="grid gap-6 py-8 sm:grid-cols-2 lg:grid-cols-4">

            <div class="flex items-center gap-4">
                <span class="inline-flex size-15 shrink-0 items-center justify-center rounded-lg border border-white/[0.06] bg-white/[0.07] text-brand-primary" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9" focusable="false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                    </svg>
                </span>

                <div>
                    <h2 class="mb-1 text-base text-white">
                        <?php esc_html_e('Lightning Fast', 'emerald-isle'); ?>
                    </h2>
                    <p class="m-0 text-sm leading-6 text-white/70">
                        <?php esc_html_e('Built for speed and performance.', 'emerald-isle'); ?>
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <span class="inline-flex size-15 shrink-0 items-center justify-center rounded-lg border border-white/[0.06] bg-white/[0.07] text-brand-primary" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9" focusable="false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                </span>

                <div>
                    <h2 class="mb-1 text-base text-white">
                        <?php esc_html_e('Fully Responsive', 'emerald-isle'); ?>
                    </h2>
                    <p class="m-0 text-sm leading-6 text-white/70">
                        <?php esc_html_e('Looks perfect on all devices.', 'emerald-isle'); ?>
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <span class="inline-flex size-15 shrink-0 items-center justify-center rounded-lg border border-white/[0.06] bg-white/[0.07] text-brand-primary" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9" focusable="false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </span>

                <div>
                    <h2 class="mb-1 text-base text-white">
                        <?php esc_html_e('Gutenberg Ready', 'emerald-isle'); ?>
                    </h2>
                    <p class="m-0 text-sm leading-6 text-white/70">
                        <?php esc_html_e('Designed for the block editor.', 'emerald-isle'); ?>
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <span class="inline-flex size-15 shrink-0 items-center justify-center rounded-lg border border-white/[0.06] bg-white/[0.07] text-brand-primary" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9" focusable="false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </span>

                <div>
                    <h2 class="mb-1 text-base text-white">
                        <?php esc_html_e('Easy to Customize', 'emerald-isle'); ?>
                    </h2>
                    <p class="m-0 text-sm leading-6 text-white/70">
                        <?php esc_html_e('Powerful options without code.', 'emerald-isle'); ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
