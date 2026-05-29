<?php
/**
 * Contact Page CTA Section
 *
 * Displays the contact page CTA banner and support callout.
 *
 * @package Emerald_Isle
 */
?>

<section class="bg-site-bg pb-16 lg:pb-10">
    <div class="mx-auto max-w-6xl px-6">

        <div class="overflow-hidden rounded-xl border border-border-light bg-white">
            <div class="grid min-h-[300px] lg:grid-cols-[42%_58%]">
                <div
                    class="relative min-h-[300px] bg-cover bg-[center_18%] md:bg-[center_12%] lg:min-h-[300px] lg:bg-center"
                    style="background-image: url('/wp-content/uploads/contact-cta-image-01.webp');"
                >
                    <div class="hidden lg:block absolute inset-y-0 right-0 w-32 bg-gradient-to-r from-transparent to-white"></div>
                </div>                

                <div class="flex items-center px-8 py-10 lg:px-12">
                    <div class="max-w-xl">
                        <p class="mb-4 text-xs font-extrabold uppercase tracking-[0.18em] text-brand-primary">
                            We're Here To Help
                        </p>

                        <h2 class="max-w-xl text-3xl font-extrabold leading-[1.05] tracking-[-0.04em] text-site-text">
                            Let's Build Something Great Together
                        </h2>

                        <p class="mt-5 max-w-xl text-base leading-7 text-site-text-muted">
                            Whether you have a question about our themes, need help with customization,
                            or want to explore a partnership, we're just a message away.
                        </p>

                        <div class="mt-7">
                            <a href="/about" class="btn btn-primary">
                                Learn More About Us
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-10 rounded-xl border border-emerald-600/10 bg-emerald-600/5 p-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                <div class="flex items-center gap-5">
                    <div class="flex size-14 shrink-0 items-center justify-center rounded-xl bg-emerald-600/10 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="size-9">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 10H6.75C7.44036 10 8 10.5596 8 11.25V14.75C8 15.4404 7.44036 16 6.75 16H6C4.34315 16 3 14.6569 3 13C3 11.3431 4.34315 10 6 10ZM6 10V9C6 5.68629 8.68629 3 12 3C15.3137 3 18 5.68629 18 9V10M18 10H17.25C16.5596 10 16 10.5596 16 11.25V14.75C16 15.4404 16.5596 16 17.25 16H18M18 10C19.6569 10 21 11.3431 21 13C21 14.6569 19.6569 16 18 16M18 16L17.3787 18.4851C17.1561 19.3754 16.3562 20 15.4384 20H13"
                            />
                        </svg>           
                    </div>

                    <div>
                        <h3 class="text-2xl font-extrabold tracking-[-0.04em] text-site-text">
                            Need Immediate Support?
                        </h3>

                        <p class="mt-1 text-base leading-7 text-site-text-muted">
                            Visit our help center for docs, guides and support.
                        </p>
                    </div>
                </div>

                <a href="#" class="btn btn-outline shrink-0">
                    Visit Help Center
                </a>

            </div>
        </div>
    </div>
</section>