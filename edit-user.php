<?php
include './INCLUDES/Header.php';

// Iniciar a sessão
session_start();
if (!isset($_SESSION['id_pessoa'])) {
    header("Location: user-login.php");
    exit;
}

$id_pessoa = $_SESSION['id_pessoa'];

// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_cgv";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL com INNER JOIN para unir as tabelas 'area_de_cadastro' e 'login'
$sql = "
    SELECT
        area_de_cadastro.id_cadastro,
        area_de_cadastro.NomeSobrenome,
        area_de_cadastro.telefone,
        area_de_cadastro.rua,
        area_de_cadastro.cep,
        area_de_cadastro.numero,
        area_de_cadastro.cidade_estado,
        area_de_cadastro.complemento,
        area_de_cadastro.Bairro,
        login.email
    FROM
        area_de_cadastro
    INNER JOIN
        login ON area_de_cadastro.id_cadastro = login.id_pessoa
    WHERE
        area_de_cadastro.id_cadastro = ?"; // Filtra pelo id_cadastro

// Prepara a consulta
$stmt = $conn->prepare($sql);

// Verifica se a preparação da consulta falhou
if ($stmt === false) {
    die('Erro na preparação da consulta SQL: ' . $conn->error);
}

// Vincula os parâmetros (id_pessoa) à consulta
$stmt->bind_param("i", $id_pessoa);

// Executa a consulta
$stmt->execute();

// Obtém o resultado da consulta
$result = $stmt->get_result();

// Verifica se existem dados
if ($result->num_rows > 0) {
    // Pega a primeira linha de dados
    $dados = $result->fetch_assoc();
} else {
    echo "Nenhum dado encontrado.";
}

// Fecha a consulta e a conexão
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ASSETS/CSS/edit-user.css">

    <style>
        #button-salvar {
            margin-top: 40px;
            margin-right: 50px;
            width: 80px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <section class="informaçoes-user">  
        <div class="color-text">
            <p>Nome</p>
            <input type="text" name="NomeSobrenome" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" placeholder="Nome e Sobrenome">   
            <p>Telefone</p>
            <input type="text" name="telefone" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>"  >
        </div>
        <a href="./tela-user.php" class="editar-user">Voltar</a>
    </section>

    <form action="./edit-user-processar.php" method="post" class="area-user">
        <h1 class="title-users">Área de Usuario</h1>

        <div class="input-container">
            <div class="alinha-inputs">
                <input type="text" name="NomeSobrenome" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" placeholder="Nome e Sobrenome">
                <input type="text" name="email" value="<?= isset($dados['email']) ? $dados['email'] : ''; ?>" placeholder="Email">
                <input type="text" name="telefone" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" >
                <input type="text" name="cep" value="<?= isset($dados['cep']) ? $dados['cep'] : ''; ?>"  >
                <input type="text" name="cidade_estado" value="<?= isset($dados['cidade_estado']) ? $dados['cidade_estado'] : ''; ?>" placeholder="Estado">
            </div>
           
            <div class="alinha-inputs-2">
                <input type="text" name="bairro" value="<?= isset($dados['Bairro']) ? $dados['Bairro'] : ''; ?>" placeholder="Bairro">
                <input type="text" name="rua" value="<?= isset($dados['rua']) ? $dados['rua'] : ''; ?>" placeholder="Rua">
                <input type="number" name="numero" value="<?= isset($dados['numero']) ? $dados['numero'] : ''; ?>" placeholder="Número">
                <input type="text" name="complemento" value="<?= isset($dados['complemento']) ? $dados['complemento'] : ''; ?>" placeholder="Complemento">
            </div>
        </div>

        <!-- Campo oculto para o id_cadastro -->
        <input type="hidden" name="id_cadastro" value="<?= isset($dados['id_cadastro']) ? $dados['id_cadastro'] : ''; ?>">

        <button type="submit" id="button-salvar" class="salvar-user">Salvar</button>
    </form>
</body>
</html>