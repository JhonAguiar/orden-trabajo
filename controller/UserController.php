<?php

	require_once "../model/Usuario.php";

	switch ($_POST["a"]) {
		case 'listarUsuarios':
			$usr = new Usuario();
			$user = $usr->listUser();
			echo json_encode( $user );	
		break;

		case 'datosUsuario':
			$usr = new Usuario();
			$user = $usr->completUser( $_POST["id"] );
			echo json_encode( $user );
		break;

		case 'envioDatos':
			$usr = new Usuario();                        
			$user = $usr->envioDatos( $_POST );			
			if ( $user ) {
				echo json_encode( array( 'success'=>true ) );
			} else {
				echo json_encode( array( 'success'=>false ) );
			}
		break;

		case 'eliminarUsuario':
			$usr = new Usuario();
			$user = $usr->eliminarUsuario( $_POST["id"] );
			if ( $user ) {
				echo json_encode( array( 'success'=>true ) );
			} else {
				echo json_encode( array( 'success'=>false ) );
			}
		break;

		default:
			echo json_encode( "fail" );
		break;
	}


?>