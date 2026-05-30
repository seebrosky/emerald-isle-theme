document.addEventListener('DOMContentLoaded', function () {
    const demoModalTriggers = document.querySelectorAll('.demo-modal-trigger');
    const demoModal = document.querySelector('.demo-modal');

    if (!demoModalTriggers.length || !demoModal) {
        return;
    }

    const modalImage = demoModal.querySelector('.demo-modal-image');
    const modalTitle = demoModal.querySelector('.demo-modal-title');
    const modalClose = demoModal.querySelector('.demo-modal-close');

    function openDemoModal(trigger) {
        modalImage.src = trigger.dataset.demoImage;
        modalImage.alt = trigger.dataset.demoTitle;
        modalTitle.textContent = trigger.dataset.demoTitle;

        demoModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDemoModal() {
        demoModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');

        modalImage.src = '';
        modalImage.alt = '';
        modalTitle.textContent = '';
    }

    demoModalTriggers.forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            openDemoModal(trigger);
        });
    });

    modalClose.addEventListener('click', closeDemoModal);

    demoModal.addEventListener('click', function (event) {
        if (event.target === demoModal) {
            closeDemoModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (
            event.key === 'Escape' &&
            !demoModal.classList.contains('hidden')
        ) {
            closeDemoModal();
        }
    });
});