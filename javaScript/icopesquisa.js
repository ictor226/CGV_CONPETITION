function toggleSearch() {
    const searchBar = document.getElementById('search-bar');
    searchBar.classList.toggle('show'); // Adiciona ou remove a classe 'show'
    searchBar.focus(); // Foca no campo de pesquisa quando é aberto
}
