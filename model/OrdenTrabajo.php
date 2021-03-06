<?php

	require_once "../db/conectar.php";

	/**
	 * class Cliente
	 * posee los metodos de interacción con el Cliente
	 * @author Jhon Aguiar Moreno , Giovanny Arturo Rincon
	 */
	class OrdenTrabajo{

		private $conexion;

		public function __construct(){
			$this->conexion = Conectar::conexion();
		}

		/**
		 * LISTAR TIPOS DE ORDEN DE TRABAJO
		 */
		public function tipoOt(){
			$sql = "SELECT * FROM tipo_ot";

			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			return $response;
		}

		/**
		 * LISTAR ANUNCIANTES ORDENES DE TRABAJO
		 */
		public function ordenTrabajo($id){
			$sql = "SELECT * FROM anunciante where cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}

			if(mysqli_num_rows($result) != 0){
				return $response;
			}else{
				return 0;
			}
			
		}

		/**
		 * SELECCIONAR EL NIT DEL CLIENTE
		 */
		public function ordenNit($id){
			$sql = "SELECT nit FROM cliente where id_cliente = $id";
			
			$result = $this->conexion->query($sql);
			
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
			return $response[0];
		}


		/**
		 * LISTAR ORDENES DE TRABAJO
		 */
		public function listarOrdenTrabajo(){

			$response = "ERROR";

			$sql = "SELECT ot.id_orden_trabajo , cli.cliente , an.nombre , tot.tipo_ot , ot.cliente as id_cliente FROM orden_trabajo as ot INNER JOIN cliente as cli on cli.id_cliente = ot.cliente INNER JOIN anunciante as an ON ot.anunciante = an.id_anunciante INNER JOIN tipo_ot as tot ON tot.id_tipo = ot.tipo_ot";

			$result = $this->conexion->query($sql);
			if (mysqli_num_rows($result) != 0){
				$response = array();
				while($row = $result->fetch_assoc()){
					$response[] = $row;
				}
			}
			return $response;
		}

		/**
		 * GUARDAR LA ORDEN DE TRABAJO
		 */
		public function guardarOrden($array = array()){
			$free_press = "";
			$publicidad = "";
			$analisis = "";                                                                                                                                                                                                                    
			$validar = intval($array["valid"]);
			$id_orden_trabajo = intval($array["id_orden_trabajo"]);
			$aplicacion = $array["aplicacion"];
			$actividad = $array["actividad"];
			$anunciante = intval($array["anunciante"]);
			$categoria = $array["categoria"];
			$comercial = intval($array["comercial"]);
			$competencias = $array["competencias"];
			$desde = $array["desde"];
			$dias = $array["dias"];
			$entorno = $array["entorno"];
			$factura = intval($array["factura"]);
			$hasta = $array["hasta"];
			$marca = $array["marca"];
			$nit_anunciante = $array["nit_anunciante"];
			$nombre_cliente = intval($array["nombre_cliente"]);
			$observ_cierre = $array["observ_cierre"];
			$observaciones = $array["observaciones"];
			$sectores = $array["sectores"];
			$tipo_ot = intval($array["tipo_ot"]);
			$total = intval($array["total"]);
			$val_analisis = intval($array["val-analisis"]);
			$val_impresos = intval($array["val-impresos"]);
			$val_internet = intval($array["val-internet"]);
			$val_radio = intval($array["val-radio"]);
			$val_television = intval($array["val-television"]);
			$free_press = (isset($array["ale_free_press"]) && !empty($array["ale_free_press"])) ? $array["ale_free_press"] : "";
			$publicidad = (isset($array["ale_publicidad"]) && !empty($array["ale_publicidad"])) ? $array["ale_publicidad"] : "";
			$analisis = (isset($array["ale_analisis"]) && !empty($array["ale_analisis"])) ? $array["ale_analisis"] : "";
			$comp = $free_press+";"+$publicidad+";"+$analisis;                        
                        
			if($validar === 1){
				$sql = "INSERT INTO orden_trabajo (cliente , anunciante , tipo_ot , aplicacion , valor_impresion , valor_radio , valor_television , valor_internet , valor_analisis , tipo_alerta , observaciones , marca , entorno , competencias , sectores , actividad , facturacion , desde , hasta , comercial  ) VALUES ( $nombre_cliente, $anunciante, $tipo_ot, '$aplicacion' , $val_impresos , $val_radio , $val_television , $val_internet , $val_analisis , '$comp' , '$observaciones' , '$marca' , '$entorno' , '$competencias' , '$sectores' , '$actividad' , $factura , '$desde' , '$hasta' , $comercial )";
			}else{
				$sql = "UPDATE orden_trabajo SET cliente=$nombre_cliente, anunciante=$anunciante, tipo_ot=$tipo_ot , aplicacion='$aplicacion' , valor_impresion=$val_impresos , valor_radio=$val_radio , valor_television=$val_television , valor_internet=$val_internet , valor_analisis=$val_analisis , tipo_alerta='$comp' , observaciones='$observaciones' , marca='$marca' , entorno='$entorno' , competencias='$competencias' , sectores='$sectores' , actividad='$actividad' , facturacion=$factura, desde='$desde' , hasta='$hasta' , comercial=$comercial where id_orden_trabajo=$id_orden_trabajo;";
			}

			$result = $this->conexion->query($sql);
                        echo $this->conexion->error;

			return $result;
		}

		/**
		 * Completar los datos de la orden de trabajo para actualizar datos
		 */
		public function mostrarOrdenes($id){

			$sql = "SELECT * FROM orden_trabajo where cliente = $id";

			$result = $this->conexion->query($sql);

			$row = $result->fetch_assoc();

			return $row;
		}

		/**
		 * Eliminar registro Orden de Trabajo
		 */
		public function borrarOt($id){

			$sql = "DELETE FROM orden_trabajo WHERE cliente = '$id'";

			$result = $this->conexion->query($sql);

			return $result;
		}

	}

?>