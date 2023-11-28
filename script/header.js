async function pesquisa(search) {
    let dados = {"pesquisa": search};
    let json = JSON.stringify(dados);
    let resposta = await fetch('http://localhost:4443/php/search.php', {
    method: 'POST',
    body: json,
    headers: { 'Content-Type': 'application/json'}
    });
    let sendJson = await resposta.json();
    sendJson.forEach(write);   
}
function write(item, index){
    console.log(item);
    let container = document.getElementById("resultado-pesquisa");
    let texto = '<div class="recdiv">';
    texto+='<div class="row receita offset-lg-2 col-lg-8">';
    texto+='<div class="col-lg-4">';
    texto+='<img src="'+item['FotoRec'] +'" alt="">';
    texto+='</div>';
    texto+='<div class="offset-lg-1 col-lg-7">';
    texto+='<h3 class="titulorec">'+item['NomeRec']+'</h3>';
    texto+='<span id="descrec" class="descrec">'+item['descricao']+'</span>';
    texto+='</div>';
    texto+='</div>';
    texto+='</div>';
    container.innerHTML+=texto;
}
document.getElementById("btn-pesquisa").addEventListener("click", pesquisa);