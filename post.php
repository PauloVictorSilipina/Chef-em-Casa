<?php

class POST{
	

	private $conn;
	private $table='RECEITA';
	
	//Propriedades POST
	public $id;
	public $titulo;
	
	public function __construct($db){
		$this->conn = $db;
	}

	public function dadosIndex() {
		$query = "
		SELECT m.url FotoRec, r.nome NomeRec, u.img FotoUser from RECEITA r
    	left join MIDIA m on m.FK_RECEITA_cod_rec = r.cod_rec
    	left join USUARIO u on u.cod_perfil = r.FK_USUARIO_cod_perfil
    	where r.cod_rec <=5";

	$stmt = $this->conn->prepare($query);
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