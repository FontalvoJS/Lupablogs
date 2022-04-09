<?php
require '../modelo/conexion.php';
if (isset($_FILES['files'])) {
    $name = md5(rand(100, 200));
    $ext = explode('.', $_FILES['files']['name']);
    $filename = $name . '.' . $ext[1];
    $destination = '../assets/imgs_articulos/' . $filename;
    $location = $_FILES["files"]["tmp_name"];
    move_uploaded_file($location, $destination);
    echo $filename;
} else {
    echo  $message = 'Al parecer hubo un error' . $_FILES['files']['error'];
}
