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
            <div class='adicionar-imagem col-lg-4 offset-lg-1'>
                <div class='imagem'><img src='img/icon.png'></div>
                <input type="file" id="file-input" name="file-input"/>
                <label id="file-input-label" for="file-input">Envie a imagem da sua receita</label>
            </div>
            <div class="col-lg-5 offset-lg-1 ">
                <div class='col-lg-12 titulo-rec'><input type='text' placeholder='Titulo da Receita'></div>
                <div class='col-lg-12 desc-rec'><textarea placeholder='Descrição da receita' id='desc-red'></textarea></div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>