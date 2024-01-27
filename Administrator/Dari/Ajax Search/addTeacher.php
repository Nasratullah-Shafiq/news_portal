<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Teacher_Name = $_POST['Teacher_Name'];
		$Email = $_POST['Email'];
		$Language = $_POST['Language'];
		$Gender = $_POST['Gender'];
		$Mobile_No = $_POST['Mobile_No'];
		$Time = $_POST['Time'];
		
		 $TeacherAdd = $usr->addTeachers($Teacher_Name, $Email, $Language, $Gender, $Mobile_No, $Time);
	
	}
?>