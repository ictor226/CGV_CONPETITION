<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
 
        <?php
        if (isset($titulo) && !empty($titulo)) {
            echo $titulo;
        } else {
        echo 'CGV COMPETITION';
        }

        ?>
    </title>

    <link rel="stylesheet" href="./ASSETS/CSS/bara-pesquisa.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ASSETS/CSS/tela-inicial.css">
    <link rel="stylesheet" href="./ASSETS/CSS/cart.css">
    <link rel="stylesheet" href="./ASSETS/CSS/header.css">
    <link rel="stylesheet" href="./ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="./ASSETS/CSS/info-produto.css">
    <link rel="stylesheet" href="./ASSETS/css/bara-pesquisa">
    
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="./index.php">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#">Produtos</a></li>
            </ul>

            <ul class="menu-icones">
            <li>
    <a href="#" onclick="toggleSearch(event)">
        <i class="bi bi-search"></i>
    </a>

    <div id="search-bar" class="search-bar">
        <input type="text" placeholder="Pesquisar...">
    </div>
</li>

                <li><a href="./cart.php"><i class="bi bi-cart"></i></a></li>
                <li><a href="./tela-login.php"><i class="bi bi-person-circle"></i></a></li>
            </ul>

            <!-- Botão para abrir o menu oculto -->
            <button class="menu-oculto" onclick="Javascript:abrirNav()">
                <i class="bi bi-list"></i>
            </button>

            <!-- Menu oculto -->
            <div id="offcanvas" class="menu-oculto">
                <button class="fechar" onclick="Javascript:fecharNav()">
                    <i class="bi bi-x"></i>
                </button>
                <li><a href="./index.php">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Produtos</a></li>
                <hr>
                <li><a href="./cad.php">Cadastrar Produto</a></li>
            </div>
        </nav>
    </header>
    <script src="./JavaScript/icopesquisa.js"></script>
</body>
