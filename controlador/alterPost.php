<?php
require '../modelo/conexion.php';
if (isset($_POST['id'])) {
    error_reporting(0);
    $idPost = $_POST['id'];
    $DB = new DB();

    if ($_FILES['imagen']) {
        $nombre_imagen =  mt_rand() . "-" . $_FILES['imagen']['name'];

        $tipo = $_FILES['imagen']['type'];

        $tamano = $_FILES['imagen']['size'];



        if ($tamano <= 500000000000) {

            if ($tipo == "image/jpeg" || $tipo == "image/jpg" || $tipo == "image/png") {

                $imagen_carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Lupablogs/assets/portadas_articulos/';

                move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_carpeta . $nombre_imagen);
                $sql = "UPDATE posts SET `Imagen` = '$nombre_imagen' WHERE `id` = '$idPost'";
                $result = $DB->consulta($sql);
                echo 00;
            }
        }
    }

    $sqlGet = "SELECT * FROM posts WHERE id = '$idPost'";
    $consult = $DB->consulta($sqlGet);

    $tituloOriginal = $consult[0]['titulo'];
    $descripcionOriginal = $consult[0]['descripcion'];
    $categoriaOriginal = $consult[0]['categoria'];
    $contenidoOriginal = $consult[0]['redaccion'];
    $imagenOriginal = $nombre_imagen;

    // $tituloOriginal = $_POST['tituloOriginal'];
    // $descripcionOriginal = $_POST['emailOriginal'];
    // $contenidoOriginal = $_POST['phoneOriginal'];
    // $categoriaOriginal = $_POST['websiteOriginal'];

    if (isset($_POST['titulo']) && $_POST['titulo'] != $tituloOriginal && $_POST['titulo'] != '') {
        $titulo = $_POST['titulo'];
        $sql = "SELECT * FROM posts WHERE `titulo` = '$titulo'";
        $result = $DB->consulta($sql);
        $result = $result[0];
        if ($result['titulo'] == $titulo) {
        } else {
            $sql = "UPDATE posts SET `titulo` = '$titulo' WHERE `titulo` = '$tituloOriginal'";
            $result = $DB->consulta($sql);
            echo 0;
        }
    }
    if (isset($_POST['descripcion']) && $_POST['descripcion'] != $descripcionOriginal && $_POST['descripcion'] != '') {
        $descp = $_POST['descripcion'];
        $sql = "SELECT * FROM posts WHERE `descripcion` = '$descp'";
        $result = $DB->consulta($sql);
        $result = $result[0];
        if ($result['descripcion'] == $descp) {
        } else {
            $sql = "UPDATE posts SET `descripcion` = '$descp' WHERE `descripcion` = '$descripcionOriginal'";
            $result = $DB->consulta($sql);
            echo 1;
        }
    }


    if (isset($_POST['categoria']) && $_POST['categoria'] != $categoriaOriginal && $_POST['categoria'] != '' && $_POST['categoria'] != ' ') {
        $categoria = $_POST['categoria'];
        $sql = "SELECT `categoria` FROM posts WHERE id = '$idPost'";
        $result = $DB->consulta($sql);
        $result = $result[0];
        if ($result['categoria'] == $categoria) {
        } else {
            $sql = "UPDATE posts SET `categoria` = '$categoria' WHERE `id` = '$idPost'";
            $result = $DB->consulta($sql);
            echo 2;
        }
    }
    if (isset($_POST['redaccion']) && $_POST['redaccion'] != $contenidoOriginal && $_POST['redaccion'] != '') {
        $reda = addslashes($_POST['redaccion']);
        $sql = "SELECT `redaccion` FROM posts WHERE `id` = '$idPost'";
        $result = $DB->consulta($sql);
        $result = $result[0];
        $adds = addslashes($result['redaccion']);
        if ($adds == $reda) {
        } else {
            $sql = "UPDATE posts SET `redaccion` = '$reda' WHERE `id` = '$idPost'";
            $result = $DB->consulta($sql);
            echo 3;
        }
    }
} else {
    header("Location: ../index.php");
}
