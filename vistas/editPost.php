<?php
require '../modelo/conexion.php';
if (isset($_GET['id'])) {
    $DB = new DB();
    $id = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE id = $id";
    $result = $DB->consulta($sql);
    $result = $result[0];
?>
<?php
    require '../container/editPost.php';
?>
<?php
} else {
    header("Location: ../index.php");
}
?>