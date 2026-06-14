<?php
/**
 * Blog Featured Post Section
 *
 * Displays the blog category navigation, featured post card,
 * and sidebar in a two-column archive layout.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$categories = get_categories(
    array(
        'hide_empty' => false,
        'exclude'    => get_cat_ID( 'Uncategorized' ),
        'orderby'    => 'name',
        'order'      => 'ASC',
    )
);
?>

<section class="bg-site-bg py-12">
    <div class="mx-auto grid max-w-6xl gap-8 px-6 lg:grid-cols-[minmax(0,1fr)_320px]">

        <div>
            <nav class="mb-8 flex flex-wrap gap-8 text-sm font-semibold" aria-label="<?php esc_attr_e( 'Blog categories', 'emerald-isle' ); ?>">
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="border-b-2 border-brand-primary pb-2 text-brand-primary">
                    <?php esc_html_e( 'All', 'emerald-isle' ); ?>
                </a>

                <?php foreach ( $categories as $category ) : ?>
                    <a
                        href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
                        class="pb-2 text-site-text-muted transition hover:text-brand-primary"
                    >
                        <?php echo esc_html( $category->name ); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <article class="group cursor-pointer overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="grid md:min-h-[422px] md:grid-cols-[320px_1fr]">

                    <div class="aspect-video overflow-hidden md:aspect-auto md:h-full">
                        <img
                            src="https://placehold.co/640x845"
                            alt=""
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                    </div>

                    <div class="p-8">
                        <p class="mb-3 inline-flex rounded bg-brand-primary px-2.5 py-1 text-xs font-bold uppercase tracking-wider text-white">
                            Featured
                        </p>

                        <p class="mb-2 text-xs font-bold uppercase tracking-wider text-brand-primary">
                            WordPress
                        </p>

                        <h2 class="mb-4 text-2xl font-bold leading-tight text-site-text lg:text-3xl">
                            <span class="bg-gradient-to-r from-current to-current bg-[length:0%_2px] bg-left-bottom bg-no-repeat transition-all duration-300 group-hover:bg-[length:100%_2px]">
                                How to Build a High-Performing WordPress Website in 2026
                            </span>
                        </h2>

                        <p class="mb-5 text-xs font-bold uppercase tracking-wide text-site-text-muted">
                            June 4, 2026 <span class="mx-2">•</span> 6 min read
                        </p>

                        <p class="mb-6 leading-7 text-site-text-muted">
                            A complete step-by-step guide to planning, building,
                            and launching a fast, secure, and SEO-friendly
                            WordPress website.
                        </p>
                    </div>

                </div>
            </article>
            
            <?php get_template_part( 'template-parts/blog/blog-post-grid' ); ?>

        </div>

        <aside class="hidden lg:block">
            <?php get_template_part( 'template-parts/blog/blog-sidebar' ); ?>
        </aside>

    </div>
</section>