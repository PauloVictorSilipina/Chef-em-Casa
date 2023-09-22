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

<body  class="body_login">
    <?php
    include "headercadlog.php";

    if(isset($_POST['btn-valida'])):

        //Sanitização
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        
        //Validação
        $email = filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL);

        //Verificação
        if(($email != "") and ($usuario != "") and ($senha != "")):
            session_start();
            $img_path = 'img/chef mito.png';
            $_SESSION['img_path'] = $img_path;
            $_SESSION['email'] = $email;
            $_SESSION['senha']=$senha;
            $_SESSION['usuario']=$usuario;
            $_SESSION['user_id'] = session_id();
            header("Location: /index.php");
            exit();
        endif;

    endif;
    ?>

    <div class="login container">
        <div class="row">

            <div class="dados col-lg-4 col-10 offset-1 offset-lg-4">
                <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="col-lg-8 offset-lg-2">
                        <h1 class="">Login</h1>
                    </div>

                    <div class="col-lg-12 input-control col-12">
                        <label for="email" class="col-lg-12 col-10 offset-1">Email</label>
                        <input type="text" id="email" placeholder="Digite o email" class="col-lg-10 col-10 offset-1" name="email">
                        <div class="error"></div>
                    </div>
    
                    <div class="col-lg-12 input-control col-12">
                        <label for="usuario" class="col-lg-12 col-10 offset-1">Usuário</label>
                        <input type="text" id="usuario" placeholder="Digite o usuário" class="col-lg-10 col-10 offset-1" name="usuario">
                        <div class="error"></div>
                    </div>
    
                    <div class="col-lg-12 input-control">    
                        <label for="password" class="col-lg-12 col-10 offset-1">Senha</label>
                        <input type="password" id="password" placeholder="Digite sua senha" class="col-lg-10 col-10 offset-1" name="senha">
                        <div class="error"></div>
                    </div>
    
                    <div class="div-btn offset-lg-1 col-lg-10 col-10 offset-1">
                        <button name="btn-valida" class="btn-valida" type="submit">Fazer login</button>
                    </div>
    
                    <div class="cad">
                        <span class="col-10 offset-1">Não possui uma conta? <br><a href="cadastro.php">Clique aqui</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>