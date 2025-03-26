<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os valores estão definidos
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $preco = $_POST['preco'] ?? null;
    $img = $_POST['img'] ?? null;
    $versao = $_POST['versao'] ?? 'Sem versão'; // Definir valor padrão se não tiver versão
    $quantidade = 1; // Quantidade inicial

    if ($id && $nome && $preco && $img) {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        $_SESSION['carrinho'][] = [
            'id' => $id,
            'nome' => $nome,
            'preco' => floatval($preco), // Converte para float
            'img' => $img,
            'versao' => $versao,
            'quantidade' => $quantidade
        ];

        header('Location: carrinho.php');
        exit;
    } else {
        echo "Erro: Dados incompletos para adicionar ao carrinho.";
    }
}
