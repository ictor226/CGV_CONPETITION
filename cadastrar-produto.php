<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    .text-al {
        display: flex;
        text-align: center;
        justify-content: center;
        font-size: 40px;
        color: #007bff;
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    .col-12 {
        margin-top: 200px;
        padding: 30px;
    }
</style>

<?php
echo "Cadastro de Produto";

echo '<pre>';
var_dump($_POST);

// Recebendo os dados do formulário
$nomeItemFormulario = $_POST['nome'];
$precoItemFormulario = $_POST['preco'];
$parcelamentoFormulario = $_POST['parcelamento'];
$descricaoFormulario = $_POST['descricao'];
$lancamentoFormulario = $_POST['lancamento'];
$versaoFormulario = $_POST['versao'];
$quantidadeFormulario = $_POST['quantidade'];
$imgFormulario1 = $_POST['imagem1'];
$imgFormulario2 = $_POST['imagem2'];
$imgFormulario3 = $_POST['imagem3'];

// Conexão com o banco de dados
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $banco = new PDO($dsn, $user, $password);
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falha na conexão com o banco: ' . $e->getMessage();
    exit;
}

// Preparando a query de inserção
$insert = 'INSERT INTO cadastro_produto (nome_item, preco_item, parcelamento, versao, descricao, ano_lancamento, quantidade, img_produto1, img_produto2, img_produto3) 
           VALUES (:nome_item, :preco_item, :parcelamento, :versao, :descricao, :ano_lancamento, :quantidade, :img_produto1, :img_produto2, :img_produto3)';

$box = $banco->prepare($insert);

// Executando a query com os dados
$box->execute([
    ':nome_item' => $nomeItemFormulario,
    ':preco_item' => $precoItemFormulario,
    ':parcelamento' => $parcelamentoFormulario,
    ':versao' => $versaoFormulario,
    ':descricao' => $descricaoFormulario,
    ':ano_lancamento' => $lancamentoFormulario,
    ':quantidade' => $quantidadeFormulario,
    ':img_produto1' => $imgFormulario1,
    ':img_produto2' => $imgFormulario2,
    ':img_produto3' => $imgFormulario3
]);

// Pegando o ID do último produto inserido
$id_produto = $banco->lastInsertId();

// Exibindo o ID do produto cadastrado
echo "O ID do produto cadastrado é: " . $id_produto;

// Exibindo o alerta de sucesso com SweetAlert
echo '<script>
swal({
    title: "Sucesso!",
    text: "Produto cadastrado com sucesso! O ID do produto é: ' . $id_produto . '",
    icon: "success",
    button: "OK"
});
</script>';

// Exibindo os dados de depuração da execução
var_dump($box);
?>

<div class="col-12">
    <!-- Aqui você pode adicionar o conteúdo da página, se necessário -->
</div>
