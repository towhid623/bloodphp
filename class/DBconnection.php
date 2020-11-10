<?php
class DBconnection{
	
	
	private $conn;
	
	public function __construct(){
		
		$this->conn = new PDO("mysql:host=localhost;dbname=bloodquest", "root", "");
		
		if($this->conn){

		}
	}

	public function getAlldata($query){

	 	 $sql = $this->conn->query($query);
	     $data = $sql->fetchAll(PDO::FETCH_ASSOC);
	     return $data;

	 }

	public function insertData($query){
	$sql = $this->conn->exec($query);

	$id= $this->conn->lastInsertId(); 
	return $sql ? $id : 0; 


	}

	public function updateData($query){
	$sql = $this->conn->exec($query);
	return $sql ? 1 : 0;

	}

	public function deleteData($query){
	$sql = $this->conn->exec($query);
	return $sql ? 1 : 0;

	}

	
		
}




?>