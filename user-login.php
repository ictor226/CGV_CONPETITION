<?php
echo "login de usuario";

echo '<pre>';
var_dump($_POST);

$emailFormulario = $_POST['email'];
$senhaItemFormulario = $_POST['senha'];


$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO login (email, senha) VALUES (:email, :senha)';

$box = $banco->prepare($insert);

$box->execute([
    ':email' => $emailFormulario,
    ':senha' => $senhaItemFormulario
]);

$id_login = $banco->lastInsertId();

echo $id_login;


echo '<script>

swal({
    title: "Sucesso!",
    text: "Produto cadastrado com sucesso!",
    icon: "success",
    button: "OK",
    
});

</script>';
 
var_dump($box);
?>



<div class="col-12">
    <a href="./index.php" class="btn btn-danger">Voltar</a>
</div>