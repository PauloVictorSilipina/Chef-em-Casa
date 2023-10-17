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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <script src="script/cadrec.js" defer></script>
    <link rel="stylesheet" href="css/css_base.css">
    <link rel="stylesheet" href="css/css_cadreceita.css">
    
    <title>Chef em Casa</title>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    
    <div class="container envio-receitas">
        <div class="col-lg-12">
            <h1>Envie sua receita</h1>
        </div>
        <div class='dados-cad-rec row'>
            <div class='adicionar-imagem col-lg-3'>
                <div class='imagem'><img src='img/icon.png'></div>
                <input type="file" id="file-input" name="file-input"/>
                <label id="file-input-label" for="file-input">Escolha uma imagem</label>
            </div>

            <div class="col-lg-7">
                <div class='col-lg-12 titulo-rec'><input type='text' placeholder='Titulo da Receita'></div>
                <div class="vazia"></div>
                <div class='col-lg-12 desc-rec'><textarea placeholder='Descrição da receita' id='desc-red'></textarea></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="informacao-receita col-lg-6">
                <div class="titulos col-lg-12">
                    <span>Informações Chave</span>
                </div>
                <div class="sub-titulos col-lg-12">
                    <span>Dificuldade</span>
                    <fieldset class='dificuldades'>
                        <div class="col-lg-6 facil">
                            <input class="radiostyle" type="radio" id="facil" name="dificuldades" checked />
                            <label for="facil">Fácil</label>
                        </div>

                        <div class="col-lg-6 medio">
                            <input class="radiostyle" type="radio" id="medio" name="dificuldades" />
                            <label for="medio">Médio</label>
                        </div>

                        <div class="col-lg-6 dificil">
                            <input class="radiostyle" type="radio" id="dificil" name="dificuldades"/>
                            <label for="dificil">Díficil</label>
                        </div>
                    </fieldset>

                </div>
                <div class="sub-titulos col-lg-12">
                    <span>Tempo de Preparo</span>
                </div>
            </div>
        
            <div class="ingredientes col-lg-6">
            <div class="titulos col-lg-12">
                    <span>Ingredientes e porções</span>
                </div>
                <div class="sub-titulos col-lg-12">
                    <span>Número de pessoas ou porções</span>
                </div>
                <div class="sub-titulos col-lg-12">
                    <span>Ingredientes</span>
                </div>
                </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>