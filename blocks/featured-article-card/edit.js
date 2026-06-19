import { __ } from '@wordpress/i18n';
import {
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	RichText,
	useBlockProps,
} from '@wordpress/block-editor';
import {
	Button,
	PanelBody,
	SelectControl,
	TextControl,
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const {
		eyebrow,
		headline,
		excerpt,
		buttonText,
		buttonUrl,
		imageUrl,
		imageId,
		layout,
	} = attributes;

	const blockProps = useBlockProps({
		className: `featured-article-card featured-article-card--${layout}`,
	});

	const onSelectImage = (media) => {
		setAttributes({
			imageId: media.id,
			imageUrl: media.url,
		});
	};

	const removeImage = () => {
		setAttributes({
			imageId: undefined,
			imageUrl: '',
		});
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Card Settings', 'emerald-isle')} initialOpen={true}>
					<SelectControl
						label={__('Layout', 'emerald-isle')}
						value={layout}
						options={[
							{
								label: __('Stacked', 'emerald-isle'),
								value: 'stacked',
							},
							{
								label: __('Horizontal', 'emerald-isle'),
								value: 'horizontal',
							},
						]}
						onChange={(value) => setAttributes({ layout: value })}
					/>

                    <TextControl
                        label={__('Button Text', 'emerald-isle')}
                        value={buttonText}
                        onChange={(value) => setAttributes({ buttonText: value })}
                        placeholder="Read More"
                    />                         

					<TextControl
						label={__('Button URL', 'emerald-isle')}
						value={buttonUrl}
						onChange={(value) => setAttributes({ buttonUrl: value })}
						placeholder="https://example.com/article"
					/>              
				</PanelBody>
			</InspectorControls>

			<article {...blockProps}>
				<div className="featured-article-card__media">
					{imageUrl ? (
						<>
							<img
								src={imageUrl}
								alt=""
								className="featured-article-card__image"
							/>

							<MediaUploadCheck>
								<div className="featured-article-card__image-actions">
									<MediaUpload
										onSelect={onSelectImage}
										allowedTypes={['image']}
										value={imageId}
										render={({ open }) => (
											<Button variant="secondary" onClick={open}>
												{__('Replace Image', 'emerald-isle')}
											</Button>
										)}
									/>

									<Button
										variant="secondary"
										isDestructive
										onClick={removeImage}
									>
										{__('Remove Image', 'emerald-isle')}
									</Button>
								</div>
							</MediaUploadCheck>
						</>
					) : (
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectImage}
								allowedTypes={['image']}
								value={imageId}
								render={({ open }) => (
									<Button
										variant="secondary"
										onClick={open}
										className="featured-article-card__upload"
									>
										{__('Select Article Image', 'emerald-isle')}
									</Button>
								)}
							/>
						</MediaUploadCheck>
					)}
				</div>

				<div className="featured-article-card__content">
					<RichText
						tagName="p"
						className="featured-article-card__eyebrow"
						value={eyebrow}
						onChange={(value) => setAttributes({ eyebrow: value })}
						placeholder={__('Category or eyebrow text…', 'emerald-isle')}
						allowedFormats={[]}
					/>

					<RichText
						tagName="h2"
						className="featured-article-card__headline"
						value={headline}
						onChange={(value) => setAttributes({ headline: value })}
						placeholder={__('Article headline…', 'emerald-isle')}
						allowedFormats={['core/bold', 'core/italic']}
					/>

					<RichText
						tagName="p"
						className="featured-article-card__excerpt"
						value={excerpt}
						onChange={(value) => setAttributes({ excerpt: value })}
						placeholder={__('Short article summary…', 'emerald-isle')}
						allowedFormats={['core/bold', 'core/italic']}
					/>

                    <div className="featured-article-card__cta-row">
                        <span className="featured-article-card__button">
                            {buttonText || 'Read More'}
                        </span>
                    </div>
				</div>
			</article>
		</>
	);
}