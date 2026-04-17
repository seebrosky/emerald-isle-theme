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
});