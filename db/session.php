<?php
	
	include_once "db.php";
	/**
	 * Clase de Login and Logout
	 */
	class Log {
		public static function logIn($usuario, $password, &$resultado){
			$conexion = new Conectar();
			$conexion::conexion();
			$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena = '$password'";

		}

		public static function logOut(){
			session_start();
			session_destroy();
			header('location : index.php');
		}
	}


?>