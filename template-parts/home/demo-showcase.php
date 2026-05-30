<?php
/**
 * Demo Showcase Template
 *
 * Renders the homepage demo layouts and theme features section.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<section id="demos-section" class="scroll-mt-22 border-b border-slate-200 bg-surface-50 py-16 text-slate-950">
    <div class="mx-auto max-w-6xl px-6">

        <div class="grid gap-10 lg:grid-cols-[0.72fr_1.8fr] lg:items-start">
            <div>
                <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">
                    <?php esc_html_e('Premade Layouts', 'emerald-isle'); ?>
                </p>

                <h2 class="mb-4 max-w-sm text-3xl font-bold leading-tight text-slate-950">
                    <?php esc_html_e('Start With a Demo', 'emerald-isle'); ?>
                </h2>

                <p class="mb-6 max-w-xs text-sm leading-6 text-slate-600">
                    <?php esc_html_e('Beautifully designed pages to help you launch faster and inspire your next project.', 'emerald-isle'); ?>
                </p>

                <a href="#" class="btn btn-primary">
                    <?php esc_html_e('Explore Demos', 'emerald-isle'); ?>
                </a>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                $demos = array(
                    array(
                        'title' => __('Corporate', 'emerald-isle'),
                        'subtitle' => __('Business Website', 'emerald-isle'),
                        'image' => '/wp-content/uploads/corporate-demo-01.webp',
                    ),
                    array(
                        'title' => __('Agency', 'emerald-isle'),
                        'subtitle' => __('Creative Portfolio', 'emerald-isle'),
                        'image' => '/wp-content/uploads/agency-demo-01.webp',
                    ),
                    array(
                        'title' => __('SaaS', 'emerald-isle'),
                        'subtitle' => __('Software Platform', 'emerald-isle'),
                        'image' => '/wp-content/uploads/saas-demo-01.webp',
                    ),
                    array(
                        'title' => __('Shop', 'emerald-isle'),
                        'subtitle' => __('Online Store', 'emerald-isle'),
                        'image' => '/wp-content/uploads/shop-demo-01.webp',
                    ),
                );

                foreach ($demos as $demo) :
                ?>
                    <article class="flex flex-col overflow-hidden rounded-md border border-slate-200 bg-white transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-lg">
                        <button
                            type="button"
                            class="demo-modal-trigger group block w-full text-left"
                            data-demo-image="<?php echo esc_url($demo['image']); ?>"
                            data-demo-title="<?php echo esc_attr($demo['title']); ?>"
                        >
                            <div class="aspect-[2/3] overflow-hidden bg-slate-100">
                                <?php
                                $image_id = attachment_url_to_postid(
                                    home_url( $demo['image'] )
                                );

                                if ( $image_id ) {
                                    echo wp_get_attachment_image(
                                        $image_id,
                                        'medium_large',
                                        false,
                                        array(
                                            'class'   => 'h-full w-full object-cover object-top',
                                            'loading' => 'lazy',
                                            'sizes'   => '(min-width: 1024px) 173px, (min-width: 640px) 50vw, 100vw',
                                        )
                                    );
                                } else {
                                ?>
                                    <img
                                        src="<?php echo esc_url( $demo['image'] ); ?>"
                                        alt="<?php echo esc_attr( $demo['title'] ); ?> Demo"
                                        class="h-full w-full object-cover object-top"
                                        loading="lazy"
                                    >
                                <?php
                                }
                                ?>
                            </div>

                            <div class="border-t border-slate-200 bg-white px-4 py-3">
                                <h3 class="m-0 text-sm font-bold text-slate-950">
                                    <?php echo esc_html($demo['title']); ?>
                                </h3>

                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    <?php echo esc_html($demo['subtitle']); ?>
                                </p>
                            </div>
                        </button>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="demo-modal fixed inset-0 z-[1000] hidden bg-slate-950/85 p-4 backdrop-blur-sm">
                <div class="mx-auto flex h-full max-w-5xl flex-col">
                    <div class="mb-4 flex items-center justify-between text-white">
                        <h2 class="demo-modal-title text-lg font-bold"></h2>

                        <button
                            type="button"
                            class="demo-modal-close inline-flex size-10 items-center justify-center rounded-md bg-white/10 text-white transition hover:bg-white/20"
                            aria-label="Close preview"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <div class="overflow-hidden rounded-xl bg-white">
                        <div class="max-h-[85vh] overflow-y-auto overflow-x-hidden p-3">
                            <img
                                src=""
                                alt=""
                                class="demo-modal-image mx-auto h-auto w-full max-w-[700px]"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-14 h-px bg-slate-200"></div>

        <div id="features-section" class="scroll-mt-45 grid gap-10 lg:grid-cols-[0.72fr_1.8fr] lg:items-start">
            <div>
                <p class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-brand-primary">
                    <?php esc_html_e('Theme Features', 'emerald-isle'); ?>
                </p>

                <h2 class="max-w-sm text-3xl font-bold leading-tight text-slate-950">
                    <?php esc_html_e('Everything You Need to Build Amazing Sites', 'emerald-isle'); ?>
                </h2>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                <article class="flex gap-4 rounded-md border border-slate-200 bg-white p-5">
                    <span class="inline-flex size-11 shrink-0 items-center justify-center rounded-md bg-emerald-100 text-brand-primary">
                        <!-- Custom Components icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z" />
                        </svg>
                    </span>

                    <div>
                        <h3 class="mb-1 text-sm font-bold text-slate-950">
                            <?php esc_html_e('Custom Components', 'emerald-isle'); ?>
                        </h3>
                        <p class="m-0 text-sm leading-6 text-slate-600">
                            <?php esc_html_e('A growing library of reusable components and patterns.', 'emerald-isle'); ?>
                        </p>
                    </div>
                </article>

                <article class="flex gap-4 rounded-md border border-slate-200 bg-white p-5">
                    <span class="inline-flex size-11 shrink-0 items-center justify-center rounded-md bg-emerald-100 text-brand-primary">
                        <!-- Advanced Options icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                        </svg>
                    </span>

                    <div>
                        <h3 class="mb-1 text-sm font-bold text-slate-950">
                            <?php esc_html_e('Advanced Options', 'emerald-isle'); ?>
                        </h3>
                        <p class="m-0 text-sm leading-6 text-slate-600">
                            <?php esc_html_e('Powerful theme options to customize every detail.', 'emerald-isle'); ?>
                        </p>
                    </div>
                </article>

                <article class="flex gap-4 rounded-md border border-slate-200 bg-white p-5">
                    <span class="inline-flex size-11 shrink-0 items-center justify-center rounded-md bg-emerald-100 text-brand-primary">
                        <!-- Performance Focused icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                        </svg>
                    </span>

                    <div>
                        <h3 class="mb-1 text-sm font-bold text-slate-950">
                            <?php esc_html_e('Performance Focused', 'emerald-isle'); ?>
                        </h3>
                        <p class="m-0 text-sm leading-6 text-slate-600">
                            <?php esc_html_e('Clean code, optimized assets, and best practices.', 'emerald-isle'); ?>
                        </p>
                    </div>
                </article>

                <article class="flex gap-4 rounded-md border border-slate-200 bg-white p-5">
                    <span class="inline-flex size-11 shrink-0 items-center justify-center rounded-md bg-emerald-100 text-brand-primary">
                        <!-- SEO Friendly icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>

                    <div>
                        <h3 class="mb-1 text-sm font-bold text-slate-950">
                            <?php esc_html_e('SEO Friendly', 'emerald-isle'); ?>
                        </h3>
                        <p class="m-0 text-sm leading-6 text-slate-600">
                            <?php esc_html_e('Built with SEO best practices to help you rank higher.', 'emerald-isle'); ?>
                        </p>
                    </div>
                </article>

                <article class="flex gap-4 rounded-md border border-slate-200 bg-white p-5">
                    <span class="inline-flex size-11 shrink-0 items-center justify-center rounded-md bg-emerald-100 text-brand-primary">
                        <!-- WooCommerce Ready icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </span>

                    <div>
                        <h3 class="mb-1 text-sm font-bold text-slate-950">
                            <?php esc_html_e('WooCommerce Ready', 'emerald-isle'); ?>
                        </h3>
                        <p class="m-0 text-sm leading-6 text-slate-600">
                            <?php esc_html_e('Beautiful shop layouts and custom product styles.', 'emerald-isle'); ?>
                        </p>
                    </div>
                </article>

                <article class="flex gap-4 rounded-md border border-slate-200 bg-white p-5">
                    <span class="inline-flex size-11 shrink-0 items-center justify-center rounded-md bg-emerald-100 text-brand-primary">
                        <!-- Regular Updates icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </span>

                    <div>
                        <h3 class="mb-1 text-sm font-bold text-slate-950">
                            <?php esc_html_e('Regular Updates', 'emerald-isle'); ?>
                        </h3>
                        <p class="m-0 text-sm leading-6 text-slate-600">
                            <?php esc_html_e('Constant updates and new features you\'ll love.', 'emerald-isle'); ?>
                        </p>
                    </div>
                </article>

            </div>
    </div>
</section>
