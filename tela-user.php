<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
include './INCLUDES/Header.php';
?>

<style>
    #button-sair-conta{
        margin-top: 40px;
        margin-right: 40px;
        font-size: 16px;
    }
</style>


<?php

// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Seu usuário do banco de dados
$password = ""; // Sua senha do banco de dados
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
        login ON area_de_cadastro.id_cadastro = login.id_pessoa"; // Fazendo o JOIN entre as duas tabelas

// Executa a consulta SQL
$result = $conn->query($sql);

// Verifica se existem dados na consulta
$dados = [];
if ($result->num_rows > 0) {
    // Armazena todos os resultados em um array
    $dados = $result->fetch_assoc();
} else {
    echo "Nenhum dado encontrado.";
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ASSETS/CSS/tela-users.css">
</head>

<body>
    <section class="informaçoes-user">  
     
        <div class="color-text">
            <p>Nome</p>
            <input type="text" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" disabled >
            <p>Telefone</p>
            <input type="text" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" disabled >
        </div>
        <a href="./edit-user.php" class="editar-user"><i class="bi bi-pencil-square"></i></a>
    </section>

    <section class="area-user">
        <h1 class="title-users">Área de Usuario</h1>

        <div class="input-container">
            <div class="alinha-inputs">
                <input disabled type="text" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" placeholder="Nome e Sobrenome">
                <input disabled type="text" value="<?= isset($dados['email']) ? $dados['email'] : ''; ?>" placeholder="Email">
                <input disabled type="text" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" placeholder="Telefone">
                <input disabled type="text" value="<?= isset($dados['cep']) ? $dados['cep'] : ''; ?>" placeholder="CEP">
                <input disabled type="text" value="<?= isset($dados['cidade_estado']) ? $dados['cidade_estado'] : ''; ?>" placeholder="Estado">
            </div>
            
            <div class="alinha-inputs-2">
                <input disabled type="text" value="<?= isset($dados['cidade_estado']) ? $dados['cidade_estado'] : ''; ?>" placeholder="Cidade">
                <input disabled type="text" value="<?= isset($dados['Bairro']) ? $dados['Bairro'] : ''; ?>" placeholder="Bairro">
                <input disabled type="text" value="<?= isset($dados['rua']) ? $dados['rua'] : ''; ?>" placeholder="Rua">
                <input disabled type="number" value="<?= isset($dados['numero']) ? $dados['numero'] : ''; ?>" placeholder="Número">
                <input disabled type="text" value="<?= isset($dados['complemento']) ? $dados['complemento'] : ''; ?>" placeholder="Complemento">
            </div>
        </div>
        <button type="button" id="button-sair-conta" class="btn btn-danger">Sair da conta</button>
    </section>
</body>

</html>
