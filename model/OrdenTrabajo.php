<?php

	require_once "../db/conectar.php";

	class OrdenTrabajo{

		private $conexion;

		public function __construct(){
			$this->conexion = Conectar::conexion();
		}

		/**
		 * LISTAR TIPOS DE ORDEN DE TRABAJO
		 */
		public function tipoOt(){
			$sql = "SELECT * FROM tipo_ot";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response;
		}

		/**
		 * LISTAR ANUNCIANTES ORDENES DE TRABAJO
		 */
		public function ordenTrabajo($id){
			$sql = "SELECT * FROM anunciante where cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			if(mysqli_num_rows($result) != 0){
				return $response;
			}else{
				return 0;
			}
			
		}

		/**
		 * SELECCIONAR EL NIT DEL CLIENTE
		 */
		public function ordenNit($id){
			$sql = "SELECT nit FROM cliente where id_cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response[0];
		}


		/**
		 * LISTAR ORDENES DE TRABAJO
		 */
		public function listarOrdenTrabajo(){
			$sql = "SELECT ot.id_orden_trabajo , cli.cliente , an.nombre , tot.tipo FROM orden_trabajo as ot INNER JOIN cliente as cli on cli.id_cliente = ot.cliente INNER JOIN anunciante as an ON ot.anunciante = an.id_anunciante INNER JOIN tipo_ot as tot ON tot.id_tipo = ot.tipo_ot";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response;
		}
	}

?>