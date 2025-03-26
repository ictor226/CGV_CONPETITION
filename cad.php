<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de produto</title>
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <style>
        body {
            font-family: 'Verdana', sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 700px;
        }


        input,
        select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            transition: 1s;
        }

        input[type="submit"]:hover {
            transition: 1s;
            background-color: #218838;
            border-radius: 20px;
            border: 10px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>

    <!--

METODO DE ENVIO 
    GET -> manda infomações atraves da URL
    POST -> manda infomações atraves do corpo do arquivo...
  ACTION
    fala para onde deve eviar os dados 

-->


    <form action="./cadastrar-produto.php" method="POST">

        <h1>cadastro de produtos</h1>

        <input type="text" name="nome" placeholder="nome do produto" required>
        <input type="text" name="preco" placeholder="preço do item" required>
        <input type="text" name="parcelamento" placeholder="parcelamento de produtos" required>
        <input type="text" name="descricao" placeholder="descricao do produtos" required>
        <input type="text" name="lancamento" placeholder="lancamento do produtos" required>
        <input type="text" name="versao" placeholder="versão do produto" required>
        <input type="number" name="quantidade" placeholder="quantidade de items" required>
        <input type="file" name="imagem1" placeholder="Imagem1" required>
        <input type="file" name="imagem2" placeholder="Imagem1" required>
        <input type="file" name="imagem3" placeholder="Imagem1" required>
        <input type="submit" value="Cadastrar">

        <div class="col-12">
            <a href="./index.php" class="btn btn-danger">Voltar</button></a>
        </div>

    </form>
</body>

</html>