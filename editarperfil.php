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

    if(isset($_POST['btn-alterar'])):
        $post = new Post($db);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $novasenha = filter_input(INPUT_POST, 'novasenha', FILTER_SANITIZE_SPECIAL_CHARS);
        $confsenha = filter_input(INPUT_POST, 'confsenha', FILTER_SANITIZE_SPECIAL_CHARS);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);


        if($novasenha == $confsenha and (strlen($novasenha) >=6) and $novasenha != $senha):
            $verifica_senha = $post -> senhaUsuario($_SESSION['user_id']);
            if($senha == $verifica_senha[0]['senha']):
                $post -> alterarSenha($_SESSION['user_id'], $novasenha);
            endif;
        endif;

        if($email != ''):
            $post -> alterarEmail($_SESSION['user_id'], $email);
        endif;

        if($nome != ''):
            $post -> alterarNome($_SESSION['user_id'], $nome);
            $_SESSION['usuario']=$nome;
        endif;
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
                <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">    
                    <div class='col-lg-8 offset-lg-4 editar-usuario'><input name="nome" class='col-12' type='text' placeholder='Nome do usuario'></div>
                    <div class='col-lg-8 offset-lg-4 editar-usuario'><input name="email" class='col-12' type='text' placeholder='Email'></div>
                    <div class='col-lg-8 offset-lg-4 editar-usuario'><input name="senha" class='col-12' type='text' placeholder='Senha atual'></div>
                    <div class='col-lg-8 offset-lg-4 editar-usuario'><input name="novasenha" class='col-12' type='text' placeholder='Nova senha'></div>
                    <div class='col-lg-8 offset-lg-4 editar-usuario'><input name="confsenha" class='col-12' type='text' placeholder='Confirmar nova senha'></div>

                    <div class="col-lg-8 offset-lg-4 botoes row no-gutters">
                        <button name="btn-alterar" class="col-lg-4" type="submit">Alterar usuário</button>
                        <button name="btn-descartar" class="col-lg-4" type="submit">Descartar alterações</button>
                        <button name="btn-deletar" class="col-lg-4" type="submit">Deletar usuário</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 offset-lg-6 col-12">
                
            </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>