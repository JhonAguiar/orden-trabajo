<?php

	require_once "../db/conectar.php";

	class Usuario{

		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		public function listUser(){

			$sql = "SELECT * FROM usuario";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function completeUser($id){

			$sql = "SELECT * FROM usuario where identificacion = ".$id."";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;

		}

	}

?>