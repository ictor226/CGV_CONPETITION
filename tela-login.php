<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="./ASSETS/CSS/tela-login.css">
    <link rel="stylesheet" href="./ASSETS/CSS/olhar-senha.css">
    <link rel="stylesheet" href="./javaScript/olhar-senha.js">
</head>

<body>

    <ul class="voltar-icon">
        <li><a href="./index.php"><i class="bi bi-arrow-left-square-fill"></i></a></li>
    </ul>


    <form action="./tela-user.php"  method="POST">

<div class="estrutura">
    <div class="login-form">
        <h2 class="titulo-login">Login</h2>
        <h4>Não tem login? <a href="./tela-cadastro.php">Registre-se Aqui.</a></h4>
        <form>
        <div class="form-group">
                <input type="email" id="email" class="form-control" placeholder="Email:" name="email" onblur="verificarEmail()" title="Escreva o seu Email" required>
                <span id="mensagem-erro-email"></span>
            </div>
            <div class="form-group" id="form-group-senha">
                <input type="password" id="senha" class="form-control" placeholder="Senha:" name="senha" onblur="validaSenha()" title="Escreva a sua Senha escolhida" required>
                <span id="erro-senha"></span>
                <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
            </div>
            <h4 class="titulo-login">Esqueceu sua senha? <a href="./tela-alterar-senha.php">Clique Aqui.</a></h4>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
    </form>

</div>
<script src="./javaScript/valid-cad.js"></script>
<script src="./javaScript/VerSenha.js"></script>
    
</body>
</html>
