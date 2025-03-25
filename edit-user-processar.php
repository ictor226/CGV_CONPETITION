<?php

echo '<h1> Aluno Editar </h1>';

// Pega os dados enviados via POST
$editarId = $_POST['id_cadastro'];  // Certifique-se de que o campo tem o nome correto (id_cadastro)
$editarNome = $_POST['NomeSobrenome'];  // Certifique-se de que o campo tem o nome correto (NomeSobrenome)
$editarTelefone = $_POST['telefone'];
$editarCep = $_POST['cep'];
$editarCidadeEstado = $_POST['cidade_estado'];
$editarBairro = $_POST['bairro'];
$editarRua = $_POST['rua'];
$editarNumero = $_POST['numero'];
$editarComplemento = $_POST['complemento'];

// Configuração da conexão com o banco de dados MySQL
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1'; 
$user = 'root'; 
$password = ''; 

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Para exibir erros de PDO

    // Consulta SQL para atualizar os dados na tabela `area_de_cadastro`
    $update = 'UPDATE area_de_cadastro SET 
                NomeSobrenome = :NomeSobrenome, 
                telefone = :telefone, 
                rua = :rua, 
                cep = :cep, 
                numero = :numero, 
                cidade_estado = :cidade_estado, 
                complemento = :complemento, 
                Bairro = :bairro
                WHERE id_cadastro = :id_cadastro'; 

    $box = $banco->prepare($update); 
    $box->execute([ 
        ':id_cadastro' => $editarId, 
        ':NomeSobrenome' => $editarNome, 
        ':telefone' => $editarTelefone, 
        ':cep' => $editarCep, 
        ':cidade_estado' => $editarCidadeEstado, 
        ':bairro' => $editarBairro, 
        ':rua' => $editarRua, 
        ':numero' => $editarNumero, 
        ':complemento' => $editarComplemento
    ]);

    echo "Dados atualizados com sucesso!";
    // Redireciona o usuário para a página desejada após atualização
    header('Location: tela-user.php');
    exit();

} catch (PDOException $e) {
    echo 'Erro ao atualizar os dados: ' . $e->getMessage();
}
?>
<a class="btn btn-danger" href="./index.php">Voltar</a>
