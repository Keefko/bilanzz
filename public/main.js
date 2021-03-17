
const loader = document.querySelector('#preloader');

const close = document.querySelector('.btn-close');
const collapse = document.querySelector('.navbar-collapse');
const body = document.querySelector("body");


setTimeout(function() {loader.style.display = 'none';}, 1200);



close.addEventListener('click', () => {
    collapse.classList.remove('show');
    body.classList.remove('offcanvas-active');
});






