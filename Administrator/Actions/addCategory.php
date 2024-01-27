<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Category = $_POST['Category'];
		$Language = $_POST['Language'];
		
		$addCat = $usr->addCategory($Category, $Language);
	
	}
?>