<?php
session_start();
$_SESSION['carrinho'] = []; // Limpa o carrinho
header('Location: index.php'); // Redireciona de volta ao carrinho
exit();
?>
