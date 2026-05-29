<?php
/**
 * Featured Projects Template
 *
 * Renders the homepage featured projects section.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

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