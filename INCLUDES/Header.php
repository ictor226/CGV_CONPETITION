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

<body>
<header>
    <nav>
        <a href="./index.php" class="logo">
            <h1>CGV COMPETITION</h1>
        </a>
        <ul class="menu">
            <li><a href="./index.php">Início</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Produtos</a></li>
        </ul>

        <ul class="menu-icones">
            <li><a href="#"><i class="bi bi-search"></i></a></li>
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
        </div>
    </nav>
</header>
</body>