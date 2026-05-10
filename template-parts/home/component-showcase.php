<?php
/**
 * Component Showcase Template
 *
 * Renders the homepage component showcase section.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<section class="border-b border-slate-200 bg-white py-16 text-slate-950">
    <div class="mx-auto max-w-6xl px-6">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_3.8fr]">

            <div>
                <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">
                    <?php esc_html_e('Component Showcase', 'emerald-isle'); ?>
                </p>

                <h2 class="mb-5 max-w-sm text-3xl font-bold leading-tight text-slate-950">
                    <?php esc_html_e('Designed for Flexibility. Built for Consistency.', 'emerald-isle'); ?>
                </h2>

                <p class="mb-8 max-w-sm text-sm leading-6 text-slate-700">
                    <?php esc_html_e('Emerald Isle comes with a complete design system and a collection of components to help you build stunning, consistent websites.', 'emerald-isle'); ?>
                </p>

                <a href="<?php echo esc_url(home_url('/style-guide/')); ?>" class="btn btn-text">
                    <?php esc_html_e('Explore Style Guide', 'emerald-isle'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4" aria-hidden="true" focusable="false">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid gap-8 md:grid-cols-3">

                <div class="border-l border-slate-200 pl-6">
                    <h3 class="mb-6 text-sm font-bold text-slate-950">
                        <?php esc_html_e('Cards', 'emerald-isle'); ?>
                    </h3>

                    <article class="overflow-hidden rounded-md border border-slate-200 bg-white shadow-sm">
                        <div class="aspect-[16/9] overflow-hidden bg-surface-50">
                            <img
                                src="<?php echo esc_url(home_url('/wp-content/uploads/desk-with-plant-01.webp')); ?>"
                                alt=""
                                class="h-full w-full object-cover"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>

                        <div class="p-4">
                            <h4 class="mb-2 text-sm font-bold text-slate-950">
                                <?php esc_html_e('Card Title', 'emerald-isle'); ?>
                            </h4>

                            <p class="mb-4 text-xs leading-5 text-slate-600">
                                <?php esc_html_e('This is an example of a card component with an image, title, and description.', 'emerald-isle'); ?>
                            </p>

                            <a href="#" class="btn btn-text text-xs">
                                <?php esc_html_e('Learn More', 'emerald-isle'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3.5" aria-hidden="true" focusable="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="border-l border-slate-200 pl-6">
                    <h3 class="mb-6 text-sm font-bold text-slate-950">
                        <?php esc_html_e('Alerts', 'emerald-isle'); ?>
                    </h3>

                    <div class="space-y-4">
                        <div class="flex gap-3 rounded-md bg-emerald-100 p-4 text-emerald-700">
                            <span class="mt-0.5 inline-flex size-5 shrink-0 items-center justify-center rounded-full border border-current">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3" aria-hidden="true" focusable="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </span>
                            <p class="m-0 text-xs leading-5">
                                <strong><?php esc_html_e('Success!', 'emerald-isle'); ?></strong>
                                <?php esc_html_e('Your changes have been saved.', 'emerald-isle'); ?>
                            </p>
                        </div>

                        <div class="flex gap-3 rounded-md bg-orange-500/15 p-4 text-orange-600">
                            <span class="mt-0.5 inline-flex size-5 shrink-0 items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-5" aria-hidden="true" focusable="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008ZM10.29 3.86 1.82 18a1.5 1.5 0 0 0 1.29 2.25h17.78A1.5 1.5 0 0 0 22.18 18L13.71 3.86a1.5 1.5 0 0 0-2.42 0Z" />
                                </svg>
                            </span>
                            <p class="m-0 text-xs leading-5">
                                <strong><?php esc_html_e('Warning!', 'emerald-isle'); ?></strong>
                                <?php esc_html_e('Please check your information.', 'emerald-isle'); ?>
                            </p>
                        </div>

                        <div class="flex gap-3 rounded-md bg-red-500/15 p-4 text-red-600">
                            <span class="mt-0.5 inline-flex size-5 shrink-0 items-center justify-center rounded-full border border-current">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3" aria-hidden="true" focusable="false">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </span>
                            <p class="m-0 text-xs leading-5">
                                <strong><?php esc_html_e('Error!', 'emerald-isle'); ?></strong>
                                <?php esc_html_e('Something went wrong. Please try again.', 'emerald-isle'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-l border-slate-200 pl-6">
                    <h3 class="mb-6 text-sm font-bold text-slate-950">
                        <?php esc_html_e('Badges', 'emerald-isle'); ?>
                    </h3>

                    <div class="flex flex-col items-start gap-6">
                        <span class="rounded-full border border-emerald-600 bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">
                            <?php esc_html_e('New', 'emerald-isle'); ?>
                        </span>

                        <span class="rounded-full border border-orange-500 bg-orange-500/10 px-3 py-1 text-xs font-bold text-orange-600">
                            <?php esc_html_e('Popular', 'emerald-isle'); ?>
                        </span>

                        <span class="rounded-full border border-red-500 bg-red-500/10 px-3 py-1 text-xs font-bold text-red-600">
                            <?php esc_html_e('Sale', 'emerald-isle'); ?>
                        </span>

                        <span class="rounded-full bg-slate-700 px-3 py-1 text-xs font-bold text-white">
                            <?php esc_html_e('Limited', 'emerald-isle'); ?>
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
