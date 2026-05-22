<?php
/**
 * Contact Page Hero Section
 *
 * Displays the contact page hero with background image,
 * gradient overlays, and primary messaging content.
 *
 * @package Emerald_Isle
 */
?>

<section class="relative overflow-hidden bg-white">
    <div
        class="relative min-h-[420px] bg-no-repeat lg:min-h-[460px]"
        style="
            background-image: url('/wp-content/uploads/contact-page-hero-image-01b.webp');
            background-position: right center;
            background-size: auto 100%;
        "
    >
        <div class="absolute inset-0 bg-gradient-to-r from-[#f7f7f9] via-[#ffffff]/78 via-20% to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-white/10 via-transparent to-white/50"></div>

        <div class="relative mx-auto flex min-h-[420px] max-w-6xl items-center px-6 py-20 lg:min-h-[460px]">
            <div class="max-w-xl">
                <p class="mb-5 text-xs font-extrabold uppercase tracking-[0.18em] text-brand-primary">
                    Get in Touch
                </p>

                <h1 class="max-w-lg text-[clamp(3rem,5vw,4.75rem)] font-extrabold leading-[0.95] tracking-[-0.05em] text-site-text">
                    We’d Love To<br>
                    Hear From You
                </h1>

                <p class="mt-7 max-w-md text-base leading-8 text-site-text-muted">
                    Have a question, need support, or want to discuss your next project? Our team is here to help.
                </p>
            </div>
        </div>
    </div>
</section>