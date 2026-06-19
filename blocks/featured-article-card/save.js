import { RichText, useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const {
		eyebrow,
		headline,
		excerpt,
		buttonText,
		buttonUrl,
		imageUrl,
		layout,
	} = attributes;

	const blockProps = useBlockProps.save({
		className: `featured-article-card featured-article-card--${layout}`,
	});

	return (
		<article {...blockProps}>
			{imageUrl && (
				<div className="featured-article-card__media">
					<img src={imageUrl} alt="" className="featured-article-card__image" />
				</div>
			)}

			<div className="featured-article-card__content">
				{eyebrow && (
					<RichText.Content
						tagName="p"
						className="featured-article-card__eyebrow"
						value={eyebrow}
					/>
				)}

				{headline && (
					<RichText.Content
						tagName="h2"
						className="featured-article-card__headline"
						value={headline}
					/>
				)}

				{excerpt && (
					<RichText.Content
						tagName="p"
						className="featured-article-card__excerpt"
						value={excerpt}
					/>
				)}

                {buttonText && (
                    <a href={buttonUrl || '#'} className="featured-article-card__button">
                        <RichText.Content tagName="span" value={buttonText} />
                    </a>
                )}
			</div>
		</article>
	);
}