        <footer class="mt-0 footer-gradient text-site-text">

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
                            Modern WordPress themes crafted for performance, scalability, and clean design.
                        </p>

<div class="flex items-center gap-2 text-site-text-muted">

    <a href="#" aria-label="GitHub" class="footer-social-link">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/github.svg"
            alt=""
            class="size-5"
        >
    </a>

    <a href="#" aria-label="Instagram" class="footer-social-link">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.svg"
            alt=""
            class="size-5"
        >
    </a>

    <a href="#" aria-label="LinkedIn" class="footer-social-link">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedin.svg"
            alt=""
            class="size-5"
        >
    </a>

    <a href="#" aria-label="X / Twitter" class="footer-social-link">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/x.svg"
            alt=""
            class="size-5"
        >
    </a>

    <a href="#" aria-label="YouTube" class="footer-social-link">
        <img
            src="<?php echo get_template_directory_uri(); ?>/assets/icons/youtube.svg"
            alt=""
            class="size-5"
        >
    </a>

</div>
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

            <div class="text-base bg-brand-primary py-3 text-center text-white">
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. All rights reserved.
            </div>

        </footer>

        <a href="#top" class="footer-scroll-top" id="scrollTopBtn" aria-label="Back to top">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.25"
                stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m18 15-6-6-6 6" />
            </svg>
        </a>

        <?php wp_footer(); ?>
    </body>
</html>