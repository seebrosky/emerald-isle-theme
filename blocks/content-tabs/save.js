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
                        id={`content-tab-${index}`}
                        className={`content-tabs__tab ${index === 0 ? 'is-active' : ''}`}
                        role="tab"
                        aria-selected={index === 0 ? 'true' : 'false'}
                        aria-controls={`content-panel-${index}`}
                        data-tab-index={index}
                    >
                        {tab.label}
                    </button>
                ))}
            </div>

			{tabs.map((tab, index) => (
                <div
                    key={index}
                    id={`content-panel-${index}`}
                    className={`content-tabs__panel ${index === 0 ? 'is-active' : ''}`}
                    role="tabpanel"
                    aria-labelledby={`content-tab-${index}`}
                    data-tab-panel={index}
                    aria-hidden={index === 0 ? 'false' : 'true'}
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