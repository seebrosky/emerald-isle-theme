<?php
/**
 * Blog sidebar template.
 *
 * Displays the blog categories and recent articles sidebar used on
 * single posts and archive pages.
 *
 * @package Emerald_Isle
 */
?>

<aside class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-1">
	<section class="overflow-hidden rounded-lg border border-slate-200 bg-white">
		<h2 class="bg-site-header px-4 py-2 text-lg font-semibold text-site-text-dark">
			<?php esc_html_e( 'Categories', 'emerald-isle' ); ?>
		</h2>

		<div class="p-6">
			<ul class="space-y-3">
				<?php
				$categories = get_categories(
					array(
						'hide_empty' => false,
						'exclude'    => get_cat_ID( 'Uncategorized' ),
					)
				);

				foreach ( $categories as $category ) :
					?>
					<li>
						<a
							href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"
							class="flex items-center justify-between text-sm font-semibold text-site-text-muted no-underline transition hover:text-brand-primary"
						>
							<span><?php echo esc_html( $category->name ); ?></span>
                            <span class="inline-flex min-w-6 items-center justify-center rounded-full bg-emerald-50 px-2 py-1 text-xs font-bold text-brand-primary">
                                <?php echo esc_html( $category->count ); ?>
                            </span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="overflow-hidden rounded-lg border border-slate-200 bg-white">
		<h2 class="bg-site-header px-4 py-2 text-lg font-semibold text-site-text-dark">
			<?php esc_html_e( 'Recent Articles', 'emerald-isle' ); ?>
		</h2>

		<div class="divide-y divide-slate-200 p-6">
			<?php
			$excluded_posts = is_singular( 'post' ) ? array( get_the_ID() ) : array();

			$recent_posts = new WP_Query(
				array(
					'post_type'           => 'post',
					'post_status'         => 'publish',
					'posts_per_page'      => 3,
					'post__not_in'        => $excluded_posts,
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				)
			);

			if ( $recent_posts->have_posts() ) :
				while ( $recent_posts->have_posts() ) :
					$recent_posts->the_post();
					?>
					<div class="py-4 first:pt-0 last:pb-0">
						<a href="<?php the_permalink(); ?>" class="group flex gap-4 no-underline">
							<div class="h-16 w-16 shrink-0 overflow-hidden rounded-md bg-surface-2">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php
									the_post_thumbnail(
										'thumbnail',
										array(
											'class' => 'h-full w-full object-cover transition group-hover:scale-105',
											'alt'   => '',
										)
									);
									?>
								<?php endif; ?>
							</div>

							<div class="min-w-0">
								<p class="mb-1 text-xs font-semibold uppercase tracking-wide text-brand-primary">
									<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
								</p>

								<h3 class="text-sm font-semibold leading-snug text-site-text transition group-hover:text-brand-primary">
									<?php the_title(); ?>
								</h3>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p class="text-sm text-site-text-muted">
					<?php esc_html_e( 'No recent articles yet.', 'emerald-isle' ); ?>
				</p>
			<?php endif; ?>
		</div>
	</section>
</aside>