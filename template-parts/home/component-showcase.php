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
            </div>

            <div class="grid gap-8 md:grid-cols-3">

                <div class="border-l border-slate-200 pl-6">
                    <h3 class="mb-6 text-sm font-bold text-slate-950">
                        <?php esc_html_e('Cards', 'emerald-isle'); ?>
                    </h3>

                    <article class="group overflow-hidden rounded-md border border-slate-200 bg-white transition-colors duration-[220ms] ease-out">

                        <div class="aspect-[16/9] overflow-hidden bg-surface-50">
                            <img
                                src="<?php echo esc_url(home_url('/wp-content/uploads/desk-with-plant-01.webp')); ?>"
                                alt=""
                                class="h-full w-[calc(100%+2px)] max-w-none origin-center -translate-x-px scale-100 object-cover will-change-transform transition-transform duration-300 ease-out group-hover:scale-105"
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

                            <a href="#" class="btn btn-text text-xs group-hover:text-primary-hover">
                                <?php esc_html_e('Learn More', 'emerald-isle'); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>

                <div class="border-l border-slate-200 pl-6">
                    <h3 class="mb-6 text-sm font-bold text-slate-950">
                        <?php esc_html_e('Buttons', 'emerald-isle'); ?>
                    </h3>

                    <div class="flex flex-col items-start gap-4">
                        <a href="#" class="btn btn-primary w-44 px-5 py-2.5 text-sm">
                            <?php esc_html_e('Primary', 'emerald-isle'); ?>
                        </a>

                        <a href="#" class="btn btn-secondary w-44 px-5 py-2.5 text-sm">
                            <?php esc_html_e('Secondary', 'emerald-isle'); ?>
                        </a>

                        <a href="#" class="btn btn-outline w-44 px-5 py-2.5 text-sm">
                            <?php esc_html_e('Outline Accent', 'emerald-isle'); ?>
                        </a>

                        <a href="#" class="btn btn-outline-dark w-44 px-5 py-2.5 text-sm">
                            <?php esc_html_e('Outline Brand', 'emerald-isle'); ?>
                        </a>

                        <a href="#" class="btn btn-soft w-44 px-5 py-2.5 text-sm">
                            <?php esc_html_e('Soft', 'emerald-isle'); ?>
                        </a>
                    </div>
                </div>

                <div class="border-l border-slate-200 pl-6">
                    <h3 class="mb-6 text-sm font-bold text-slate-950">
                        <?php esc_html_e('Color Palette', 'emerald-isle'); ?>
                    </h3>

                    <div class="grid gap-3">
                        <div class="flex items-center gap-3">
                            <span class="size-11 rounded-md border border-slate-200 bg-slate-950"></span>
                            <div>
                                <p class="m-0 text-xs font-bold text-slate-950">Slate 950</p>
                                <p class="m-0 text-xs text-slate-600">#222934</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="size-11 rounded-md border border-slate-200 bg-slate-900"></span>
                            <div>
                                <p class="m-0 text-xs font-bold text-slate-950">Slate 900</p>
                                <p class="m-0 text-xs text-slate-600">#333d4c</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="size-11 rounded-md border border-slate-200 bg-emerald-600"></span>
                            <div>
                                <p class="m-0 text-xs font-bold text-slate-950">Emerald 600</p>
                                <p class="m-0 text-xs text-slate-600">#0ba481</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="size-11 rounded-md border border-slate-200 bg-orange-500"></span>
                            <div>
                                <p class="m-0 text-xs font-bold text-slate-950">Orange 500</p>
                                <p class="m-0 text-xs text-slate-600">#fc9231</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <span class="size-11 rounded-md border border-slate-200 bg-surface-50"></span>
                            <div>
                                <p class="m-0 text-xs font-bold text-slate-950">Surface 50</p>
                                <p class="m-0 text-xs text-slate-600">#f5f7fa</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
