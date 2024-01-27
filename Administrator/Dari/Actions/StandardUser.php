<?php

include('./../_Partial Components/Header.php');

if(isset($_GET['std'])){
    $User_ID = $_GET['std'];
    $stdUser = $usr->standardUser($User_ID);
}
else{
    header('Location: ../Manage-Users.php');
}

header('Location: ../Manage-Users.php');
?>
