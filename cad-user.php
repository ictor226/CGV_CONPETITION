<?php
echo "login de usuario";

echo '<pre>';
var_dump($_POST);

$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$nomeFormulario             = $_POST['nome'];
$emailFormulario            = $_POST['email'];
$senhaItemFormulario        = $_POST['senha'];
$telefoneItemFormulario     = $_POST['telefone'];
$cepItemFormulario          = $_POST['cep'];
$estadoItemFormulario       = $_POST['estado'];
$numeroItemFormulario       = $_POST['numero'];
$complementoItemFormulario  = $_POST['complemento'];
$imgFormulario1             = $_POST['img_perfil'];

// Alteração aqui: substituímos 'complement' por 'complemento'
$insert = 'INSERT INTO area_de_cadastro (NomeSobrenome, telefone, cep, cidade_estado, numero, complemento, img_perfil) 
           VALUES (:NomeSobrenome, :telefone, :cep, :cidade_estado, :numero, :complemento, :img_perfil)';

$box = $banco->prepare($insert);

$box->execute([
    ':NomeSobrenome' => $nomeFormulario,   
    ':telefone' => $telefoneItemFormulario,
    ':cep' => $cepItemFormulario,
    ':cidade_estado' => $estadoItemFormulario,
    ':numero' => $numeroItemFormulario,
    ':complemento' => $complementoItemFormulario,  // Correção aqui
    ':img_perfil' => $imgFormulario1
]);

$id_cad = $banco->lastInsertId();

$id_pessoa = $banco->lastInsertId();

$user = $banco->prepare('INSERT INTO login (email, senha, id_pessoa) VALUES (?, ?, ?)'); 
$user->execute([$emailFormulario, $senhaItemFormulario, $id_pessoa]);

echo $id_cad;

var_dump($box);
?>

<div class="col-12">
    <a href="./index.php" class="btn btn-danger">Voltar</a>
</div>
