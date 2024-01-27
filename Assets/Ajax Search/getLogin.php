<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
		
		$userlogin = $usr->userLogin($Email, $Password);
	}
?>