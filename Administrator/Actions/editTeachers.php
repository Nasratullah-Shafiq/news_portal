<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Teacher_Name = $_POST['Teacher_Name'];
		$Language = $_POST['Language'];
		$Email = $_POST['Email'];
		$Gender = $_POST['Gender'];
		$Mobile_No = $_POST['Mobile_No'];
		$Time = $_POST['Time'];
		$Teacher_ID = $_POST['Teacher_ID'];
		
		$updtTeacher = $usr->updateTeachers($Teacher_Name, $Language, $Email, $Gender, $Mobile_No, $Time, $Teacher_ID);
	
	}
?>