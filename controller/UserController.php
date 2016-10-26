<?php

	require_once "../model/Usuario.php";

	switch ($_POST["a"]) {
		case 'listarUsuarios':
			$usr = new Usuario();
			$user = $usr->listUser();
			echo json_encode( $user );	
		break;
		
		default:
			echo json_encode("fail");
		break;
	}


?>