var imgAtual = "roda.png";
var imgAnterior = "rodaInfo2.png"; // Corrigido nome da variável

function troca() {
    document.getElementById("figura").src = "./ASSETS/img/produtos/" + imgAnterior; // Caminho correto da imagem
    let aux = imgAnterior;
    imgAnterior = imgAtual;
    imgAtual = aux; // Corrigido para que a imagem atual seja atualizada corretamente
}
