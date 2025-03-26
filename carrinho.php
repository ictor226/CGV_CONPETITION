<?php
 include './INCLUDES/Header.php';
?>

<?php
session_start();
include('conexao.php');

// Inicializando a variável para o valor total
$total = 0;

echo "<section class='container-cart'>
        <div class='text-cart'>
            <h5 class='text-cart-1'>CARRINHO DE COMPRAS </h5>
            <h6>VOCÊ TEM " . count($_SESSION['carrinho']) . " ITENS</h6>
        </div>
        <div class='carrinho-container'>";

foreach ($_SESSION['carrinho'] as $key => $item) {
    // Obtém a imagem do produto, ou uma imagem padrão
    // Verificando se a imagem existe ou se precisa usar a imagem padrão
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
?>
