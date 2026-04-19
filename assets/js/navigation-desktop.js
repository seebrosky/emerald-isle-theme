document.addEventListener('DOMContentLoaded', function () {
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

    function isDesktopTouchMode() {
        return window.innerWidth >= 1024 && (
            window.matchMedia('(hover: none)').matches ||
            navigator.maxTouchPoints > 0
        );
    }

    function closeTouchOpenMenus() {
        document.querySelectorAll('.site-nav .is-touch-open').forEach((item) => {
            item.classList.remove('is-touch-open');
        });
    }

    updateDesktopSubmenuDirections();
    window.addEventListener('resize', updateDesktopSubmenuDirections);

    const desktopTriggers = document.querySelectorAll('.site-nav .menu-item-has-children');
    desktopTriggers.forEach((item) => {
        item.addEventListener('mouseenter', updateDesktopSubmenuDirections);
        item.addEventListener('focusin', updateDesktopSubmenuDirections);
    });

    const touchParents = document.querySelectorAll('.site-nav .menu-item-has-children');

    touchParents.forEach((menuItem) => {
        const link = menuItem.querySelector(':scope > a');
        const subMenu = menuItem.querySelector(':scope > .sub-menu');

        if (!link || !subMenu) return;

        link.addEventListener('click', function (event) {
            if (!isDesktopTouchMode()) return;

            const isOpen = menuItem.classList.contains('is-touch-open');

            if (!isOpen) {
                event.preventDefault();

                const siblingScope = menuItem.parentElement;
                if (siblingScope) {
                    siblingScope.querySelectorAll(':scope > .menu-item-has-children.is-touch-open').forEach((sibling) => {
                        if (sibling !== menuItem) {
                            sibling.classList.remove('is-touch-open');
                        }
                    });
                }

                menuItem.classList.add('is-touch-open');
            } else if (link.getAttribute('href') === '#') {
                event.preventDefault();
                menuItem.classList.remove('is-touch-open');
            }
        });
    });

    document.addEventListener('click', function (event) {
        const nav = document.querySelector('.site-nav');
        if (!nav) return;
        if (!isDesktopTouchMode()) return;

        if (!nav.contains(event.target)) {
            closeTouchOpenMenus();
        }
    });

    window.addEventListener('orientationchange', closeTouchOpenMenus);
    window.addEventListener('resize', function () {
        if (!isDesktopTouchMode()) {
            closeTouchOpenMenus();
        }
    });
});