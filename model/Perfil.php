<?php
require_once '../db/Conectar.php';
    /**
     * class Perfil
     * posee los metodos de interacción modulo Perfil
     * @author Jhon Aguiar Moreno , Giovanny Arturo Rincon
     */
    class Perfil {
        
        private $mysqli;
        
        public function __construct() {
            $this->mysqli = Conectar::conexion();
        }
        
        /**
         * @param Array $datos Información usuario
         * Actualizar datos de usuario
         */
        public function actualizar($datos){
            $sql = "UPDATE usuario SET nombre='".$datos['nombre']."', identificacion=".intval($datos['documento']).", usuario='".$datos['usuario']."', fec_nac='".$datos['fec_nac']."', direccion='".$datos['direccion']."', ciudad='".$datos['ciudad']."', correo='".$datos['correo']."', telefono='".$datos['telefono']."', rol=".intval($datos['rol']).", src_img='".$datos['src']."' WHERE identificacion=".intval($datos['documento']).";";
            $this->mysqli->query($sql);
            echo $this->mysqli->error; 
        }
        
        /**
         * Cerrar conexión
         */
        public function cerrarConexion(){
            $this->mysqli->close();
        }
        
    }
