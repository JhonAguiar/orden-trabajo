<?php

	require_once "../db/conectar.php";

	class General{
		
		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		/**
		 * Funcion listar ciudades
		 */
		public function ciudad(){
			$response = array();
			
			$sql = "SELECT id_ciudad , codigo, ciudad, departamento FROM ciudad";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		/**
		 * Funcion crear ciudad
		 */
		public function crearCiudad($codigo , $ciudad , $departamento , $validar){
			$codigo = $codigo;
			$ciudad = $ciudad;
			$departamento = $departamento;
			$validar = $validar;
			if($validar == 1){
				$sql = "INSERT INTO 
					ciudad (
						codigo , 
						ciudad , 
						departamento
					) values (
						'".$codigo."' , 
						'".$ciudad."' , 
						'".$departamento."')";
			}else{
				$sql = "UPDATE 
							ciudad 
						SET 
							codigo='".$codigo."', 
							ciudad='".$ciudad."' , 
							departamento='".$departamento."' 
						WHERE 
							codigo = '".$codigo."'";
			}

			$result = $this->conexion->query($sql);
			
			return $result;
		}

		/**
		 * Funcion eliminar ciudad
		 */
		public function elimCiudad($codigo){

			$sql = "DELETE FROM ciudad WHERE codigo = '".$codigo."'";

			$result = $this->conexion->query($sql);
			
			return $codigo;
		}


		/**
		 *  listar Productos
		 */
		public function listarProd(){
			$sql = "SELECT * FROM producto";

			$result = $this->conexion->query($sql);

			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		/**
		 * Eliminar producto
		 */
		public function elimProducto($id){
			$sql = "DELETE FROM producto WHERE id_producto = '".$id."'";

			$result = $this->conexion->query($sql);
			
			return $id;
		}

		/**
		 * Enviar producto
		 */
		public function enviarProducto($data){
			$array =  array($data);
			$cod_producto = $array[0]["cod_producto"];
			$producto = $array[0]["producto"];
			$validar = $array[0]["valid"];
			if($validar == 1){
				$sql = "INSERT INTO 
					producto (
						id_producto , 
						producto
					) values (
						'".$cod_producto."' , 
						'".$producto."')";
			}else{
				$sql = "UPDATE 
							producto 
						SET 
							producto ='".$producto."' 
						WHERE 
							id_producto = '".$cod_producto."'";
			}

			$result = $this->conexion->query($sql);
			
			return $result;
		}

	}

?>