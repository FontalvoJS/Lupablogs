<?php 
require '../modelo/conexion.php';
$DB = new DB();
$user = $_POST['username'];
$pass = $_POST['password'];
$mail = $_POST['email'];
$query = $DB->registro($user, $pass, $mail);
if($query == "Ok"){
    echo $query;
}else{
    echo $query;
}
