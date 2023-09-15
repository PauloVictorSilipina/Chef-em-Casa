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
    <script src="script/index.js" defer></script>

    <link rel="stylesheet" href="css/css_base.css">
    <link rel="stylesheet" href="css/css_receita.css">
    
    
    <title>Chef em Casa</title>
</head>
<!--criação do corpo-->
<body>
    <?php
    include "header.php";
    ?>

     <!-- Infos da receitas -->
     <div class="conteudo container">
        <div class="receita container col-lg-8">
            <div class="">
                <h3 class="titulo-receita col-lg-12">Bolo de Chocolate</h3>
            </div>

            <img class="img-receita col-lg-12" src="receitas/Bolo padrao.jpg">
        </div>
        <div class="info-receita container col-lg-6">
            <div class="tempo-rendimento-serve">
                <div class="div-tempo col-4 col-lg-4">
                    <span><i class="fa-regular fa-clock fa-2xl"></i></span>
                    <br>
                    <span>1 hora</span>
                </div>
                <div class="div-rendimento col-4 col-lg-4">
                    <span><i class="fa-solid fa-bowl-rice fa-2xl"></i></span>
                    <br>
                    <span>8 porções</span>
                </div>
                <div class="div-dificuldade col-4 col-lg-4">
                    <span><i class="fa-solid fa-fire fa-2xl"></i></span>
                    <br>
                    <span>Fácil</span>
                </div>
            </div>
        </div>

        <div class="info-criador container col-lg-6">
            <img src="img/chapeu com bg.png">
            <span>Chef em Casa</span>
        </div>

        <!--Ingredientes-->
        <div class="container col-lg-6">
            <div class="titulo col-lg-12">
                <span>Ingredientes</span>
            </div>
        </div>
        <div class="container col-lg-6">
            <div class="info-ingredientes col-lg-12">
                <ul>
                    <li>3 copos de trigo</li>
                    <li>2 copos de açúcar</li>
                    <li>1 copo de chocolate em pó</li>
                    <li>1 copo de óleo</li>
                    <li>Óleo</li>
                    <li>Fermento</li>
                </ul>
            </div>
        </div>

        <!--Modo de preparo-->
        <div class="container col-lg-6">
            <div class="titulo col-lg-12">
                <span>Modo de Preparo</span>
            </div>
        </div>
        <div class="container col-lg-6">
            <div class="info-preparo col-lg-12">
                <ul>
                    <li>Em uma tigela misturar o açúcar e o chocolate em pó</li>
                    <li>Em seguida, misturar as gemas e o óleo</li>
                    <li>Aos poucos acrescentar a água e o trigo</li>
                    <li>Em seguida juntar o fermento e por fim juntar as claras em neve</li>
                    <li>Óleo</li>
                    <li>Despejar numa forma untada e colocar para assar por aproximadamente 40 minutos</li>
                </ul>
            </div>
        </div>

        <!--Seção de comentários-->
        <div class="container">
            <div class="titulo-comentario">
                <span>Comentários</span>
            </div>

            
            <div class="comentarios"></div>
        </div>
     </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>