<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/05b9e3a650.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    

    <link rel="stylesheet" href="css/css_base.css">
    <link rel="stylesheet" href="css/css_receita.css">
    
    
    <title>Chef em Casa</title>
</head>
<!--criação do corpo-->
<body>
    <?php
    include 'header.php';
    include_once 'initialize.php';
    
    $post = new Post($db);
    $infoRecDesc = $post -> infoRec($_GET['id']);
    $infoIngredientes = $post -> infoIngredientes($_GET['id']);
    $infoPreparo = $post -> infoPreparo($_GET['id']);
    $comentarios = $post -> comentario($_GET['id']);

    ?>

     <!-- Infos da receitas -->
     <div class="conteudo container">
        <div class="receita container col-lg-8 col-12">
            <div class="">
                <h3 class="titulo-receita col-lg-12"><?php echo $infoRecDesc[0]["RecNome"]; ?></h3>
            </div>

            <img class="img-receita col-lg-12" src="<?php echo $infoRecDesc[0]["RecImg"]; ?>">
        </div>

        <div class="info-receita col-lg-8 offset-lg-2 col-12">
            <div class="icones row">
                <div class="col-4 offset-lg-3 col-lg-2">
                    <div>
                        <i class="fa-solid fa-bowl-rice fa-2xl"></i>
                    </div>
                    <div class="rend_temp_dif">
                        <span>Rendimento</span>
                    </div>
                    <div>
                        <span><?php echo $infoRecDesc[0]["RecRend"]; ?></span>
                    </div>
                </div>

                <div class="col-4 col-lg-2">
                    <div>
                        <i class="fa-regular fa-clock fa-2xl"></i>
                    </div>
                    <div class="rend_temp_dif">
                        <span>Tempo</span>
                    </div>
                    <div>
                        <span><?php echo $infoRecDesc[0]["RecTemp"]; ?></span>
                    </div>
                </div>
                <div class="col-4 col-lg-2">
                    <div>
                        <i class="fa-solid fa-fire fa-2xl"></i>
                    </div>
                    <div class="rend_temp_dif">
                        <span>Dificuldade</span>
                    </div>
                    <div>
                        <span><?php echo $infoRecDesc[0]["RecDif"]; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-criador container col-lg-8">
            <div class="row">
                <!-- Div 1 - Lado a Lado -->
                <div class="col-lg-1 d-flex align-items-center">
                    <div class="img-criador">
                    <img src="<?php echo str_replace(" ", "",$infoRecDesc[0]["UsuImg"]); ?>">
                    </div>
                </div>

                <!-- Div 2 - Lado a Lado e Centralizada Verticalmente -->
                <div class="col-lg-2 d-flex align-items-center">
                    <div class="nome-criador">
                        <span><?php echo $infoRecDesc[0]["UsuNome"]; ?></span>
                    </div>
                </div>

                <div class="col-lg-8 offset-lg-1 d-flex align-items-center">
                    <div class="nome-criador">
                        <span><?php echo $infoRecDesc[0]["RecDesc"]; ?></span>
                    </div>
                </div>
            </div>
        </div>




        <div class="container col-lg-8">
            <div class="titulo col-lg-12">
                <span>Ingredientes</span>
            </div>
        </div>
        <div class="container col-lg-8">
            <div class="ingredientes-preparo col-lg-12">
                <ol>
                    <?php
                        foreach($infoIngredientes as $i) {
                            echo "<li>". $i['qtd'] ." ". $i['medida'] ." ". $i['nome']."</li>";
                        }
                    ?>
                </ol>
            </div>
        </div>

        <div class="container col-lg-8">
            <div class="titulo col-lg-12">
                <span>Modo de Preparo</span>
            </div>
        </div>
        <div class="container col-lg-8">
            <div class="modo-preparo col-lg-12">
                <ol>
                <?php
                    foreach($infoPreparo as $i) {
                        $passos = explode(';', $i['modo_preparo']);
                        foreach ($passos as $passo) {
                            echo '<li>' . $passo . '</li>';
                        }
                    }
                ?>

                </ol>
            </div>
        </div>

        <!--Seção de comentários-->
        <div class="container col-lg-8">
            <div class="titulo col-lg-12">
                <span>Comentários</span>
            </div>
            <div class="comentarios col-lg-12">
            <?php
                foreach($comentarios as $i) {
                    echo "<div class='comentario d-flex align-items-center'>";
                    echo "<div class='foto-comentario col-1'><a href='perfil.php?" . $i['UsuCod'] . "'>" . "<img src='" . $i['img'] . "'></a></div>";
                    echo "<div class='info-comentario col-9 offset-2'><div class='nome-comentario'><span>".$i['nome']."</span></div><div class='texto-comentario col-12'><span>".$i['COMENTARIO']."</span></div></div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
     </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>