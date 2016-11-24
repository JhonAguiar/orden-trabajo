<?php

	require_once "../db/conectar.php";

	class OrdenTrabajo{

		private $conexion;

		public function __construct(){
			$this->conexion = Conectar::conexion();
		}

		public function ordenTrabajo($id){
			$sql = "SELECT an.* , cli.nit FROM anunciante as an INNER JOIN cliente as cli ON cli.id_cliente = an.cliente where an.cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

	}

?>