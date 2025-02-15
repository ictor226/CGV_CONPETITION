// Seleciona o ícone de pesquisa e a barra de pesquisa
const searchIcon = document.getElementById('search-icon');
const searchBar = document.getElementById('search-bar');

// Adiciona o evento de clique no ícone de pesquisa
searchIcon.addEventListener('click', function() {
    searchBar.classList.toggle('show'); // Alterna a classe "show" para abrir ou fechar a barra
});
