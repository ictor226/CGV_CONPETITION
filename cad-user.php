<?php
echo "login de usuario";

// Debugging para ver o que está sendo enviado via POST
echo '<pre>';
var_dump($_POST);

// Conexão com o banco de dados usando PDO
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

// Pegando os dados do formulário
$nomeFormulario             = $_POST['nome'];
$emailFormulario            = $_POST['email'];
$senhaItemFormulario        = $_POST['senha'];
$telefoneItemFormulario     = $_POST['telefone'];
$cepItemFormulario          = $_POST['cep'];
$estadoItemFormulario       = $_POST['estado'];
$numeroItemFormulario       = $_POST['numero'];
$complementoItemFormulario  = $_POST['complemento'];

// Tratamento para garantir que Bairro e Rua não sejam NULL
$bairroItemFormulario       = !empty($_POST['Bairro']) ? $_POST['Bairro'] : 'Desconhecido';
$ruaItemFormulario          = !empty($_POST['rua']) ? $_POST['rua'] : 'Desconhecida';

// Definindo a variável $imgFormulario1, caso não haja uma imagem enviada
$imgFormulario1 = null; // ou atribua um valor caso necessário

// Inserção dos dados na tabela 'area_de_cadastro'
$insert = 'INSERT INTO area_de_cadastro (NomeSobrenome, telefone, cep, cidade_estado, numero, complemento, bairro, rua) 
           VALUES (:NomeSobrenome, :telefone, :cep, :cidade_estado, :numero, :complemento, :bairro, :rua)';

$box = $banco->prepare($insert);

// Executando a inserção
$box->execute([
    ':NomeSobrenome' => $nomeFormulario,   
    ':telefone' => $telefoneItemFormulario,
    ':cep' => $cepItemFormulario,
    ':cidade_estado' => $estadoItemFormulario,
    ':numero' => $numeroItemFormulario,
    ':complemento' => $complementoItemFormulario,
    ':bairro' => $bairroItemFormulario,  // Passando valor para o Bairro
    ':rua' => $ruaItemFormulario        // Passando valor para a Rua
]);

// Pegando o último ID inserido
$id_cad = $banco->lastInsertId();
$id_pessoa = $banco->lastInsertId();

// Inserção na tabela 'login'
$user = $banco->prepare('INSERT INTO login (email, senha, id_pessoa) VALUES (?, ?, ?)'); 
$user->execute([$emailFormulario, $senhaItemFormulario, $id_pessoa]);

// Exibindo o ID do cadastro
echo $id_cad;

// Debugging para verificar se a execução foi bem-sucedida
var_dump($box);
header('Location:tela-user.php');
    exit();
?>

<div class="col-12">
    <a href="./index.php" class="btn btn-danger">Voltar</a>
</div>
