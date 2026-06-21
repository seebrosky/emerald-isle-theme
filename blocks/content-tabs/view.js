document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('.content-tabs').forEach((block) => {
		const tabs = block.querySelectorAll('.content-tabs__tab');
		const panels = block.querySelectorAll('.content-tabs__panel');

		tabs.forEach((tab, index) => {
			tab.addEventListener('click', () => {
				tabs.forEach((item) => {
					item.classList.remove('is-active');
					item.setAttribute('aria-selected', 'false');
				});

				panels.forEach((panel) => {
					panel.classList.remove('is-active');
				});

				tab.classList.add('is-active');
				tab.setAttribute('aria-selected', 'true');

				if (panels[index]) {
					panels[index].classList.add('is-active');
				}
			});
		});
	});
});