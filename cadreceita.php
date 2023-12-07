<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'imports.html'?>
    <script src="script/cadrec.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <div class='dados-cad-rec col-12 row'>
            <div class='adicionar-imagem col-lg-4 offset-lg-0 col-12'>
                <div class='imagem col-lg-8 offset-lg-2 col-11 offset-1'><img id="foto-img" src='https://i.imgur.com/ay14UT1.png'></div>
                <input type="file" id="file-input" name="file-input"/>
                <label  class="col-lg-8 offset-lg-2 col-11 offset-1" id="file-input-label" for="file-input">Escolha uma imagem</label>
            </div>

            <div class="col-lg-8 col-12">
                <div class='col-lg-12 offset-lg-0 col-11 offset-1 titulo-rec'><input class='col-12' id=title type='text' placeholder='Titulo da Receita'></div>
                <div class="vazia"></div>
                <div class='col-lg-12 offset-lg-0 col-11 offset-1 desc-rec'><textarea placeholder='Descrição da receita' id='desc-red'></textarea></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <span class="sub-titulos">Dificuldade</span>
                <fieldset class='dificuldades'>
                    <select class="col-lg-6" name="medida" id="dif">
                        <option value="facil">Fácil</option>
                        <option value="medio">Médio</option>
                        <option value="dificil">Dificil</option>
                    </select>
                </fieldset>
            </div>

            <div class="col-lg-4">
                <span class="sub-titulos">Tempo de Preparo (em minutos)</span>
                <div class="slidecontainer row">
                    <input type="range" min="1" max="100" value="1" class="col-lg-8 offset-1 col-8 offset-1 slider" id="myRange">
                    <div class="divTempoDePreparo col-lg-2 col-2">
                        <span id="tempoDePreparo">1</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <span class="sub-titulos">Número de pessoas ou porções</span><br>
                <div class="row no-gutters">
                    <input class="col-lg-2 col-2 offset-1" id="porc"></input>
                    <select class="col-lg-3 col-4" name="medida" id="dif">
                        <option value="porcao">Porções</option>
                        <option value="pedaco">Pedaços</option>
                        <option value="prato">Pratos</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 col-11 offset-lg-0">
                    <span class="sub-titulos">Ingredientes</span>
                    <div class="ing-inicio col-lg-6 offset-lg-0 offset-1" id="ingrediente-inicio">
                        <div class="ingrediente col-lg-12 row" id="ingrediente">
                            <input class="col-lg-4 col-4" placeholder="Ingrediente" id="nome-ing">
                            <input class="col-lg-3 col-3" placeholder="Qtd" id="qtd">
                            <select class="col-lg-3" name="medida" id="medida">
                                <option value="ml">ML</option>
                                <option value="gramas">Gramas</option>
                                <option value="unidade">Unidades</option>
                            </select>
                            <div class="col-lg-2 col-2">
                                <button class="btnAdiciona" onclick="copy()"><span>+<span></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <span class="sub-titulos">Preparo</span>
                    <div class="modopreparo col-lg-6">
                        <textarea class="col-lg-12" id="prep" placeholder="Digite um passo por linha"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="offset-lg-5 col-lg-2 btnCadastrar" id="btnCadastrar">Enviar minha receita</button>
    </div> 
    <?php
    include "footer.php";
    ?>
</body>
</html>