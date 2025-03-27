<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="ASSETS/CSS/tela-cad.css">
    <link rel="stylesheet" href="./ASSETS/CSS/ver-senha.css">
    <link rel="stylesheet" href="./javaScript/VerSenha.js">
    <link rel="stylesheet" href="./ASSETS/CSS/add-arquivo.css">
</head>

<ul class="voltar-icon">
    <li><a href="./tela-login.php"><i class="bi bi-arrow-left-square-fill"></i></a></li>
</ul>

<body>
    <form action="./cad-user.php" method="post">
        <div class="estrutura">
            <div class="login-form">
                <h2 class="titulo-login">Cadastrar-se</h2>
                <h4>já possui um login? <a href="./tela-login.php">Clique Aqui.</a></h4>

                <div class="form-group">

                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome e Sobrenome:" minlength="3" maxlength="100" onblur="verificarNome()"
                        title="Escreva o seu Nome" required>
                    <span id="mensagem-erro-nome"></span>
                </div>
                <div class="form-group">

                    <input type="email" id="email" class="form-control" placeholder="Email:" name="email" onblur="verificarEmail()" title="Escreva o seu Email" required>
                    <span id="mensagem-erro-email"></span>
                </div>
                <div class="form-group" id="form-group-senha">
                    <input type="password" id="senha" class="form-control" placeholder="Senha:" name="senha" onblur="validaSenha()" title="Escreva a sua Senha escolhida" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                    <span id="erro-senha"></span>

                </div>

                <div class="form-group">

                <input type="text" class="form-control" id="telefone" name="telefone" oninput="aplicarMascaraTelefone(event)" onblur="validatelefone()"
                placeholder="Telefone:">
                    <span id="mensagem-erro-telefone"></span>
                </div>
                <div class="form-group">

                    <input type="text" id="cep" class="form-control" name="cep" placeholder="cep:" onblur="validacep()" oninput="aplicarMascaraCep(event)" required>
                    <span id="mensagem-erro-cep"></span>
                </div>
                <div class="form-group">

                    <select id="estado" name="estado" required
                        style="width: 320px; padding: 7px; margin-bottom: 10px; margin-top: 5px; border-radius: 5px; border-color: transparent; font-size: 16px; appearance: none; -webkit-appearance: none; -moz-appearance: none;">
                        <option value="">Selecione um Estado:</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="rua" name="rua" placeholder="rua:" required>
                </div>
                <div class="form-group">

                    <input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro:" required>
                </div>
                <div class="form-group">

                    <input type="number" class="form-control" id="numero" name="numero" onblur="validanumero()" oninput="aplicarMascaraNumero(event)"
                        placeholder="Numero Casa:">
                    <span id="9"></span>
                </div>
                <div class="form-group">

                    <input type="text" id="complemento" name="complemento" placeholder="Complemento:"
                        title="Casa ou Apartamento? com Bloco" required>
                </div>
                <div class="form-group">
                    <button type="submit">cadastrar</button>
                </div>
            </div>
    </form>
    <script src="./javaScript/olhar-senha.js"></script>
</body>

<script src="./javaScript/valid-cad.js"></script>

</html>