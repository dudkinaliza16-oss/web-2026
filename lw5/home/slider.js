document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.post-user').forEach(post => getSlider(post));

    function updateSlider(images, indexOfPhoto, counter) {
        for (let i = 0; i < images.length; i++) {
            if (i === indexOfPhoto) {
                images[i].style.display = 'block';
            } else {
                images[i].style.display = 'none';
            }
        }
        if (counter) {
            counter.textContent = (indexOfPhoto + 1) + '/' + images.length;
        }
    }

    function getSlider(post) {
        const images = post.querySelectorAll('.post-user__photo');
        const leftBtn = post.querySelector('.left');
        const rightBtn = post.querySelector('.right');
        const counter = post.querySelector('.post-user__count-photo-text');
        let indexOfPhoto = 0;
        if (images.length > 0) {
            updateSlider(images, indexOfPhoto, counter);
        }
        if (rightBtn) {
            rightBtn.addEventListener('click', () => {
                indexOfPhoto = indexOfPhoto + 1;
                if (indexOfPhoto >= images.length) {
                    indexOfPhoto = 0;
                }
                updateSlider(images, indexOfPhoto, counter);
            });
        }
        if (leftBtn) {
            leftBtn.addEventListener('click', () => {
                indexOfPhoto = indexOfPhoto - 1;
                if (indexOfPhoto < 0) {
                    indexOfPhoto = images.length - 1;
                }
                updateSlider(images, indexOfPhoto, counter);
            });
        }
    }
});