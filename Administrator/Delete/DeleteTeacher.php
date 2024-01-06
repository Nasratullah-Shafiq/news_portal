<?php

include('./../_Partial Components/Header.php');


if(isset($_GET['del'])){
   $Teacher_ID = $_GET['del'];
   $deleteTeacher = $exm->delTeachers($Teacher_ID);
}

header('Location: ../Manage-Teacher.php');
?>

  