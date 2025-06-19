document.addEventListener('scroll', () => { // Js para efecto de scroll en pagina principal
    const image = document.querySelector('.fondo'); // Llamar a la calse con el efecto
    const scrollPosition = window.scrollY;
    image.style.transform = `translateY(${scrollPosition * 0.2}px)`; /* Ajusta 0.5 para velocidad */
});