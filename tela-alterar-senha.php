<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="./ASSETS/CSS/tela-login.css">
    <link rel="stylesheet" href="./ASSETS/CSS/olhar-senha.css">
  
</head>

<body>

    <ul class="voltar-icon">
        <li><a href="./index.php"><i class="bi bi-arrow-left-square-fill"></i></a></li>
    </ul>


    <form action="./nova-senha.php"  method="POST" onsubmit="return validarSenhas()">

    <div class="estrutura">
    <div class="login-form">
        <h2 class="titulo-login">Alterar Senha</h2>
        <form method="POST" action="seu_script_php.php">
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email:" required>
            </div>

            <div class="form-group">
                <input type="text" id="nome" name="nome" placeholder="Nome e Sobrenome:" required>
            </div>

            <div class="form-group" id="form-group-senha">
    <input type="password" id="senha" name="password" placeholder="Senha:" >
    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha('senha', 'confirmar-senha')"></i> <!-- Aqui chamando a função passando os IDs -->
</div>

<div class="form-group" id="form-group-senha">
    <input type="password" id="confirmar-senha" name="confirmar_password" placeholder="Confirmar Nova Senha:" >
</div>
            

            <!-- <div class="form-group">
                <button type="submit">Entrar</button>
            </div> --><input type="submit" value="Alterar Senha">
        </form>
        <script>function mostrarSenha(campoSenha, campoConfirmarSenha) {
    var senha = document.getElementById(campoSenha); 
    var confirmarSenha = document.getElementById(campoConfirmarSenha); 
    var tipoSenha = senha.type === "password" ? "text" : "password";  // Se for 'password', muda para 'text', e vice-versa

    senha.type = tipoSenha;  // Altera o tipo de senha
    confirmarSenha.type = tipoSenha;  // Altera o tipo de senha no segundo campo

    // Alterna o ícone do olho também
    var olho = document.getElementById("btn-senha");
    if (tipoSenha === "text") {
        olho.classList.remove("bi-eye-fill");  // Se estiver visível, altera o ícone para "olho fechado"
        olho.classList.add("bi-eye-slash-fill");  // Altera para o ícone de olho fechado
    } else {
        olho.classList.remove("bi-eye-slash-fill");  // Se estiver oculto, altera o ícone para "olho aberto"
        olho.classList.add("bi-eye-fill");  // Altera para o ícone de olho aberto
    }
}</script>
        
        <script>
   function validarSenhas() {
    var novaSenha = document.getElementById('senha').value; // Senha principal
    var confirmarSenha = document.getElementById('confirmar-senha').value; // Senha de confirmação
    
    if (novaSenha !== confirmarSenha) {
        alert('As senhas não são iguais. Por favor, tente novamente.');
        return false; // Impede o envio do formulário
    }
    return true; // Permite o envio do formulário
}

</script>