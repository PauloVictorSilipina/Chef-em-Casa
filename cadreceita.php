<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'imports.html'?>
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
        <div class='dados-cad-rec col-12 row'>
            <div class='adicionar-imagem col-lg-4 offset-lg-0 col-12'>
                <div class='imagem'><img id="foto-img" src=''></div>
                <input type="file" id="file-input" name="file-input"/>
                <label id="file-input-label" for="file-input">Escolha uma imagem</label>
            </div>

            <div class="col-lg-8 col-12">
                <div class='col-lg-12 titulo-rec'><input class='col-12' id=title type='text' placeholder='Titulo da Receita'></div>
                <div class="vazia"></div>
                <div class='col-lg-12 desc-rec'><textarea placeholder='Descrição da receita' id='desc-red'></textarea></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="sub-titulos col-lg-4">
                <span>Dificuldade</span>
                <fieldset class='dificuldades'>
                    <select class="col-lg-6" name="medida" id="dif">
                        <option value="facil">Fácil</option>
                        <option value="medio">Médio</option>
                        <option value="dificil">Dificil</option>
                    </select>
                </fieldset>
            </div>

            <div class="sub-titulos col-lg-4">
                <span>Tempo de Preparo (em minutos)</span>
                <div class="slidecontainer row">
                    <input type="range" min="1" max="100" value="50" class="col-lg-10" id="myRange">
                    <div class="divTempoDePreparo col-lg-2">
                        <span id="tempoDePreparo"> </span>
                    </div>
                </div>
            </div>

            <div class="sub-titulos col-lg-4">
                <span>Número de pessoas ou porções</span>
                <input type='number' min='1' max='20' class='col-6' id="porc"></input>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <div class="titulos col-lg-4">
                <span>Ingredientes e porções</span>
            </div>
            <div class="row">
                <div class="sub-titulos col-lg-6">
                    <span>Ingredientes</span>
                    <div class="ing-inicio col-lg-6" id="ingrediente-inicio">
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
                
                <div class="sub-titulos col-lg-6">
                    <textarea class="col-lg-12">
                    </textarea>
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