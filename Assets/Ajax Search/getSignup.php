<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Full_Name = $_POST['Full_Name'];
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
		$Email = $_POST['Email'];
		$Gender = $_POST['Gender'];
		$Phone_No = $_POST['Phone_No'];
		$image = $_POST['image'];
		
		$userRegister = $usr->userRegistration($Full_Name, $Username, $Password, $Email, $Gender, $Phone_No, $image);
	}
?>