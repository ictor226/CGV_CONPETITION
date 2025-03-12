<?php
echo "login de usuario";

echo '<pre>';
var_dump($_POST);

$nomeFormulario = $_POST['nome'];
$emailFormulario = $_POST['email'];
$senhaItemFormulario = $_POST['senha'];
$telefoneItemFormulario = $_POST['telefone'];
$cepItemFormulario = $_POST['cep'];
$estadoItemFormulario = $_POST['estado'];
$numeroItemFormulario = $_POST['numero'];
$complementoItemFormulario = $_POST['complemento'];

$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO area_de_cadastro (NomeSobrenome, email, senha, telefone, cep, cidade_estado, numero, complemento ) 
           VALUES (:NomeSobrenome, :email, :senha, :telefone, :cep, :cidade_estado, :numero, :complemento)';

$box = $banco->prepare($insert);

$box->execute([
    ':NomeSobrenome' => $nomeFormulario,   // Correção: foi alterado de :nome para :NomeSobrenome
    ':email' => $emailFormulario,
    ':senha' => $senhaItemFormulario,
    ':telefone' => $telefoneItemFormulario,
    ':cep' => $cepItemFormulario,
    ':cidade_estado' => $estadoItemFormulario,  // Correção: foi alterado de :estado para :cidade_estado
    ':numero' => $numeroItemFormulario,
    ':complemento' => $complementoItemFormulario
]);

$id_cad = $banco->lastInsertId();

echo $id_cad;


echo '<script>

swal({
    title: "Sucesso!",
    text: "Usuário excluído com sucesso!",
    icon: "success",
    button: "OK",
});

</script>';
 
var_dump($box);

?>

<div class="col-12">
    <a href="./index.php" class="btn btn-danger">Voltar</a>
</div>
