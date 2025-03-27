function verificarNome() {
    const nome = document.getElementById("nome").value;
    const nomeError = document.getElementById('mensagem-erro-nome');
    
    if (nome.length < 5) { //se o campo nome tiver menos que 5 caracteres
        nomeError.textContent = "Ter no mínimo 5 caracteres."; //mensagem de erro do campo
        nomeError.style.color = "red"; //cor da mensagem de erro
        document.getElementById("nome").focus(); // para a pessoa retornar automatico para este campo errado

    } else if (nome.length > 60) { //se o campo nome tiver mais que 60 caracteres
        nomeError.textContent = "Ter no máximo 60 caracteres."; // mensagem de erro do campo
        nomeError.style.color = "red"; // cor da mensagem de erro
        document.getElementById("nome").focus(); // para a pessoa retornar automatico para este campo errado

    } else if(nome === "") { //se o campo estiver vazio
        nomeError.textContent = "Não pode estar vazio!"; //mensagem de erro do campo
        nomeError.style.color = "red"; // cor da mensagem de erro
        document.getElementById("nome").focus(); // para a pessoa retornar automatico para este campo errado
       
    } else { //se a pessoa acertou e passou por todas as validações
        nomeError.textContent = "OK"; // vai dar o OK  de tudo certo neste campo
        nomeError.style.color = "green"; // cor da mensagem de erro
    }
  }


  function verificarEmail() {
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('mensagem-erro-email');
    const emailPattern = /^[a-zA-Z0-9._-]@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (email === "") {
        emailError.textContent = "E-mail é obrigatório.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    } else if (email.length > 100) {
        emailError.textContent = "Ter no máximo 100 caracteres.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    } else if (email.length < 5) {
        emailError.textContent = "Ter no mínimo 5 caracteres.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    }
     else if (!emailPattern.test(email)) {
        emailError.textContent = "E-mail inválido.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    } else {
        emailError.textContent = "OK";
        emailError.style.color = "green";
    }
}


function validaSenha() {
    const senha = document.getElementById('senha').value;
    const SenhaError = document.getElementById('erro-senha');
    const regexMaiusculo = /[A-Z]/;
    const regexEspecial = /[!@#$%^&*(),.?":{}|<>]/;
    const regexNumero = /\d/;

    if (senha === "") {
        SenhaError.textContent = "Senha não pode ser vazia";
        SenhaError.style.color = "red";
        document.getElementById("senha").focus();

    }else if (senha.length > 60) {
        SenhaError.textContent = "Ter menos que 60 digitos";
        SenhaError.style.color = "red";
        document.getElementById("senha").focus();

    }else if (senha.length < 8) {
        SenhaError.textContent = "Ter mais que 8 digitos";
        SenhaError.style.color = "red";
        document.getElementById("senha").focus();

    }else if (!regexMaiusculo.test(senha)) {
        SenhaError.textContent = "Ter Letras Maiúsculas";
        SenhaError.style.color = "red";
        document.getElementById("senha").focus();
    
    }else if (!regexEspecial.test(senha)) {
        SenhaError.textContent = "Ter Caracter Especial";
        SenhaError.style.color = "red";
        document.getElementById("senha").focus();

    }else if (!regexNumero.test(senha)) {
        SenhaError.textContent = "tem que ter números";
        SenhaError.style.color = "red";
        document.getElementById("senha").focus();

    }else{
        SenhaError.textContent = "OK";
        SenhaError.style.color = "green";
    }
}


function aplicarMascaraTelefone(event) {
    let input = event.target;
    let valor = input.value;
    
    // Remove todos os caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Aplica a máscara (formato: (XX)XXXXX-XXXX)
    if (valor.length <= 10) {
      valor = valor.replace(/(\d{2})(\d{0,5})(\d{0,4})/, "($1)$2-$3");
    } else {
      valor = valor.replace(/(\d{2})(\d{5})(\d{4})/, "($1)$2-$3");
    }

    input.value = valor;
  }

     

// Validação do Telefone com Máscara
function validatelefone() {
          
    const  telefone = document.getElementById('telefone').value;
    const  mensagemErroTelefone = document.getElementById('mensagem-erro-telefone');
                
    // Valida se o telefone tem 14 dígitos
    if (telefone.length !== 14) {
        mensagemErroTelefone.textContent = 'Telefone inválido! ';
        mensagemErroTelefone.style.color = 'red';
        document.getElementById("telefone").focus();
    } else {    
        mensagemErroTelefone.textContent = "OK";
        mensagemErroTelefone.style.color = "green";
    }    
}



function aplicarMascaraCep(event) {
    let input = event.target;
    let valor = input.value;

    // Remove todos os caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Limita a quantidade de caracteres a 8
    if (valor.length > 8) {
        valor = valor.substring(0, 8);
    }

    // Aplica a máscara (formato: 00000-000)
    if (valor.length <= 5) {
        valor = valor.replace(/(\d{5})(\d{0,3})/, "$1-$2");
    } else {
        valor = valor.replace(/(\d{5})(\d{3})/, "$1-$2");
    }

    input.value = valor;
}

function validacep(){
    const cep = document.getElementById('cep').value;
    const mensagemCep = document.getElementById('mensagem-erro-cep');
    
    if(cep.length !== 8){
        mensagemCep.textContent = "Tenha exatamente 8 digitos";
        mensagemCep.style.color = "red";
        document.getElementById("cep").focus();
    } else{
        mensagemCep.textContent = "OK";
        mensagemCep.style.color = "green";
    }
}



function aplicarMascaraNumero(event) {
    let input = event.target;
    let valor = input.value;

    // Remove todos os caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Limita a quantidade de caracteres a 5
    if (valor.length > 5) {
        valor = valor.substring(0, 5);
    }

    // Atualiza o valor do campo
    input.value = valor;
}

// Validação do Número da Casa
function validanumero() {
    const numero = document.getElementById('numero').value;
    const mensagemErroNumero = document.getElementById('mensagem-erro-numero');

    // Verifica se o número tem entre 1 e 5 caracteres
    if (numero.length === 0) {
        mensagemErroNumero.textContent = 'Insira o número da casa.';
        mensagemErroNumero.style.color = 'red';
        document.getElementById("numero").focus();
    } else if (numero.length > 5) {
        mensagemErroNumero.textContent = 'não pode ter mais de 5 digitos.';
        mensagemErroNumero.style.color = 'red';
        document.getElementById("numero").focus();
    } else {
        mensagemErroNumero.textContent = "OK";
        mensagemErroNumero.style.color = "green";
    }
}

