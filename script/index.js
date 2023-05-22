const categorias = document.querySelectorAll('.categorias');

categorias.forEach(categorias => {
    categorias.addEventListener('mouseover', () => {
        categorias.parentElement.classList.add('active');
    });

    categorias.addEventListener('mouseout', () => {
        categorias.parentElement.classList.remove('active');
    });
})