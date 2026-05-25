document.addEventListener("DOMContentLoaded", function() {
    const containers = document.querySelectorAll('.post-user__container');

    containers.forEach(container => {
        const textElement = container.querySelector('.post-user__text');
        const toggleBtn = container.querySelector('.post-user__toggle');
        if (textElement.scrollHeight > textElement.clientHeight) {
            toggleBtn.style.display = 'inline-block';
        }

        toggleBtn.addEventListener('click', function() {
            textElement.classList.toggle('expanded');

            if (textElement.classList.contains('expanded')) {
                this.textContent = 'Свернуть';
            } else {
                this.textContent = 'Ещё';
            }
        });
    });
});