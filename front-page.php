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
                    <a href="#" class="btn btn-primary">
                        View My Work
                    </a>

                    <a href="/contact/" class="btn btn-outline">
                        Let's Work Together
                    </a>
                </div>
            </div>

            <!-- Right side stays empty (background image used) -->
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

    <!-- About Section -->
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
                            class="btn btn-outline-dark group"
                        >
                            <span><?php echo esc_html($title); ?></span>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <?php if (have_rows('featured_projects')) : ?>
        <section class="bg-white py-24">
            <div class="mx-auto max-w-6xl px-6">
                <h2 class="mb-3 text-center text-sm font-semibold uppercase tracking-[0.18em] text-brand-primary/80">
                    Featured Work
                </h2>

                <h3 class="mb-12 text-center text-4xl font-bold text-slate-900">
                    Selected Projects
                </h3>

                <div class="grid gap-8 md:grid-cols-3">
                    <?php while (have_rows('featured_projects')) : the_row(); ?>
                        <?php
                        $project_image    = get_sub_field('project_image');
                        $project_title    = get_sub_field('project_title');
                        $project_category = get_sub_field('project_category');
                        $project_link     = get_sub_field('project_link');

                        $project_url    = $project_link['url'] ?? '#';
                        $project_target = $project_link['target'] ?? '_self';
                        ?>

                        <article class="group">
                            <?php if ($project_url) : ?>
                                <a href="<?php echo esc_url($project_url); ?>" target="<?php echo esc_attr($project_target); ?>" class="block no-underline">
                            <?php endif; ?>

                                <div class="mb-4 overflow-hidden rounded-xl bg-gray-200 shadow-sm">
                                    <?php if ($project_image) : ?>
                                        <?php
                                        echo wp_get_attachment_image(
                                            $project_image,
                                            'large',
                                            false,
                                            [
                                                'class' => 'aspect-[16/9] h-full w-full object-cover transition duration-300 group-hover:scale-105',
                                                'sizes' => '(min-width: 768px) 33vw, 100vw',
                                            ]
                                        );
                                        ?>
                                    <?php else : ?>
                                        <div class="aspect-[16/9] w-full bg-gray-200"></div>
                                    <?php endif; ?>
                                </div>

                                <?php if ($project_title) : ?>
                                    <h4 class="text-lg font-semibold text-slate-900">
                                        <?php echo esc_html($project_title); ?>
                                    </h4>
                                <?php endif; ?>

                                <?php if ($project_category) : ?>
                                    <p class="text-sm text-gray-500">
                                        <?php echo esc_html($project_category); ?>
                                    </p>
                                <?php endif; ?>

                                <span class="mt-4 inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.16em] text-slate-900 transition group-hover:text-brand-primary">
                                    <?php echo esc_html($project_link['title'] ?? 'View Project'); ?>
                                    <span aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                        </svg>
                                    </span>
                                </span>

                            <?php if ($project_url) : ?>
                                </a>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Solutions Section -->
    <section class="bg-[#08090d] pt-20 pb-8 text-white">
        <div class="mx-auto max-w-6xl px-6">
            <div class="mb-12 text-center">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.22em] text-brand-primary">
                    What I Do
                </p>

                <h2 class="text-3xl font-bold sm:text-4xl">
                    Solutions that help you grow
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="border-white/10 lg:border-r lg:pr-8 text-center">
                    <div class="mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-primary text-brand-primary mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z" />
                        </svg>                   
                    </div>

                    <h3 class="mb-2 text-lg font-semibold">
                        Web Design
                    </h3>

                    <p class="text-sm leading-6 text-white/60">
                        Clean, modern designs that reflect your brand and support your business goals.
                    </p>
                </div>

                <div class="border-white/10 lg:border-r lg:pr-8 text-center">
                    <div class="mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-primary text-brand-primary mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                    </div>

                    <h3 class="mb-2 text-lg font-semibold">
                        Web Development
                    </h3>

                    <p class="text-sm leading-6 text-white/60">
                        Fast, responsive WordPress builds with clean structure and scalable code.
                    </p>
                </div>

                <div class="border-white/10 lg:border-r lg:pr-8 text-center">
                    <div class="mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-primary text-brand-primary mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>

                    <h3 class="mb-2 text-lg font-semibold">
                        SEO Optimization
                    </h3>

                    <p class="text-sm leading-6 text-white/60">
                        Improve visibility with performance-minded structure and technical SEO basics.
                    </p>
                </div>

                <div class="text-center lg:pr-8">
                    <div class="mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-primary text-brand-primary mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>                        
                    </div>

                    <h3 class="mb-2 text-lg font-semibold">
                        Performance
                    </h3>

                    <p class="text-sm leading-6 text-white/60">
                        Speed-focused builds that load quickly and deliver a smoother user experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-site-header pt-12 pb-24 text-white">
        <div class="mx-auto max-w-6xl px-6 text-center">
            <h2 class="mb-6 text-4xl font-bold">
                Ready to build something great?
            </h2>

            <a href="#" class="btn btn-primary">
                Start a Project
            </a>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <?php
        $testimonials_eyebrow = get_field('testimonials_eyebrow') ?: 'Clients Say';
        $testimonials_heading = get_field('testimonials_heading') ?: 'Kind Words';

        // $cta_heading = get_field('testimonial_cta_heading') ?: 'Have a project in mind?';
        // $cta_text    = get_field('testimonial_cta_text') ?: "Let's build something great together.";
        // $cta_link    = get_field('testimonial_cta_link');

        // $cta_url    = $cta_link['url'] ?? home_url('/contact');
        // $cta_title  = $cta_link['title'] ?? 'Get in Touch';
        // $cta_target = $cta_link['target'] ?? '_self';
    ?>

    <section class="bg-[#f1f1f1] py-24">
        <div class="mx-auto max-w-6xl px-6">

            <div class="mb-10 text-center">
                <p class="mb-3 text-xs font-semibold uppercase tracking-[0.28em] text-brand-primary">
                    <?php echo esc_html($testimonials_eyebrow); ?>
                </p>

                <h2 class="mb-4 text-4xl font-bold text-slate-900 sm:text-5xl">
                    <?php echo esc_html($testimonials_heading); ?>
                </h2>

                <div class="flex justify-center text-brand-primary/65">
                    <!-- &ldquo; -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-quote-icon lucide-quote"><path d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/><path d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"/></svg>                    
                </div>
            </div>

            <?php if (have_rows('testimonials')) : ?>
                <div class="mb-20 grid gap-10 md:grid-cols-3 md:gap-0">
                    <?php while (have_rows('testimonials')) : the_row(); ?>
                        <?php
                        $quote = get_sub_field('quote');
                        $name  = get_sub_field('name');
                        $company = get_sub_field('company');
                        ?>

                        <article class="px-6 text-center md:border-r md:border-slate-300/70 last:md:border-r-0">
                            <div class="mb-6 flex justify-center gap-1 text-brand-primary">
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                    </svg>
                                <?php endfor; ?>
                            </div>

                            <?php if ($quote) : ?>
                                <blockquote class="mx-auto mb-6 max-w-sm text-base leading-7 text-slate-700">
                                    “<?php echo esc_html($quote); ?>”
                                </blockquote>
                            <?php endif; ?>

                            <?php if ($name || $company) : ?>
                                <p class="text-sm text-slate-700">
                                    <?php if ($name) : ?>
                                        <span class="font-bold text-slate-900">– <?php echo esc_html($name); ?></span>
                                    <?php endif; ?>

                                    <?php if ($company) : ?>
                                        <span>, <?php echo esc_html($company); ?></span>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="testimonial-cta overflow-hidden rounded-lg border border-black/20 px-6 py-10 text-white shadow-sm md:px-12 md:py-14">
                <div class="relative z-10 flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full border-3 border-brand-primary text-brand-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-11 w-11">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="mb-2 text-3xl font-bold leading-tight text-white">
                                Have a project in mind?
                            </h3>

                            <p class="text-base text-white/75">
                                Let's build something great together.
                            </p>
                        </div>
                    </div>

                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                        Get in Touch
                    </a>
                </div>
            </div>

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