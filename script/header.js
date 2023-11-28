async function pesquisa() {
    let text = document.getElementById("input-pesquisa").value;
    let dados = {"pesquisa": text};
    let json = JSON.stringify(dados);
    let resposta = await fetch('http://localhost:4443/php/search.php', {
    method: 'POST',
    body: json,
    headers: { 'Content-Type': 'application/json'}
    });
    let sendJson = await resposta.json();
    console.log(sendJson);
}
document.getElementById("btn-pesquisa").addEventListener("click", pesquisa);