<?php

$uploaddir = '../img/userImg/';

try {

    if (!isset($_FILES['foto']['error']) ||
            is_array($_FILES['foto']['error'])) {
        throw new RuntimeException('Parametros Invalidos');
    }

    switch ($_FILES['foto']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No hay imagen para subir');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('El tamaño del archivo excede el limite');
        default :
            throw new RuntimeException('Error desconocido');
    }


    if ($_FILES['foto']['size'] > 1000000) {
        throw new RuntimeException('El tamaño del archivo excede el limite');
    }


    if (false === $ext = array_search(
            $_FILES['foto']['type'], array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
            ), true
            )) {
        throw new RuntimeException('La extension del archivo es incorrecta');
    }

    $extencion = get_extension($_FILES['foto']['name']);
    
    if (!move_uploaded_file(
                    $_FILES['foto']['tmp_name'], sprintf($uploaddir . '%s.%s', $_POST['identificacion'].".".$extencion, '')
            )) {
        throw new RuntimeException('Error al subir el archivo');
    }      
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

function get_extension($str){
    return end(explode(".", $str));
}

