<?php
session_start();
require_once '../model/Perfil.php';
//var_dump($_POST);
//var_dump($_FILES);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $perf = new Perfil();
    $url = "../img/userImg/";
    
    $fname = $_FILES['foto']['name'];
    echo 'Cargando nombre del archivo: ' . $fname . ' <br>';
    $chk_ext = explode(".", $fname);

    $extension = "." . strtolower(end($chk_ext)); 
    $name = $_POST['documento'].$extension;
    
    if ($extension == ".jpg" || $extension == ".png") {
        $filename = $_FILES['foto']['tmp_name'];       

        unlink($url.$_SESSION['src']);
        
        if (move_uploaded_file($filename, $url.$name)) {
            echo "foto subida correctamente\n";
        } else {
            echo "error al subir la foto\n";
        }        
        echo "Se subio la foto correctamentamente\n";
    } else {        
        echo "Solo imagenes .jpg, .png\n";
    }
    
    
    $datos = array();
    foreach ($_POST as $key => $value){
        $datos[$key] = $value;
    } 
    
    $datos['src'] = $name;
    
    var_dump($datos);
    
    $perf->actualizar($datos);
    $perf->cerrarConexion();
    
}


function delete($img){
    
}

