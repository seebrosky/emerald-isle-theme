document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('[data-site-header]');
    const toggle = document.querySelector('[data-mobile-nav-toggle]');
    const panel = document.querySelector('[data-mobile-nav-panel]');
    const mobileParentItems = document.querySelectorAll('.mobile-menu .menu-item-has-children');

    function isDesktopNavMode() {
        return window.innerWidth >= 1024;
    }

    function getDirectSubMenu(menuItem) {
        return menuItem.querySelector(':scope > .sub-menu');
    }

    function getParentMenuItem(menuItem) {
        return menuItem.parentElement?.closest('.menu-item-has-children') || null;
    }

    function updateMobileMenuTop() {
        if (!header || !panel) return;
        document.documentElement.style.setProperty('--mobile-menu-top', `${header.offsetHeight}px`);
    }

    function closeMobileMenu() {
        if (!toggle || !panel || !header) return;

        toggle.setAttribute('aria-expanded', 'false');
        header.classList.remove('mobile-nav-open');
        panel.classList.remove('is-open');

        mobileParentItems.forEach((menuItem) => {
            const link = menuItem.querySelector(':scope > a');
            const subMenu = getDirectSubMenu(menuItem);

            menuItem.classList.remove('is-submenu-open');

            if (link) {
                link.setAttribute('aria-expanded', 'false');
                link.blur();
            }

            if (subMenu) {
                subMenu.style.transition = 'none';
                subMenu.style.height = '0px';
                subMenu.offsetHeight;
                subMenu.style.transition = '';
            }
        });
    }

    function syncOpenAncestorHeights(menuItem) {
        let current = getParentMenuItem(menuItem);

        while (current) {
            const subMenu = getDirectSubMenu(current);

            if (subMenu && current.classList.contains('is-submenu-open')) {
                subMenu.style.height = `${subMenu.scrollHeight}px`;
            }

            current = getParentMenuItem(current);
        }
    }

    function setSubMenuState(menuItem, link, subMenu, shouldOpen) {
        if (shouldOpen) {
            menuItem.classList.add('is-submenu-open');
            link.setAttribute('aria-expanded', 'true');

            subMenu.style.height = 'auto';
            const targetHeight = subMenu.scrollHeight;
            subMenu.style.height = '0px';
            subMenu.offsetHeight;
            subMenu.style.height = `${targetHeight}px`;
        } else {
            const currentHeight = subMenu.scrollHeight;
            subMenu.style.height = `${currentHeight}px`;
            subMenu.offsetHeight;

            menuItem.classList.remove('is-submenu-open');
            link.setAttribute('aria-expanded', 'false');
            subMenu.style.height = '0px';
            link.blur();
        }

        syncOpenAncestorHeights(menuItem);
    }

    if (header && panel) {
        updateMobileMenuTop();
        window.addEventListener('scroll', updateMobileMenuTop, { passive: true });
        window.addEventListener('resize', updateMobileMenuTop);
    }

    if (toggle && panel && header) {
        toggle.addEventListener('click', function () {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true';

            if (isOpen) {
                closeMobileMenu();
                window.requestAnimationFrame(() => toggle.blur());
                return;
            }

            toggle.setAttribute('aria-expanded', 'true');
            header.classList.add('mobile-nav-open');
            panel.classList.add('is-open');
        });
    }

    mobileParentItems.forEach((menuItem) => {
        const link = menuItem.querySelector(':scope > a');
        const subMenu = menuItem.querySelector(':scope > .sub-menu');

        if (!link || !subMenu) return;

        link.setAttribute('aria-expanded', 'false');
        subMenu.style.height = '0px';
        subMenu.style.overflow = 'hidden';

        link.addEventListener('click', function (event) {
            if (window.innerWidth >= 1024) return;
            event.preventDefault();

            const isOpen = menuItem.classList.contains('is-submenu-open');

            if (isOpen) {
                const openDescendants = menuItem.querySelectorAll('.menu-item-has-children.is-submenu-open');

                openDescendants.forEach((descendant) => {
                    descendant.classList.remove('is-submenu-open');

                    const descendantLink = descendant.querySelector(':scope > a');
                    const descendantSubMenu = descendant.querySelector(':scope > .sub-menu');

                    if (descendantLink) {
                        descendantLink.setAttribute('aria-expanded', 'false');
                    }

                    if (descendantSubMenu) {
                        descendantSubMenu.style.transition = 'none';
                        descendantSubMenu.style.height = '0px';
                        descendantSubMenu.offsetHeight;
                        descendantSubMenu.style.transition = '';
                    }
                });

                const startHeight = subMenu.scrollHeight;

                subMenu.style.height = `${startHeight}px`;
                subMenu.offsetHeight;

                menuItem.classList.remove('is-submenu-open');
                link.setAttribute('aria-expanded', 'false');
                subMenu.style.height = '0px';
                link.blur();
            } else {
                menuItem.classList.add('is-submenu-open');
                link.setAttribute('aria-expanded', 'true');

                subMenu.style.height = 'auto';
                const targetHeight = subMenu.scrollHeight;

                subMenu.style.height = '0px';
                subMenu.offsetHeight;

                subMenu.style.height = `${targetHeight}px`;
            }
        });

        subMenu.addEventListener('transitionend', function (event) {
            if (event.propertyName !== 'height') return;

            if (menuItem.classList.contains('is-submenu-open')) {
                subMenu.style.height = 'auto';
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (!panel || !panel.classList.contains('is-open')) return;
        if (event.key !== 'Escape') return;

        closeMobileMenu();
    });

    document.addEventListener('click', function (event) {
        if (!panel || !toggle || !panel.classList.contains('is-open')) return;

        const isClickInsidePanel = panel.contains(event.target);
        const isClickOnToggle = toggle.contains(event.target);

        if (!isClickInsidePanel && !isClickOnToggle) {
            closeMobileMenu();
        }
    });
});