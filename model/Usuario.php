<?php

	require_once "../db/conectar.php";

	class Usuario{

		private $conexion;

		public function __construct(){
			$this->conexion = Conectar::conexion();
		}

		public function rol(){
			$response = array();
			
			$sql = "SELECT * FROM rol";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function listUser(){

			$sql = "SELECT * FROM usuario";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function completUser($id){

			$sql = "SELECT * FROM usuario WHERE identificacion = '".$id."'";
            
			$result = $this->conexion->query($sql);

			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response[0];
		}

		public function envioDatos($datos){
			$array =  array($datos);
			$validar = $array[0]["valid"];
			$id = $array[0]["id_usuario"];
			$nombre = $array[0]["nombre"];
			$identificacion = $array[0]["identificacion"];
			$usuario = $array[0]["usuario"];
			$fecnac = $array[0]["fec_nac"];
			$direccion = $array[0]["direccion"];
			$ciudad = $array[0]["ciudad"];
			$correo = $array[0]["correo"];
			$contrasena = $array[0]["contrasena"];
			$pass2 = $array[0]["pass2"];
			$telefono = $array[0]["telefono"];
			$rol = $array[0]["rol"];
			//FALTA LA FOTO
			$foto = "";

			if($validar == 1){
				$sql = "INSERT INTO usuario ( identificacion, usuario, nombre, contrasena, fec_nac, direccion, foto, ciudad, correo, telefono, rol) values ( '$identificacion','$usuario','$nombre','$contrasena','$fecnac','$direccion','$foto','$ciudad','$correo','$telefono','$rol')";
			}else{
				$sql = "UPDATE 
						usuario 
					SET 
						id_usuario = '$id' , 
						identificacion = '$identificacion' ,
						usuario = '$usuario',
						nombre = '$nombre',
						contrasena = '$contrasena',
						fec_nac = '$fecnac',
						direccion = '$direccion',
						foto = '$foto',
						ciudad = '$ciudad',
						correo = '$correo',
						telefono = '$telefono',
						rol = '$rol'
					WHERE 
						id_usuario = '$id'";
			}

			$result = $this->conexion->query($sql);

			return $result;
		}

		public function eliminarUsuario( $id ){

			$sql = "DELETE FROM usuario WHERE identificacion = '$id'";

			$result = $this->conexion->query($sql);

			return $result;
		}

	}

?>