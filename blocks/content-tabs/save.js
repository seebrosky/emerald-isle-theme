import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { tabs = [], layout = 'horizontal' } = attributes;

    const blockProps = useBlockProps.save({
        className: `content-tabs content-tabs--${layout}`,
        'data-layout': layout,
    });

	return (
		<div {...blockProps}>
			<div className="content-tabs__tabs" role="tablist">
				{tabs.map((tab, index) => (
					<button
						key={index}
						type="button"
						className={`content-tabs__tab ${index === 0 ? 'is-active' : ''}`}
						aria-selected={index === 0 ? 'true' : 'false'}
						data-tab-index={index}
					>
						{tab.label}
					</button>
				))}
			</div>

			{tabs.map((tab, index) => (
				<div
					key={index}
					className={`content-tabs__panel ${index === 0 ? 'is-active' : ''}`}
					data-tab-panel={index}
				>
					<RichText.Content tagName="h3" value={tab.heading} />
					<RichText.Content tagName="p" value={tab.description} />

					{tab.buttonText && tab.buttonUrl && (
						<a className="content-tabs__button" href={tab.buttonUrl}>
							{tab.buttonText}
						</a>
					)}
				</div>
			))}
		</div>
	);
}