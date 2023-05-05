let slideAtual = 1;
const slides = document.querySelectorAll(".imagem");

function maisSlide(n) {
    slideAtual +=n;
    if (slideAtual > slides.length) {
        slideAtual = 1;
    } else if (slideAtual < 1) {
        slideAtual = slides.length;
    }
    console.log(`slideAtual: ${slideAtual}`);

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    slides[slideAtual - 1].style.display = 'block';
}

function mostrarSlide(n) {
    let i;
    let slides = document.getElementsByClassName("imagem");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("aparecer");
        slides[i].classList.add("desaparecer");
    }
    slides[slideIndex - 1].classList.remove("desaparecer");
    slides[slideIndex - 1].classList.add("aparecer");
}