<?php
include './INCLUDES/Header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./ASSETS/CSS/tela-users.css">
    
</head>

<body>


    <section class="informaçoes-user">  
       
    <img src="../CGV_CONPETITION/ASSETS/img/login/patinho.jpg" alt="foto de perfil"  class="foto-user">
   <h1 class="perfil-text">Foto De Perfil</h1>
      
   <div class="color-text">
        
        <p>CFP</p>
        <input type="text">
        <p>Telefone</p>
        <input type="text">
        
</div>
<a href="" class="editar-user"><i class="bi bi-pencil-square"></i></a>
    </section>


    <section class="area-user">
    <h1 class="title-users">Área de Usuario</h1>

    <div class="input-container">
        <div class="alinha-inputs">
         
            <input type="text" placeholder="Nome e Sobrenome">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Telefone">
            <input type="text" placeholder="CEP">
            <input type="text" placeholder="Estado">
        </div>
        
        <div class="alinha-inputs-2">
            <input type="text" placeholder="Cidade">
            <input type="text" placeholder="Bairro">
            <input type="text" placeholder="Rua">
            <input type="text" placeholder="Número">
            <input type="text" placeholder="Complemento">
        </div>
    </div>
    <button type="button" class="btn-success">Salvar</button>
</section>
</body>

</html>