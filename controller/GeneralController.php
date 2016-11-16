<?php

require_once "../model/General.php";

switch ($_POST["a"]) {
	case 'listarCiudades':
		$gen = new General();
		$ciu = $gen->ciudad();

		echo json_encode($ciu);
	break;
	case 'crearCiudad':
		$gen = new General();
		$creaci = $gen->crearCiudad($_POST["codigo"] , $_POST["ciudad"] , $_POST["departamento"] ,$_POST["valid"]);
		if ( $creaci ) {
			echo json_encode( array( 'success'=>true ) );
		} else {
			echo json_encode( array( 'success'=>false ) );
		}
	break;
	case 'eliminarCiudad':
		$gen = new General();
		$elim = $gen->elimCiudad($_POST["codigo"]);
		if ( $elim ){
			echo json_encode( array( 'success'=>true ) );
		}else{
			echo json_encode( array( 'success'=>false ) );
		}
	break;
	case 'listarProductos':
		$gen = new General();
		$list = $gen->listarProd();

		echo json_encode($list);
	break;
	case 'elimProducto':
		$gen = new General();
		$elim = $gen->elimProducto( $_POST["id"] );
		if ( $elim ){
			echo json_encode( array( 'success'=>true ) );
		}else{
			echo json_encode( array( 'success'=>false ) );
		}
	break;
	case 'enviarProducto':
		$gen = new General();
		$creaci = $gen->enviarProducto( $_POST );
		if ( $creaci ) {
			echo json_encode( array( 'success'=>true ) );
		} else {
			echo json_encode( array( 'success'=>false ) );
		}
	break;
}



?>