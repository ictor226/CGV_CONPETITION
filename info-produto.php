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
            <img src="./ASSETS/img/produtos/roda.png" alt="foto produto" id="figura">
        </div>

        <div class="buttons-row">
            <button class="buttons-img">
                <img src="ASSETS/img/produtos/rodaInfo1.png" alt="">
            </button>

            <button class="buttons-img">
                <img src="ASSETS/img/produtos/rodaInfo2.png" alt="">
            </button>
        </div>
    </section>

    <section class="informacoes">
    <div class=".container-info"> 
    <h2>[<span class="sell-color">VENDA-SE</span>]Par Roda Taluda Nismo Jdm Aro 18x10.5 5x114 Preto Acetinado</h2>
      <p>versão</p>
    <select aria-label="Seleção de versão" class="versao">

            <option value="2025">2025</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            
        </select>
        <p class="preco-info">R$ 3.543,00
            <br>
            ou por 12x de R$ 1.099,17 sem juros</p> 
            <br>
              <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </div>  
          
    </section>
    <?php
    include './includes/footer.php';
    ?>

</body>

</html>