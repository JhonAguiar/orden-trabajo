<?php

	require_once "../db/conectar.php";

	class Usuario{

		private $conexion;

		public function __construct(){
			$this->conexion = Conectar::conexion();
		}

		public function rol(){
			$response = array();
			
			$sql = "SELECT * FROM rol";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function listUser(){

			$sql = "SELECT * FROM usuario";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function completUser($id){

			$sql = "SELECT * FROM usuario WHERE identificacion = '".$id."'";
            
			$result = $this->conexion->query($sql);

			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response[0];
		}

		public function envioDatos($datos){
			
			return $datos;
		}

	}

?>