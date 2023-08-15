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

    <link rel="stylesheet" href="css/css_home.css">
    <link rel="stylesheet" href="css/css_base.css">
    
    <title>Chef em Casa</title>
</head>
<!--criação do corpo-->
<body class="body_home">
    <!--criação do cabecalho-->
    <nav class="cabecalho navbar navbar-expand-lg sticky-top">

            <div class="col-lg-12">
                <div class="row">

                    <button class="navbar-toggler col-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" >
                        <i class="fa-solid fa-bars fa-xl"></i>
                    </button>

                    <!--<div class="div-logo col-lg-2 col-6">
                        <a><img src="img/logo.png"></a>
                    </div>
                    -->
                    <div class="div-logo col-lg-2 col-6">
                        <h1 class="offset-lg-2">Chef em Casa</h1>
                    </div>
    
                    <button class="navbar-toggler col-3" type="button" data-bs-toggle="" data-bs-target="#">
                        <i class="fa-solid fa-tags fa-xl"></i>
                    </button>
                    
                    <div class="div-pesquisa col-12 col-lg-6 offset-lg-1 row no-gutters"  id="div-pesquisa">
                        <input type="text" placeholder="Digite uma receita, ingrediente ou categoria" id="input-pesquisa" class="input-pesquisa col-7 offset-1 col-lg-10 offset-lg-0">
                        <button type="submit" id="btn-pesquisa" class="btn-pesquisa col-4 col-lg-2"><i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
                    </div>

                    <div class="menu collapse navbar-collapse usuario col-lg-2 offset-lg-1" id="navbarSupportedContent">
                        <a href="#"><i class="fa-solid fa-heart fa-2xl col-2 col-lg-0"></i></a>
                        <a href="#"><i class="fa-solid fa-plus fa-2xl col-2 col-lg-0 offset-lg-4"></i></a>
                        <a href="#"><i class="fa-regular fa-bell fa-2xl col-2 col-lg-0 offset-lg-4"></i></a>
                        <a href="perfil.php"><i class="fa-solid fa-circle-user fa-2xl col-2 col-lg-0 offset-lg-4"></i></a>
                    </div>
                </div>
            </div>
    </nav>

    <div class="container div-receitas">

        <div class="col-lg-3 titulo-receita">
            <h3>Receitas do Chef</h3>
        </div>
        <div class="imagens row">
            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <a href="receita.php"><img class="img-receitas" src="receitas/Bolo.jpg"></a>
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="receita.php"><span>Bolo de Chocolate</span></a>
            </div>
            
            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/Brigadeiro.png">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="#"><span>Brigadeiro</span></a>
            </div>

            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/Pudim de leite condensado.png">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="#"><span>Pudim de leite condensado</span></a>
            </div>

            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/Pão de queijo.jpg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="#"><span>Pão de Queijo</span></a>
            </div>

            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/Macarrão com molho de tomate.jpg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="#"><span>Macarrão com molho de tomate</span></a>
            </div>

            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/Mojito.jpg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="#"><span>Mojito</span></a>
            </div>

            <div class="div-imagem col-lg-6 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/caldo verde.jpg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/chapeu com bg.png">
                </div>
                <a href="#"><span>Caldo Verde</span></a>
            </div>
        </div>
        
        <div class="col-lg-3 titulo-receita">
            <h3>Receitas Famosas</h3>
        </div>
        <div class="imagens row">
            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <a href="receita.php"><img class="img-receitas" src="receitas/batida de coco.jpg"></a>
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/paulovictor.jpg">
                </div>
                <a href="receita.php"><span>Batida de Coco bem Gostosa</span></a>
            </div>
            
            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/bife acebolado.jpg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/pedroantonio.jpeg">
                </div>
                <a href="#"><span>Bife Acebolado</span></a>
            </div>

            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/camarao internacional.jpg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/ricardo.jpeg">
                </div>
                <a href="#"><span>Camarão Internacional</span></a>
            </div>

            <div class="div-imagem col-lg-3 col-12">
                <div class="imagem">
                    <img class="img-receitas" src="receitas/dadinho.jpeg">
                </div>
                <div class="info-criador">
                    <img class="criador" src="img/deninho.jpg">
                </div>
                <a href="#">Dadinho de Queijo Coalho</a>
            </div>
        </div>
    </div>

    

    <footer class="container-fluid">
        <div id="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <h3 class="main-title">Chef em Casa</h3>
                    </div>
                    <div class="col-12 col-lg-3 offset-lg-1 contact-box">
                        <ul class="col-10">
                            <li>
                                <a href="#" class="fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-google"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-instagram"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-10 offset-1 col-lg-5 offset-lg-3">
                        <p>Chef em Casa oferece receitas de forma amplas, visando vários públicos com seus inovadores filtros</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
