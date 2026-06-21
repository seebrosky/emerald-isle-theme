<?php
/**
 * Featured Article Card render template.
 *
 * @package Emerald_Isle
 */

defined( 'ABSPATH' ) || exit;

$layout      = $attributes['layout'] ?? 'stacked';
$eyebrow     = $attributes['eyebrow'] ?? '';
$headline    = $attributes['headline'] ?? '';
$excerpt     = $attributes['excerpt'] ?? '';
$button_text = $attributes['buttonText'] ?? '';
$button_url  = $attributes['buttonUrl'] ?? '#';
$image_id    = ! empty( $attributes['imageId'] ) ? absint( $attributes['imageId'] ) : 0;
$image_url   = $attributes['imageUrl'] ?? '';

$image_sizes = 'horizontal' === $layout
	? '(max-width: 950px) 360px, 450px'
	: '(max-width: 700px) calc(100vw - 3rem), 510px';

$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class' => 'featured-article-card featured-article-card--' . sanitize_html_class( $layout ),
	)
);
?>

<article <?php echo wp_kses_data( $wrapper_attributes ); ?>>
	<?php if ( $image_id || $image_url ) : ?>
		<div class="featured-article-card__media">
			<?php
			if ( $image_id ) {
				echo wp_get_attachment_image(
					$image_id,
					'full',
					false,
					array(
						'class'         => 'featured-article-card__image',
						'alt'           => '',
						'sizes'         => $image_sizes,
						'fetchpriority' => 'high',
					)
				);
			} elseif ( $image_url ) {
				printf(
					'<img src="%s" alt="" class="featured-article-card__image">',
					esc_url( $image_url )
				);
			}
			?>
		</div>
	<?php endif; ?>

	<div class="featured-article-card__content">
		<?php if ( $eyebrow ) : ?>
			<p class="featured-article-card__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
		<?php endif; ?>

		<?php if ( $headline ) : ?>
			<h2 class="featured-article-card__headline"><?php echo wp_kses_post( $headline ); ?></h2>
		<?php endif; ?>

		<?php if ( $excerpt ) : ?>
			<p class="featured-article-card__excerpt"><?php echo wp_kses_post( $excerpt ); ?></p>
		<?php endif; ?>

		<?php if ( $button_text ) : ?>
			<div class="featured-article-card__cta-row">
				<a href="<?php echo esc_url( $button_url ?: '#' ); ?>" class="featured-article-card__button">
					<?php echo esc_html( $button_text ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</article>