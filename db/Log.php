<?php
	require_once "Conectar.php";
	/**
	 * Clase de Login and Logout
	 */
	class Log {

		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		public function logIn($usuario, $password){
			$response = array();
			$sql = "SELECT * FROM usuario WHERE usuario = '".$usuario."' and contrasena = ".$password."";
			//$sql = "SELECT * FROM usuario";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

	}


?>