<?php
/**
 * Testimonials Template
 *
 * Renders the homepage testimonial slider.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

$page_id      = get_queried_object_id();
$testimonials = function_exists('get_field') ? get_field('home_testimonials', $page_id) : array();

if (empty($testimonials)) {
    return;
}
?>

<section class="bg-slate-950 text-white" data-testimonial-slider>
    <div class="mx-auto flex min-h-[11rem] max-w-6xl items-center px-6 py-8">
        <div class="grid w-full items-center gap-6 lg:grid-cols-[auto_minmax(0,1fr)_16rem_auto] lg:gap-8">

            <div class="hidden -translate-y-4 text-brand-primary lg:block lg:-translate-y-6" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="size-20 fill-current">
                    <path d="M14.505 5.873C10.568 8.393 8.6 11.43 8.6 14.98c0 1.105.193 1.657.577 1.657l.396-.107c.312-.12.563-.18.756-.18c1.127 0 2.07.41 2.825 1.23c.756.82 1.134 1.83 1.134 3.036c0 1.157-.41 2.14-1.225 2.947c-.816.807-1.8 1.21-2.952 1.21c-1.608 0-2.935-.66-3.98-1.983c-1.043-1.32-1.564-2.98-1.564-4.977c0-2.26.442-4.327 1.33-6.203c.89-1.875 2.244-3.57 4.068-5.085c1.824-1.514 2.988-2.272 3.492-2.272c.336 0 .612.162.828.486c.216.323.324.605.324.845l-.107.288zm12.96 0c-3.937 2.52-5.904 5.556-5.904 9.108c0 1.105.193 1.657.577 1.657l.396-.107c.312-.12.563-.18.756-.18c1.103 0 2.04.41 2.807 1.23c.77.82 1.152 1.83 1.152 3.036c0 1.157-.41 2.14-1.225 2.947c-.816.807-1.8 1.21-2.952 1.21c-1.608 0-2.935-.66-3.98-1.983c-1.043-1.32-1.564-2.98-1.564-4.977c0-2.284.448-4.37 1.35-6.256c.9-1.887 2.255-3.577 4.067-5.067C24.76 5 25.917 4.254 26.42 4.254c.337 0 .613.162.83.486c.215.324.323.606.323.846l-.108.287z"/>
                </svg>
            </div>

            <div class="relative min-h-[8rem] min-w-0 sm:min-h-[6.5rem] lg:min-h-[4.5rem]">
                <?php foreach ($testimonials as $index => $testimonial) : ?>
                    <?php $quote = $testimonial['testimonial_quote'] ?? ''; ?>

                    <blockquote
                        class="<?php echo 0 === $index ? 'opacity-100' : 'pointer-events-none opacity-0'; ?> absolute inset-0 flex items-center transition-opacity duration-300 ease-out"
                        data-testimonial-slide
                    >
                        <p class="m-0 max-w-full text-lg italic leading-8 text-white lg:max-w-2xl">
                            <?php echo esc_html($quote); ?>
                        </p>
                    </blockquote>
                <?php endforeach; ?>
            </div>

            <div class="relative min-h-36 w-full min-w-0 lg:min-h-16 lg:w-64">
                <?php foreach ($testimonials as $index => $testimonial) : ?>
                    <?php
                    $name   = $testimonial['testimonial_name'] ?? '';
                    $role   = $testimonial['testimonial_role'] ?? '';
                    $rating = absint($testimonial['testimonial_rating'] ?? 5);
                    $image  = absint($testimonial['testimonial_image'] ?? 0);

                    $rating = max(1, min(5, $rating));
                    ?>

                    <div
                        class="<?php echo 0 === $index ? 'opacity-100' : 'pointer-events-none opacity-0'; ?> absolute inset-0 flex flex-col items-center justify-center gap-3 text-center transition-opacity duration-300 ease-out lg:flex-row lg:justify-start lg:gap-4 lg:text-left"
                        data-testimonial-person
                    >
                        <div class="size-16 shrink-0 overflow-hidden rounded-full bg-surface-50">
                            <?php
                            if ($image) {
                                echo wp_get_attachment_image(
                                    $image,
                                    'thumbnail',
                                    false,
                                    array(
                                        'class' => 'h-full w-full object-cover',
                                        'alt'   => '',
                                    )
                                );
                            }
                            ?>
                        </div>

                        <div class="w-auto shrink-0">
                            <p class="m-0 whitespace-nowrap text-sm font-bold text-white">
                                <?php echo esc_html($name); ?>
                            </p>

                            <?php if (! empty($role)) : ?>
                                <p class="m-0 text-xs text-white/65">
                                    <?php echo esc_html($role); ?>
                                </p>
                            <?php endif; ?>

                            <div class="mt-1 flex justify-center gap-0.5 text-orange-500 lg:justify-start">
                                <span class="sr-only">
                                    <?php echo esc_html(sprintf(__('%d out of 5 stars', 'emerald-isle'), $rating)); ?>
                                </span>

                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                        class="size-4 <?php echo $i <= $rating ? 'opacity-100' : 'opacity-25'; ?>"
                                        aria-hidden="true"
                                        focusable="false"
                                    >
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                    </svg>
                                <?php endfor; ?>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count($testimonials) > 1) : ?>
                <div class="flex items-center justify-center gap-3 lg:justify-start">
                    <button
                        type="button"
                        class="group inline-flex size-10 items-center justify-center rounded-full border border-white/25 text-white/75 transition-colors duration-200 hover:border-white/50 hover:text-white focus-visible:border-white/50 focus-visible:text-white"
                        aria-label="<?php esc_attr_e('Previous testimonial', 'emerald-isle'); ?>"
                        data-testimonial-prev
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="rotate-[-90deg] transition-transform duration-[180ms] ease-out group-hover:scale-[1.14] group-focus-visible:scale-[1.14]"
                            aria-hidden="true"
                            focusable="false">
                            <path d="m18 15-6-6-6 6" />
                        </svg>
                    </button>

                    <button
                        type="button"
                        class="group inline-flex size-10 items-center justify-center rounded-full border border-white/25 text-white/75 transition-colors duration-200 hover:border-white/50 hover:text-white focus-visible:border-white/50 focus-visible:text-white"
                        aria-label="<?php esc_attr_e('Next testimonial', 'emerald-isle'); ?>"
                        data-testimonial-next
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.25"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="rotate-90 transition-transform duration-[180ms] ease-out group-hover:scale-[1.10] group-focus-visible:scale-[1.10]"
                            aria-hidden="true"
                            focusable="false">
                            <path d="m18 15-6-6-6 6" />
                        </svg>
                    </button>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

