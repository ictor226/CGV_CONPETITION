<?php
include './INCLUDES/Header.php';

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
        .error {
            color: red;
            font-size: 12px;
            display: none;
        }
    </style>
</head>
<body>
    <section class="informaçoes-user">  
    <div class="color-text">
            <p>Nome</p>
            <input type="text" name="NomeSobrenome" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" placeholder="Nome e Sobrenome" disabled> 
            <p>Telefone</p>
            <input type="text" name="telefone" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" disabled >
        </div>
        <a href="./tela-user.php" class="editar-user">Voltar</a>
    </section>

    <form action="./edit-user-processar.php" method="post" class="area-user">
        <h1 class="title-users">Área de Usuario</h1>

        <div class="input-container">
            <div class="alinha-inputs">
                <input type="text" id="nome" name="NomeSobrenome" value="<?= isset($dados['NomeSobrenome']) ? $dados['NomeSobrenome'] : ''; ?>" placeholder="Nome e Sobrenome" maxlength="100">
                <div id="erro-nome" class="error">Nome inválido! Apenas letras e espaços são permitidos.</div>
                <input type="email" id="email" name="email" value="<?= isset($dados['email']) ? $dados['email'] : ''; ?>" placeholder="Email" maxlength="100">
                <div id="erro-email" class="error">Email inválido! Verifique o formato (exemplo@dominio.com).</div>
                <input type="text" id="telefone" name="telefone" value="<?= isset($dados['telefone']) ? $dados['telefone'] : ''; ?>" placeholder="Telefone" maxlength="15">
                <div id="erro-telefone" class="error">Telefone inválido! Utilize o formato (XX)XXXXX-XXXX.</div>
                <input type="text" id="cep" name="cep" value="<?= isset($dados['cep']) ? $dados['cep'] : ''; ?>" placeholder="CEP" maxlength="10">
                <div id="erro-cep" class="error">CEP inválido! Utilize o formato XXXXX-XXX.</div>
            <input type="text" name="cidade_estado" value="<?= isset($dados['cidade_estado']) ? $dados['cidade_estado'] : ''; ?>" placeholder="Estado">
            </div>

            <div class="alinha-inputs-2">
                <input type="text" id="bairro" name="bairro" value="<?= isset($dados['Bairro']) ? $dados['Bairro'] : ''; ?>" placeholder="Bairro">
                <input type="text" id="rua" name="rua" value="<?= isset($dados['rua']) ? $dados['rua'] : ''; ?>" placeholder="Rua">
                <input type="number" id="numero" name="numero" value="<?= isset($dados['numero']) ? $dados['numero'] : ''; ?>" placeholder="Número" maxlength="5">
                <div id="erro-numero" class="error">Número inválido! Insira apenas números (máximo 5 caracteres).</div>
                <input type="text" id="complemento" name="complemento" value="<?= isset($dados['complemento']) ? $dados['complemento'] : ''; ?>" placeholder="Complemento">
            </div>
        </div>

        <!-- Campo oculto para o id_cadastro -->
        <input type="hidden" name="id_cadastro" value="<?= isset($dados['id_cadastro']) ? $dados['id_cadastro'] : ''; ?>">

        <button type="submit" id="button-salvar" class="salvar-user">Salvar</button>
    </form>

    <script>
    // Máscaras de input
    function aplicarMascaraTelefone(telefone) {
        telefone = telefone.replace(/\D/g, ''); // Remove tudo que não for número
        if (telefone.length <= 10) {
            return telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Formato (XX)XXXXX-XXXX
        } else {
            return telefone.substring(0, 11).replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Limita a 11 caracteres
        }
    }

    function aplicarMascaraCep(cep) {
        cep = cep.replace(/\D/g, ''); // Remove tudo que não for número
        return cep.length <= 8 ? cep.replace(/^(\d{5})(\d{3})$/, '$1-$2') : cep.substring(0, 8).replace(/^(\d{5})(\d{3})$/, '$1-$2'); // Formato XXXXX-XXX
    }

    // Validação de Nome
    function validarNome(nome) {
        const regexNome = /^[a-zA-Z\s]+$/;  // Aceita apenas letras e espaços
        if (!regexNome.test(nome)) {
            document.getElementById('erro-nome').style.display = "inline";
            return false;
        } else {
            document.getElementById('erro-nome').style.display = "none";
            return true;
        }
    }

    // Validação de Telefone
    function validarTelefone(telefone) {
        const telefoneFormatado = aplicarMascaraTelefone(telefone);
        document.getElementById('telefone').value = telefoneFormatado;
        const regexTelefone = /^\(\d{2}\)\d{5}-\d{4}$/;
        if (!regexTelefone.test(telefoneFormatado)) {
            document.getElementById('erro-telefone').style.display = "inline";
            return false;
        } else {
            document.getElementById('erro-telefone').style.display = "none";
            return true;
        }
    }

    // Validação de CEP
    function validarCep(cep) {
        const cepFormatado = aplicarMascaraCep(cep);
        document.getElementById('cep').value = cepFormatado;
        const regexCep = /^\d{5}-\d{3}$/;
        if (!regexCep.test(cepFormatado)) {
            document.getElementById('erro-cep').style.display = "inline";
            return false;
        } else {
            document.getElementById('erro-cep').style.display = "none";
            return true;
        }
    }

    // Validação do número
    function validarNumero(numero) {
        const regexNumero = /^[0-9]{1,5}$/; // Apenas números (máximo de 5 caracteres)
        if (!regexNumero.test(numero)) {
            document.getElementById('erro-numero').style.display = "inline";
            return false;
        } else {
            document.getElementById('erro-numero').style.display = "none";
            return true;
        }
    }

    // Validar campos em tempo real
    document.getElementById('nome').addEventListener('input', function() {
        validarNome(this.value);
    });

    document.getElementById('telefone').addEventListener('input', function() {
        validarTelefone(this.value);
    });

    document.getElementById('cep').addEventListener('input', function() {
        validarCep(this.value);
    });

    document.getElementById('numero').addEventListener('input', function() {
        validarNumero(this.value);
    });
</script>

</body>
</html>


