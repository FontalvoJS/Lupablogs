<?php
require '../modelo/conexion.php';
if (isset($_POST['id'])) {
    $DB = new DB();
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $contenido = $_POST['redaccion'];
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

    $id = $_POST['id'];
    $sql = "UPDATE `posts` SET `titulo` = '$titulo', `descripcion` = '$descripcion', `categoria` = '$categoria', `redaccion` = '$contenido', `Imagen` = '$nombre_imagen' WHERE `posts`.`id` = $id";
    $result = $DB->consulta($sql);
    if (isset($result)) {
        echo "Ok";
    } else {
        echo "Error";
    }
} else {
    header("Location: ../index.php");
}
