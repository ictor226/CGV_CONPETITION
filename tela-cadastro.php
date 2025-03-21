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
                    <label for="nome"></label>
                    <input type="text" id="nome" name="nome"  placeholder="Nome e Sobrenome:" title="Escreva o seu Nome" required>
                </div>
                <div class="form-group">
                    <label for="email"></label>
                    <input type="email" id="email" placeholder="Email:" name="email" title="Escreva o seu Email" required>
                </div>
                <div class="form-group" id="form-group-senha">
                    <input type="password" id="senha" placeholder="Senha:" name="senha"  title="Escreva a sua Senha escolhida"
                        required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                </div>
                
                <div class="form-group">
                    <label for="telefone"></label>
                    <input type="tel" name="telefone" id="telefone" pattern="^\(\d{2}\) \d{9}$" placeholder="Telefone:" required
                        title="Escreva o seu Telefone" maxlength="14"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{2})(\d{0,9})/, '($1) $2');">
                </div>
                <div class="form-group">
                    <label for="cep"></label>
                    <input type="text" id="cep" name="cep" placeholder="cep:" required maxlength="10"
                        title="Escreva o seu CEP"
                        oninput="this.value = this.value.replace(/[^1-9]/g, '').replace(/(\d{5})(\d{0,3})/, '$1-$2');"
                        required>
                </div>   
                <div class="form-group">
                    <label for="state"></label>
                    <select id="estado" name="estado" required
                        style="width: 315px; padding: 8px; margin-bottom: 15px; margin-top: 5px; border-radius: 5px; border-color: transparent; font-size: 16px; appearance: none; -webkit-appearance: none; -moz-appearance: none;">
                        <option value="">Selecione um Estado:</option>
                        <option value="AC">Acre/Rio Branco</option>
                        <option value="AL">Alagoas/Maceió</option>
                        <option value="AP">Amapá/Macapá</option>
                        <option value="AM">Amazonas/Manaus</option>
                        <option value="BA">Bahia/Salvador</option>
                        <option value="CE">Ceará/Fortaleza/option>
                        <option value="DF">Distrito Federal/Brasília</option>
                        <option value="ES">Espírito Santo/Vitória</option>
                        <option value="GO">Goiás/Goiânia</option>
                        <option value="MA">Maranhão/São Luís</option>
                        <option value="MT">Mato Grosso/Cuiabá</option>
                        <option value="MS">Mato Grosso do Sul/Campo Grande</option>
                        <option value="MG">Minas Gerais/Belo Horizonte</option>
                        <option value="PA">Pará/Belém</option>
                        <option value="PB">Paraíba/João Pessoa</option>
                        <option value="PR">Paraná/Curitiba</option>
                        <option value="PE">Pernambuco/Recife</option>
                        <option value="PI">Piauí/Teresina</option>
                        <option value="RJ">Rio de Janeiro/Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte/Natal</option>
                        <option value="RS">Rio Grande do Sul/Porto Alegre</option>
                        <option value="RO">Rondônia/Porto Velho</option>
                        <option value="RR">Roraima/Boa Vista</option>
                        <option value="SC">Santa Catarina/Florianópolis</option>
                        <option value="SP">São Paulo/São Paulo</option>
                        <option value="SE">Sergipe/Aracaju</option>
                        <option value="TO">Tocantins/Palmas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero"></label>
                    <input type="number" id="numero" name="numero" placeholder="Número da casa:"
                        title="Escreva o Numero da casa" required>
                </div>
                <div class="form-group">
                    <label for="text"></label>
                    <input type="text" id="complemento" name="complemento" placeholder="Complemento:" 
                    title="Casa ou Apartamento? com Bloco" required>
                </div>
                
                <div class="form-group">
                    <button type="submit">cadastrar</button>
                </div>
        </div>
        <div class="editHr">
            <span>Ou continue com:</span>
        </div>
        <div class="login-sociais">
            <a href="" class="login-google"><i class="bi bi-google"></i></a>

            <a href="" class="login-facebook"><i class="bi bi-facebook"></i></a>
        </div>
    </div>
</form>
    <script src="./javaScript/olhar-senha.js"></script>
</body>

</html>