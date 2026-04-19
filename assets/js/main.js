document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('[data-site-header]');
    const toggle = document.querySelector('[data-mobile-nav-toggle]');
    const panel = document.querySelector('[data-mobile-nav-panel]');

    function handleScroll() {
        if (!header) return;

        if (window.scrollY > 80) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }

    function updateMobileMenuTop() {
        if (!header || !panel) return;

        const headerHeight = header.offsetHeight;
        document.documentElement.style.setProperty('--mobile-menu-top', `${headerHeight}px`);
    }

    function updateDesktopSubmenuDirections() {
        if (window.innerWidth < 1024) return;

        const topLevelItems = document.querySelectorAll('.site-nav > .menu > .menu-item');
        const nestedItems = document.querySelectorAll('.site-nav > .menu > .menu-item > .sub-menu .menu-item-has-children');

        topLevelItems.forEach((item) => {
            item.classList.remove('opens-left');

            const submenu = item.querySelector(':scope > .sub-menu');
            if (!submenu) return;

            const itemRect = item.getBoundingClientRect();
            const submenuWidth = submenu.offsetWidth || 220;
            const viewportWidth = window.innerWidth;

            if (itemRect.left + submenuWidth > viewportWidth - 16) {
                item.classList.add('opens-left');
            }
        });

        nestedItems.forEach((item) => {
            item.classList.remove('opens-left');

            const submenu = item.querySelector(':scope > .sub-menu');
            if (!submenu) return;

            const itemRect = item.getBoundingClientRect();
            const submenuWidth = submenu.offsetWidth || 220;
            const viewportWidth = window.innerWidth;

            if (itemRect.right + submenuWidth > viewportWidth - 16) {
                item.classList.add('opens-left');
            }
        });
    }

    if (header) {
        handleScroll();
        updateMobileMenuTop();

        window.addEventListener('scroll', function () {
            handleScroll();
            updateMobileMenuTop();
        }, { passive: true });

        window.addEventListener('resize', function () {
            updateMobileMenuTop();
            updateDesktopSubmenuDirections();
        });
    }

    if (toggle && panel && header) {
        toggle.addEventListener('click', function () {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true';

            toggle.setAttribute('aria-expanded', String(!isOpen));
            header.classList.toggle('mobile-nav-open', !isOpen);
            panel.classList.toggle('is-open', !isOpen);
        });
    }

    /* mobile submenu toggles */
    const mobileParentItems = document.querySelectorAll('.mobile-menu .menu-item-has-children');

    mobileParentItems.forEach((menuItem) => {
        const link = menuItem.querySelector(':scope > a');
        const subMenu = menuItem.querySelector(':scope > .sub-menu');

        if (!link || !subMenu) return;

        link.setAttribute('aria-expanded', 'false');

        link.addEventListener('click', function (event) {
            if (window.innerWidth >= 1024) return;

            const isOpen = menuItem.classList.contains('is-submenu-open');

            if (!isOpen) {
                event.preventDefault();
                menuItem.classList.add('is-submenu-open');
                link.setAttribute('aria-expanded', 'true');
            } else {
                menuItem.classList.remove('is-submenu-open');
                link.setAttribute('aria-expanded', 'false');
            }
        });
    });

    updateDesktopSubmenuDirections();

    const desktopTriggers = document.querySelectorAll('.site-nav .menu-item-has-children');
    desktopTriggers.forEach((item) => {
        item.addEventListener('mouseenter', updateDesktopSubmenuDirections);
        item.addEventListener('focusin', updateDesktopSubmenuDirections);
    });
});