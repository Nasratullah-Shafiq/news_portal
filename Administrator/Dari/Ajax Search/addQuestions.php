<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$Question = $_POST['Question'];
		$Answer0 =  $_POST['Answer0'];
		$Answer1 =  $_POST['Answer1'];
		$Answer2 =  $_POST['Answer2'];
		$Answer3 =  $_POST['Answer3'];
		$Language = $_POST['Language'];
		$Right_Answer = $_POST['Right_Answer'];
		$Subject_ID = $_POST['Subject_ID'];
	
		
		$addQuestion = $usr->addQuestions($Question, $Answer0, $Answer1, $Answer2, $Answer3, $Language, $Right_Answer, $Subject_ID);
	
	}
?>