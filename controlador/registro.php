<?php
error_reporting(0);
require '../modelo/conexion.php';
$user = $_POST['username'];
$pass = $_POST['password'];
$mail = $_POST['email'];

if (
    !isset($user) || !isset($pass) || !isset($mail) ||
    empty($user) || empty($pass) || empty($mail) ||
    !filter_var($mail, FILTER_VALIDATE_EMAIL) ||
    $user == "" || $pass == "" || $mail == ""
) {
    echo "No se han recibido datos";
    die();
} else {

    $DB = new DB();
    $sql = "SELECT `username` FROM `usuarios` WHERE username = '$user' OR email = '$mail'";
    $res = $DB->consulta($sql);
    if ($res) {
        echo "Ya existe";
        die();
    } else {
        $query = $DB->registro($user, $pass, $mail);
        if ($query) {
            echo $query;
        }
    }
}
