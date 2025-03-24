<?php

echo '<h1>auxilio login</h1>';

var_dump($_POST);

$emailForm = $_POST['email'];
$passwordForm = $_POST['password'];



$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$consultaUsuarioSenha = 'SELECT * FROM login  WHERE email = "' .$emailForm . '" AND senha = "' . $passwordForm . '"';

$resultado = $banco->query($consultaUsuarioSenha)->fetch();

echo '<script>
alert("✅ Login realizado com sucesso!");
window.location.replace("index.php");
</script>';