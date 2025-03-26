<?php
session_start();

if (isset($_POST['id']) && isset($_POST['quantidade'])) {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];

    // Verificar se o id existe no carrinho
    if (isset($_SESSION['carrinho'][$id])) {
        // Atualizar a quantidade no carrinho
        $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;
    }

    // Redirecionar de volta para a página do carrinho
    header('Location: carrinho.php');
    exit();
}
?>