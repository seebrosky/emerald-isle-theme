<?php
/**
 * Blog Card Component
 *
 * Reusable post card template for archive grids, search results,
 * related posts, and component showcase examples.
 *
 * @package Emerald_Isle
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$categories = get_the_category();
$category   = ! empty( $categories ) ? $categories[0]->name : __( 'Article', 'emerald-isle' );
?>

<article class="group overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
	<a href="<?php the_permalink(); ?>" class="block h-full no-underline">
		<div class="grid grid-cols-[96px_1fr] sm:grid-cols-[140px_1fr] md:grid-cols-[180px_1fr]">

			<div class="min-h-full overflow-hidden bg-surface-2">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php
					the_post_thumbnail(
						'medium_large',
						array(
							'class' => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105',
							'alt'   => '',
						)
					);
					?>
				<?php else : ?>
					<div class="flex h-full min-h-32 w-full items-center justify-center bg-surface-3 text-xs font-semibold text-site-text-muted">
						<?php esc_html_e( 'No image', 'emerald-isle' ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="p-4 sm:p-5">
				<p class="mb-1 text-[10px] font-bold uppercase tracking-wider text-brand-primary sm:mb-1.5 sm:text-xs">
					<?php echo esc_html( $category ); ?>
				</p>

				<h3 class="mb-1.5 text-base font-bold leading-tight text-site-text sm:text-xl">
					<span class="bg-gradient-to-r from-current to-current bg-[length:0%_2px] bg-left-bottom bg-no-repeat transition-all duration-300 group-hover:bg-[length:100%_2px]">
						<?php the_title(); ?>
					</span>
				</h3>

				<p class="mb-2 text-[10px] font-bold uppercase tracking-wide text-site-text-muted sm:mb-3 sm:text-xs">
					<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
				</p>

				<p class="line-clamp-2 text-xs leading-5 text-site-text-muted sm:text-sm sm:leading-6">
					<?php echo esc_html( wp_trim_words( get_the_excerpt(), 22, '...' ) ); ?>
				</p>
			</div>

		</div>
	</a>
</article>