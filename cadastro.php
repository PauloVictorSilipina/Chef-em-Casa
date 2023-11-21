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
        <link rel="stylesheet" href="css/css_login.css">
        <link rel="stylesheet" href="css/css_base.css">
    </head>
<!--criação do body-->
<body class='d-flex flex-column min-vh-100'>

    <?php
    include_once "headercadlog.php";
    include_once 'initialize.php';

    if(isset($_POST['btn-valida'])):
        
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
        $usuario = trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS));
        $senha = trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS));
        $csenha = trim(filter_input(INPUT_POST, 'cfsenha', FILTER_SANITIZE_SPECIAL_CHARS));

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if((filter_var($email, FILTER_VALIDATE_EMAIL)) and ($usuario != "") and (strlen($senha)>= 6) and ($senha == $csenha)) {

            $post = new Post($db);
            $cadastro = $post -> cadastroUsuario($usuario, $email, $senha);

            if($cadastro !== False) {
                session_start();
                $_SESSION['usuario']=$cadastro[0];
                $_SESSION['user_id'] = $cadastro[1];
                $_SESSION['img_path'] = $cadastro[2];
                header("Location: /index.php");
                exit();
            } else {
                echo "<script>window.alert('Email já em uso!')</script>";
            }
        } else if($email == "" or $usuario == "" or $senha == "" or $csenha == ""){
            echo "<script>window.alert('Preencha os campos')</script>";
        } else if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            echo "<script>window.alert('Insira um email válido')</script>";
        } else if (strlen($senha) < 6) {
            echo "<script>window.alert('Insira uma senha com seis caracteres ou mais')</script>";
        } else if ($senha !== $csenha) {
            echo "<script>window.alert('Senhas não coincidem')</script>";
        }

    endif;
    ?>

    <!--div para manipular os itens do cadastro-->

    <div class="login container">
        <div class="row"> 

            <div class="dados col-lg-4 col-10 offset-1 offset-lg-4">
                <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="col-lg-8 offset-lg-2">
                        <h1 class="">Cadastro</h1>
                    </div>

                    <div class="col-lg-12 input-control">
                        <label for="email" class="col-lg-12 col-10 offset-1">Email</label>
                        <input type="text" name="email" id="email" placeholder="Digite o email" class="col-lg-10 col-10 offset-1" name="email">
                        <div class="error"></div>
                    </div>
                    
                    <div class="col-lg-12 input-control">
                        <label for="usuario" class="col-lg-12 col-10 offset-1">Usuário</label>
                        <input type="text" name="usuario" id="usuario" placeholder="Digite o usuário" class="col-lg-10 col-10 offset-1" name="usuario">
                        <div class="error"></div>
                    </div>
                    
                    <div class="col-lg-12 input-control">
                        <label for="password" class="col-lg-12 col-10 offset-1">Senha</label>
                        <input type="password" name="senha" id="password" placeholder="Deve conter 6 caracteres ou mais" class="col-lg-10 col-10 offset-1" name="senha">
                        <div class="error"></div>
                    </div>

                    <div class="col-lg-12 input-control">
                        <label for="password" class="col-lg-12 col-10 offset-1">Confirme a senha</label>
                        <input type="password" id="confirm-password" placeholder="Confirme sua senha" class="col-lg-10 col-10 offset-1" name="cfsenha">
                        <div class="error"></div>
                    </div>

                    <div class="div-btn offset-lg-1 col-lg-10 col-10 offset-1">
                        <button name="btn-valida" class="btn-valida" type="submit">Fazer cadastro</button>
                    </div>
                    <div class="faz-login offset-lg-1 col-lg-10">
                        <a href="login.php">Fazer login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>