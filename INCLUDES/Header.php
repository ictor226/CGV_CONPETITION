<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./ASSETS/CSS/bara-pesquisa.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ASSETS/CSS/tela-inicial.css">
    <link rel="stylesheet" href="./ASSETS/CSS/cart.css">
    <link rel="stylesheet" href="./ASSETS/CSS/header.css">

    <title>
        <?php
        if (isset($titulo) &&  !empty($titulo)) {
            echo $titulo;
        } else {

            echo 'CGV COMPETITION';
        }
        ?>

    </title>

</head>
<header>
    <nav>
        <button class="menu-oculto" onclick="javascript:abrirNav()">
            <i class="bi bi-list"></i>
        </button>
        <ul class="menu">
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Produtos</a></li>
        </ul>
        <div class="search-container">
            <input type="text" id="search-bar" placeholder="Buscar produtos...">
            <button id="search-icon" onclick="toggleSearch()">
                <i class="bi bi-search"></i>
            </button>
        </div>
        <ul class="menu-icones">
            <li><a href="./cart.php"><i class="bi bi-cart"></i></a></li>
            <li><a href="./tela-login.html"><i class="bi bi-person-circle"></i></a></li>
        </ul>
    </nav>

    <button class="menu-oculto" onclick="Javascript:abrirNav()">

    </button>

    <div id="offcanvas" class="menu-oculto">
        <button class="fechar" onclick="Javascript:fecharNav()">
            <i class="bi bi-x"></i>

            <a href="index.html">Exemplo</a>
            <a href="#">Exemplo</a>
            <a href="#">Exemplo</a>

            <hr>

        </button>
    </div>

</header>