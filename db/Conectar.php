<?php
	
	/**
	 * Clase de conexión a la base de datos de las ordenes de compra
	 */
	class Conectar {

		public static function conexion(){

			$host = "localhost";
			$user = "oTUser";
			$pass = "aHJDSsxas12";
			$db = "ordenes-trabajo";

	        $conexion = new mysqli($host, $user, $pass, $db);

	        $conexion->set_charset("utf8");

	        return $conexion;
	    }
	}


?>