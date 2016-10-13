<?php

	require_once "conectar.php";

	class General{
		
		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		public function ciudad(){
			$response = array();
			
			$sql = "SELECT * FROM ciudad";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

	}

?>