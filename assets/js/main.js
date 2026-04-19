document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('[data-site-header]');

    function handleScroll() {
        if (!header) return;

        if (window.scrollY > 80) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }

    if (header) {
        handleScroll();
        window.addEventListener('scroll', handleScroll, { passive: true });
    }
});