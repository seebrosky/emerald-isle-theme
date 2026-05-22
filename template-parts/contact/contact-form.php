<?php
/**
 * Contact Page Form Section
 *
 * Displays the contact form and contact information cards.
 *
 * @package Emerald_Isle
 */
?>

<section class="bg-site-bg py-16 lg:py-20">
    <div class="mx-auto grid max-w-6xl gap-8 px-6 lg:grid-cols-[1.35fr_0.95fr]">

        <div class="rounded-2xl border border-border-light bg-white p-8 shadow-sm lg:p-10">
            <h2 class="mb-3 text-3xl font-extrabold tracking-[-0.04em] text-site-text">
                Send Us A Message
            </h2>

            <p class="mb-8 max-w-md text-base leading-7 text-site-text-muted">
                Fill out the form below and we’ll get back to you as soon as possible.
            </p>

            <?php echo do_shortcode('[fluentform id="1"]'); ?>
        </div>

        <aside class="rounded-2xl border border-border-light bg-white p-8 shadow-sm lg:p-10">
            <h2 class="mb-3 text-3xl font-extrabold tracking-[-0.04em] text-site-text">
                Contact Information
            </h2>

            <p class="mb-8 text-base leading-7 text-site-text-muted">
                Choose the best way to reach us.
            </p>

            <div class="space-y-8">
                <div class="flex gap-5">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-emerald-600/10 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-site-text">Our Office</h3>
                        <p class="mt-1 text-sm leading-6 text-site-text-muted">
                            123 Innovation Drive<br>
                            Suite 500<br>
                            San Francisco, CA 94107
                        </p>
                    </div>
                </div>

                <div class="flex gap-5">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-emerald-600/10 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-site-text">Phone</h3>
                        <p class="mt-1 text-sm leading-6 text-site-text-muted">
                            +1 (415) 555-0198<br>
                            Mon – Fri: 9am – 6pm PST
                        </p>
                    </div>
                </div>

                <div class="flex gap-5">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-xl bg-emerald-600/10 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-site-text">Email</h3>
                        <p class="mt-1 text-sm leading-6 text-site-text-muted">
                            hello@emeraldisle.com<br>
                            support@emeraldisle.com
                        </p>
                    </div>
                </div>
            </div>
        </aside>

    </div>
</section>