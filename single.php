<?php get_header(); ?>

<main class="mx-auto max-w-6xl px-6 py-16">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<header class="mb-8 max-w-4xl">
			<p class="mb-3 text-xs font-bold uppercase tracking-[0.16em] text-brand-primary">
				<?php
				$categories = get_the_category();

				if ( ! empty( $categories ) ) {
					echo esc_html( $categories[0]->name );
				}
				?>
			</p>

			<h1 class="mb-4 leading-[1.05] tracking-[-0.03em]">
				<?php the_title(); ?>
			</h1>

			<p class="text-sm font-normal uppercase tracking-wide text-site-text-muted">
				<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
			</p>
		</header>

		<div class="grid items-start gap-10 lg:grid-cols-[minmax(0,1fr)_320px]">
			<article class="min-w-0">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="mb-5 overflow-hidden rounded-lg border border-slate-200 bg-white">
						<?php
						the_post_thumbnail(
							'large',
							array(
								'class' => 'w-full h-auto object-contain',
								'alt'   => '',
							)
						);
						?>
					</div>
				<?php endif; ?>

				<div class="entry-content max-w-4xl">
					<?php the_content(); ?>
				</div>
			</article>
			
			<!-- Blog Sidebar -->
			<?php get_template_part( 'template-parts/blog/blog-sidebar' ); ?>
		</div>

	<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>