<?php

	require_once "../db/conectar.php";

	class Facturacion{
		
		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		public function facturacion(){

		}

		public function moneda(){
			$response = array();
			
			$sql = "SELECT id_tipo_moneda , descripcion FROM tipo_moneda";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

	}
?>