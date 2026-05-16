<?php get_header(); ?>

<main>
    <!-- Hero section -->
    <?php get_template_part('template-parts/home/hero'); ?>

    <!-- Feature Strip -->
    <?php get_template_part('template-parts/home/feature-strip'); ?>

    <!-- Demo Showcase Section -->
    <?php get_template_part('template-parts/home/demo-showcase'); ?> 

    <!-- Component Showcase Section -->
    <?php get_template_part('template-parts/home/component-showcase'); ?>

    <!-- Testimonials Section -->
    <?php get_template_part('template-parts/home/testimonials'); ?>


    <!-- Featured Projects Section -->
    <?php if (have_rows('featured_projects')) : ?>
        <section class="bg-white py-24">
            <div class="mx-auto max-w-6xl px-6">
                <h2 class="mb-3 text-center text-sm font-semibold uppercase tracking-[0.18em] text-brand-primary/80">
                    Featured Work
                </h2>

                <h3 class="mb-12 text-center text-4xl font-bold text-site-text">
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
                                    <h4 class="text-lg font-semibold text-site-text">
                                        <?php echo esc_html($project_title); ?>
                                    </h4>
                                <?php endif; ?>

                                <?php if ($project_category) : ?>
                                    <p class="text-sm text-site-text-muted">
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
    <section class="bg-site-bg-soft pt-20 pb-8 text-site-text">
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
                <div class="text-center lg:border-r lg:border-brand-tertiary lg:pr-8">
                    <div class="mx-auto mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-tertiary bg-white text-brand-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z" />
                        </svg>
                    </div>

                    <h3 class="mb-2 text-lg font-semibold text-site-text">
                        Web Design
                    </h3>

                    <p class="text-sm leading-6 text-site-text-muted">
                        Clean, modern designs that reflect your brand and support your business goals.
                    </p>
                </div>

                <div class="text-center lg:border-r lg:border-brand-tertiary lg:pr-8">
                    <div class="mx-auto mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-tertiary bg-white text-brand-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                    </div>

                    <h3 class="mb-2 text-lg font-semibold text-site-text">
                        Web Development
                    </h3>

                    <p class="text-sm leading-6 text-site-text-muted">
                        Fast, responsive WordPress builds with clean structure and scalable code.
                    </p>
                </div>

                <div class="text-center lg:border-r lg:border-brand-tertiary lg:pr-8">
                    <div class="mx-auto mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-tertiary bg-white text-brand-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>

                    <h3 class="mb-2 text-lg font-semibold text-site-text">
                        SEO Optimization
                    </h3>

                    <p class="text-sm leading-6 text-site-text-muted">
                        Improve visibility with performance-minded structure and technical SEO basics.
                    </p>
                </div>

                <div class="text-center lg:pr-8">
                    <div class="mx-auto mb-2.5 flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-tertiary bg-white text-brand-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </div>

                    <h3 class="mb-2 text-lg font-semibold text-site-text">
                        Performance
                    </h3>

                    <p class="text-sm leading-6 text-site-text-muted">
                        Speed-focused builds that load quickly and deliver a smoother user experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="brand-gradient py-20 text-center text-white">
        <div class="mx-auto max-w-4xl px-6">
            <h2 class="text-3xl font-bold sm:text-4xl">
                Ready to build something great?
            </h2>

            <div class="mt-8">
                <a href="#" class="btn btn-light">
                    Start a Project
                </a>
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