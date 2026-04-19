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
        window.addEventListener('scroll', handleScroll, { passive: true });
    }

    if (toggle && panel) {
        toggle.addEventListener('click', function () {
            const isOpen = toggle.getAttribute('aria-expanded') === 'true';

            toggle.setAttribute('aria-expanded', String(!isOpen));
            header.classList.toggle('mobile-nav-open', !isOpen);

            if (isOpen) {
                panel.classList.remove('is-open');

                window.setTimeout(() => {
                    panel.hidden = true;
                }, 220);
            } else {
                panel.hidden = false;

                window.requestAnimationFrame(() => {
                    panel.classList.add('is-open');
                });
            }
        });
    }

    /* mobile submenu toggles */
    const mobileParentLinks = document.querySelectorAll('.mobile-menu .menu-item-has-children');

    mobileParentLinks.forEach((menuItem, index) => {
        const link = menuItem.querySelector(':scope > a');
        const subMenu = menuItem.querySelector(':scope > .sub-menu');

        if (!link || !subMenu) return;

        const submenuId = `mobile-submenu-${index + 1}`;

        subMenu.id = submenuId;
        subMenu.hidden = false;

        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'mobile-submenu-toggle';
        button.setAttribute('aria-expanded', 'false');
        button.setAttribute('aria-controls', submenuId);
        button.innerHTML = `
            <span class="sr-only">Toggle submenu</span>
            <span class="mobile-submenu-toggle-icon"></span>
        `;

        link.insertAdjacentElement('afterend', button);

        button.addEventListener('click', function () {
            const isOpen = button.getAttribute('aria-expanded') === 'true';

            button.setAttribute('aria-expanded', String(!isOpen));
            menuItem.classList.toggle('is-submenu-open', !isOpen);
        });
    });

    updateDesktopSubmenuDirections();
    window.addEventListener('resize', updateDesktopSubmenuDirections);

    const desktopTriggers = document.querySelectorAll('.site-nav .menu-item-has-children');
    desktopTriggers.forEach((item) => {
        item.addEventListener('mouseenter', updateDesktopSubmenuDirections);
        item.addEventListener('focusin', updateDesktopSubmenuDirections);
    });
});