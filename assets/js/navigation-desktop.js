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

    updateDesktopSubmenuDirections();

    window.addEventListener('resize', updateDesktopSubmenuDirections);

    const desktopTriggers = document.querySelectorAll('.site-nav .menu-item-has-children');
    desktopTriggers.forEach((item) => {
        item.addEventListener('mouseenter', updateDesktopSubmenuDirections);
        item.addEventListener('focusin', updateDesktopSubmenuDirections);
    });
});