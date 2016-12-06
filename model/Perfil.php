<?php
require_once '../db/Conectar.php';

class Perfil {
    
    private $mysqli;
    
    public function __construct() {
        $this->mysqli = Conectar::conexion();
    }
    
    public function actualizar($datos){
        $sql = "UPDATE usuario SET nombre='".$datos['nombre']."', identificacion=".intval($datos['documento']).", usuario='".$datos['usuario']."', fec_nac='".$datos['fec_nac']."', direccion='".$datos['direccion']."', ciudad='".$datos['ciudad']."', correo='".$datos['correo']."', telefono='".$datos['telefono']."', rol=".intval($datos['rol']).", src_img='".$datos['src']."' WHERE identificacion=".intval($datos['documento']).";";
        $this->mysqli->query($sql);
        echo $this->mysqli->error; 
    }
    
    public function cerrarConexion(){
        $this->mysqli->close();
    }
    
}
