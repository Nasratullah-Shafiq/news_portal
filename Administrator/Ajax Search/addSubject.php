<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Subject = $_POST['Subject'];
		$Language = $_POST['Language'];
		$Credit_Hours = $_POST['Credit_Hours'];
		$Teacher_ID = $_POST['Teacher_ID'];
		$Faculty_ID = $_POST['Faculty_ID'];
		$Time = $_POST['Time'];
		$Status = $_POST['Status'];
		$SubjectAdd = $usr->addSubjects($Subject, $Language, $Credit_Hours, $Teacher_ID, $Faculty_ID, $Time, $Status);
	
	}
?>