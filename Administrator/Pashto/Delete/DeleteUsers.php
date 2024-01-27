<?php

include('./../_Partial Components/Header.php');

if(isset($_GET['del'])){
   $del_id = $_GET['del'];
   $deleteUser = $exm->delUsers($del_id);
}

header('Location: ../Manage-Users.php');
?>

  