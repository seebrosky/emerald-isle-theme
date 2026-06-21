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
	const panels = Array.from(block.querySelectorAll('.content-tabs__panel'));
	const activeIndex = tabs.indexOf(tab);

	tabs.forEach((item) => {
		item.classList.remove('is-active');
		item.setAttribute('aria-selected', 'false');
	});

	panels.forEach((panel) => {
		panel.classList.remove('is-active');
		panel.setAttribute('hidden', '');
	});

	tab.classList.add('is-active');
	tab.setAttribute('aria-selected', 'true');

	if (panels[activeIndex]) {
		panels[activeIndex].classList.add('is-active');
		panels[activeIndex].removeAttribute('hidden');
	}
});