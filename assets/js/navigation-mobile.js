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