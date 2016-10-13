<?php
	
	/**
	 * Clase de conexión a la base de datos de las ordenes de compra
	 */
	class Conectar {


		public static function conexion(){

			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "ordenes-trabajo";

	        $conexion = new mysqli($host, $user, $pass, $db);
	        
	        return $conexion;
	    }
	}


?>