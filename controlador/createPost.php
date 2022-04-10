<?php
require '../modelo/conexion.php';
$titulo = $_POST['titulo'];
$redaccion = addslashes($_POST['redaccion']);
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
if ($_FILES['imagen']) {
    $nombre_imagen =  mt_rand() . "-" . $_FILES['imagen']['name'];

    $tipo = $_FILES['imagen']['type'];

    $tamano = $_FILES['imagen']['size'];



    if ($tamano <= 500000000000) {

        if ($tipo == "image/jpeg" || $tipo == "image/jpg" || $tipo == "image/png") {

            $imagen_carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Lupablogs/assets/portadas_articulos/';

            move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_carpeta . $nombre_imagen);
        } else {

            echo "Solo se pueden subir imagenes .JPG / .JPEG / .PNG";
        }
    } else {
    }
}

if (
    isset($titulo) && isset($redaccion) && isset($descripcion) && isset($categoria)
    && !empty($titulo) && !empty($redaccion) && !empty($descripcion) && !empty($categoria)
) {
    $DB = new DB();
    $data = $DB->crearPost($titulo, $descripcion, $categoria, $redaccion, $nombre_imagen);
    if ($data) {
        echo "Ok";
    }else{
        return false;
    }
} else {
    return "Error";
}
