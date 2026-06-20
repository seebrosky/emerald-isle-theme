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

$source_page_id = get_query_var( 'emerald_showcase_source_page_id' );
$source_page_id = $source_page_id ? absint( $source_page_id ) : false;
?>

<?php if ( have_rows( 'hero_slides', $source_page_id ) ) : ?>
    <section class="hero-slider splide relative overflow-hidden" aria-label="<?php esc_attr_e('Homepage hero slider', 'emerald-isle'); ?>">

        <div class="relative">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php $slide_index = 0; ?>

                    <?php while ( have_rows( 'hero_slides', $source_page_id ) ) : the_row(); ?>
                        <?php
                        $slide_index++;

                        $slide_theme    = get_sub_field('slide_theme') ?: 'dark';
                        $eyebrow        = get_sub_field('eyebrow');
                        $heading        = get_sub_field('heading');
                        $highlighted    = get_sub_field('highlighted_text');
                        $description    = get_sub_field('description');
                        $primary_text   = get_sub_field('primary_button_text');
                        $primary_link   = get_sub_field('primary_button_url');
                        $secondary_text = get_sub_field('secondary_button_text');
                        $secondary_link = get_sub_field('secondary_button_url');
                        $image          = get_sub_field('image');
                        $is_light_slide = in_array($slide_theme, array('light', 'cream'), true);
                        $secondary_button_class = $is_light_slide ? 'btn btn-outline-dark' : 'btn btn-outline-light';                        
                        ?>

                        <li class="splide__slide hero-slide hero-slide--<?php echo esc_attr( $slide_theme ); ?>">
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
                                                class="<?php echo esc_attr($secondary_button_class); ?>"
                                            >
                                                <?php echo esc_html($secondary_text); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if ($image) : ?>
                                    <div class="overflow-hidden rounded-xl shadow-2xl shadow-black/30">
                                        <?php
                                        echo wp_get_attachment_image(
                                            $image['ID'],
                                            'large',
                                            false,
                                            array(
                                                'class'         => 'h-auto w-full',
                                                'loading'       => 1 === $slide_index ? 'eager' : 'lazy',
                                                'fetchpriority' => 1 === $slide_index ? 'high' : 'auto',
                                                'sizes'         => '(min-width: 1024px) 50vw, 100vw',
                                            )
                                        );
                                        ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </li>
                    <?php endwhile; ?>

                </ul>
            </div>

            <div class="hero-slider-controls">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev group" type="button" aria-label="Previous slide">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="rotate-[-90deg] transition-transform duration-200 ease-out group-hover:scale-[1.14] group-focus-visible:scale-[1.14]"
                            aria-hidden="true"
                            focusable="false"
                        >
                            <path d="m18 15-6-6-6 6" />
                        </svg>
                    </button>

                    <ul class="splide__pagination"></ul>

                    <button class="splide__arrow splide__arrow--next group" type="button" aria-label="Next slide">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="rotate-90 transition-transform duration-[180ms] ease-out group-hover:scale-[1.14] group-focus-visible:scale-[1.14]"
                            aria-hidden="true"
                            focusable="false">
                            <path d="m18 15-6-6-6 6" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>