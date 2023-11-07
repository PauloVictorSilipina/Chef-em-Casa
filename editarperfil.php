<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Perfil</title>

    <?php include_once 'imports.html'?>
    <link rel='stylesheet' href='css/css_editarperfil.css'>
</head>
<body>
<?php
    include_once 'header.php';
    include_once 'initialize.php';
    ?>
    <div class="central-div container col-lg-8 offset-lg-2">
        <div class="">
            <h1 class='text-center'>Editar usuário</h1>
        </div>
        <div class='col-12 col-lg-0 row'>
            <div class='adicionar-imagem col-lg-3 offset-lg-0 col-12'>
                <div class='imagem'><img src=''></div>
                <input type="file" id="file-input" name="file-input"/>
                <label id="file-input-label" for="file-input">Escolha uma imagem</label>
            </div>

            <div class="col-lg-7 col-12">
                <div class='col-lg-4 offset-lg-4 editar-usuario'><input class='col-12' type='text' placeholder='Nome do Usuário'></div>
            </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>