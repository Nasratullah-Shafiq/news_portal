<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
		$Category_ID = $_POST['Category_ID'];
		$Category = $_POST['Category'];
		$updtCategory = $usr->updateCategory($Category_ID, $Category);
	
	}
?>