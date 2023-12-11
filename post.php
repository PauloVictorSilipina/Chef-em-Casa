<?php

class POST{
	

	private $conn;
	
	public function __construct($db){
		$this->conn = $db;
	}

	public function dadosIndex() {
		$query = "
		SELECT m.url FotoRec, r.nome NomeRec, u.img FotoUser, r.cod_rec CodRec from RECEITA r
    	left join MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec
    	left join USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil
		order by r.cod_rec DESC";

	$stmt = $this->conn->prepare($query);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $results;
	}

	public function cadastroUsuario($usuario, $email, $senha) {
		
		$query1 = "
		SELECT email FROM USUARIO";
		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		
		$results1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$batata = True;
		foreach($results1 as $i) {
			if($i['email'] === $email){
				$batata = False;
			}
		}
		if($batata === True) {
		$query2 = "
		INSERT INTO USUARIO(nome, email, senha, img) VALUES('$usuario', '$email', '$senha', 'https://pm1.aminoapps.com/6324/71ad536b28ec83adc5070a41d26ce288d091473d_00.jpg')";

		$stmt = $this->conn->prepare($query2);
		$stmt->execute();

		$query3 = "SELECT cod_perfil FROM USUARIO WHERE email = '" . $email."'";
		
		/*$arquivo = fopen("banana.txt","w");
		echo fwrite($arquivo, $query3);
		fclose($arquivo);*/

		$stmt = $this->conn->prepare($query3);
		$stmt->execute();
		$results3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$resultado = array($usuario, $results3, 'https://pm1.aminoapps.com/6324/71ad536b28ec83adc5070a41d26ce288d091473d_00.jpg');

		return $resultado;
		} else {
			return False;
		}
	}

	public function loginUsuario($email, $usuario, $senha) {
		$query1 = "
		SELECT * from USUARIO";
		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$batata = False;

		foreach($results as $i) {

			if(($i['email'] === $email) and ($i['senha'] === $senha) and ($i['nome'] === $usuario)) {
				$query2 = "SELECT cod_perfil FROM USUARIO WHERE email = '" . $email."'";
				$stmt = $this->conn->prepare($query2);
				$stmt->execute();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				$batata = True;
				$user = array($usuario, $i['img'], $results[0]['cod_perfil']);
			}
		}

		if($batata === True) {
			return $user;
		} else {
			return False;
		}
	}

	public function receitasCriadas($id) {
		$query1 = "
		SELECT r.cod_rec CodRec, r.nome NomeRec, m.url FotoRec from RECEITA r left join MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec where r.fk_USUARIO_cod_perfil =" . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function infoRec($id) {
		$query1 = "
		SELECT r.nome RecNome, r.url RecImg, r.porcao RecRend, r.temp_preparo RecTemp, r.dificuldade RecDif, u.img UsuImg, u.nome UsuNome, r.descricao RecDesc From RECEITA r
		LEFT JOIN USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil 
		WHERE r.cod_rec = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function infoIngredientes($id){
		$query1 = "
		SELECT ri.qtd, ri.medida, ri.ingrediente from RECEITA_INGREDIENTE ri 
		left join RECEITA r on r.cod_rec = ri.fk_RECEITA_cod_rec 
		where r.cod_rec = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function infoPreparo($id) {
		$query1 = "
		SELECT mp.modo_preparo FROM MODO_PREPARO mp 
		left join RECEITA r on r.cod_rec = mp.FK_RECEITA_cod_rec 
		WHERE r.cod_rec = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function comentario($id) {
		$query1 = "
		SELECT u.cod_perfil UsuCod, u.img, u.nome, c.COMENTARIO FROM COMENTA c  
		left join RECEITA r on r.cod_rec = c.fk_RECEITA_cod_rec 
		LEFT JOIN USUARIO u on u.cod_perfil = c.fk_USUARIO_cod_perfil 
		WHERE r.cod_rec = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function deletarPerfil($id) {
		$query1 = "
		delete from USUARIO where cod_perfil=" . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();	
	}

	public function pesquisaReceita($pesquisa) {
		$query = "
		SELECT r.cod_rec CodRec, m.url FotoRec, r.nome NomeRec, r.descricao  from RECEITA r
		left join MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec
		where r.nome like '%".$pesquisa."%';";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
		return $results;
	}

	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}

	public function cadastroReceita($dados) {
		if ($dados["imagem"]["size"] > 0){
			$client_id = "450e282f79474c3";
			$filename = $_FILES['foto']['tmp_name'];
			
			$image_data = file_get_contents($filename);
			$image_data_base64 = base64_encode($image_data);
			
			$api_url = 'https://api.imgur.com/3/image.json';
			
			$headers = [
				'Authorization: Client-ID ' . $client_id,
				'Content-Type: application/x-www-form-urlencoded'
			];
			
			$postData = http_build_query(['image' => $image_data_base64]);
			
			$options = [
				'http' => [
					'header' => implode("\r\n", $headers),
					'method' => 'POST',
					'content' => $postData
				]
			];
			
			$context = stream_context_create($options);
			$result = file_get_contents($api_url, false, $context);
			
			if ($result === FALSE) {
				echo "Erro ao enviar arquivo para o Imgur";
			} else {
				$response = json_decode($result, true);
				$foto = $response['data']['link'];
			}
		
		$query = "
		insert into RECEITA (nome, temp_preparo, porcao, descricao, FK_USUARIO_cod_perfil, dificuldade,url,modopreparo) value 
		(".$dados['titulo'].",".$dados['tempopreparo'].",".$dados['quantidade'].",".$dados['descrição'].",".$dados['user'].",".$dados['dificuldade'].",".$foto.",".$dados["modopreparo"]")";

		debug_to_console($query);

		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		query = "SELECT cod_rec from RECEITA r where FK_USUARIO_cod_perfil = ".$dados['user']. "order by cod_rec DESC ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$codigo = $stmt->fetch(PDO::FETCH_ASSOC);
		
		for($i=0;$i<count($dados["nomeIng"]);$i++){
			$query = "Insert into RECEITA_INGREDIENTE (FK_RECEITA_cod_rec,qtd,ingrediente,medida) values (".$codigo.",".$dados["quantidadeIng"][$i].",".$dados["nomeIng"][$i].",".$dados["medidaIng"][$i].")";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
		}
		return $query
		}
	}
}
?>


