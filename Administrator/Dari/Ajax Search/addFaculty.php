<?php
	$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Faculty = $_POST['Faculty'];
		$Language =  $_POST['Language'];
		
		$addFaculties = $usr->addFaculty($Faculty, $Language);
	
	}
?>