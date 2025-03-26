<?php
session_start();

// Verifique se o carrinho existe e se o ID do item foi passado
if (isset($_SESSION['carrinho']) && isset($_GET['id'])) {
    $id_item = $_GET['id'];

    // Verifique se o item existe no carrinho
    if (isset($_SESSION['carrinho'][$id_item])) {
        // Remover o item do carrinho
        unset($_SESSION['carrinho'][$id_item]);
    }

    // Redirecionar de volta para o carrinho após a remoção
    header('Location: carrinho.php');
    exit;
} else {
    // Se não houver carrinho ou o ID não foi passado corretamente, redirecione
    header('Location: carrinho.php');
    exit;
}
?>