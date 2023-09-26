<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://kit.fontawesome.com/05b9e3a650.js' crossorigin='anonymous'></script>
    
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe' crossorigin='anonymous' defer></script>
    <script src='script/index.js' defer></script>

    <link rel='stylesheet' href='css/css_home.css'>
    <link rel='stylesheet' href='css/css_base.css'>
    
    <title>Chef em Casa</title>
</head>
<!--criação do corpo-->
<body>
    
    <?php
    include 'header.php';

    $servername = "localhost";
    $username = "root";
    $password = "serra";
    $database = "chefemcasa";

    // Crie uma conexão
    $db = new mysqli($servername, $username, $password, $database);

    // Verifique a conexão
    if ($db->connect_error) {
        die("Falha na conexão: " . $db->connect_error);
    }
    
    $query = "
    SELECT m.url FotoRec, r.nome NomeRec, u.img FotoUser from RECEITA r
    left join MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec
    left join USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil
    where r.cod_rec <=5
    ";

    $result = $db->query($query);

    
    
    // Verifique se a consulta foi bem-sucedida
    if (!$result) {
        echo "Erro ao executar a consulta: " . $db->error;
        exit;
    }

    $row = $result->fetch_assoc();

    foreach($row as $i) {

    
    echo '<script>';
    echo 'console.log("Result: ' . $i . '");';
    echo '</script>';
    }
    // Feche a conexão
    $db->close();
    ?>

    <div class='container div-receitas'>

        <div class='col-lg-3 titulo-receita'>
            <h3 class='offset-lg-2'>Receitas do Chef</h3>
        </div>
        <div class='col-lg-10 offset-lg-1'>
            <div class='imagens row'>
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href='receita.php'><img class='img-receitas' src='<?php echo $row["FotoRec"]; ?>'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='img/chapeu com bg.png'>
                    </div>
                    <a href='receita.php'><span><?php echo $row["NomeRec"]; ?></span></a>
                </div>
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href='receita.php'><img class='img-receitas' src='receitas/Macarrão com molho de tomate.jpg'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='img/chapeu com bg.png'>
                    </div>
                    <a href='receita.php'><span>Macarrão com molho de tomate</span></a>
                </div>
    
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href='receita.php'><img class='img-receitas' src='receitas/Pudim de leite condensado.png'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='img/chapeu com bg.png'>
                    </div>
                    <a href='receita.php'><span>Pudim de leite condensado</span></a>
                </div>
            </div>
        </div>

        <div class='col-lg-10 offset-lg-1'>
            <div class='imagens row'>
                <div class='div-imagem col-lg-4 col-12'>
                    <div class='imagem'>
                        <a href='receita.php'><img class='img-receitas' src='receitas/Mojito.jpg'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='img/chapeu com bg.png'>
                    </div>
                    <a href='receita.php'><span>Mojito</span></a>
                </div>
        
                <div class='div-imagem col-lg-8 col-12'>
                    <div class='imagem'>
                        <a href='receita.php'><img class='img-receitas' src='receitas/caldo verde.jpg'></a>
                    </div>
                    <div class='info-criador'>
                        <img class='criador' src='img/chapeu com bg.png'>
                    </div>
                    <a href='receita.php'><span>Caldo Verde</span></a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>
    
</body>
</html>
