
<?php
session_start();
$_SESSION = array(); // destroy all $_SESSION data
setcookie("PHPSESSID", "", time() - 3600, "/");
setcookie("active", "", time() - 60 * 60 * 24 * 35, "/");

session_destroy();
header("Location: ../index.php");
