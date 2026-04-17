<?php get_header(); ?>

<main class="mx-auto max-w-6xl px-6 py-16">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="max-w-none">
            <h1 class="text-4xl font-bold text-green-600"><?php the_title(); ?></h1>
            <div class="mt-6">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; else : ?>
        <p>No content found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>