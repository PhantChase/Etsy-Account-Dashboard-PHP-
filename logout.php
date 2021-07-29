<?php session_start();
if (isset($_SESSION['username']) or isset($_SESSION['role'])){
unset($_SESSION['username']);
unset($_SESSION['role']);
header('Location: index.php');
}
?>