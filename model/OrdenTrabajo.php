<?php

	require_once "../db/conectar.php";

	class OrdenTrabajo{

		private $conexion;

		public function __construct(){
			$this->conexion = Conectar::conexion();
		}

		public function ordenTrabajo($id){
			$sql = "SELECT * FROM anunciante where cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function ordenNit($id){
			$sql = "SELECT nit FROM cliente where id_cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response[0];
		}

	}

?>