<?php

include('./../_Partial Components/Header.php');

if(isset($_GET['del'])){
   $Question_ID = $_GET['del'];
   $deleteQuestion = $exm->delQuestions($Question_ID);
}

header('Location: ../Manage-Questions.php');
?>

  