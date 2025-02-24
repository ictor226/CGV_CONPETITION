<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./ASSETS/CSS/bara-pesquisa.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ASSETS/CSS/tela-inicial.css">
    <link rel="stylesheet" href="./ASSETS/CSS/cart.css">

    <title>
    <?php
    if (isset ($titulo) &&  !empty($titulo)){
        echo $titulo;

    } else{

        echo 'CGV COMPETITION';
    }
    ?>
    
    </title>

</head>

<body>
    <header>

        

        <nav class="nav-inicio">
            <div class="nav-inicio">
                <button class="menu-oculto" onclick="javascript:abrirNav()"><i class="bi bi-list"></i></button>
                
            
            <div id="offcanvas" class="menu-oculto">
                <button class="fechar" onclick="javascript:fecharNav()"><i class="bi bi-x"></i></button>
            </div>
                <li><a href="./index.php"><img src="./ASSETS/img/tela inicial/cf8d9fb9-7f78-4042-ad6d-e5ad3a6520c6 1.png" alt="" width="250" height="45"></a></li>
            </div>

        
            <ul class="nav-inicio">
                <li class="search-container">
                    <a href="javascript:void(0)" id="search-icon"><i class="bi bi-search"></i></a>
                    <input type="text" id="search-bar" placeholder="Buscar produtos">
                </li>
                <li><a href="./cart.php"><i class="bi bi-cart2"></i></a></li>
                <li><a href="./tela-login.html"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </nav>
        