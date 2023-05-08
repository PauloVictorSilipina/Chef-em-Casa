let slideAtual = 1;
let slideAtual2 = 2;
let slideAtual3 = 3;
const slides = document.querySelectorAll(".imagem");

function maisSlide(n) {
    slideAtual +=n;
    slideAtual2 +=n;
    slideAtual3 +=n;
    console.log(`${slideAtual}`)
    console.log(`${slideAtual2}`)
    console.log(`${slideAtual3}`)
    console.log(`---------}`)
    if (slideAtual > slides.length) {
        slideAtual = 1;
        slideAtual2 = 2;
        slideAtual3 = 3;
    }
    else if (slideAtual2 > slides.length) {
        slideAtual = 5;
        slideAtual2 = 1;
        slideAtual3 = 2;
    }
    else if (slideAtual3 > slides.length) {
        slideAtual = 4;
        slideAtual2 = 5;
        slideAtual3 = 1;
    }
    else if (slideAtual < 1) {
        slideAtual = slides.length;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    
    slides[slideAtual - 1].style.display = 'block';
    slides[slideAtual2 - 1].style.display = 'block';
    slides[slideAtual3 - 1].style.display = 'block';
    
}

/*function mostrarSlide(n) {
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
}*/