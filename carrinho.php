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
                <li><a href="./produtos.php">Produtos</a></li>
            </ul>

            <ul class="icones">

                <div id="offcanvas" class="menu-oculto">
                    <button class="fechar" onclick="Javascript:fecharNav()">
                        <i class="bi bi-x"></i>
                    </button>
                    <li><a href="./index.php">Início</a></li>
                    <li><a href="./produtos.php">Produtos</a></li>
                    <li><a href="./tela-user.php">tela de usuario</a></li>
                    <hr>

                </div>

                
                <li><a href="./user-login.php"><i class="bi bi-person-circle" id="click"></i></a></li>
            </ul>
        </nav>
    </header>

    <script src="./JavaScript/icopesquisa.js"></script>

    <script src="../javaScript/offCanvas.js"></script>
</body>

</html>

<?php


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