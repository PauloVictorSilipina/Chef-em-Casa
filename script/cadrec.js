function copy() {
  const node = document.getElementById("ingrediente");
  const clone = node.cloneNode(true);
  document.getElementById("ingrediente-inicio").appendChild(clone);
}

async function cadastro() {
  let dif = document.getElementById("dif").value;
  let titulo = document.getElementById("title").value;
  let desc = document.getElementById("desc-red").value;
  let tempPrep = document.getElementById("tempoDePreparo").value;
  let quant = document.getElementById("porc").value;
  document.getElementById("desc-red").value;
  let dados = {};
  let json = JSON.stringify(dados);
  let image = document.getElementById('file-input').files;
  console.log(image);
  /*
  let resposta = await fetch('http://localhost:4443/php/search.php', {
  method: 'POST',
  body: json,
  headers: { 'Content-Type': 'application/json'}
  });
  let sendJson = await resposta.json();
  sendJson.forEach(write);   
  */
}

function updateImageDisplay(){
  let val = document.getElementById('file-input');
  const reader = new FileReader();

  reader.onload = (event) => {
    document.getElementById("foto-img").src = event.target.result;
  }

  reader.readAsDataURL(val.files[0]);
  //document.getElementById("foto-img").src = image;
}

document.getElementById("file-input").addEventListener("change", updateImageDisplay);
document.getElementById("btnCadastrar").addEventListener("click", cadastro); 
var rangeInput = document.getElementById("myRange");

    var spanTempoDePreparo = document.getElementById("tempoDePreparo");


    // When the slider value changes, update the span element's text

    rangeInput.oninput = function() {

        spanTempoDePreparo.textContent = this.value;

    }

