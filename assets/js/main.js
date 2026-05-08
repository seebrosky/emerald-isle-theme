document.addEventListener('DOMContentLoaded', function () {

    const header         = document.querySelector('[data-site-header]');
    const scrollTopBtn   = document.getElementById('scrollTopBtn');
    const searchToggles  = document.querySelectorAll('.site-search-toggle');
    const searchPanel    = document.querySelector('.site-search-panel');
    const searchClose    = document.querySelector('.site-search-close');
    const searchBackdrop = document.querySelector('.site-search-backdrop');
    const mobileToggle   = document.querySelector('.mobile-nav-toggle');
    const mobilePanel    = document.querySelector('[data-mobile-nav-panel]');

    let scrollTopTimeout;

    function isSearchOpen() {
        return searchPanel && searchPanel.classList.contains('is-open');
    }

    function isMobileNavOpen() {
        return (
            mobilePanel && mobilePanel.classList.contains('is-open')
        ) || (
            header && header.classList.contains('mobile-nav-open')
        );
    }

    function updateBackdrop() {
        if (!searchBackdrop) return;

        const searchOpen = isSearchOpen();
        const mobileOpen = isMobileNavOpen();

        searchBackdrop.classList.toggle('is-visible', searchOpen || mobileOpen);
        searchBackdrop.classList.toggle('is-mobile-visible', mobileOpen && !searchOpen);
    }

    function queueBackdropUpdate() {
        updateBackdrop();
        window.requestAnimationFrame(updateBackdrop);
        window.setTimeout(updateBackdrop, 300);
    }

    function closeMobileNav() {
        if (!isMobileNavOpen()) {
            updateBackdrop();
            return;
        }

        if (mobileToggle) {
            mobileToggle.click();
            queueBackdropUpdate();
            return;
        }

        if (header) {
            header.classList.remove('mobile-nav-open');
        }

        if (mobilePanel) {
            mobilePanel.classList.remove('is-open');
        }

        updateBackdrop();
    }

    function openSearch() {
        closeMobileNav();

        if (header) {
            header.classList.add('search-open');
        }

        searchPanel.classList.add('is-open');
        searchToggles.forEach(function (toggle) {
            toggle.setAttribute('aria-expanded', 'true');
        });

        updateBackdrop();

        const input = searchPanel.querySelector('input[type="search"]');

        if (input) {
            setTimeout(() => input.focus(), 150);
        }
    }

    function closeSearch() {
        if (header) {
            header.classList.remove('search-open');
        }

        if (searchPanel) {
            searchPanel.classList.remove('is-open');
        }

        searchToggles.forEach(function (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
        });

        updateBackdrop();
    }

    if (searchToggles.length && searchPanel) {
        searchToggles.forEach(function (toggle) {
            toggle.addEventListener('click', openSearch);
        });

        if (searchClose) {
            searchClose.addEventListener('click', closeSearch);
        }
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', queueBackdropUpdate);
    }

    if (searchBackdrop) {
        searchBackdrop.addEventListener('click', function () {
            closeSearch();
            closeMobileNav();
        });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeSearch();
            closeMobileNav();
        }
    });

    if (searchBackdrop && window.MutationObserver) {
        const backdropObserver = new MutationObserver(updateBackdrop);

        [header, searchPanel, mobilePanel].forEach(function (node) {
            if (node) {
                backdropObserver.observe(node, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            }
        });
    }

    function showScrollTopButton() {

        if (!scrollTopBtn) return;

        if (window.scrollY > 300) {

            scrollTopBtn.classList.add('is-visible');

            clearTimeout(scrollTopTimeout);

            scrollTopTimeout = setTimeout(() => {
                scrollTopBtn.classList.remove('is-visible');
            }, 3000);

        } else {

            scrollTopBtn.classList.remove('is-visible');

        }
    }

    function handleScroll() {

        const scrollY = window.scrollY;

        if (header && !header.classList.contains('mobile-nav-open')) {

            if (scrollY > 80) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

        }

        showScrollTopButton();
    }

    handleScroll();

    window.addEventListener('scroll', handleScroll, { passive: true });
    window.addEventListener('mousemove', showScrollTopButton, { passive: true });
    window.addEventListener('keydown', showScrollTopButton);
    window.addEventListener('touchstart', showScrollTopButton, { passive: true });

});
