<?php get_header(); ?>

<main class="mx-auto max-w-6xl px-6 py-16">
    <section class="py-8">
        <h1 class="text-brand-primary">(H1) Emerald Isle Hero Section</h1>
        <p class="max-w-2xl text-lg">This section is hardcoded in the template.</p>
    </section>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="mt-6">
            <div class="prose max-w-none">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>