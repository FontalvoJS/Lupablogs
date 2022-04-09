<?php
session_start();
if (!isset($_COOKIE['active']) && !isset($_SESSION['username'])) {
  header('Location: ../index.php');
  die();
} else {
?>
<?php
  $userSession = $_SESSION['username'];
  require '../container/post.php';
?>
<?php
}
?>