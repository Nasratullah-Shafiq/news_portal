<?php

include('./../_Partial Components/Header.php');

if(isset($_GET['del'])){
   $News_ID = $_GET['del'];
   $deleteNews = $exm->delNews($News_ID);
}

header('Location: ../Manage-News.php');
?>

  