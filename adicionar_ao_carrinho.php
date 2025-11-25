<?php
session_start();

// Inclua o arquivo de conexão corretamente, fornecendo o caminho correto
include('conexao.php');  // Ajuste o caminho conforme necessário

// Verifique se o banco de dados foi inicializado corretamente
if (!$banco) {
    die("Erro na conexão com o banco de dados.");
}

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    
    // Consulta para buscar os detalhes do produto
    $query = $banco->prepare("SELECT * FROM cadastro_produto WHERE id_produto = :id_produto");
    $query->bindParam(':id_produto', $id_produto);
    $query->execute();
    
    // Verifique se o produto existe
    $produto = $query->fetch(PDO::FETCH_ASSOC);
    
    if ($produto) {
        // Verifique se o carrinho já existe na sessão
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Adiciona o produto ao carrinho
        $_SESSION['carrinho'][] = [
            'nome_item' => $produto['nome_item'],
            'preco_item' => $produto['preco_item'],
            'quantidade' => 1,  // Exemplo de quantidade
        ];

        // Redireciona para o carrinho após adicionar o produto
        header('Location: carrinho.php');
        exit();
    } else {
        echo "Produto não encontrado.";
    }
} else {
    
    echo "ID do produto não fornecido.";
}
?>

