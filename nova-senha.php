<?php
$email = $_POST['email'];        // Obtendo o email enviado pelo formulário
$nome = $_POST['nome'];          // Obtendo o nome e sobrenome enviados pelo formulário
$nova_senha = $_POST['password']; // Obtendo a nova senha enviada pelo formulário

$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';  // Conexão com o banco de dados
$userDB = 'root';
$passwordDB = '';

try {
    // Tente se conectar ao banco de dados
    $banco = new PDO($dsn, $userDB, $passwordDB);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Ativar exceções no PDO

    // Verifica se o email e o nome existem no banco
    $stmt = $banco->prepare('
        SELECT * 
        FROM login 
        JOIN area_de_cadastro ON login.id_pessoa = area_de_cadastro.id_cadastro
        WHERE login.email = :email AND area_de_cadastro.NomeSobrenome = :nome');
    $stmt->execute(['email' => $email, 'nome' => $nome]);

    $resultado = $stmt->fetch();  // Obtém o resultado da consulta

    if ($resultado) {
        // Se o email e o nome forem encontrados, atualiza a senha
        $stmtUpdate = $banco->prepare('UPDATE login SET senha = :password WHERE email = :email');
        $stmtUpdate->execute(['password' => $nova_senha, 'email' => $email]);

        echo 'Senha alterada com sucesso.';
    } else {
        // Caso o email ou nome não sejam encontrados
        echo 'Email ou nome incorretos.';
    }
} catch (PDOException $e) {
    // Se ocorrer erro na conexão com o banco, exibe a mensagem de erro
    echo 'Erro de conexão: ' . $e->getMessage();
}
?>
echo '<script>
window.location.replace("index.php");
</script>';
