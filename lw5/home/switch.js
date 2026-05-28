document.querySelectorAll('.post-user').forEach(post => switchText(post));

function switchText(post) {
    const textElement = post.querySelector('.post-user__text');
    const switchBtn = post.querySelector('.post-user__switch');
    function showText() {
        textElement.classList.add('expanded');
        switchBtn.textContent = 'свернуть';
    }

    function hideText() {
        textElement.classList.remove('expanded');
        switchBtn.textContent = 'ещё';
    }
    function chooseMode(){
        if (textElement.classList.contains('expanded')) {
            hideText();
        } else {
            showText();
        }
    }

    if (textElement.scrollHeight > textElement.clientHeight) {
        switchBtn.style.display = 'block';
    }
    switchBtn.addEventListener('click', chooseMode);
}