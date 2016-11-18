<?php

	require_once "../model/Cliente.php";

	switch ($_POST["a"]) {
		case "cliente":
			$cli = new Cliente();
			$clien = $cli->cliente();

			echo json_encode($clien);
		break;
		case "guardarCliente" :
			$cli = new Cliente();
			$clien = $cli->guardarCliente($_POST);
			if ( $clien ) {
				echo json_encode( array( 'success'=>true ) );
			} else {
				echo json_encode( array( 'success'=>false ) );
			}
		break;
		case "completarDatos2":
			$cli = new Cliente();
			$cliente = $cli->completarDatos2($_POST["id"]);

			echo json_encode($cliente);
		break;
		case "listAnunciante":
			$cli = new Cliente();
			$anunciante = $cli->listAnunciante();
			echo json_encode($anunciante);
		break;
		case "saveAnunciante":
			$cli = new Cliente();
			$anunciante = $cli->saveAnunciante( $_POST );
			/**if ( $clien ) {
				echo json_encode( array( 'success'=>true ) );
			} else {
				echo json_encode( array( 'success'=>false ) );
			}**/
			echo json_encode($anunciante);
		break;
		case 'completeAnun':
			$cli = new Cliente();
			$anunciante = $cli->completeAnun( $_POST["id"] );
			echo json_encode($anunciante);
		break;
		default:
			echo json_encode("Ha ocurrido un error al consultar el problema");
		break;
	}

?>