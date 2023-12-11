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
    $banana = $post->dadosIndex();

    ?>


    <div class='container div-receitas'>

        <div class='col-lg-3 titulo-receita'>
            <h3 class='offset-lg-2'>Receitas</h3>
        </div>
        <div class='col-lg-10 offset-lg-1'>
            <div class='imagens row'>
                <?php
                foreach ($banana as $value) {
                    echo "<div class='div-imagem col-lg-4 col-12'>";
                    echo "<div class='imagem'>";
                    echo "<a href='receita.php?id=".$value["CodRec"]."'><img class='img-receitas' src='".$value["FotoRec"]."'></a>";
                    echo "</div>";
                    echo "<div class='info-criador'>";
                    echo "<img class='criador' src='".$value["FotoUser"]."'>";
                    echo "</div>";
                    echo "<a href='receita.php?id=".$value["CodRec"]."'><span>".$value["NomeRec"]."</span></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

</body>

</html>