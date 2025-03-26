<?php
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1'; // Nome do banco e host
$user = 'root'; // Usuário
$password = ''; // Senha (caso tenha)

try {
    // Cria a conexão com o banco de dados
    $banco = new PDO($dsn, $user, $password);
    
    // Configura o PDO para lançar exceções em caso de erro
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Opcional: Configura o charset para evitar problemas com caracteres especiais
    $banco->exec("SET NAMES 'utf8'");
    
    echo "";
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo "Erro na conexão: " . $e->getMessage();
}
?>