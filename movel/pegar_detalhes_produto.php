<?php
 
/*
 * O codigo seguinte retorna os dados detalhados de um produto.
 * Essa e uma requisicao do tipo GET. Um produto e identificado 
 * pelo campo id.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
 
	// Verifica se o parametro id foi enviado na requisicao
	if (isset($_GET["id"])) {
		
		// Aqui sao obtidos os parametros
		$id = $_GET['id'];
	 
		// Obtem do BD os detalhes do produto com id especificado na requisicao GET

		$consulta = $db_con->prepare("
		SELECT r.nome RecNome, m.url RecImg, r.porcao RecRend, r.temp_preparo RecTemp, r.dificuldade RecDif, u.img UsuImg, u.nome UsuNome, r.descricao RecDesc, mp.modo_preparo From RECEITA r
		LEFT JOIN MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec 
		LEFT JOIN USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil 
		left join MODO_PREPARO mp on mp.fk_RECEITA_cod_rec = r.cod_rec 
		left join RECEITA_INGREDIENTE ri on ri.fk_RECEITA_cod_rec = r.cod_rec 
		WHERE r.cod_rec = " . $id); // Referente ao criador, foto, dificuldade, etc (primeira coisa que aparece no web tbm)

		

	 
		if ($consulta->execute()) {
			if ($consulta->rowCount() > 0) {

				// Fazer todos os selects se a receita existir (fazer ainda)

				// Se o produto existe, os dados completos do produto 
				// sao adicionados no array de resposta. A imagem nao                              
				// e entregue agora pois ha um php exclusivo para obter 
				// a imagem do produto.
				$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	 
				$resposta["nome"] = $linha["RecNome"];
				$resposta["descricao"] = $linha["RecDesc"];
				$resposta["img"] = $linha["RecImg"];
				$resposta["criado_por"] = $linha["UsuNome"];
				$resposta["dificuldade"] = $linha["RecDif"];
				$resposta["rendimento"] = $linha["RecRend"];
				$resposta["tempo"] = $linha["RecTemp"];
				$list = [];
				$prepList = explode(";",$linha["modo_preparo"]);
				for($i = 0;$i<sizeof($prepList);$i++){
					array_push($list,$prepList[$i]);
				}
				$resposta["preparo"] = $list;
				
				$consulta = $db_con->prepare("
				SELECT ri.qtd, ri.medida, ri.ingrediente FROM RECEITA_INGREDIENTE ri
				WHERE ri.fk_RECEITA_cod_rec = " . $id);
				
				$consulta->execute();
				$linha = $consulta->fetchAll(PDO::FETCH_ASSOC);
				$list = [];
				for($i = 0;$i<sizeof($linha);$i++){
					$string = strval($linha[$i]["qtd"]) + " " + $linha[$i]["medida"] + " de " + $linha[$i]["ingrediente"];
					array_push($list,$string);
				}
				$resposta["ingredientes"] = $list;
				// Caso o produto exista no BD, o cliente 
				// recebe a chave "sucesso" com valor 1.
				$resposta["sucesso"] = 1;
				
			} else {
				// Caso o produto nao exista no BD, o cliente 
				// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
				// motivo da falha.
				$resposta["sucesso"] = 0;
				$resposta["erro"] = "Produto não encontrado";
			}
		} else {
			// Caso ocorra falha no BD, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido não preenchido";
	}
}
else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["error"] = "usuario ou senha não confere";
}
// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>
