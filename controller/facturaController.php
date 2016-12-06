<?php
	
	require_once "../model/Facturacion.php";


	switch ($_POST["a"]) {
		case 'listarOT':
			$fac = new Facturacion();
			$factura = $fac->listarOt($_POST["id"]);
			echo json_encode($factura);
		break;
		case 'completeCliente':
			$fac = new Facturacion();
			$factura = $fac->completeCliente($_POST["id"]);
			echo json_encode($factura);
		break;
		default:
			echo json_encode("Ha ocurrido un problema");
		break;
	}


?>