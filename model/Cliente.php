<?php

	require_once "../db/conectar.php";

	class Cliente {

		private $conexion;

		public function __construct(){
			$this->conexion =  Conectar::conexion();
		}

		public function cliente (){
			$response = array();
			
			$sql = "SELECT * FROM cliente;";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}

		public function guardarCliente( $data = array() ){
			$valid = $data['valid'];
			$fecha = $data['fecha'];
			$cliente = $data['cliente'];
			$nit = $data['nit'];
			$dv = $data['dv'];
			$nombreCorto = $data['nombre-corto'];
			$personaContacto = $data['persona-contacto'];
			$pagador = $data['pagador'];
			$telefonoPagador = $data['telefono-pagador'];
			$movilPagador = $data['movil-pagador'];
			$ciudad = $data['ciudad'];
			$correo = $data['correo'];
			$paginaWeb = $data['pagina-web'];
			$cumpleanos = $data['cumpleanos'];
			$descripCliente = $data['descrip-cliente'];
			$direccion = $data['direccion'];
			$consecutivo = $data['consecutivo'];
			$tipoCliente = $data['tipo-cliente'];

			if($valid == 1){
				$sql = "INSERT INTO cliente (
					cliente , 
					consecutivo , 
					nit , 
					fecha , 
					nombre_corto , 
					direccion , 
					correo , 
					pagina_web , 
					persona_contacto , 
					pagador , 
					telefono_pagador , 
					movil_pagador , 
					ciudad , 
					cumpleanos , 
					tipo_cliente , 
					descripcion 
				) values (
					'".$cliente."' , 
					'".$consecutivo."' , 
					'".$nit."-".$dv."' , 
					'".$fecha."' , 
					'".$nombreCorto."' , 
					'".$direccion."' , 
					'".$correo."' , 
					'".$paginaWeb."' ,
					'".$personaContacto."' ,
					'".$pagador."' ,
					'".$telefonoPagador."' ,
					'".$movilPagador."' ,
					'".$ciudad."' ,
					'".$cumpleanos."' ,
					'".$tipoCliente."' ,
					'".$descripCliente."' 
				);";
			}else{
				$sql = "UPDATE cliente SET 
						cliente = '".$cliente."' ,
						consecutivo = '".$consecutivo."' ,
						nit = '".$nit."-".$dv."' ,
						fecha = '".$fecha."' ,
						nombre_corto = '".$nombreCorto."',
						direccion = '".$direccion."' ,
						correo = '".$correo."' , 
						pagina_web = '".$paginaWeb."' , 
						persona_contacto = '".$personaContacto."' ,
						pagador = '".$pagador."' ,
						telefono_pagador = '".$telefonoPagador."' ,
						movil_pagador = '".$movilPagador."' ,
					    ciudad = '".$ciudad."' , 
					    cumpleanos = '".$cumpleanos."' ,
					    tipo_cliente = '".$tipoCliente."' ,
					    descripcion = '".$descripCliente."'
					WHERE 
					    consecutivo = '".$consecutivo."'";
			}

			$result = $this->conexion->query($sql);

			return $result;
		}


		public function completarDatos2( $id ){
			
			$sql = "SELECT * FROM cliente where consecutivo = '".$id."' ";

			$result = $this->conexion->query($sql);

			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response[0];
		}

		public function listAnunciante(){
			$response = array();
			
			$sql = "SELECT an.* , cl.cliente as nomb_cliente FROM anunciante as an INNER JOIN cliente as cl ON an.cliente = cl.id_cliente;";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response;
		}


		public function saveAnunciante( $data = array() ){
			$valid = $data['valid'];
			$id_anunciante = intval($data["id_anunciante"]);
			$anunciante = $data['anunciante'];
			$cliente = intval($data['cliente']);
			$sector = $data['sector'];

			if($valid == 1){

				$sql = "INSERT INTO anunciante (cliente , nombre , sector) values (  '$cliente' , '$anunciante' , '$sector' )";

			}else{
				$sql = "UPDATE anunciante SET cliente='$cliente', nombre='$anunciante', sector='$sector' where id_anunciante=$id_anunciante;";
			}

			$result = $this->conexion->query($sql);

			return $sql;
		}

		/**
		 * @author Jhon Aguiar
		 * @param int $id Integer con información para buscar un registro
		 * @return Array con los datos de la consulta
		 * Esta funcion completa los datos del anunciante
		 */
		public function completeAnun( $id ){	

			$sql = "SELECT * FROM anunciante where id_anunciante = '$id'"; 

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response;
		}
                
                public function eliminarAnunciante($id){
                    $sql = "DELETE FROM anunciante WHERE id_anunciante = ".intval($id);
                    $this->conexion->query($sql);
                    if(mysqli_affected_rows($this->conexion) > 0){
                        return TRUE;
                    }else{
                        return FALSE;
                    }
                }

	}
?>