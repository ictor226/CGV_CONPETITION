<?php
include './INCLUDES/Header.php';

$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';
$banco = new PDO($dsn, $user, $password);

// Verificando se a busca foi feita
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $data = $_GET['search'];
    $select = "SELECT * FROM cadastro_produto WHERE nome_item LIKE :data OR descricao LIKE :data ORDER BY id_produto DESC";
    $stmt = $banco->prepare($select);
    $stmt->bindValue(':data', '%' . $data . '%');
    $stmt->execute();
    $resultado = $stmt->fetchAll();
} else {
    $select = 'SELECT * FROM cadastro_produto ORDER BY RAND()';
    $resultado = $banco->query($select)->fetchAll();
}
?>

<div class="container">
    <?php foreach ($resultado as $linha) { ?>
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
            <form action="cart.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $linha['id_produto']; ?>">
                <button type="submit" class="add-to-cart-button">Adicionar ao Carrinho</button>
            </form>
        </section>
    <?php } ?>
</div>

<?php
include './includes/footer.php';
?>
