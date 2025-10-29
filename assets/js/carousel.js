// Carrusel automático
let slideIndex = 0;
const slides = document.querySelectorAll('.carousel-slide');
const dots = document.querySelectorAll('.dot');

function showSlide(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slideIndex = n;
    if (slideIndex >= slides.length) slideIndex = 0;
    if (slideIndex < 0) slideIndex = slides.length - 1;

    slides[slideIndex].classList.add('active');
    dots[slideIndex].classList.add('active');
}

function currentSlide(n) {
    showSlide(n);
}

function autoSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

// Cambio automático cada 5 segundos
setInterval(autoSlide, 5000);