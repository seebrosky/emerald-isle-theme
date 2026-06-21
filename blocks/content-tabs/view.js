const activateContentTab = (block, activeIndex = 0) => {
	const tabs = Array.from(block.querySelectorAll('.content-tabs__tab'));
	const panels = Array.from(block.querySelectorAll('.content-tabs__panel'));

	tabs.forEach((tab, index) => {
		const isActive = index === activeIndex;

		tab.classList.toggle('is-active', isActive);
		tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
	});

	panels.forEach((panel, index) => {
		const isActive = index === activeIndex;

		panel.classList.toggle('is-active', isActive);

		if (isActive) {
			panel.removeAttribute('hidden');
		} else {
			panel.setAttribute('hidden', '');
		}
	});
};

// Initialize all tab blocks on page load.
document.querySelectorAll('.content-tabs').forEach((block) => {
	const tabs = Array.from(block.querySelectorAll('.content-tabs__tab'));

	let activeIndex = tabs.findIndex((tab) =>
		tab.classList.contains('is-active')
	);

	if (activeIndex < 0) {
		activeIndex = 0;
	}

	activateContentTab(block, activeIndex);
});

// Handle clicks via event delegation.
document.addEventListener('click', (event) => {
	const tab = event.target.closest('.content-tabs__tab');

	if (!tab) {
		return;
	}

	const block = tab.closest('.content-tabs');

	if (!block) {
		return;
	}

	const tabs = Array.from(block.querySelectorAll('.content-tabs__tab'));
	const activeIndex = tabs.indexOf(tab);

	activateContentTab(block, activeIndex);
});