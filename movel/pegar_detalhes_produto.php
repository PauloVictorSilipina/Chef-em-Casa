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

		$consultaInfoReceita = $db_con->prepare("
		SELECT r.nome RecNome, m.url RecImg, r.porcao RecRend, r.temp_preparo RecTemp, d.dificuldade RecDif, u.img UsuImg, u.nome UsuNome, r.descricao RecDesc From RECEITA r
		LEFT JOIN MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec 
		LEFT JOIN USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil 
		left join DIFICULDADE d on d.cod_dificuldade = r.FK_DIFICULDADE_cod_dificuldade 
		WHERE r.cod_rec = " . $id); // Referente ao criador, foto, dificuldade, etc (primeira coisa que aparece no web tbm)

		$consultaIngrediente = $db_con->prepare("
		SELECT ri.qtd, m.medida, i.nome FROM RECEITA r
		left join RECEITA_INGREDIENTE ri on ri.fk_RECEITA_cod_rec = r.cod_rec 
		LEFT JOIN INGREDIENTE i on i.cod_ingrediente  = ri.fk_INGREDIENTE_cod_ingrediente 
		LEFT JOIN MEDIDA m on m.cod_medida = ri.fk_MEDIDA_cod_medida_ 
		WHERE r.cod_rec = " . $id);

		$consultaModoPreparo = $db_con->prepare("SELECT mp.modo_preparo FROM MODO_PREPARO mp 
		left join RECEITA r on r.cod_rec = mp.FK_RECEITA_cod_rec 
		WHERE r.cod_rec = " . $id);

		$consultaComentarios = $db_con->prepare("SELECT u.cod_perfil UsuCod, u.img, u.nome, c.COMENTARIO FROM COMENTA c  
		left join RECEITA r on r.cod_rec = c.fk_RECEITA_cod_rec 
		LEFT JOIN USUARIO u on u.cod_perfil = c.fk_USUARIO_cod_perfil 
		WHERE r.cod_rec = " . $id);
	 
		if ($consulta->execute()) {
			if ($consulta->rowCount() > 0) {

				// Fazer todos os selects se a receita existir (fazer ainda)

				// Se o produto existe, os dados completos do produto 
				// sao adicionados no array de resposta. A imagem nao 
				// e entregue agora pois ha um php exclusivo para obter 
				// a imagem do produto.
				$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	 
				$resposta["nome"] = $linha["nome"];
				$resposta["preco"] = $linha["preco"];
				$resposta["descricao"] = $linha["descricao"];
				$resposta["img"] = $linha["img"];
				$resposta["criado_em"] = $linha["criado_em"];
				$resposta["criado_por"] = $linha["usuarios_login"];
				
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