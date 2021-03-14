

const nav = document.querySelector('.navbar-toggler');
const navInner = document.querySelector('.navbar-toggler-inner');
const wrapper = document.querySelector('#wrapper');

nav.addEventListener('click', () => {
    navInner.classList.toggle('active');
    wrapper.classList.toggle("toggled");
});
