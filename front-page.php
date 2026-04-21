<?php get_header(); ?>

<main>

    <section class="hero relative text-white">

        <div class="relative z-10 mx-auto max-w-6xl px-6 py-12 sm:py-16 lg:flex lg:items-center lg:gap-12 lg:py-28">
            
            <!-- Left Content -->
            <div class="flex-1">
                <p class="mb-3 text-[0.7rem] uppercase tracking-[0.14em] text-[var(--color-primary)]/85 sm:mb-4 sm:text-[0.8rem] sm:tracking-[0.18em] lg:text-sm">
                    Design • Development • Performance
                </p>

                <h1 class="mb-5 max-w-[10ch] text-4xl font-bold leading-[0.95] sm:text-5xl lg:max-w-none lg:text-7xl lg:leading-tight">
                    I build modern websites 
                    <span class="text-[var(--color-primary)]">that drive results.</span>
                </h1>

                <p class="mb-8 max-w-[22rem] text-base leading-8 text-white/78 sm:text-lg lg:max-w-xl lg:text-white/70">
                    Custom WordPress themes, performance-first builds, and clean UI systems that scale.
                </p>

                <div class="flex flex-wrap gap-3 sm:gap-4">
                    <a href="#" class="rounded-md bg-[var(--color-primary)] px-6 py-3 font-semibold text-[#08090d]">
                        View My Work
                    </a>

                    <a href="#" class="rounded-md border border-white/20 px-6 py-3 font-semibold text-white">
                        Let’s Work Together
                    </a>
                </div>
            </div>

            <!-- Right side stays empty (image will be background) -->
            <div class="hidden lg:block flex-1"></div>

        </div>

    </section>

    <section class="bg-[#f5f5f3] py-20">
        <div class="mx-auto grid max-w-6xl gap-12 px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">

            <div class="relative">
                <div class="absolute -left-4 -top-4 h-20 w-20 border-l-4 border-t-4 border-black/10"></div>
                <div class="max-w-sm overflow-hidden rounded-sm bg-white shadow-sm">
                    <div class="aspect-[4/5] w-full bg-gray-300"></div>
                </div>
                <div class="absolute -bottom-4 right-6 text-2xl italic text-brand-primary/70">
                    Chris Brosky
                </div>
            </div>

            <div>
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-brand-primary/80">
                    About Me
                </p>

                <h2 class="mb-5 max-w-xl text-4xl font-bold leading-tight text-slate-900">
                    Strategy. Design.<br>Development. Done right.
                </h2>

                <p class="mb-8 max-w-2xl text-base leading-7 text-slate-600">
                    I partner with businesses and agencies to create websites that are not only beautiful,
                    but built for performance, SEO, and conversions.
                </p>

                <div class="mb-8 grid gap-4 sm:grid-cols-3">
                    <div class="flex items-start gap-3 rounded-lg bg-white/70 p-4">
                        <div class="mt-1 h-5 w-5 rounded-sm bg-brand-primary/15"></div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Performance Focused</h3>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 rounded-lg bg-white/70 p-4">
                        <div class="mt-1 h-5 w-5 rounded-sm bg-brand-primary/15"></div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Responsive by Design</h3>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 rounded-lg bg-white/70 p-4">
                        <div class="mt-1 h-5 w-5 rounded-sm bg-brand-primary/15"></div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900">Results Driven</h3>
                        </div>
                    </div>
                </div>

                <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-900 transition hover:text-brand-primary">
                    More About Me
                    <span aria-hidden="true">→</span>
                </a>
            </div>

        </div>
    </section>    

    <section class="bg-white py-24">
        <div class="mx-auto max-w-6xl px-6">
            <h2 class="mb-3 text-center text-sm font-semibold uppercase tracking-[0.18em] text-gray-500">
                Featured Work
            </h2>

            <h3 class="mb-12 text-center text-4xl font-bold text-slate-900">
                Selected Projects
            </h3>

            <div class="grid gap-8 md:grid-cols-3">

                <div class="group">
                    <div class="mb-4 aspect-[4/3] rounded-xl bg-gray-200 shadow-sm transition duration-300 group-hover:-translate-y-1"></div>
                    <h4 class="text-lg font-semibold text-slate-900">Project One</h4>
                    <p class="text-sm text-gray-500">Custom WordPress theme</p>
                </div>

                <div class="group">
                    <div class="mb-4 aspect-[4/3] rounded-xl bg-gray-200 shadow-sm transition duration-300 group-hover:-translate-y-1"></div>
                    <h4 class="text-lg font-semibold text-slate-900">Project Two</h4>
                    <p class="text-sm text-gray-500">Performance-focused build</p>
                </div>

                <div class="group">
                    <div class="mb-4 aspect-[4/3] rounded-xl bg-gray-200 shadow-sm transition duration-300 group-hover:-translate-y-1"></div>
                    <h4 class="text-lg font-semibold text-slate-900">Project Three</h4>
                    <p class="text-sm text-gray-500">UI/UX system</p>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-site-header py-24 text-white">
        <div class="mx-auto max-w-6xl px-6 text-center">
            <h2 class="mb-6 text-4xl font-bold">
                Ready to build something great?
            </h2>

            <a href="#" class="inline-block rounded-md bg-brand-primary px-6 py-3 font-semibold text-black transition hover:opacity-90">
                Start a Project
            </a>
        </div>
    </section>

    <!-- <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="py-16">
            <div class="mx-auto max-w-6xl px-6">
                <div class="prose max-w-none">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?> -->

</main>

<?php get_footer(); ?>