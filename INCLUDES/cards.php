<?php
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

// Query para pegar todos os produtos
$select = 'SELECT * FROM cadastro_produto ORDER BY RAND()';
$resultado = $banco->query($select)->fetchAll();

// Limitar a quantidade de produtos a 8
$limite = 8;
$produtosExibidos = array_slice($resultado, 0, $limite);
?>

<div class="container">
    <?php foreach ($produtosExibidos as $linha) { ?>
        <section class="produtos">
            <a href="./info-produto.php?id=<?=$linha['id_produto']?>">
                <button class="btn-produto-card">
                    <div class="item">
                        <figure>
                            <img src="./ASSETS/img/produtos/<?php echo !empty($linha['img_produto1']) ? htmlspecialchars($linha['img_produto1']) : 'imagem_padrao.jpg' ?>" alt="Produto" class="foto-produto">
                            <figcaption>
                                <h4 class="h4-tela02"><?php echo $linha['nome_item'] ?></h4>
                            </figcaption>
                        </figure>
                    </div>
                </button>
            </a>

            <!-- Link para adicionar ao carrinho -->
            <a href="cart.php?id=<?php echo $linha['id_produto']; ?>">Adicionar ao Carrinho</a>
        </section>
    <?php } ?>
</div>
