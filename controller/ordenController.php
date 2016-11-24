<?php

	require_once "../model/OrdenTrabajo.php";

	switch ($_POST["a"]) {
		case 'completarAnunciante':
			$ord = new OrdenTrabajo();
			$orden = $ord->ordenTrabajo($_POST["id"]);
			echo json_encode($orden);
		break;
		
		default:
			echo "Ha ocurrido un problema";
			break;
	}
?>