document.addEventListener('DOMContentLoaded', function () {

    const header = document.querySelector('[data-site-header]');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    let scrollTopTimeout;

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