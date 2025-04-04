<!DOCTYPE html>
<html lang="pt-BR">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <button class="menu-oculto" onclick="Javascript:abrirNav()">
            <i class="bi bi-list"></i>
        </button>
        <ul class="menu">
            <li><a href="./index.php">Início</a></li>
            <li><a href="./produtos.php">Produtos</a></li>
        </ul>
        <ul class="icones">
            <li><a href="./tela-login.php"><i class="bi bi-person-circle"></i></a></li>
        </ul>
        <div id="offcanvas" class="menu-oculto">
            <button class="fechar" onclick="Javascript:fecharNav()">
                <i class="bi bi-x"></i>
            </button>
            <li><a href="./index.php">Início</a></li>
            <li><a href="./produtos.php">Produtos</a></li>
            <hr>
            <li><a href="./cad.php">Cadastrar Produto</a></li>
        </div>
    </nav>
</header>

<?php
session_start();
include('conexao.php');

$total = 0;
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

echo "<section class='container-cart'>
        <div class='text-cart'>
            <h5 class='text-cart-1'>CARRINHO DE COMPRAS </h5>";
if (count($_SESSION['carrinho']) > 0) {
    echo "<h6>VOCÊ TEM " . count($_SESSION['carrinho']) . " ITENS</h6>";
} else {
    echo "<h6>SEU CARRINHO ESTÁ VAZIO</h6>";
}

echo "</div>
        <div class='carrinho-container'>";

foreach ($_SESSION['carrinho'] as $key => $item) {
    $img_produto = !empty($item['img_produto']) ? $item['img_produto'] : 'imagem_padrao.jpg';
    $preco_item = str_replace(['R$', '.'], '', $item['preco_item']);
    $preco_item = str_replace(',', '.', $preco_item);
    $preco_item = (float)$preco_item;
    $total += $preco_item * $item['quantidade'];

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

echo "<div class='total-carrinho'>
        <h6 class='total-text'>Valor Total: R$ " . number_format($total, 2, ',', '.') . "</h6>
      </div>";

echo "<button class='finalizar-compra-btn' onclick='finalizarCompra($total)'>Finalizar Compra</button>";

echo "</section>";

include './includes/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function finalizarCompra(total) {
    if (total === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Seu carrinho está vazio!',
            text: 'Adicione produtos antes de finalizar a compra.',
        });
        return;
    }

    let totalFormatado = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

    Swal.fire({
        title: 'Confirmação de Compra',
        text: `O valor total da sua compra é ${totalFormatado}. Deseja finalizar?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Finalizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Compra finalizada com sucesso!',
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                window.location.href = 'finalizar_compra.php';
            }, 2000);
        }
    });
}
</script>

</body>
</html>