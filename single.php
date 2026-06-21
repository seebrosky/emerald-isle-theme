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

			<aside class="space-y-6">
				<section class="rounded-lg border border-slate-200 bg-white p-6">
					<h2 class="mb-4 text-xl font-bold">
						<?php esc_html_e( 'Categories', 'emerald-isle' ); ?>
					</h2>

					<ul class="space-y-3">
						<?php
						$sidebar_categories = get_categories(
							array(
								'hide_empty' => false,
								'exclude'    => get_cat_ID( 'Uncategorized' ),
							)
						);

						foreach ( $sidebar_categories as $category ) :
							?>
							<li>
								<a
									href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
									class="flex items-center justify-between text-sm font-semibold text-site-text-muted no-underline transition hover:text-brand-primary"
								>
									<span><?php echo esc_html( $category->name ); ?></span>
									<span><?php echo esc_html( $category->count ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</section>

				<section class="rounded-lg border border-slate-200 bg-white p-6">
					<h2 class="mb-4 text-xl font-bold">
						<?php esc_html_e( 'Recent Articles', 'emerald-isle' ); ?>
					</h2>

					<div class="space-y-4">
						<?php
						$recent_posts = new WP_Query(
							array(
								'post_type'           => 'post',
								'post_status'         => 'publish',
								'posts_per_page'      => 3,
								'post__not_in'        => array( get_the_ID() ),
								'ignore_sticky_posts' => true,
								'no_found_rows'       => true,
							)
						);

						if ( $recent_posts->have_posts() ) :
							while ( $recent_posts->have_posts() ) :
								$recent_posts->the_post();
								?>
								<a href="<?php the_permalink(); ?>" class="group block no-underline">
									<p class="mb-1 text-xs font-semibold uppercase tracking-wide text-brand-primary">
										<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
									</p>

									<h3 class="text-base font-semibold leading-snug text-site-text transition group-hover:text-brand-primary">
										<?php the_title(); ?>
									</h3>
								</a>
							<?php endwhile; wp_reset_postdata(); ?>
						<?php else : ?>
							<p class="text-sm text-site-text-muted">
								<?php esc_html_e( 'No recent articles yet.', 'emerald-isle' ); ?>
							</p>
						<?php endif; ?>
					</div>
				</section>
			</aside>
		</div>

	<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>