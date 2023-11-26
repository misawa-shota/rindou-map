const zoom = document.querySelectorAll('.zoom_up');
const zoomUpWp = document.getElementById('zoom_up_wrapper');
const zoomImg = document.getElementById('zoom_up_img');

zoom.forEach(function(value) {
    value.addEventListener('click',zoomUp);
});

function zoomUp(e) {
    zoomUpWp.style.display = 'flex';
    zoomImg.setAttribute('src', e.target.getAttribute('src'));
}

zoomUpWp.addEventListener('click', zoomOut);

function zoomOut() {
    zoomUpWp.style.display = 'none';
}
