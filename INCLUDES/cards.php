<?php
 
$dsn = 'mysql:dbname=bd_cgv;host=127.0.0.1';
$user = 'root';
$password = '';
 
$banco = new PDO($dsn, $user, $password);
 
$select = 'SELECT * FROM cadastro_produto ORDER BY RAND()';
 
$resultado = $banco->query($select)->fetchAll();
 
?>
<?php foreach ($resultado as $linha) { ?>
    <div class="container">
    <section class="produtos" >
        <a href="./info-produto.php?id=<?=$linha['id_produto'] ?>">
            <div class="container">
               <a href="./info-produto.php"><button class="btn-produto-card">
                    <div class="item">
                        <figure>
                            <img src="./ASSETS/img/produtos/<?php echo $linha ['img_produto1']?>" alt="KIT NITRO NOS COMPLETO" class="foto-produto">
                            <figcaption>
                                <h4 class="h4-tela02"><?php echo $linha ['nome_item']  ?></h4>
                            </figcaption>
                        </figure>
                    </div>
                </button></a> 
            </div>

        </section>
    </div>
<?php } ?>