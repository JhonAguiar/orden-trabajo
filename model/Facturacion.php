<?php

	require_once "../db/conectar.php";

	/**
	 * class Facturación
	 * posee los metodos de interacción con Facturación
	 * @author Jhon Aguiar Moreno , Giovanny Arturo Rincon
	 */
	class Facturacion{
		
		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		/**
		 * Completar datos monedas 
		 */	
		public function moneda(){
			$response = array();
			
			$sql = "SELECT id_tipo_moneda , descripcion FROM tipo_moneda";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		/**
		 * Completar los datos del cliente
		 */
		public function completeCliente($id){
			$sql = "SELECT * FROM cliente where id_cliente = $id";

			$result = $this->conexion->query($sql);

			$row = $result->fetch_assoc();

			return $row;
		}

		/**
		 * Listar las ordenes de trabajo
		 */
		public function listarOT($id){

			$sql = "SELECT ord.* , cli.nit , cli.cliente as nombrecliente FROM orden_trabajo as ord  INNER JOIN cliente as cli ON cli.id_cliente = ord.cliente where ord.cliente = $id";

			$result = $this->conexion->query($sql);
			$row = $result->fetch_assoc();

			return $row;
		}

	}
?>