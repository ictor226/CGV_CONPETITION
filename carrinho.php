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
                <li><a href="./user-login.php"><i class="bi bi-person-circle" id="click"></i></a></li>
            </ul>
        </nav>
    </header>
 
    <script src="./JavaScript/icopesquisa.js"></script>
    <script src="../javaScript/offCanvas.js"></script>
 
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
 
        echo "<form class='item-carrinho'>
                <section class='carrinho'>
                    <div class='produtos-cart'>
                        <div class='cart-texts'>
                            <p class='cart-text1'>{$item['nome_item']}</p>
                            <p class='cart-text1' style='font-size: 12px;'>versão 2024</p>
                        </div>
                       
                        <input type='number' class='quantity-input' name='quantidade' min='1' max='99' value='{$item['quantidade']}' onchange='atualizarPreco({$key}, {$preco_item})' data-key='{$key}' oninput='limitQuantity(this)'>
                        <h6 class='price-cart' id='preco-item-{$key}'>R$ " . number_format($preco_item * $item['quantidade'], 2, ',', '.') . "</h6>
                        <a href='remover_carrinho.php?id={$key}'>
                            <h1><i class='bi bi-trash'></i></h1>
                        </a>
                    </div>
                </section>
            </form>";
    }
 
    echo "</div>";
 
    echo "<div class='total-carrinho'>
            <h6 class='total-text'>Valor Total: R$ <span id='total-carrinho'>" . number_format($total, 2, ',', '.') . "</span></h6>
        </div>";
 
    // Verifica se o usuário está logado e modifica o botão de acordo
    if (isset($_SESSION['id_pessoa']) && !empty($_SESSION['id_pessoa'])) {
        echo "<button class='finalizar-compra-btn' onclick='finalizarCompra($total)'>Finalizar Compra</button>";
    } else {
        echo "<button class='finalizar-compra-btn' onclick='window.location.href=\"user-login.php\"'>FAÇA LOGIN ANTES DE FINALIZAR</button>";
    }
 
    echo "</section>";
 
    include './includes/footer.php';
    ?>
 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
    <script>
        function atualizarPreco(key, precoItem) {
            const quantidade = document.querySelector(`input[name='quantidade'][data-key='${key}']`).value;
            const precoTotal = precoItem * quantidade;
 
            // Máscara de moeda BR
            const precoFormatado = precoTotal.toFixed(2)
                .replace('.', ',')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
 
            document.getElementById(`preco-item-${key}`).innerText = `R$ ${precoFormatado}`;
 
            // Atualiza o total do carrinho
            let totalCarrinho = 0;
            document.querySelectorAll('.price-cart').forEach(item => {
                const preco = parseFloat(item.innerText.replace('R$ ', '').replace(/\./g, '').replace(',', '.'));
                totalCarrinho += preco;
            });
 
            const totalFormatado = totalCarrinho.toFixed(2)
                .replace('.', ',')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.')
 
            document.getElementById('total-carrinho').innerText = totalFormatado;
        }
 
        function finalizarCompra(total) {
            if (total === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Seu carrinho está vazio!',
                    text: 'Adicione produtos antes de finalizar a compra.',
                });
                return;
            }
 
            let totalFormatado = total.toFixed(2).replace('.', ',');
 
            Swal.fire({
                title: 'Confirmação de Compra',
                text: `O valor total da sua compra é R$ ${totalFormatado}. Deseja finalizar?`,
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
 
        function limitQuantity(input) {
            if (input.value > 99) {
                input.value = 99;
            }
        }
    </script>
 
</body>
 
</html>