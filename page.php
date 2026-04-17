<?php get_header(); ?>

<main class="mx-auto max-w-4xl px-6 py-16">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h1 class="text-4xl font-bold"><?php the_title(); ?></h1>
            <div class="mt-6">
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>