<?php
/**
 * Hero Slider Template
 *
 * Displays the homepage hero section slider with promotional content,
 * call-to-action buttons, and featured imagery.
 *
 * Powered by ACF repeater fields and Splide.js.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

<?php if ( have_rows( 'hero_slides' ) ) : ?>
    <section class="hero-slider splide relative overflow-hidden bg-site-header text-white" aria-label="<?php esc_attr_e('Homepage hero slider', 'emerald-isle'); ?>">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>

        <div class="relative">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php while (have_rows('hero_slides')) : the_row(); ?>
                        <?php
                        $eyebrow        = get_sub_field('eyebrow');
                        $heading        = get_sub_field('heading');
                        $highlighted    = get_sub_field('highlighted_text');
                        $description    = get_sub_field('description');
                        $primary_text   = get_sub_field('primary_button_text');
                        $primary_link   = get_sub_field('primary_button_url');
                        $secondary_text = get_sub_field('secondary_button_text');
                        $secondary_link = get_sub_field('secondary_button_url');
                        $image          = get_sub_field('image');
                        ?>

                        <li class="splide__slide">
                            <div class="mx-auto grid min-h-[620px] max-w-6xl items-center gap-12 px-6 py-20 lg:grid-cols-2">

                                <div>
                                    <?php if ($eyebrow) : ?>
                                        <p class="mb-5 inline-flex rounded-full bg-emerald-600/15 px-3 py-2 text-xs font-extrabold uppercase tracking-[0.18em] text-brand-primary">
                                            <?php echo esc_html($eyebrow); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if ($heading) : ?>
                                        <h1 class="text-4xl font-bold leading-[0.98] text-white sm:text-5xl lg:text-6xl xl:text-7xl lg:leading-[0.98]">
                                            <?php echo esc_html($heading); ?>

                                            <?php if ($highlighted) : ?>
                                                <span class="text-brand-primary">
                                                    <?php echo esc_html($highlighted); ?>
                                                </span>
                                            <?php endif; ?>
                                        </h1>
                                    <?php endif; ?>

                                    <?php if ($description) : ?>
                                        <p class="mt-7 max-w-xl text-lg font-medium leading-8 text-white/85">
                                            <?php echo esc_html($description); ?>
                                        </p>
                                    <?php endif; ?>

                                    <div class="mt-9 flex flex-wrap gap-4">
                                        <?php if ($primary_text && $primary_link) : ?>
                                            <a
                                                href="<?php echo esc_url($primary_link['url']); ?>"
                                                target="<?php echo esc_attr($primary_link['target'] ?: '_self'); ?>"
                                                class="btn btn-primary"
                                            >
                                                <?php echo esc_html($primary_text); ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($secondary_text && $secondary_link) : ?>
                                            <a
                                                href="<?php echo esc_url($secondary_link['url']); ?>"
                                                target="<?php echo esc_attr($secondary_link['target'] ?: '_self'); ?>"
                                                class="btn btn-outline-light"
                                            >
                                                <?php echo esc_html($secondary_text); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if ($image) : ?>
                                    <div class="overflow-hidden rounded-xl shadow-2xl shadow-black/30">
                                        <img
                                            src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php echo esc_attr($image['alt']); ?>"
                                            class="h-auto w-full"
                                        >
                                    </div>
                                <?php endif; ?>

                            </div>
                        </li>
                    <?php endwhile; ?>

                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>