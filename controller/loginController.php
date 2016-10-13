<?php
session_start();
require_once "../db/Log.php";

$user = $_POST['usuario'];
$pass = intval($_POST['clave']);

$log = new Log();

$datos = $log->logIn($user, $pass);

if(empty($log->logIn($user, $pass))){
	$_SESSION['valido'] = false;
	header("location: ../index.php");
}else{
	$datos = $log->logIn($user, $pass);
	$_SESSION['valido'] = true;
	$_SESSION['usuario'] = $datos[0]["usuario"];
	$_SESSION['nombre'] = $datos[0]["nombre"];
	$_SESSION['fec_nac'] = $datos[0]["fec_nac"];
	$_SESSION['contrasena'] = $datos[0]["contrasena"];
	$_SESSION['identificacion'] = $datos[0]["identificacion"];
	$_SESSION['direccion'] = $datos[0]["direccion"];
	$_SESSION['telefono'] = $datos[0]["telefono"];
	$_SESSION['foto'] = $datos[0]["foto"];
	$_SESSION['correo'] = $datos[0]["correo"];
	$_SESSION['ciudad'] = $datos[0]["ciudad"];
	header ("location: ../inicio.php");
}

