document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.post-user').forEach(post => switchText(post));
});
function showText(textElement, switchBtn) {
    textElement.classList.add('expanded');
    switchBtn.textContent = 'свернуть';
}
function hideText(textElement, switchBtn) {
    textElement.classList.remove('expanded');
    switchBtn.textContent = 'ещё';
}
function switchText(post) {
    const textElement = post.querySelector('.post-user__text');
    const switchBtn = post.querySelector('.post-user__switch');
    if (textElement.scrollHeight > textElement.clientHeight) {
        switchBtn.style.display = 'block';
    }
    switchBtn.addEventListener('click', function(){
        if (textElement.classList.contains('expanded')) {
            hideText(textElement, switchBtn);
        } else {
            showText(textElement, switchBtn);
        }
    });
}