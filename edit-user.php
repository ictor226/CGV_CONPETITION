<?php
include './INCLUDES/Header.php';

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
if ($result->num_rows > 0) {
    // Pega a primeira linha de dados
    $dados = $result->fetch_assoc();
} else {
    echo "Nenhum dado encontrado.";
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ASSETS/CSS/edit-user.css">
</head>
<body>
    <section class="informaçoes-user">  
        <img src="../CGV_CONPETITION/ASSETS/img/login/patinho.jpg" alt="foto de perfil" class="foto-user">
        <h1 class="perfil-text">Foto De Perfil</h1>

        <div class="color-text">
            <p>Nome</p>
            <input type="text" name="NomeSobrenome" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>"  >
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
                <input type="text" name="cidade_estado" value="<?= isset($dados['cidade_estado']) ? $dados['cidade_estado'] : ''; ?>" placeholder="Cidade">
                <input type="text" name="bairro" value="<?= isset($dados['Bairro']) ? $dados['Bairro'] : ''; ?>" placeholder="Bairro">
                <input type="text" name="rua" value="<?= isset($dados['rua']) ? $dados['rua'] : ''; ?>" placeholder="Rua">
                <input type="number" name="numero" value="<?= isset($dados['numero']) ? $dados['numero'] : ''; ?>" placeholder="Número">
                <input type="text" name="complemento" value="<?= isset($dados['complemento']) ? $dados['complemento'] : ''; ?>" placeholder="Complemento">
            </div>
        </div>

        <!-- Campo oculto para o id_cadastro -->
        <input type="hidden" name="id_cadastro" value="<?= isset($dados['id_cadastro']) ? $dados['id_cadastro'] : ''; ?>">

        <button type="submit" class="salvar-user">Salvar</button>
    </form>
</body>
</html>
