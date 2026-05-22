<?php
/**
 * Footer Template
 *
 * Renders the site footer.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

$theme_uri = get_template_directory_uri();
?>

        <footer class="mt-0 footer-gradient text-white border-b border-black/[0.6]">

            <div class="mx-auto max-w-6xl px-6 py-16">
                <div class="grid gap-12 md:grid-cols-[1.4fr_1fr_1fr]">

                    <div>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="mb-6 inline-flex items-center gap-3">
                            <?php
                            $custom_logo_id = get_theme_mod('custom_logo');

                            if ($custom_logo_id) {
                                echo wp_get_attachment_image(
                                    $custom_logo_id,
                                    'thumbnail',
                                    false,
                                    array('class' => 'h-auto w-[64px]')
                                );
                            } else {
                                echo '<span class="text-lg font-bold text-white">' . esc_html(get_bloginfo('name')) . '</span>';
                            }
                            ?>
                        </a>

                        <p class="mb-6 max-w-sm text-sm leading-7 text-white/70">
                            <?php esc_html_e('A modern WordPress theme crafted for performance, scalability, and clean design.', 'emerald-isle'); ?>
                        </p>

                        <div class="flex items-center gap-3">
                            <a
                                href="#"
                                aria-label="<?php esc_attr_e('GitHub', 'emerald-isle'); ?>"
                                class="inline-flex size-9 items-center justify-center rounded-full bg-white/[0.08] transition duration-200 ease-out hover:-translate-y-px hover:bg-white/[0.16] focus-visible:-translate-y-px focus-visible:bg-white/[0.16]"
                            >
                                <img
                                    src="<?php echo esc_url($theme_uri . '/assets/icons/github.svg'); ?>"
                                    alt=""
                                    class="size-5 brightness-0 invert"
                                    height="800"
                                    width="800"
                                >
                            </a>

                            <a
                                href="#"
                                aria-label="<?php esc_attr_e('Instagram', 'emerald-isle'); ?>"
                                class="inline-flex size-9 items-center justify-center rounded-full bg-white/[0.08] transition duration-200 ease-out hover:-translate-y-px hover:bg-white/[0.16] focus-visible:-translate-y-px focus-visible:bg-white/[0.16]"
                            >
                                <img
                                    src="<?php echo esc_url($theme_uri . '/assets/icons/instagram.svg'); ?>"
                                    alt=""
                                    class="size-5 brightness-0 invert"
                                    height="800"
                                    width="800"
                                >
                            </a>

                            <a
                                href="#"
                                aria-label="<?php esc_attr_e('LinkedIn', 'emerald-isle'); ?>"
                                class="inline-flex size-9 items-center justify-center rounded-full bg-white/[0.08] transition duration-200 ease-out hover:-translate-y-px hover:bg-white/[0.16] focus-visible:-translate-y-px focus-visible:bg-white/[0.16]"
                            >
                                <img
                                    src="<?php echo esc_url($theme_uri . '/assets/icons/linkedin.svg'); ?>"
                                    alt=""
                                    class="size-4 brightness-0 invert"
                                    height="800"
                                    width="800"
                                >
                            </a>

                            <a
                                href="#"
                                aria-label="<?php esc_attr_e('X / Twitter', 'emerald-isle'); ?>"
                                class="inline-flex size-9 items-center justify-center rounded-full bg-white/[0.08] transition duration-200 ease-out hover:-translate-y-px hover:bg-white/[0.16] focus-visible:-translate-y-px focus-visible:bg-white/[0.16]"
                            >
                                <img
                                    src="<?php echo esc_url($theme_uri . '/assets/icons/x.svg'); ?>"
                                    alt=""
                                    class="size-4 brightness-0 invert"
                                    height="512"
                                    width="512"
                                >
                            </a>

                            <a
                                href="#"
                                aria-label="<?php esc_attr_e('YouTube', 'emerald-isle'); ?>"
                                class="inline-flex size-9 items-center justify-center rounded-full bg-white/[0.08] transition duration-200 ease-out hover:-translate-y-px hover:bg-white/[0.16] focus-visible:-translate-y-px focus-visible:bg-white/[0.16]"
                            >
                                <img
                                    src="<?php echo esc_url($theme_uri . '/assets/icons/youtube.svg'); ?>"
                                    alt=""
                                    class="size-5 brightness-0 invert"
                                    height="800"
                                    width="800"
                                >
                            </a>
                        </div>

                    </div>

                    <div>
                        <h2 class="mb-6 text-xs font-semibold uppercase tracking-[0.22em] text-brand-primary">
                            <?php esc_html_e('Site Map', 'emerald-isle'); ?>
                        </h2>

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_navigation',
                            'container'      => false,
                            'menu_class'     => 'footer-menu space-y-3 text-sm text-white/75',
                            'fallback_cb'    => false,
                            'depth'          => 1,
                        ));
                        ?>
                    </div>

                    <div>
                        <h2 class="mb-6 text-xs font-semibold uppercase tracking-[0.22em] text-brand-primary">
                            <?php esc_html_e('Availability', 'emerald-isle'); ?>
                        </h2>

                        <p class="mb-6 max-w-xs text-sm leading-7 text-white/70">
                            <?php esc_html_e("I'm open to new design, development, and strategy projects.", 'emerald-isle'); ?>
                        </p>

                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Get in Touch', 'emerald-isle'); ?>
                        </a>
                    </div>

                </div>
            </div>

        </footer>

        <div class="bg-slate-975 py-3 text-center text-sm text-white border-t border-[rgb(46_54_65_/_68%)]">
            &copy; <?php echo esc_html(wp_date('Y')); ?> <?php echo esc_html(get_bloginfo('name')); ?>. <?php esc_html_e('All rights reserved.', 'emerald-isle'); ?>
        </div>       

        <a href="#top" class="footer-scroll-top" id="scrollTopBtn" aria-label="<?php esc_attr_e('Back to top', 'emerald-isle'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.25"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
                focusable="false">
                <path d="m18 15-6-6-6 6" />
            </svg>
        </a>

        <?php wp_footer(); ?>
    </body>
</html>
