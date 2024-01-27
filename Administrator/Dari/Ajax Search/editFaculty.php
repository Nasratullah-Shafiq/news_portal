<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Faculty = $_POST['Faculty'];
		$Language = $_POST['Language'];
		$Faculty_ID = $_POST['Faculty_ID'];
		
		$updtFaculty = $usr->updateFaculty($Faculty, $Language, $Faculty_ID);
	
	}
?>