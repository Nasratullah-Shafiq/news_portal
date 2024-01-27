<?php 
ob_start();
session_start();
header('Location: ./../../sign in.php');
session_destroy();

?>