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
        <input type="text" placeholder="Pesquisar...">
    </div>
</li>


                <li><a href="./tela-login.php"><i class="bi bi-person-circle"></i></a></li>
            </ul>

            <!-- Menu oculto -->
            <div id="offcanvas" class="menu-oculto">
                <button class="fechar" onclick="Javascript:fecharNav()">
                    <i class="bi bi-x"></i>
                </button>
                <li><a href="./index.php">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="./produtos.php">Produtos</a></li>
                <hr>
                <li><a href="./cad.php">Cadastrar Produto</a></li>
            </div>
        </nav>
    </header>
    <script src="./JavaScript/icopesquisa.js"></script>
</body>



<?php
session_start();
include('conexao.php');

// Inicializando a variável para o valor total
$total = 0;

// Verificar se a chave 'carrinho' existe na sessão, caso contrário, inicializar como array vazio
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

echo "<section class='container-cart'>
        <div class='text-cart'>
            <h5 class='text-cart-1'>CARRINHO DE COMPRAS </h5>";
            
// Verificar se o carrinho está vazio e exibir a quantidade de itens
if (count($_SESSION['carrinho']) > 0) {
    echo "<h6>VOCÊ TEM " . count($_SESSION['carrinho']) . " ITENS</h6>";
} else {
    echo "<h6>SEU CARRINHO ESTÁ VAZIO</h6>";
}

echo "</div>
        <div class='carrinho-container'>";

foreach ($_SESSION['carrinho'] as $key => $item) {
    // Obtém a imagem do produto, ou uma imagem padrão
    $img_produto = !empty($item['img_produto']) ? $item['img_produto'] : 'imagem_padrao.jpg';
    
    // Garantir que o preço seja tratado como float (removendo "R$" e substituindo vírgula por ponto)
    $preco_item = $item['preco_item'];
    
    // Remover "R$" e substituir vírgula por ponto para fazer a conversão para float
    $preco_item = str_replace(['R$', '.'], '', $preco_item); // Remove "R$" e pontos
    $preco_item = str_replace(',', '.', $preco_item); // Substitui vírgula por ponto
    $preco_item = (float)$preco_item; // Converte para float

    // Calculando o total do carrinho
    $total += $preco_item * $item['quantidade']; // preço multiplicado pela quantidade

    // Formulário para atualizar a quantidade
    echo "<form action='atualizar_carrinho.php' method='POST'>
            <section class='carrinho'>
                <div class='produtos-cart'>
                    <div class='cart-texts'>
                        <p class='cart-text1'>{$item['nome_item']}</p>
                        <p class='cart-text1' style='font-size: 12px;'>versão 2024</p>
                    </div>
                    <input type='number' class='quantity-input' name='quantidade' min='1' value='{$item['quantidade']}'>
                    <h6 class='price-cart'>R$ " . number_format($preco_item, 2, ',', '.') . "</h6>
                    <a href='remover_carrinho.php?id={$key}'>
                        <h1><i class='bi bi-trash'></i></h1> 
                    </a>
                    <input type='hidden' name='id' value='{$key}'>
                    <button type='submit' class='update-btn'>Atualizar</button>
                </div>
            </section>
        </form>";
}

echo "</div>";

// Exibindo o valor total
echo "<div class='total-carrinho'>
        <h6 class='total-text'>Valor Total: R$ " . number_format($total, 2, ',', '.') . "</h6>
      </div>";

echo "</section>";

include './includes/footer.php';
?>
