function verificarNome() {
    const nome = document.getElementById("nome").value;
    const nomeError = document.getElementById('mensagem-erro-nome');
    const regexLetras = /^[a-zA-Z\s]+$/; // Expressão regular para validar apenas letras e espaços
 
    if (nome === "") {
        nomeError.textContent = "Não pode estar vazio!";
        nomeError.style.color = "red";
    } else if (nome.length < 5) {
        nomeError.textContent = "Ter no mínimo 5 caracteres.";
        nomeError.style.color = "red";
    } else if (nome.length > 60) {
        nomeError.textContent = "Ter no máximo 60 caracteres.";
        nomeError.style.color = "red";
    } else if (!regexLetras.test(nome)) {
        nomeError.textContent = "Somente letras são permitidos.";
        nomeError.style.color = "red";
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
    } else if (email.length < 5) {
        emailError.textContent = "Ter no mínimo 5 caracteres.";
        emailError.style.color = "red";
    } else if (email.length > 100) {
        emailError.textContent = "Ter no máximo 100 caracteres.";
        emailError.style.color = "red";
    } else if (!emailPattern.test(email)) {
        emailError.textContent = "E-mail inválido.";
        emailError.style.color = "red";
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
        senhaError.textContent = "Não pode ser vazia";
        senhaError.style.color = "red";
    } else if (senha.length < 8) {
        senhaError.textContent = "Mínimo de 8 caracteres";
        senhaError.style.color = "red";
    } else if (senha.length > 60) {
        senhaError.textContent = "Máximo de 60 caracteres";
        senhaError.style.color = "red";
    } else if (!regexMaiusculo.test(senha)) {
        senhaError.textContent = "No minimo uma letra maiúscula";
        senhaError.style.color = "red";
    } else if (!regexNumero.test(senha)) {
        senhaError.textContent = "No minmimo um número";
        senhaError.style.color = "red";
    } else {
        senhaError.textContent = "OK";
        senhaError.style.color = "green";
    }
}
 
function validatelefone() {
    const telefone = document.getElementById('telefone').value;
    const mensagemErroTelefone = document.getElementById('mensagem-erro-telefone');
 
    if (telefone.length !== 14) {
        mensagemErroTelefone.textContent = 'Telefone inválido!';
        mensagemErroTelefone.style.color = 'red';
    } else {
        mensagemErroTelefone.textContent = "OK";
        mensagemErroTelefone.style.color = "green";
    }
}
 
function validaCep() {
    const cep = document.getElementById('cep').value;
    const mensagemCep = document.getElementById('mensagem-erro-cep');
   
    // Remove a máscara, deixando apenas os números
    const cepNumerico = cep.replace(/\D/g, '');
 
    if (cepNumerico.length !== 8) {
        mensagemCep.textContent = "Ter exatamente 8 dígitos.";
        mensagemCep.style.color = "red";
    } else {
        mensagemCep.textContent = "OK";
        mensagemCep.style.color = "green";
    }
}
 
function validaNumero() {
    const numero = document.getElementById('numero').value;
    const mensagemErroNumero = document.getElementById('mensagem-erro-numero');
 
    if (numero.length === 0) {
        mensagemErroNumero.textContent = 'Insira o número da casa.';
        mensagemErroNumero.style.color = 'red';
    } else if (numero.length > 5) {
        mensagemErroNumero.textContent = 'Deve ter no máximo 5 dígitos.';
        mensagemErroNumero.style.color = 'red';
    } else {
        mensagemErroNumero.textContent = "OK";
        mensagemErroNumero.style.color = "green";
    }
}