<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php include_once 'imports.html'?>
    <link rel='stylesheet' href='css/css_home.css'>
    
    <title>Chef em Casa</title>
</head>
<!--criação do corpo-->
<body class='d-flex flex-column min-vh-100'>
    
    <?php
    include_once 'header.php';
    include_once 'initialize.php';
    
    $post = new Post($db);
    $banana = $post -> dadosIndex();
    ?>


    <div class='container div-receitas'>

        <div class='col-lg-3 titulo-receita'>
            <h3 class='offset-lg-2'>Receitas do Chef</h3>
        </div>
        <div class='col-lg-10 offset-lg-1'>
            <div class='imagens row'>
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href="receita.php?id='<?php echo $banana[0]["CodRec"]; ?>'"><img class='img-receitas' src='<?php echo $banana[0]["FotoRec"]; ?>'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='<?php echo $banana[0]["FotoUser"]; ?>'>
                    </div>
                    <a href="receita.php?id='<?php echo $banana[0]["CodRec"]; ?>'"><?php echo $banana[0]["NomeRec"]; ?></span></a>
                </div>
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href="receita.php?id='<?php echo $banana[1]["CodRec"]; ?>'"><img class='img-receitas' src='<?php echo $banana[1]["FotoRec"]; ?>'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='<?php echo $banana[1]["FotoUser"]; ?>'>
                    </div>
                    <a href="receita.php?id='<?php echo $banana[1]["CodRec"]; ?>'"><span><?php echo $banana[1]["NomeRec"]; ?></span></a>
                </div>
    
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href="receita.php?id='<?php echo $banana[2]["CodRec"]; ?>'"><img class='img-receitas' src='<?php echo $banana[2]["FotoRec"]; ?>'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='<?php echo $banana[2]["FotoUser"]; ?>'>
                    </div>
                        <a href="receita.php?id='<?php echo $banana[2]["CodRec"]; ?>'"><?php echo $banana[2]["NomeRec"]; ?></span></a>
                </div>
            </div>
        </div>

        <div class='col-lg-10 offset-lg-1'>
            <div class='imagens row'>
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href="receita.php?id='<?php echo $banana[3]["CodRec"]; ?>'"><img class='img-receitas' src='<?php echo str_replace(" ","",$banana[3]["FotoRec"]); ?>'></a>
                    </div>
                    <div class='info-criador'>
                    <img class='criador' src='<?php echo str_replace(" ","",$banana[3]["FotoUser"]); ?>'>
                    </div>
                        <a href="receita.php?id='<?php echo $banana[3]["CodRec"]; ?>'"><span><?php echo $banana[3]["NomeRec"]; ?></span></a>
                </div>
        
                <div class='div-imagem col-lg-8 col-12'>
                    <div class='imagem'>
                        <a href="receita.php?id='<?php echo $banana[4]["CodRec"]; ?>'"><img class='img-receitas' src='<?php echo str_replace(" ","",$banana[4]["FotoRec"]); ?>'></a>
                    </div>
                    <div class='info-criador'>
                    <img class='criador' src='<?php echo str_replace(" ","",$banana[4]["FotoUser"]); ?>'>
                    </div>
                        <a href="receita.php?id='<?php echo $banana[4]["CodRec"]; ?>'"><?php echo $banana[4]["NomeRec"]; ?></span></a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
    
</body>
</html>
