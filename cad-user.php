<?php
session_start(); // Inicia a sessão

// Conexão com o banco de dados
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Pegando os dados do formulário
$nomeFormulario             = $_POST['nome'];
$emailFormulario            = $_POST['email'];
$senhaItemFormulario        = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
$telefoneItemFormulario     = $_POST['telefone'];
$cepItemFormulario          = $_POST['cep'];
$estadoItemFormulario       = $_POST['estado'];
$numeroItemFormulario       = $_POST['numero'];
$complementoItemFormulario  = $_POST['complemento'];
$bairroItemFormulario       = !empty($_POST['Bairro']) ? $_POST['Bairro'] : 'Desconhecido';
$ruaItemFormulario          = !empty($_POST['rua']) ? $_POST['rua'] : 'Desconhecida';

// Inserindo os dados na tabela area_de_cadastro
$insert = 'INSERT INTO area_de_cadastro (NomeSobrenome, telefone, cep, cidade_estado, numero, complemento, bairro, rua) 
           VALUES (:NomeSobrenome, :telefone, :cep, :cidade_estado, :numero, :complemento, :bairro, :rua)';

$box = $banco->prepare($insert);
$box->execute([
    ':NomeSobrenome' => $nomeFormulario,   
    ':telefone' => $telefoneItemFormulario,
    ':cep' => $cepItemFormulario,
    ':cidade_estado' => $estadoItemFormulario,
    ':numero' => $numeroItemFormulario,
    ':complemento' => $complementoItemFormulario,
    ':bairro' => $bairroItemFormulario,
    ':rua' => $ruaItemFormulario
]);

// Obtendo o ID do usuário cadastrado
$id_pessoa = $banco->lastInsertId();

// Inserindo na tabela login
$user = $banco->prepare('INSERT INTO login (email, senha, id_pessoa) VALUES (?, ?, ?)'); 
$user->execute([$emailFormulario, $senhaItemFormulario, $id_pessoa]);

// Armazena o ID do usuário na sessão
$_SESSION['id_usuario'] = $id_pessoa;

// Redireciona para a tela do usuário
header('Location: tela-user.php');
exit();
?>