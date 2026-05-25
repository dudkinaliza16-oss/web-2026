document.querySelectorAll('.post-user').forEach(post => {
    const images = post.querySelectorAll('.post-user__photo');
    const rightBtn = post.querySelector('.right');
    const leftBtn = post.querySelector('.left');
    const counter = post.querySelector('.post-user__count-photo-text');
    if (images.length > 0) {
        images[0].style.display = 'block';
    }
    let indexOfPhoto = 0;
    function updateSlider() {
        for (let j = 0; j < images.length; j++) {
            images[j].style.display = 'none';
        }
        images[indexOfPhoto].style.display = 'block';

        if (counter) {
            counter.textContent = (indexOfPhoto + 1) + '/' + images.length;
        }
    }
    if (rightBtn) {
        rightBtn.addEventListener('click', function() {
            if (indexOfPhoto === images.length - 1) {
                indexOfPhoto = 0;
            } else {
                indexOfPhoto = indexOfPhoto + 1;
            }
            updateSlider();
        });
    }

    if (leftBtn) {
        leftBtn.addEventListener('click', function() {
            if (indexOfPhoto === 0) {
                indexOfPhoto = images.length - 1;
            } else {
                indexOfPhoto = indexOfPhoto - 1;
            }
            updateSlider();

        });
    }

});