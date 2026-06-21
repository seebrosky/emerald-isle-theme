import { __ } from '@wordpress/i18n';
import {
	RichText,
	useBlockProps,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	Button,
	PanelBody,
	TextControl,
    SelectControl,
} from '@wordpress/components';
import { useState } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
	const { tabs = [], layout = 'horizontal' } = attributes;
	const [activeTab, setActiveTab] = useState(0);

    const blockProps = useBlockProps({
        className: `content-tabs content-tabs--${layout}`,
    });

	const updateTab = (index, key, value) => {
		const updatedTabs = tabs.map((tab, tabIndex) => {
			if (tabIndex !== index) {
				return tab;
			}

			return {
				...tab,
				[key]: value,
			};
		});

		setAttributes({ tabs: updatedTabs });
	};

	const addTab = () => {
		const updatedTabs = [
			...tabs,
			{
				label: __('New Tab', 'emerald-isle'),
				heading: __('New Tab Heading', 'emerald-isle'),
				description: __('Add tab content here.', 'emerald-isle'),
				buttonText: '',
				buttonUrl: '',
			},
		];

		setAttributes({ tabs: updatedTabs });
		setActiveTab(updatedTabs.length - 1);
	};

	const removeTab = (index) => {
		if (tabs.length <= 1) {
			return;
		}

		const updatedTabs = tabs.filter((_, tabIndex) => tabIndex !== index);

		setAttributes({ tabs: updatedTabs });
		setActiveTab(Math.max(0, index - 1));
	};

	const currentTab = tabs[activeTab] || tabs[0];

	return (
		<>
			<InspectorControls>
                <PanelBody title={__('Layout Settings', 'emerald-isle')} initialOpen={true}>
                    <SelectControl
                        label={__('Layout', 'emerald-isle')}
                        value={layout}
                        options={[
                            { label: __('Horizontal', 'emerald-isle'), value: 'horizontal' },
                            { label: __('Vertical', 'emerald-isle'), value: 'vertical' },
                        ]}
                        onChange={(value) => setAttributes({ layout: value })}
                    />
                </PanelBody>

				<PanelBody title={__('Tab Management', 'emerald-isle')} initialOpen={true}>
					{tabs.map((tab, index) => (
						<div className="content-tabs-editor__settings-group" key={index}>
							<h4 className="content-tabs-editor__tab-heading">
								{`Tab ${index + 1}`}
							</h4>
														
							<TextControl
								label={__('Tab Label', 'emerald-isle')}
								value={tab.label}
								onChange={(value) => updateTab(index, 'label', value)}
							/>

                            <TextControl
                                label={__('Button Text', 'emerald-isle')}
                                value={tab.buttonText || ''}
                                onChange={(value) => updateTab(index, 'buttonText', value)}
                            />                            

							<TextControl
								label={__('Button URL', 'emerald-isle')}
								value={tab.buttonUrl || ''}
								onChange={(value) => updateTab(index, 'buttonUrl', value)}
							/>

							{tabs.length > 1 && (
								<Button
									isDestructive
									variant="secondary"
									onClick={() => removeTab(index)}
								>
									{__('Remove Tab', 'emerald-isle')}
								</Button>
							)}
						</div>
					))}

					<Button variant="primary" onClick={addTab}>
						{__('Add Tab', 'emerald-isle')}
					</Button>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div className="content-tabs__tabs" role="tablist">
					{tabs.map((tab, index) => (
						<button
							key={index}
							type="button"
							className={`content-tabs__tab ${activeTab === index ? 'is-active' : ''}`}
							onClick={() => setActiveTab(index)}
						>
							<RichText
								tagName="span"
								value={tab.label}
								placeholder={__('Tab label...', 'emerald-isle')}
								onChange={(value) => updateTab(index, 'label', value)}
								allowedFormats={[]}
							/>
						</button>
					))}
				</div>

				{currentTab && (
					<div className="content-tabs__panel is-active">
						<RichText
							tagName="h3"
							value={currentTab.heading}
							placeholder={__('Tab heading...', 'emerald-isle')}
							onChange={(value) => updateTab(activeTab, 'heading', value)}
						/>

						<RichText
							tagName="p"
							value={currentTab.description}
							placeholder={__('Tab description...', 'emerald-isle')}
							onChange={(value) => updateTab(activeTab, 'description', value)}
						/>

                        <RichText
                            tagName="span"
                            className="content-tabs__button"
                            value={currentTab.buttonText}
                            placeholder={__('Button text...', 'emerald-isle')}
                            onChange={(value) => updateTab(activeTab, 'buttonText', value)}
                            allowedFormats={[]}
                        />
					</div>
				)}
			</div>
		</>
	);
}