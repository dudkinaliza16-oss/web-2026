document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.post-user').forEach(post => createModal(post));

    function updateModal(postPhotos, mainImg, activeIndex, counter) {
        if (postPhotos.length > 0) {
            mainImg.src = postPhotos[activeIndex].src;
            counter.textContent = (activeIndex + 1) + " из " + postPhotos.length;
        }
    }

    function createModal(post) {
        const containerImg = post.querySelector('.post-user__photos-container');
        const modal = document.querySelector('.image-viewer');
        const postPhotos = post.querySelectorAll('.post-user__photo');
        containerImg.addEventListener('click', function (event) {
            const wrapper = document.createElement('div');
            const closeBtn = document.createElement('button');
            const imgContainer = document.createElement('div');
            const mainImg = document.createElement('img');
            const counter = document.createElement('span');
            wrapper.className = 'image-viewer__slider-wrapper';
            closeBtn.className = 'image-viewer__close';
            imgContainer.className = 'image-viewer__img-container';
            counter.className = 'image-viewer__counter';
            wrapper.appendChild(closeBtn);
            wrapper.appendChild(imgContainer);
            wrapper.appendChild(counter);
            imgContainer.appendChild(mainImg);
            closeBtn.textContent = '×';
            let activeIndex = Array.from(postPhotos).indexOf(event.target);
            if (activeIndex < 0) activeIndex = 0;

            updateModal(postPhotos, mainImg, activeIndex, counter);
            let leftBtn, rightBtn;
            if (postPhotos.length > 1) {
                leftBtn = document.createElement('button');
                leftBtn.className = 'image-viewer__arrow left';
                leftBtn.innerHTML = '<img src="../item/button_left.png" width="10" height="10" alt="Назад">';

                rightBtn = document.createElement('button');
                rightBtn.className = 'image-viewer__arrow right';
                rightBtn.innerHTML = '<img src="../item/button_right.png" width="10" height="10" alt="Вперед">';

                leftBtn.addEventListener('click', function (event) {
                    event.stopPropagation();
                    activeIndex = activeIndex - 1;
                    if (activeIndex < 0) {
                        activeIndex = postPhotos.length - 1;
                    }
                    updateModal(postPhotos, mainImg, activeIndex, counter);
                });

                rightBtn.addEventListener('click', function (event) {
                    event.stopPropagation();
                    activeIndex = activeIndex + 1;
                    if (activeIndex >= postPhotos.length) {
                        activeIndex = 0;
                    }
                    updateModal(postPhotos, mainImg, activeIndex, counter);
                });

                imgContainer.appendChild(leftBtn);
                imgContainer.appendChild(rightBtn);
            }
            modal.appendChild(wrapper);
            modal.style.display = 'flex';
            function handleKeyDown(event) {
                if (event.key === 'Escape') {
                    wrapper.remove();
                    modal.style.display = 'none';
                    document.removeEventListener('keydown', handleKeyDown);
                }
            }
            closeBtn.addEventListener('click', function () {
                wrapper.remove();
                modal.style.display = 'none';
                document.removeEventListener('keydown', handleKeyDown);
            });
            document.addEventListener('keydown', handleKeyDown);
        });
    }
});