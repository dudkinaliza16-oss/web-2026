
document.querySelectorAll('.post-user').forEach(post => getSlider(post));

function getSlider(post){
    const images = post.querySelectorAll('.post-user__photo');
    const leftBtn = post.querySelector('.left');
    const rightBtn = post.querySelector('.right');
    const counter = post.querySelector('.post-user__count-photo-text');
    let indexOfPhoto = 0;
    function updateSlider() {
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
    function slideToLeft(){
        indexOfPhoto = indexOfPhoto - 1;
        if (indexOfPhoto < 0) {
            indexOfPhoto = images.length - 1;
        }
        updateSlider();
    }
    function slideToRight(){
        indexOfPhoto = indexOfPhoto + 1;
        if (indexOfPhoto >= images.length) {
            indexOfPhoto = 0;
        }
        updateSlider();
    }
    if (images.length > 0) {
        updateSlider();
    }
    if (rightBtn) {
        rightBtn.addEventListener('click', slideToRight);
    }
    if (leftBtn) {
        leftBtn.addEventListener('click', slideToLeft);
    }
}