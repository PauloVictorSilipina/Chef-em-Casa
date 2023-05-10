let slideAtual = 1;
let slideAtual2 = 2;
let slideAtual3 = 3;
const slides = document.querySelectorAll(".imagem");
const slides2 = document.querySelectorAll(".imagem2");
const slides3 = document.querySelectorAll(".imagem3");

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
    }
    if (slideAtual2 > slides.length) {
        slideAtual2 = 1;
    }
    if (slideAtual3 > slides.length) {
        slideAtual3 = 1;
    }

    if(slideAtual < 1) {
        slideAtual = slides.length;
    }
    if(slideAtual2 < 1) {
        slideAtual2 = slides.length;
    }
    if(slideAtual3 < 1) {
        slideAtual3 = slides.length;
    }

    

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
        slides2[i].style.display = 'none';
        slides3[i].style.display = 'none';
    }
    
    slides[slideAtual - 1].style.display = 'block';
    slides2[slideAtual2 - 1].style.display = 'block';
    slides3[slideAtual3 - 1].style.display = 'block';
    
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

/*
CSS FUNCIONAL PARA O JAVASCRIPT

.imagem:not(:first-child) {
    display: none;
}

.imagem2 {
    display: none;
}
.imagem3 {
    display: none;
}

.imagem2:nth-child(2) {
    display: block;
}

.imagem3:nth-child(3) {
    display: block;
}
*/