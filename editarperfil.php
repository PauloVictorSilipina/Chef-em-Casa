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

    if(isset($_POST['btn-deletar'])):
        $post = new Post($db);
        $post -> deletarPerfil($_SESSION['user_id']);
        header("Location: /logout.php");
    endif;
    ?>
    <div class="central-div container col-lg-8 offset-lg-2">
        <div class="">
            <h1 class='text-center'>Editar usuário</h1>
        </div>
        <div class='col-12 col-lg-0 row'>
            <div class='adicionar-imagem col-lg-4 offset-lg-0 col-12'>
                <div class='imagem'><img src=''></div>
                <input type="file" id="file-input" name="file-input"/>
                <label id="file-input-label" for="file-input">Escolha uma imagem</label>
            </div>

            <div class="col-lg-7 col-12">
                <div class='col-lg-8 offset-lg-4 editar-usuario'><input class='col-12' type='text' placeholder='Nome do usuario'></div>
                <div class='col-lg-8 offset-lg-4 editar-usuario'><input class='col-12' type='text' placeholder='Email'></div>
                <div class='col-lg-8 offset-lg-4 editar-usuario'><input class='col-12' type='text' placeholder='Senha atual'></div>
                <div class='col-lg-8 offset-lg-4 editar-usuario'><input class='col-12' type='text' placeholder='Nova senha'></div>
                <div class='col-lg-8 offset-lg-4 editar-usuario'><input class='col-12' type='text' placeholder='Confirmar nova senha'></div>
            </div>

            <div class="col-lg-6 offset-lg-6 col-12">
                <div class="col-lg-12 botoes row no-gutters">
                    <form class="col-lg-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <button onclick="" class="col-lg-12" type="submit">Deletar usuário</button>
                    </form>
                    <form class="col-lg-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <button onclick="" class="col-lg-12" type="submit">Deletar usuário</button>
                    </form>
                    <form class="col-lg-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <button name="btn-deletar" class="col-lg-12" type="submit">Deletar usuário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>