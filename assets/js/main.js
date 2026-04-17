document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('[data-site-header]');

    if (!header) return;

    function handleScroll() {
        if (window.scrollY > 80) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }

    handleScroll();
    window.addEventListener('scroll', handleScroll, { passive: true });
});