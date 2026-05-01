        <footer class="mt-0 bg-brand-tertiary text-site-text">

            <div class="mx-auto max-w-6xl px-6 py-16">
                <div class="grid gap-12 md:grid-cols-[1.4fr_1fr_1fr]">

                    <!-- Brand -->
                    <div>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="mb-6 inline-flex items-center gap-3">
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
                                echo '<span class="text-lg font-bold text-site-text">' . esc_html(get_bloginfo('name')) . '</span>';
                            }
                            ?>
                        </a>

                        <p class="mb-6 max-w-sm text-sm leading-7 text-site-text-muted">
                            Professional Web Designer &amp; Developer building fast, modern WordPress websites that help businesses grow.
                        </p>

                        <div class="flex gap-1 text-sm text-site-text-muted">
                            <!-- icons -->
                            <a href="#" class="flex size-12 items-center justify-center text-site-text-muted hover:text-brand-primary transition">
                                <!-- svg -->
                            </a>
                            <!-- repeat for others -->
                        </div>

                        <a href="#top" class="btn btn-outline-dark mt-8">
                            Back to Top
                        </a>
                    </div>

                    <!-- Navigation -->
                    <div>
                        <h2 class="mb-6 text-xs font-semibold uppercase tracking-[0.22em] text-brand-primary">
                            Site Map
                        </h2>

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_navigation',
                            'container'      => false,
                            'menu_class'     => 'footer-menu space-y-3 text-sm text-site-text-muted',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ]);
                        ?>
                    </div>

                    <!-- Availability -->
                    <div>
                        <h2 class="mb-6 text-xs font-semibold uppercase tracking-[0.22em] text-brand-primary">
                            Availability
                        </h2>

                        <p class="mb-6 max-w-xs text-sm leading-7 text-site-text-muted">
                            I'm open to new design, development, and strategy projects.
                        </p>

                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                            Get in Touch
                        </a>
                    </div>

                </div>
            </div>

            <!-- Bottom bar -->
            <div class="copyright bg-brand-primary py-3 text-center text-white">
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved.
            </div>

            <?php wp_footer(); ?>
        </footer>
    </body>
</html>