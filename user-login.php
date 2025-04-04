<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {
    // Recebe os dados do formulário de login
    $emailUsuario = $_POST['email'];
    $senhaUsuario = $_POST['senha'];

    // Conectando ao banco de dados (com PDO)
    $dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
    $user = 'root';
    $password = '';
    try {
        $banco = new PDO($dsn, $user, $password);
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica se o email e a senha batem com os dados no banco
        $script = "SELECT * FROM login WHERE email = '{$emailUsuario}' AND senha = '{$senhaUsuario}'";
        $resultado = $banco->query($script)->fetch();

        if (!empty($resultado) && $resultado != false) {
            // Busca mais informações do usuário (se necessário)
            $selectUsuario = "SELECT * FROM area_de_cadastro WHERE id_cadastro = {$resultado['id_pessoa']}";
            $dadosUsuario = $banco->query($selectUsuario)->fetch();

            $status = $resultado['status']; // O status está aqui na tabela 'login'

            // Inicia a sessão com o id da pessoa e o status correto
            $_SESSION['id_pessoa'] = $resultado['id_pessoa']; // id_pessoa de 'login'
            $_SESSION['status'] = $status; // Status da tabela 'login'
            

            // Redireciona para a página do painel
            header('location: tela-user.php');
            exit;
        } else {
            // Se os dados estiverem incorretos
            echo '<script>
                alert("❌ Dados de login inválidos.");
                window.location.replace("user-login.php");
            </script>';
        }
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
}

include './tela-login.php'; // Inclui o formulário de login
