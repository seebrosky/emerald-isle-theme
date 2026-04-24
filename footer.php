        <footer class="<?php echo is_front_page() ? 'mt-0 bg-site-footer' : 'mt-16 border-t border-white/10 bg-site-footer'; ?>">
            <div class="mx-auto max-w-6xl px-6 py-10 text-sm text-site-text-dark">
                <div class="grid gap-10 md:grid-cols-[1.5fr_1fr_1fr_1.4fr]">

                    <!-- Brand -->
                    <div>
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image(
                            $custom_logo_id,
                            'thumbnail',
                            false,
                            [
                                'class' => 'h-auto w-[70px] max-w-full',
                            ]
                        );
                        ?>

                        <a href="<?php echo esc_url(home_url('/')); ?>" class="mb-4 inline-block text-white">
                            <?php if ($logo) : ?>
                                <?php echo $logo; ?>
                            <?php else : ?>
                                <span class="text-lg font-bold">
                                    <?php bloginfo('name'); ?>
                                </span>
                            <?php endif; ?>
                        </a>

                        <p class="mb-4 max-w-xs text-xs leading-6 text-white/55">
                            Freelance Developer based in the U.S.
                        </p>

                        <p class="text-xs text-white/35">
                            &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved.
                        </p>
                    </div>

                    <!-- Navigation -->
                    <div>
                        <h2 class="mb-4 text-xs font-semibold uppercase tracking-[0.18em] text-white">
                            Navigation
                        </h2>

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_navigation',
                            'container'      => false,
                            'menu_class'     => 'footer-menu space-y-2 text-xs text-white/55',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ]);
                        ?>
                    </div>

                    <!-- Connect -->
                    <div>
                        <h2 class="mb-4 text-xs font-semibold uppercase tracking-[0.18em] text-white">
                            Connect
                        </h2>

                        <ul class="space-y-2 text-xs text-white/55">
                            <li>
                                <a href="mailto:hello@example.com" class="transition hover:text-brand-primary">
                                    Email
                                </a>
                            </li>
                            <li>
                                <a href="#" class="transition hover:text-brand-primary">
                                    LinkedIn
                                </a>
                            </li>
                            <li>
                                <a href="#" class="transition hover:text-brand-primary">
                                    GitHub
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Availability -->
                    <div>
                        <h2 class="mb-4 text-xs font-semibold uppercase tracking-[0.18em] text-white">
                            Availability
                        </h2>

                        <p class="mb-4 max-w-xs text-xs leading-6 text-white/55">
                            I’m open to new design, development, and strategy projects.
                        </p>

                        <form class="flex max-w-xs overflow-hidden rounded-sm border border-white/10 bg-white/5" action="#" method="post">
                            <label for="footer-email" class="sr-only">Email address</label>

                            <input
                                id="footer-email"
                                name="footer-email"
                                type="email"
                                placeholder="Your email address"
                                class="min-w-0 flex-1 bg-transparent px-3 py-2 text-xs text-white placeholder:text-white/35 focus:outline-none"
                            >

                            <button
                                type="submit"
                                class="bg-brand-primary px-3 text-xs font-bold text-black transition hover:bg-[var(--color-primary-hover)] cursor-pointer"
                                aria-label="Submit email"
                            >
                                →
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>