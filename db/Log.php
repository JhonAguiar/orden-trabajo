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

		function validator($ele1 , $ele2){
			$array = array(
				'user' => addslashes(trim($ele1)),
				'pass' => addslashes(trim($ele2))
			);
			return $array;
		}

		public function logIn($usuario, $password){
			$response = array();

			$arreg = $this->validator($usuario, $password);

			$sql = "SELECT * FROM usuario WHERE usuario = '".$arreg["user"]."' and contrasena = ".$arreg["pass"]."";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

	

	}


?>