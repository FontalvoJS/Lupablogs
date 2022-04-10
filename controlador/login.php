<?php
require '../modelo/conexion.php';
$username = $_POST['username'];
$password = $_POST['password'];
$db = new DB();
$result = $db->iniciarSesion($username, $password);
if ($result) {
    echo "True";
} else {
    echo "False";
}
