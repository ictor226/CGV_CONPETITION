<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {

// Recebe os dados do formulário de login
$emailUsuario = $_POST['email'];
$senhaUsuario = $_POST['senha'];

// Conectando ao banco de dados
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

// Verifica se o email e a senha batem com os dados no banco
$script = "SELECT * FROM login WHERE email = '{$emailUsuario}'  AND senha = '{$senhaUsuario}'";

$resultado = $banco->query($script)->fetch();

if (!empty($resultado) && $resultado != false) {

    $selectUsuario = "SELECT * FROM area_de_cadastro WHERE id_cadastro = {$resultado['id_pessoa']}";
    $dadosUsuario = $banco->query($selectUsuario)->fetch();

    session_start();

    $_SESSION['id_pessoa']      = $dadosUsuario['id_pessoa'];
    $_SESSION['NomeSobrenome']  = $dadosUsuario['NomeSobrenome'];
    $_SESSION['email']          = $dadosUsuario['email'];
    $_SESSION['telefone']       = $dadosUsuario['telefone'];
    $_SESSION['cep']            = $dadosUsuario['cep'];
    $_SESSION['cidade_estado']  = $dadosUsuario['cidade_estado'];
    $_SESSION['Bairro']         = $dadosUsuario['Bairro'];
    $_SESSION['rua']            = $dadosUsuario['rua'];
    $_SESSION['numero']         = $dadosUsuario['numero'];
    $_SESSION['complemento']    = $dadosUsuario['complemento'];

    header('location:tela-user.php');
    } else{
        echo '<script>
        alert("❌ Dados de login inválidos.");
        window.location.replace("user-login.php");
        </script>';
    }
}

include './tela-login.php';

