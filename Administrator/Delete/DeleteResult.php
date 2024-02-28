<?php

include('./../_Partial Components/Header.php');

if(isset($_GET['del'])){
   $Result_ID = $_GET['del'];
   $deleteResult = $exm->delQuizResult($Result_ID);
}
if(isset($_GET['id'])){
   $User_ID = $_GET['id'];
   $QuizResult = $exm->getQuizResultByID($User_ID);
   $row = $QuizResult->fetch_assoc();
  
}

$Result = $row['User_ID'];
header('Location: ../Quiz-Result.php?id='.$Result);
?>

  