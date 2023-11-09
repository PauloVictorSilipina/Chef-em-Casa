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
    	where r.cod_rec <=5";

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

	public function receitasFavoritas($id) {
		$query1 = "
		SELECT r.nome RecNome, m.url RecImg from CURTIR c 
		inner join RECEITA r on r.cod_rec = c.fk_RECEITA_cod_rec 
		inner join USUARIO u on u.cod_perfil = c.fk_USUARIO_cod_perfil 
		left join MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec 
		where u.cod_perfil = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function infoRec($id) {
		$query1 = "
		SELECT r.nome RecNome, m.url RecImg, r.porcao RecRend, r.temp_preparo RecTemp, d.dificuldade RecDif, u.img UsuImg, u.nome UsuNome, r.descricao RecDesc From RECEITA r
		LEFT JOIN MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec 
		LEFT JOIN USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil 
		left join DIFICULDADE d on d.cod_dificuldade = r.FK_DIFICULDADE_cod_dificuldade 
		WHERE r.cod_rec = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	public function infoIngredientes($id){
		$query1 = "
		SELECT ri.qtd, m.medida, i.nome FROM RECEITA r
		left join RECEITA_INGREDIENTE ri on ri.fk_RECEITA_cod_rec = r.cod_rec 
		LEFT JOIN INGREDIENTE i on i.cod_ingrediente  = ri.fk_INGREDIENTE_cod_ingrediente 
		LEFT JOIN MEDIDA m on m.cod_medida = ri.fk_MEDIDA_cod_medida_ 
		WHERE r.cod_rec = " . $id;

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
		SELECT u.img, u.nome, c.COMENTARIO FROM COMENTA c  
		left join RECEITA r on r.cod_rec = c.fk_RECEITA_cod_rec 
		LEFT JOIN USUARIO u on u.cod_perfil = c.fk_USUARIO_cod_perfil 
		WHERE r.cod_rec = " . $id;

		$stmt = $this->conn->prepare($query1);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}

	/*
	//Construtor - cria uma instância PDO que representa a conexão com o banco de dados
	public function __construct($db){
		$this->conn = $db;
	}
	
	//Obtendo POST do banco de dados
	public function read(){
		//Criando query
		$query = 'SELECT id, titulo FROM ' . $this->table . ' ORDER BY id DESC';
		
		//Preparando a execução da consulta
		$stmt = $this->conn->prepare($query);
		//Executa query
		$stmt->execute();
		
		return $stmt;
		
	}
	
	public function read_single(){
		//Criando query
		$query = 'SELECT id, titulo FROM ' . $this->table . ' WHERE id = ? LIMIT 1';
		
		//Preparando a execução da consulta
		$stmt = conn->prepare($query);
		
		//Indicando o parâmetro na consulta
		$stmt->bindParam(1,$this->id);
		
		//Executa query
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id'];
		$this->titulo = $row['titulo'];
		
	
		return $stmt;
		
	}
	
	public function create(){
		$query = 'INSERT INTO '. $this->table . ' SET titulo = :titulo';
		
		//prepare statement
		$stmt = $this->conn->prepare($query);
		//clean data
		$this->titulo = htmlspecialchars(strip_tags($this->titulo));
		
		//binding of parameters
		$stmt->bindParam(':titulo', $this->titulo);
		
		//execute the query
		if($stmt->execute()){
			return true;
			
		}
		
		//print erro if something goes wrong
		printf("Error %s. \n", $stmt->error);
		
		return false;
	}
	
	public function update(){
		$query = 'UPDATE '. $this->table . ' SET titulo = :titulo WHERE id = :id';
		
		//prepare statement
		$stmt = $this->conn->prepare($query);
		//clean data
		$this->titulo = htmlspecialchars(strip_tags($this->titulo));
		$this->id = htmlspecialchars(strip_tags($this->id));
		
		//binding of parameters
		$stmt->bindParam(':titulo', $this->titulo);
		$stmt->bindParam(':id', $this->id);
		
		//execute the query
		if($stmt->execute()){
			return true;
			
		}
		
		//print erro if something goes wrong
		printf("Error %s. \n", $stmt->error);
		
		return false;
	}
	
	
	public function delete(){
		$query = 'DELETE FROM '. $this->table . ' WHERE id = :id';
		
		//prepare statement
		$stmt = $this->conn->prepare($query);
		//clean data
		$this->id = htmlspecialchars(strip_tags($this->id));
		
		//binding of parameters
		$stmt->bindParam(':id', $this->id);
		
		//execute the query
		if($stmt->execute()){
			return true;
			
		}
		
		//print erro if something goes wrong
		printf("Error %s. \n", $stmt->error);
		
		return false;
	}
	*/
}
?>