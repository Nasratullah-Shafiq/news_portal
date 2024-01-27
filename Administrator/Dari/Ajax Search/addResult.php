<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'./../_Partial Components/Users.php');
	$usr = new Users();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$TotalNumberOfQuestion = $_POST['TotalNumberOfQuestion'];
		$Username =  $_POST['Username'];
		$Teacher =  $_POST['Teacher'];
		$Subject =  $_POST['Subject'];
		$Credit_Hours =  $_POST['Credit_Hours'];
		$Attempted_Answer = $_POST['Attempted_Answer'];
		$Correct_Answer = $_POST['Correct_Answer'];
		$Wrong_Answer = $_POST['Wrong_Answer'];
		$No_Answer = $_POST['No_Answer'];
		$Result = $_POST['Result'];
	
		
		$Results = $usr->addResults($TotalNumberOfQuestion, $Username, $Teacher, $Subject, $Credit_Hours, $Attempted_Answer, $Correct_Answer, $Wrong_Answer, $No_Answer, $Result);
	
	}

?>