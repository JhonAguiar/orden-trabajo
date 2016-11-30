<?php

	require_once "../model/OrdenTrabajo.php";

	switch ($_POST["a"]) {
		case 'completarAnunciante':
			$ord = new OrdenTrabajo();
			$orden = $ord->ordenTrabajo($_POST["id"]);
			echo json_encode($orden);
		break;
		case 'nit':
			$ord = new OrdenTrabajo();
			$orden = $ord->ordenNit($_POST["id"]);
			echo json_encode($orden);
		break;
		case 'ordenTrabajo':
			$ord = new OrdenTrabajo();
			$orden = $ord->ordenTrabajo();
			echo json_encode($orden);
		break;
		case 'listarOrdenTrabajo':
			$ord = new OrdenTrabajo();
			$orden = $ord->listarOrdenTrabajo();
			echo json_encode($orden);
		break;
		default:
			echo "Ha ocurrido un problema";
		break;
	}
?>