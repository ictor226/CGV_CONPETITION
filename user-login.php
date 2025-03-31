<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {

    $emailForm = $_POST['email'];
    $passwordForm = $_POST['password'];

    $dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
    $user = 'root';
    $password = '';

    $banco = new PDO($dsn, $user, $password);

    $script = "SELECT * FROM 'login' WHERE email = '{$emailForm}' AND senha = '{$passwordForm}'";

    $result = $banco->query($script)->fetch();

    if (!empty($result) && $result != false) {

        $selectUsuario = "SELECT * FROM 'login' WHERE id = {$result['id_pessoa']}";

        $dadosUsuario = $banco->query($selectUsuario)->fetch();

        session_start();

        $_SESSION['id_pessoa']  = $dadosUsuario['id'];
        $_SESSION['status']     = $result['status'];

        header('location:status.php');
    }
}