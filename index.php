<?php
include './INCLUDES/Header.php';

?>

<body>
    <div class="background-site">


        <div class="video-inicio" utoplay loop muted playsinline>
            <figure class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="./ASSETS/img/tela inicial/CGV COMPETITON.mp4" type="video/mp4">
                </video>
            </figure>
        </div>
        </header>
        </main>

        <h1 class="produ">PRODUTOS EM DESTAQUE</h1>
        <?php

 include './INCLUDES/cards.php'
?>

       

        <hr class="hr-tela03">
        <section class="tela-envio">
            <img src="./ASSETS/img/tela inicial/envio.png" class="img-envio">
            <h2 class="h2-tela-03">ENVIO IMEDIATO!</h2>
            <h4 class="h4-tela-03">Isso mesmo! Nós temos envio imediato para a entrega a partir do pagamento realizado na
                compra de cada item, isso tudo para passar confiança para os nossos clientes, e para mostrar a nossa
                qualidade impecavél desde o site, até mesmo no item chego em casa!
            </h4>
        </section>
        <!-- tla 04 -->
        <hr class="hr-tela04">

        <img src="./ASSETS/img/tela inicial/sobre nós.png" alt="" class="img-sobre">
        <div class="dit-h">
            <h2 class="h2-tela04" id="sobre">SOBRE NÓS</h2>

            <h6 id="h6-tela04">Somos a maior loja de Peças automotivas para super carros do mundo todo! Temos parceria com
                uma das maiores preparadoras de carros de todos os tempos, a famosa G-POWER, todas as modificações com as
                melhores peças do mercado saem da nossa empresa!</h6>
        </div>
    </div>

    <?php
    include './includes/footer.php';
    ?>

</body>

</html>