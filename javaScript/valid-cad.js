function verificarNome() {
    const nome = document.getElementById("nome").value;
    const nomeError = document.getElementById('mensagem-erro-nome');
    const regexLetras = /^[a-zA-Z\s]+$/; // Expressão regular para validar apenas letras e espaços

    if (nome === "") {
        nomeError.textContent = "Não pode estar vazio!";
        nomeError.style.color = "red";
        document.getElementById("nome").focus();
    } else if (nome.length < 5) {
        nomeError.textContent = "Ter no mínimo 5 caracteres.";
        nomeError.style.color = "red";
        document.getElementById("nome").focus();
    } else if (nome.length > 60) {
        nomeError.textContent = "Ter no máximo 60 caracteres.";
        nomeError.style.color = "red";
        document.getElementById("nome").focus();
    } else if (!regexLetras.test(nome)) {
        nomeError.textContent = "Somente letras são permitidos.";
        nomeError.style.color = "red";
        document.getElementById("nome").focus();
    } else {
        nomeError.textContent = "OK";
        nomeError.style.color = "green";
    }
}


function verificarEmail() {
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('mensagem-erro-email');
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (email === "") {
        emailError.textContent = "E-mail é obrigatório.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    } 
    else if (email.length < 5) {
        emailError.textContent = "Ter no mínimo 5 caracteres.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    } else if (email.length > 100) {
        emailError.textContent = "Ter no máximo 100 caracteres.";
        emailError.style.color = "red";
        document.getElementById("email").focus();
    } else if (!emailPattern.test(email)) {
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
    const senhaError = document.getElementById('erro-senha');
    const regexMaiusculo = /[A-Z]/;
    const regexEspecial = /[!@#$%^&*(),.?":{}|<>]/;
    const regexNumero = /\d/;

    if (senha === "") {
        senhaError.textContent = "Senha não pode ser vazia";
        senhaError.style.color = "red";
        document.getElementById("senha").focus();
    } else if (senha.length < 8) {
        senhaError.textContent = "Ter no mínimo 8 caracteres";
        senhaError.style.color = "red";
        document.getElementById("senha").focus();
    } else if (senha.length > 60) {
        senhaError.textContent = "Ter no máximo 60 caracteres";
        senhaError.style.color = "red";
        document.getElementById("senha").focus();
    } else if (!regexMaiusculo.test(senha)) {
        senhaError.textContent = "Deve ter no minimo uma letra maiúscula";
        senhaError.style.color = "red";
        document.getElementById("senha").focus();
    }  else if (!regexNumero.test(senha)) {
        senhaError.textContent = "Deve ter no minmimo um número";
        senhaError.style.color = "red";
        document.getElementById("senha").focus();
    } else {
        senhaError.textContent = "OK";
        senhaError.style.color = "green";
    }
}

// Função para aplicar a máscara no telefone
function aplicarMascaraTelefone(event) {
    let input = event.target;
    let valor = input.value;

    // Remove todos os caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Limita a 11 números (máximo)
    if (valor.length > 11) {
        valor = valor.substring(0, 11); // Limita o valor a 11 dígitos
    }

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
    const telefone = document.getElementById('telefone').value;
    const mensagemErroTelefone = document.getElementById('mensagem-erro-telefone');

    // Valida se o telefone tem 14 caracteres, considerando a máscara
    if (telefone.length !== 14) {
        mensagemErroTelefone.textContent = 'Telefone inválido!';
        mensagemErroTelefone.style.color = 'red';
        document.getElementById("telefone").focus();
    } else {
        mensagemErroTelefone.textContent = "OK";
        mensagemErroTelefone.style.color = "green";
    }
}


// Função para aplicar a máscara no CEP
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

// Função para validar o CEP
function validaCep() {
    const cep = document.getElementById('cep').value;
    const mensagemCep = document.getElementById('mensagem-erro-cep');
    
    // Remove a máscara, deixando apenas os números
    const cepNumerico = cep.replace(/\D/g, ''); 

    // Verifica se o CEP tem exatamente 8 números
    if (cepNumerico.length !== 8) {
        mensagemCep.textContent = "CEP deve ter exatamente 8 dígitos.";
        mensagemCep.style.color = "red";
        document.getElementById("cep").focus();
    } else {
        mensagemCep.textContent = "OK";
        mensagemCep.style.color = "green";
    }
}

function validaNumero() {
    const numero = document.getElementById('numero').value;
    const mensagemErroNumero = document.getElementById('mensagem-erro-numero');
    const campoNumero = document.getElementById('numero');

    // Limpar mensagem de erro ao começar a digitar
    mensagemErroNumero.textContent = '';

    // Verifica se o número está vazio
    if (numero.length === 0) {
        mensagemErroNumero.textContent = 'Insira o número da casa.';
        mensagemErroNumero.style.color = 'red';
        campoNumero.focus(); // Coloca o foco no campo, apenas uma vez
    }
    // Verifica se o número tem mais de 5 caracteres
    else if (numero.length > 5) {
        mensagemErroNumero.textContent = 'O número não pode ter mais de 5 dígitos.';
        mensagemErroNumero.style.color = 'red';
        campoNumero.focus(); // Foca no campo apenas quando a validação for inválida
    }
    // Número válido (com 1 a 5 caracteres)
    else {
        mensagemErroNumero.textContent = "OK";
        mensagemErroNumero.style.color = "green";
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


