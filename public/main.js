
const loader = document.querySelector('#preloader');
const nav = document.querySelector('.navbar-toggler');
const navInner = document.querySelector('.navbar-toggler-inner');
const tl = gsap.timeline();

setTimeout(function() {loader.style.display = 'none';}, 1200);



nav.addEventListener('click', () => {
    navInner.classList.toggle('active');
});



