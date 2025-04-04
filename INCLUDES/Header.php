<?php
session_start(); // Inicia a sessão

// Verifica se o status do usuário está presente na sessão
$isAdmin = isset($_SESSION['status']) && $_SESSION['status'] === 'ADMIN';

?>


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

    <?php
    // Query de pesquisa
    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM cadastro_produto WHERE id_produto LIKE '%$data%' OR nome_item LIKE '%$data%' OR descricao LIKE '%$data%' ORDER BY id_produto DESC";
    } else {
        $sql = "SELECT * FROM cadastro_produto ORDER BY id_produto DESC";
    }
    ?>

    <link rel="stylesheet" href="./ASSETS/CSS/bara-pesquisa.css">
    <link rel="stylesheet" href="./ASSETS/CSS/tela-inicial.css">
    <link rel="stylesheet" href="./ASSETS/CSS/cart.css">
    <link rel="stylesheet" href="./ASSETS/CSS/header.css">
    <link rel="stylesheet" href="./ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="./ASSETS/CSS/info-produto.css">
</head>

<body>
    <header>
        <nav>
            <!-- Botão para abrir o menu oculto -->
            <button class="menu-oculto" onclick="Javascript:abrirNav()">
                <i class="bi bi-list"></i>
            </button>

            <ul class="menu">
                <li><a href="./index.php">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="./produtos.php">Produtos</a></li>
            </ul>

            <ul class="icones">
                <li>
                    <a href="#" onclick="toggleSearch(event)">
                        <i class="bi bi-search"></i>
                    </a>
                    <div id="search-bar" class="search-bar">
                        <input type="text" placeholder="Pesquisar..." id="pesquisar">
                    </div>
                </li>

                <div id="offcanvas" class="menu-oculto">
                    <button class="fechar" onclick="Javascript:fecharNav()">
                        <i class="bi bi-x"></i>
                    </button>
                    <li><a href="./index.php">Início</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="./produtos.php">Produtos</a></li>
                    <li><a href="./tela-user.php">tela de usuario</a></li>
                    <hr>

                    <?php if ($isAdmin) { ?>
                        <li><a href="./cad.php">Cadastrar Produto</a></li>
                    <?php }  ?>

                </div>

                <li><a href="./carrinho.php"><i class="bi bi-cart"></i></a></li>
                <li><a href="./user-login.php"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </nav>
    </header>

    <script src="./JavaScript/icopesquisa.js"></script>
    <script src="../javaScript/offCanvas.js"></script>
</body>

</html>