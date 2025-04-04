<?php
session_start(); // Inicia a sessão

// Verifica o status do usuário
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
<?php

$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

// Verificando se a busca foi feita
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $data = $_GET['search'];
    $select = "SELECT * FROM cadastro_produto WHERE nome_item LIKE :data OR descricao LIKE :data ORDER BY id_produto DESC";
    $stmt = $banco->prepare($select);
    $stmt->bindValue(':data', '%' . $data . '%');
    $stmt->execute();
    $resultado = $stmt->fetchAll();
} else {
    $select = 'SELECT * FROM cadastro_produto ORDER BY RAND()';
    $resultado = $banco->query($select)->fetchAll();
}
?>

<div class="container">
    <?php foreach ($resultado as $linha) { ?>
        <section class="produtos">
            <a href="./info-produto.php?id=<?=$linha['id_produto']?>">
                <button class="btn-produto-card">
                    <div class="item">
                        <figure>
                            <img src="./ASSETS/img/produtos/<?php echo !empty($linha['img_produto1']) ? htmlspecialchars($linha['img_produto1']) : 'imagem_padrao.jpg' ?>" alt="Produto" class="foto-produto">
                            <figcaption>
                                <h4 class="h4-tela02"><?php echo $linha['nome_item'] ?></h4>
                            </figcaption>
                        </figure>
                    </div>
                </button>
            </a>

            <!-- Link para adicionar ao carrinho -->
            <form action="cart.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $linha['id_produto']; ?>">
                <button type="submit" class="add-to-cart-button">Adicionar ao Carrinho</button>
            </form>
        </section>
    <?php } ?>
</div>

<?php
include './includes/footer.php';
?>
