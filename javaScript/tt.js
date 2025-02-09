
        // Seleciona o ícone de pesquisa e a barra de pesquisa
        const searchIcon = document.getElementById('search-icon');
        const searchBar = document.getElementById('search-bar');

        // Adiciona o evento de clique no ícone
        searchIcon.addEventListener('click', function() {
            // Alterna a visibilidade e a largura da barra de pesquisa
            searchBar.classList.toggle('show');
            searchBar.focus(); // Foca na barra de pesquisa quando ela é expandida
        });