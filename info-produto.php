<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./ASSETS/javaScript/troca-img.js" defer></script> <!-- Certifique-se de que o caminho está correto -->
</head>

<body>

    <?php
    include './includes/header.php';
    ?>
    <section class="itens-info-img">
        <div class="buttons-container">
            <span class="seta-right" id="seta-esquerda">&#9664;</span> <!-- Seta esquerda -->
            <img src="./ASSETS/img/produtos/roda.png" alt="foto produto" id="figura">
            <span class="seta-left" id="seta-direita">&#9654;</span> <!-- Seta direita -->
        
            <div class="buttons-row">
                <button class="buttons-img" data-src="ASSETS/img/produtos/rodaInfo1.png">
                    <img src="ASSETS/img/produtos/rodaInfo1.png" alt="">
                </button>

                <button class="buttons-img" data-src="ASSETS/img/produtos/rodaInfo2.png">
                    <img src="ASSETS/img/produtos/rodaInfo2.png" alt="">
                </button>
            </div>

        </div>
    </section>

    <section class="informacoes">
        <div class="container-info">
            <h2>[<span class="sell-color">VENDA-SE</span>] Par Roda Taluda Nismo Jdm Aro 18x10.5 5x114 Preto Acetinado</h2>
            <p>versão</p>
            <select aria-label="Seleção de versão" class="versao">
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
            </select>
            <p class="preco-info">R$ 3.543,00
                <br>
                ou por 12x de R$ 1.099,17 sem juros
            </p>
            <br>
            <p class="pronto-entrga">pronto para entrega</p>
            <br>
            <p class="frete">Frete grátis</p>
            <br>
            <p><span class="vendido-por">vendido por: </span>cgv competition</p>
            
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </div>
    </section>

    <div class="descricao">
    <details class="details">
        <summary>Descrição</summary>
        <p>Descrição do produto</p>
        
    </details>
    </div>
    <?php
    include './includes/footer.php';
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imgPrincipal = document.getElementById('figura');
            const botoesImg = document.querySelectorAll('.buttons-img');
            const setaEsquerda = document.getElementById('seta-esquerda');
            const setaDireita = document.getElementById('seta-direita');
            const imagemOriginal = './ASSETS/img/produtos/roda.png'; // Caminho da imagem original
            const imagensAlternativas = [
                './ASSETS/img/produtos/rodaInfo1.png',
                './ASSETS/img/produtos/rodaInfo2.png'
            ];
            let indiceAtual = -1; // Índice da imagem atual (-1 significa que estamos na imagem original)
            let contadorCliqueDireita = 0; // Contador de cliques na seta direita

            // Função para atualizar a imagem principal
            function atualizarImagem() {
                if (indiceAtual === -1) {
                    imgPrincipal.src = imagemOriginal; // Se o índice for -1, mostra a imagem original
                } else {
                    imgPrincipal.src = imagensAlternativas[indiceAtual]; // Caso contrário, mostra a imagem alternativa
                }
            }

            botoesImg.forEach(botao => {
                botao.addEventListener('click', function () {
                    const novaSrc = this.getAttribute('data-src');
                    imgPrincipal.src = novaSrc;
                    indiceAtual = imagensAlternativas.indexOf(novaSrc); // Atualiza o índice atual
                });
            });

            // Navegação com setas
            setaEsquerda.addEventListener('click', function() {
                indiceAtual = -1; // Define o índice como -1 para voltar à imagem original
                atualizarImagem(); // Atualiza a imagem principal
                contadorCliqueDireita = 0; // Reseta o contador se a seta esquerda for clicada
            });

            setaDireita.addEventListener('click', function() {
                contadorCliqueDireita++; // Incrementa o contador de cliques na seta direita
                
                // Se o contador atingir 3, volta para a imagem original
                if (contadorCliqueDireita === 3) {
                    indiceAtual = -1; // Define o índice como -1 para voltar à imagem original
                    contadorCliqueDireita = 0; // Reseta o contador
                } else if (indiceAtual < imagensAlternativas.length - 1) {
                    indiceAtual++; // Incrementa o índice para avançar para a próxima imagem
                } else {
                    indiceAtual = 0; // Volta para a primeira imagem
                }
                
                atualizarImagem(); // Atualiza a imagem principal
            });
        });
    </script>

</body>

</html>
