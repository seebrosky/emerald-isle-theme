<footer class="mt-0 bg-site-footer text-site-text-dark">

    <div class="mx-auto max-w-6xl px-6 py-16">
        <div class="grid gap-12 md:grid-cols-[1.4fr_1fr_1fr]">

            <!-- Brand -->
            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mb-6 inline-flex items-center gap-3 text-white">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');

                    if ($custom_logo_id) {
                        echo wp_get_attachment_image(
                            $custom_logo_id,
                            'thumbnail',
                            false,
                            ['class' => 'h-auto w-[64px]']
                        );
                    } else {
                        echo '<span class="text-lg font-bold">' . esc_html(get_bloginfo('name')) . '</span>';
                    }
                    ?>
                </a>

                <p class="mb-6 max-w-sm text-sm leading-7 text-white/70">
                    Freelance Web Designer &amp; Developer building fast, modern WordPress websites that help businesses grow.
                </p>

                <div class="flex gap-1 text-sm text-white/70">
                    <a href="#" class="flex items-center justify-center size-12 lg:size-8 text-white hover:text-brand-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7.5 w-7.5 lg:h-4.5 lg:w-4.5 fill-current">
                            <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584l-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/>
                        </svg>
                    </a>
                    <a href="#" class="flex items-center justify-center size-12 lg:size-8 text-white hover:text-brand-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="h-8 w-8 lg:h-5 lg:w-5 fill-current">
                            <path fill-rule="evenodd" d="M3 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H3Zm1.102 4.297a1.195 1.195 0 1 0 0-2.39a1.195 1.195 0 0 0 0 2.39Zm1 7.516V6.234h-2v6.579h2ZM6.43 6.234h2v.881c.295-.462.943-1.084 2.148-1.084c1.438 0 2.219.953 2.219 2.766c0 .087.008.484.008.484v3.531h-2v-3.53c0-.485-.102-1.438-1.18-1.438c-1.079 0-1.17 1.198-1.195 1.982v2.986h-2V6.234Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="flex items-center justify-center size-12 lg:size-8 text-white hover:text-brand-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 lg:h-5 lg:w-5 fill-current">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                    <a href="#" class="flex items-center justify-center size-12 lg:size-8 text-white hover:text-brand-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="h-8 w-8 lg:h-5 lg:w-5 fill-current">
                            <path d="M8 5.67C6.71 5.67 5.67 6.72 5.67 8S6.72 10.33 8 10.33S10.33 9.28 10.33 8S9.28 5.67 8 5.67ZM15 8c0-.97 0-1.92-.05-2.89c-.05-1.12-.31-2.12-1.13-2.93c-.82-.82-1.81-1.08-2.93-1.13C9.92 1 8.97 1 8 1s-1.92 0-2.89.05c-1.12.05-2.12.31-2.93 1.13C1.36 3 1.1 3.99 1.05 5.11C1 6.08 1 7.03 1 8s0 1.92.05 2.89c.05 1.12.31 2.12 1.13 2.93c.82.82 1.81 1.08 2.93 1.13C6.08 15 7.03 15 8 15s1.92 0 2.89-.05c1.12-.05 2.12-.31 2.93-1.13c.82-.82 1.08-1.81 1.13-2.93c.06-.96.05-1.92.05-2.89Zm-7 3.59c-1.99 0-3.59-1.6-3.59-3.59S6.01 4.41 8 4.41s3.59 1.6 3.59 3.59s-1.6 3.59-3.59 3.59Zm3.74-6.49c-.46 0-.84-.37-.84-.84s.37-.84.84-.84s.84.37.84.84a.8.8 0 0 1-.24.59a.8.8 0 0 1-.59.24Z"/>
                        </svg>
                    </a> 
                    <a href="#" class="flex items-center justify-center size-12 lg:size-8 text-white hover:text-brand-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 432 416" class="h-7.5 w-7.5 lg:h-4.5 lg:w-4.5 fill-current">
                            <path d="M213.5 0q88.5 0 151 62.5T427 213q0 70-41 125.5T281 416q-14 2-14-11v-58q0-27-15-40q44-5 70.5-27t26.5-77q0-34-22-58q11-26-2-57q-18-5-58 22q-26-7-54-7t-53 7q-18-12-32.5-17.5T107 88h-6q-12 31-2 57q-22 24-22 58q0 55 27 77t70 27q-11 10-13 29q-42 18-62-18q-12-20-33-22q-2 0-4.5.5t-5 3.5t8.5 9q14 7 23 31q1 2 2 4.5t6.5 9.5t13 10.5T130 371t30-2v36q0 13-14 11q-64-22-105-77.5T0 213q0-88 62.5-150.5T213.5 0z"/>
                        </svg>
                    </a>                                     
                </div>

                <a
                    href="#top"
                    class="mt-8 inline-flex items-center gap-2 border border-white/40 px-4 py-2 text-xs font-semibold uppercase tracking-wide text-white transition hover:border-brand-primary hover:text-brand-primary"
                >
                    <span class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
                        </svg>

                        Back to top
                    </span>
                </a>
            </div>

            <!-- Navigation -->
            <div>
                <h2 class="mb-6 text-xs font-semibold uppercase tracking-[0.22em] text-white">
                    Site Map
                </h2>

                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_navigation',
                    'container'      => false,
                    'menu_class'     => 'footer-menu space-y-3 text-sm text-white/65',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ]);
                ?>
            </div>

            <!-- Availability -->
            <div>
                <h2 class="mb-6 text-xs font-semibold uppercase tracking-[0.22em] text-white">
                    Availability
                </h2>

                <p class="mb-6 max-w-xs text-sm leading-7 text-white/65">
                    I’m open to new design, development, and strategy projects.
                </p>

                <a
                    href="<?php echo esc_url(home_url('/contact')); ?>"
                    class="inline-flex items-center justify-center rounded-sm bg-brand-primary px-5 py-3 text-xs font-bold uppercase tracking-wide text-black transition hover:bg-[var(--color-primary-hover)]"
                >
                    Get in Touch
                </a>
            </div>

        </div>
    </div>

    <!-- Bottom bar (full width) -->
    <div class="copyright bg-brand-primary py-3 text-center text-black">
        &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved.
    </div>

    <?php wp_footer(); ?>
</footer>
</body>
</html>