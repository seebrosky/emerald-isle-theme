<?php
/**
 * Archive Template
 *
 * Displays post archives, category archives, tag archives, and date archives.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="mx-auto max-w-6xl px-6 py-16">
	<header class="mb-10 max-w-3xl">
		<p class="mb-3 text-xs font-bold uppercase tracking-[0.16em] text-brand-primary">
			<?php esc_html_e( 'Archive', 'emerald-isle' ); ?>
		</p>

		<h1 class="mb-4 leading-[1.05] tracking-[-0.03em]">
			<?php the_archive_title(); ?>
		</h1>

		<?php if ( get_the_archive_description() ) : ?>
			<div class="text-site-text-muted">
				<?php the_archive_description(); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="grid items-start gap-5 lg:grid-cols-[minmax(0,1fr)_320px]">
		<div class="min-w-0">
			<?php if ( have_posts() ) : ?>
				<div class="grid gap-6">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/blog/blog-card' );
					endwhile;
					?>
				</div>

				<nav class="mt-10">
					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 1,
							'prev_text' => __( 'Previous', 'emerald-isle' ),
							'next_text' => __( 'Next', 'emerald-isle' ),
						)
					);
					?>
				</nav>
			<?php else : ?>
				<div class="rounded-lg border border-slate-200 bg-white p-6">
					<p class="m-0 text-site-text-muted">
						<?php esc_html_e( 'No posts were found for this archive.', 'emerald-isle' ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>

		<?php get_template_part( 'template-parts/blog/blog-sidebar' ); ?>
	</div>
</main>

<?php get_footer(); ?>