<?php 
require '../modelo/conexion.php';
$_POST = json_decode(file_get_contents('php://input'), true);
$DB = new DB();
$id = $_POST['id'];
$sql = "SELECT * FROM `posts` WHERE id = $id";
$result = $DB->consulta($sql);
$result = $result[0];
echo json_encode($result);