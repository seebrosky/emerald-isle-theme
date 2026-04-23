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

    <?php
        $about_image       = get_field('about_image');
        $about_eyebrow     = get_field('about_eyebrow');
        $about_heading     = get_field('about_heading');
        $about_description = get_field('about_description');
        $about_cta         = get_field('about_cta');
    ?>

    <section class="bg-[#f1f1f1] py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-12 xl:grid-cols-[460px_1fr] xl:items-center">

                <div class="flex justify-center sm:justify-start">
                    <div class="relative w-full max-w-[460px]">
                        <?php if ($about_image) : ?>
                            <?php
                            echo wp_get_attachment_image(
                                $about_image,
                                'full',
                                false,
                                [
                                    'class' => 'block h-auto w-full',
                                    'sizes' => '(min-width: 1024px) 460px, 100vw',
                                ]
                            );
                            ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <?php if ($about_eyebrow) : ?>
                        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-brand-primary/80">
                            <?php echo esc_html($about_eyebrow); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($about_heading) : ?>
                        <h2 class="mb-5 max-w-xl text-4xl font-bold leading-tight text-slate-900">
                            <?php echo nl2br(esc_html($about_heading)); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($about_description) : ?>
                        <div class="mb-8 max-w-2xl text-base leading-7 text-slate-600">
                            <?php echo wp_kses_post($about_description); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('about_features')) : ?>
                        <div class="mb-8 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                            <?php
                            $feature_index = 0;
                            while (have_rows('about_features')) : the_row();
                                $feature_index++;
                                $feature_title = get_sub_field('title');
                            ?>
                                <div class="flex min-h-[84px] items-center gap-3 rounded-lg bg-white/70 p-4">
                                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-md bg-brand-primary/15 text-brand-primary">
                                        <?php if ($feature_index === 1) : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 2L4 13h6l-1 9 11-13h-6l1-7z"/>
                                            </svg>
                                        <?php elseif ($feature_index === 2) : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="h-5 w-5">
                                                <rect x="3" y="4" width="18" height="11" rx="2"/>
                                                <path stroke-linecap="round" d="M9 20h6"/>
                                                <path stroke-linecap="round" d="M12 15v5"/>
                                            </svg>
                                        <?php else : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l5-5 4 4 7-8"/>
                                                <path stroke-linecap="round" d="M4 20h16"/>
                                            </svg>
                                        <?php endif; ?>
                                    </div>

                                    <div>
                                        <h3 class="text-sm font-semibold leading-snug text-slate-900 whitespace-nowrap xl:whitespace-normal">
                                            <?php echo esc_html($feature_title); ?>
                                        </h3>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                        $url    = $about_cta['url'] ?? home_url('/about');
                        $title  = $about_cta['title'] ?? 'About Me';
                        $target = $about_cta['target'] ?? '_self';
                    ?>                    

                    <?php if ($about_cta) : ?>
                        <a
                            href="<?php echo esc_url($url); ?>"
                            target="<?php echo esc_attr($target); ?>"
                            class="btn-about-reveal"
                        >
                            <span class="btn-about-reveal__bg" aria-hidden="true"></span>

                            <span class="btn-about-reveal__label">
                                <?php echo esc_html($title); ?>
                            </span>

                            <span class="btn-about-reveal__icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 6l6 6-6 6"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 6l6 6-6 6"/>
                                </svg>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>

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