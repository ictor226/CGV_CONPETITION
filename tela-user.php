<?php
include './INCLUDES/Header.php';
session_start(); // Iniciar a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: tela-login.php"); // Se não estiver logado, redireciona para login
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_cgv";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Buscar os dados do usuário logado
$sql = "
    SELECT 
        area_de_cadastro.NomeSobrenome, 
        area_de_cadastro.telefone, 
        area_de_cadastro.rua, 
        area_de_cadastro.Bairro, 
        area_de_cadastro.cep, 
        area_de_cadastro.numero, 
        area_de_cadastro.cidade_estado, 
        area_de_cadastro.complemento, 
        area_de_cadastro.img_perfil, 
        login.email
    FROM 
        area_de_cadastro
    INNER JOIN 
        login ON area_de_cadastro.id_cadastro = login.id_pessoa
    WHERE 
        area_de_cadastro.id_cadastro = ?"; // Filtra pelo usuário logado

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

$dados = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./ASSETS/CSS/tela-users.css">
</head>

<body>
    <section class="informaçoes-user">  
        <div class="color-text">
            <p>Nome</p>
            <input type="text" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" disabled>
            <p>Telefone</p>
            <input type="text" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" disabled>
        </div>
        <a href="./edit-user.php" class="editar-user"><i class="bi bi-pencil-square"></i></a>
    </section>

    <section class="area-user">
        <h1 class="title-users">Área de Usuário</h1>

        <div class="input-container">
            <div class="alinha-inputs">
                <input disabled type="text" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" placeholder="Nome e Sobrenome">
                <input disabled type="text" value="<?= isset($dados['email']) ? $dados['email'] : ''; ?>" placeholder="Email">
                <input disabled type="text" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" placeholder="Telefone">
                <input disabled type="text" value="<?= isset($dados['cep']) ? $dados['cep'] : ''; ?>" placeholder="CEP">
                <input disabled type="text" value="<?= isset($dados['cidade_estado']) ? $dados['cidade_estado'] : ''; ?>" placeholder="Estado">
            </div>
            
            <div class="alinha-inputs-2">
                <input disabled type="text" value="<?= isset($dados['Bairro']) ? $dados['Bairro'] : ''; ?>" placeholder="Bairro">
                <input disabled type="text" value="<?= isset($dados['rua']) ? $dados['rua'] : ''; ?>" placeholder="Rua">
                <input disabled type="number" value="<?= isset($dados['numero']) ? $dados['numero'] : ''; ?>" placeholder="Número">
                <input disabled type="text" value="<?= isset($dados['complemento']) ? $dados['complemento'] : ''; ?>" placeholder="Complemento">
            </div>
        </div>
        <a href="sair-do-user.php" id="button-sair-conta" class="btn btn-danger">Sair da Conta</a>
    </section>
</body>

</html>
