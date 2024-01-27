<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Exam.php');
	include_once($filepath.'./../_Partial Components/header.php');
    $exm = new Exam();
    	

if(isset($_GET['del'])){
   $Category_ID = $_GET['del'];
   $deleteCategory = $exm->delCategory($Category_ID);
}

header('Location: ../Manage-Category.php');
?>

  