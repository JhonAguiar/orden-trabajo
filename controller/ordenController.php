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
		case 'guardarOrden':
			$ord = new OrdenTrabajo();
			$orden = $ord->guardarOrden($_POST);
			if ( $orden ) {
				echo json_encode( array( 'success'=>true ) );
			} else {
				echo json_encode( array( 'success'=>false ) );
			}
		break;
		default:
			echo "Ha ocurrido un problema";
		break;
	}
?>