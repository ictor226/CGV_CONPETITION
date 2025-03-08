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

$nomeItemFormulario = $_POST['nome'];
$precoItemFormulario = $_POST['preco'];
$parcelamentoFormulario = $_POST['parcelamento'];
$descricaoFormulario = $_POST['descricao'];
$lancamentoFormulario = $_POST['lancamento'];
$versaoFormulario = $_POST['versao'];
$quantidadeFormulario = $_POST['quantidade'];
$imgFormulario = $_POST['imagem'];

$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert = 'INSERT INTO cadastro_produto (nome_item, preco_item, parcelamento, versao, descricao, ano_lancamento, quantidade, img) VALUES (:nome_item, :preco_item, :parcelamento, :versao, :descricao, :ano_lancamento, :quantidade, :img)';

$box = $banco->prepare($insert);

$box->execute([
    ':nome_item' => $nomeItemFormulario,
    ':preco_item' => $precoItemFormulario,
    ':parcelamento' => $parcelamentoFormulario,
    ':versao' => $versaoFormulario,
    ':descricao' => $descricaoFormulario,
    ':ano_lancamento' => $lancamentoFormulario,
    'quantidade'=> $quantidadeFormulario,
    ':img' => $imgFormulario
]);

$id_produto = $banco->lastInsertId();

echo $id_produto;


echo '<script>

swal({
    title: "Sucesso!",
    text: "Produto cadastrado com sucesso!",
    icon: "success",
    button: "OK",
    
});

</script>';
 
var_dump($box);
?>



<div class="col-12">
    <a href="./cad.php" class="btn btn-danger">Voltar</a>
</div>