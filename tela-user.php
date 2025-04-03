<?php

require './INCLUDES/Header.php';

if (!isset($_SESSION['id_pessoa'])) {
    header("Location: user-login.php");  // Se o usuário não estiver logado, redireciona para login
    exit;
}
$usuario_id = $_SESSION['id_pessoa'];

// Conectar ao banco de dados
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';
try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Buscar os dados do usuário logado no banco de dados
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
            login.email
        FROM 
            area_de_cadastro
        INNER JOIN 
            login ON area_de_cadastro.id_cadastro = login.id_pessoa
        WHERE 
            area_de_cadastro.id_cadastro = ?";  // Filtra pelo usuário logado

    $stmt = $banco->prepare($sql);
    $stmt->bindParam(1, $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se há dados do usuário
    if (!$dados) {
        echo 'Erro ao buscar informações do usuário!';
        exit;
    }

    $banco = null; // Fecha a conexão com o banco
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Usuário</title>
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
        <!-- botao de editar-user --><a href="./edit-user.php" class="editar-user"><i class="bi bi-pencil-square"></i></a>
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
        <a href="logout.php" id="button-sair-conta" class="btn btn-danger">Sair da Conta</a>
    </section>
</body>

</html>
