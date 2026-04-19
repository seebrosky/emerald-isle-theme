document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('[data-site-header]');
    const toggle = document.querySelector('[data-mobile-nav-toggle]');
    const panel = document.querySelector('[data-mobile-nav-panel]');

    function updateMobileMenuTop() {
        if (!header || !panel) return;

        const headerHeight = header.offsetHeight;
        document.documentElement.style.setProperty('--mobile-menu-top', `${headerHeight}px`);
    }

    function closeMobileMenu() {
        if (!toggle || !panel || !header) return;

        toggle.setAttribute('aria-expanded', 'false');
        header.classList.remove('mobile-nav-open');
        panel.classList.remove('is-open');
    }

    if (header && panel) {
        updateMobileMenuTop();

        window.addEventListener('scroll', updateMobileMenuTop, { passive: true });
        window.addEventListener('resize', updateMobileMenuTop);
    }

    if (toggle && panel && header) {
        toggle.addEventListener('click', function () {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true';

            toggle.setAttribute('aria-expanded', String(!isOpen));
            header.classList.toggle('mobile-nav-open', !isOpen);
            panel.classList.toggle('is-open', !isOpen);

            if (isOpen) {
                window.requestAnimationFrame(() => {
                    toggle.blur();
                });
            }
        });
    }

    // Sub-menu logic
    const mobileParentItems = document.querySelectorAll('.mobile-menu .menu-item-has-children');

    function getDirectSubMenu(menuItem) {
        return menuItem.querySelector(':scope > .sub-menu');
    }

    function getParentMenuItem(menuItem) {
        return menuItem.parentElement ? menuItem.parentElement.closest('.menu-item-has-children') : null;
    }

    function syncOpenAncestorHeights(menuItem) {
        let current = getParentMenuItem(menuItem);

        while (current) {
            const currentSubMenu = getDirectSubMenu(current);
            if (currentSubMenu && current.classList.contains('is-submenu-open')) {
                currentSubMenu.style.height = `${currentSubMenu.scrollHeight}px`;
            }
            current = getParentMenuItem(current);
        }
    }

    function openSubMenu(menuItem, link, subMenu) {
        menuItem.classList.add('is-submenu-open');
        link.setAttribute('aria-expanded', 'true');

        const targetHeight = subMenu.scrollHeight;
        subMenu.style.height = `${targetHeight}px`;

        syncOpenAncestorHeights(menuItem);
    }

    function closeSubMenu(menuItem, link, subMenu) {
        const currentHeight = subMenu.scrollHeight;
        subMenu.style.height = `${currentHeight}px`;
        void subMenu.offsetHeight;

        menuItem.classList.remove('is-submenu-open');
        link.setAttribute('aria-expanded', 'false');
        subMenu.style.height = '0px';

        syncOpenAncestorHeights(menuItem);
        link.blur();
    }

    mobileParentItems.forEach((menuItem) => {
        const link = menuItem.querySelector(':scope > a');
        const subMenu = getDirectSubMenu(menuItem);

        if (!link || !subMenu) return;

        link.setAttribute('aria-expanded', 'false');
        subMenu.style.height = '0px';

        link.addEventListener('click', function (event) {
            if (window.innerWidth >= 1024) return;

            event.preventDefault();

            const isOpen = menuItem.classList.contains('is-submenu-open');

            if (isOpen) {
                closeSubMenu(menuItem, link, subMenu);
            } else {
                openSubMenu(menuItem, link, subMenu);
            }
        });

        subMenu.addEventListener('transitionend', function (event) {
            if (event.propertyName !== 'height') return;

            if (menuItem.classList.contains('is-submenu-open')) {
                subMenu.style.height = `${subMenu.scrollHeight}px`;
                syncOpenAncestorHeights(menuItem);
            }
        });

        const observer = new ResizeObserver(() => {
            if (menuItem.classList.contains('is-submenu-open')) {
                subMenu.style.height = `${subMenu.scrollHeight}px`;
                syncOpenAncestorHeights(menuItem);
            }
        });

        observer.observe(subMenu);
    });

    window.addEventListener('resize', function () {
        mobileParentItems.forEach((menuItem) => {
            const subMenu = getDirectSubMenu(menuItem);
            if (!subMenu) return;

            if (menuItem.classList.contains('is-submenu-open')) {
                subMenu.style.height = `${subMenu.scrollHeight}px`;
            } else {
                subMenu.style.height = '0px';
            }
        });
    });

    // Escape the mobile nav on click or by using ESC key
    document.addEventListener('keydown', function (event) {
        if (!panel || event.key !== 'Escape') return;
        if (!panel.classList.contains('is-open')) return;

        closeMobileMenu();
    });

    document.addEventListener('click', function (event) {
        if (!panel || !toggle) return;
        if (!panel.classList.contains('is-open')) return;

        const isClickInsidePanel = panel.contains(event.target);
        const isClickOnToggle = toggle.contains(event.target);

        if (!isClickInsidePanel && !isClickOnToggle) {
            closeMobileMenu();
        }
    });
});