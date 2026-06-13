<?php
/**
 * Blog Hero Template
 *
 * Displays the hero section for the blog archive page.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$hero_image = content_url( '/uploads/blog-archive-hero-04.webp' );
?>

<section
    class="blog-hero relative overflow-hidden bg-[#f3f3f7]"
    style="background-image: url('<?php echo esc_url( $hero_image ); ?>');"
>
    <div class="mx-auto max-w-6xl px-6 py-20 lg:py-28">
        <div class="max-w-xl">

            <p class="mb-4 text-xs font-extrabold uppercase tracking-[0.18em] text-brand-primary">
                Blog
            </p>

            <h1 class="text-4xl font-extrabold leading-[1.05] tracking-[-0.04em] text-site-text sm:text-5xl lg:text-6xl">
                Insights &amp; Ideas<br>
                to Grow Your Business
            </h1>

            <p class="mt-6 max-w-md text-base font-medium leading-8 text-site-text-muted">
                Practical tips, tutorials, and strategies to help you build better websites and run your business with confidence.
            </p>

        </div>
    </div>
</section>