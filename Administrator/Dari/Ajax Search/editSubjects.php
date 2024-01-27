<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Subject = $_POST['Subject'];
		$Language = $_POST['Language'];
		$Credit_Hours = $_POST['Credit_Hours'];
		$Teacher = $_POST['Teacher'];
		$Faculty = $_POST['Faculty'];
		$Time = $_POST['Time'];
		$Status = $_POST['Status'];
		$Subject_ID = $_POST['Subject_ID'];
		
		$updtSubject = $usr->updateSubjects($Subject, $Language, $Credit_Hours, $Teacher, $Faculty, $Time, $Status, $Subject_ID);
	
	}
?>