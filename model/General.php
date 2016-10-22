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

	}

?>