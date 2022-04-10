<?php
require '../modelo/conexion.php';
$_POST = json_decode(file_get_contents('php://input'), true);
$DB = new DB();
$id = $_POST['id'];
$sql = "DELETE FROM `posts` WHERE id = $id";
$result = $DB->consulta($sql);
echo "Ok";