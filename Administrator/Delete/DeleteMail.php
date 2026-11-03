<?php

include('./../_Partial Components/Header.php');

if(isset($_GET['del'])){
   $Contact_ID = $_GET['del'];
   $deleteContact = $exm->delContactUs($Contact_ID);
}

header('Location: ../Mail.php');
?>
