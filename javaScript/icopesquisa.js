function toggleSearch(event) {
    const searchBar = document.getElementById('search-bar');
    const icon = event.target; // O ícone que foi clicado
    const iconPosition = icon.getBoundingClientRect(); // Posição do ícone
    const iconWidth = icon.offsetWidth; // Largura do ícone
    const screenWidth = window.innerWidth; // Largura da tela

    // Calcular a posição da barra de pesquisa
    let leftPosition = iconPosition.left + window.scrollX - 200; // Posição à esquerda do ícone (ajustando para a largura da barra)

    // Verifica se a barra de pesquisa vai ultrapassar a borda esquerda da tela
    if (leftPosition < 0) {
        leftPosition = iconPosition.left + window.scrollX + iconWidth; // Se ultrapassar, abre à direita
    }

    // Ajusta a posição da barra de pesquisa ao lado do ícone
    searchBar.style.left = `${leftPosition}px`;

    // Alterna a visibilidade da barra de pesquisa
    searchBar.classList.toggle('show');

    if (searchBar.classList.contains('show')) {
        searchBar.querySelector('input').focus(); // Foca automaticamente no campo
    }
}


var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        searchData();
    }
});

function searchData() {
    window.location = 'produtos.php?search=' + search.value;
}
