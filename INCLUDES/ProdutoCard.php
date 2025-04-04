<?php
class ProdutoCard {
    private $db;
    private $limite = 8;

    public function __construct($dsn, $user, $password) {
        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Conexão falhou: ' . $e->getMessage();
        }
    }

    // Função para recuperar produtos
    public function listarProdutos() {
        $select = 'SELECT * FROM cadastro_produto ORDER BY RAND()';
        $resultado = $this->db->query($select)->fetchAll();

        // Limitar a quantidade de produtos
        return array_slice($resultado, 0, $this->limite);
    }

    // Função para exibir os cards dos produtos
    public function exibirCards() {
        $produtos = $this->listarProdutos();
        
        echo '<div class="container">';
        foreach ($produtos as $linha) {
            echo '
                <section class="produtos">
                    <a href="./info-produto.php?id=' . $linha['id_produto'] . '">
                        <button class="btn-produto-card">
                            <div class="item">
                                <figure>
                                    <img src="./ASSETS/img/produtos/' . (!empty($linha['img_produto1']) ? htmlspecialchars($linha['img_produto1']) : 'imagem_padrao.jpg') . '" alt="Produto" class="foto-produto">
                                    <figcaption>
                                        <h4 class="h4-tela02">' . $linha['nome_item'] . '</h4>
                                    </figcaption>
                                </figure>
                            </div>
                        </button>
                    </a>

                    <form action="cart.php" method="GET">
                        <input type="hidden" name="id" value="' . $linha['id_produto'] . '">
                        <button type="submit" class="add-to-cart-button">Adicionar ao Carrinho</button>
                    </form>
                </section>
            ';
        }
        echo '</div>';
    }
}
?>
