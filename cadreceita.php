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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="script/cadrec.js" defer></script>
    <script src="script/util.js" defer></script>
    
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
        <div class='dados-cad-rec col-12 col-lg-0 row'>
            <div class='adicionar-imagem col-lg-3 offset-lg-0 col-12'>
                <div class='imagem'><img src=''></div>
                <input type="file" id="file-input" name="file-input"/>
                <label id="file-input-label" for="file-input">Escolha uma imagem</label>
            </div>

            <div class="col-lg-7 col-12">
                <div class='col-lg-12 titulo-rec'><input class='col-12' type='text' placeholder='Titulo da Receita'></div>
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
                        <div for="facil" class="col-lg-6 facil">
                            <input class="radiostyle sr-only" type="radio" id="facil" name="dificuldades" />
                            <label for="facil">Fácil</label>
                        </div>

                        <div for="medio" class="col-lg-6 medio">
                            <input class="radiostyle sr-only" type="radio" id="medio" name="dificuldades" />
                            <label for="medio">Médio</label>
                        </div>

                        <div for="dificil" class="col-lg-6 dificil">
                            <input class="radiostyle sr-only" type="radio" id="dificil" name="dificuldades"/>
                            <label for="dificil">Díficil</label>
                        </div>
                    </fieldset>
                </div>

                <div class="sub-titulos col-lg-12">
                    <span>Tempo de Preparo</span>

                    <div class="clock">
                        <div class="hour">
                            <div><span class="previous"></span></div>
                            <div><span class="current">00</span></div>
                            <div><span class="next"></span></div>
                        </div>
                        <span>:</span>
                        <div class="minute">
                            <div><span class="previous"></span></div>
                            <div><span class="current">00</span></div>
                            <div><span class="next"></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="titulos col-lg-12">
                    <span>Ingredientes e porções</span>
                </div>

                <div class="sub-titulos col-lg-12">
                    <input type='number' min='1' max='20' class='col-8'></input>
                </div>

                <div class="sub-titulos col-lg-6">

                    <span>Ingredientes</span>
                    <div class="ing-inicio col-lg-12" id="ingrediente-inicio">
                        <div class="ingrediente col-lg-12" id="ingrediente">
                            <input class="col-lg-4" placeholder="Ingrediente" id="nome-ing">
                            <input class="col-lg-2" placeholder="Qtd" id="qtd">
                            <select class="col-lg-4" name="medida" id="medida">
                                <option value="ml">ML</option>
                                <option value="gramas">Gramas</option>
                            </select>
                            <button class="btnAdiciona" onclick="copy()">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="offset-lg-5 col-lg-2 btnCadastrar" id="btnCadastrar">CADASTRAR RECEITA</button>
    </div> 
    <?php
    include "footer.php";
    ?>
</body>
</html>