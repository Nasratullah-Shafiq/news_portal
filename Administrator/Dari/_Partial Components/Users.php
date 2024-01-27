
<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./Database.php');
include_once($filepath.'./Format.php');

class Users{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

public function updateQuestions($Question, $Answer0, $Answer1, $Answer2, $Answer3, $Language, $Right_Answer, $Subject_ID, $Status, $Question_ID){
	
	$Question = $this->fm->validation($Question);
	$Answer0 = $this->fm->validation($Answer0);
	$Answer1 = $this->fm->validation($Answer1);
	$Answer2 = $this->fm->validation($Answer2);
	$Answer3 = $this->fm->validation($Answer3);
	$Language = $this->fm->validation($Language);
	$Right_Answer = $this->fm->validation($Right_Answer);
	$Subject_ID = $this->fm->validation($Subject_ID);
	$Status = $this->fm->validation($Status);

	$Question = mysqli_real_escape_string($this->db->link, $Question);
	$Answer0 = mysqli_real_escape_string($this->db->link, $Answer0);
	$Answer1 = mysqli_real_escape_string($this->db->link, $Answer1);
	$Answer2 = mysqli_real_escape_string($this->db->link, $Answer2);
	$Answer3 = mysqli_real_escape_string($this->db->link, $Answer3);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Right_Answer = mysqli_real_escape_string($this->db->link, $Right_Answer);
	$Subject_ID = mysqli_real_escape_string($this->db->link, $Subject_ID);
	$Status = mysqli_real_escape_string($this->db->link, $Status);
	mysqli_set_charset($this->db->link, 'UTF8');
	if ($Question == "" || $Answer0 == "" || $Answer1 == "" || $Answer2 == "" || $Answer3 == "" || $Right_Answer == "" || $Subject_ID == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}

	else{
			$query = "UPDATE `question` SET `Question` = '$Question', `Answer0` = '$Answer0', `Answer1` = '$Answer1', `Answer2` = '$Answer2', `Answer3` = '$Answer3', `Language` = '$Language',`Right_Answer` = '$Right_Answer', `Subject_ID` = '$Subject_ID', `Status` = '$Status' WHERE `question`.`Question_ID` = '$Question_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Question Not Updated !</span>";
				exit();
			}
		}
	}
public function updateSubjects($Subject, $Language, $Credit_Hours, $Teacher, $Faculty, $Time, $Status, $Subject_ID){
	
	$Subject = $this->fm->validation($Subject);
	$Language = $this->fm->validation($Language);
	$Credit_Hours = $this->fm->validation($Credit_Hours);
	$Teacher = $this->fm->validation($Teacher);
	$Faculty = $this->fm->validation($Faculty);
	$Status = $this->fm->validation($Status);
	$Time = $this->fm->validation($Time);

	$Subject = mysqli_real_escape_string($this->db->link, $Subject);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Credit_Hours = mysqli_real_escape_string($this->db->link, $Credit_Hours);
	$Teacher = mysqli_real_escape_string($this->db->link, $Teacher);
	$Faculty = mysqli_real_escape_string($this->db->link, $Faculty);
	$Status = mysqli_real_escape_string($this->db->link, $Status);
	$Time = mysqli_real_escape_string($this->db->link, $Time);
	mysqli_set_charset($this->db->link, 'UTF8'); 
	
	if ($Subject == "" || $Language == "" || $Credit_Hours == "" || $Teacher == "" || $Faculty == "" || $Status == "" || $Time == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}

	else{ 
			$query = "UPDATE `subject` SET `Subject` = '$Subject', `Language` = '$Language', `Credit_Hours` = '$Credit_Hours', `Time` = '$Time', `Teacher_ID` = '$Teacher', `Faculty_ID` = '$Faculty', `Status` = '$Status' WHERE `subject`.`Subject_ID` = '$Subject_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Subject Not Updated !</span>";
				exit();
			}
		}
	}

public function updateTeachers($Teacher_Name, $Language, $Email, $Gender, $Mobile_No, $Time, $Teacher_ID){
	
	$Teacher_Name = $this->fm->validation($Teacher_Name);
	$Language = $this->fm->validation($Language);
	$Email = $this->fm->validation($Email);
	$Gender = $this->fm->validation($Gender);
	$Mobile_No = $this->fm->validation($Mobile_No);
	$Time = $this->fm->validation($Time);

	$Teacher_Name = mysqli_real_escape_string($this->db->link, $Teacher_Name);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Email = mysqli_real_escape_string($this->db->link, $Email);
	$Gender = mysqli_real_escape_string($this->db->link, $Gender);
	$Mobile_No = mysqli_real_escape_string($this->db->link, $Mobile_No);
	$Time = mysqli_real_escape_string($this->db->link, $Time);
	mysqli_set_charset($this->db->link, 'UTF8');
	if ($Teacher_Name == "" || $Language == "" || $Email == "" || $Gender == "" || $Mobile_No == "" || $Time == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}

	else{
			$query = "UPDATE `Teacher` SET `Teacher_Name` = '$Teacher_Name', `Language` = '$Language', `Email` = '$Email', `Gender` = '$Gender', `Mobile_No` = '$Mobile_No', `Time` = '$Time' WHERE `Teacher`.`Teacher_ID` = '$Teacher_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: عملیه موفقانه انجام نشد.</span>";
				exit();
			}
		}
	}


public function updateFaculty($Faculty, $Language, $Faculty_ID){
	
	$Faculty = $this->fm->validation($Faculty);
	$Language = $this->fm->validation($Language);
	
	$Faculty = mysqli_real_escape_string($this->db->link, $Faculty);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	
	mysqli_set_charset($this->db->link, 'UTF8');
	if ($Faculty == "" || $Language == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}

	else{
			$query = "UPDATE `Faculty` SET `Faculty` = '$Faculty', `Language` = '$Language' WHERE `Faculty`.`Faculty_ID` = '$Faculty_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> عملیه موفقانه انجام شد</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: عملیه موفقانه انجام نشد.</span>";
				exit();
			}
		}
	}	


public function addTeachers($Teacher_Name, $Email, $Language, $Gender, $Mobile_No, $Time){
	$Teacher_Name = $this->fm->validation($Teacher_Name);
	$Email = $this->fm->validation($Email);
	$Language = $this->fm->validation($Language);
	$Gender = $this->fm->validation($Gender);
	$Mobile_No = $this->fm->validation($Mobile_No);
	$Time = $this->fm->validation($Time);
	
	$Teacher_Name = mysqli_real_escape_string($this->db->link, $Teacher_Name);
	$Email = mysqli_real_escape_string($this->db->link, $Email);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Gender = mysqli_real_escape_string($this->db->link, $Gender);
	$Mobile_No = mysqli_real_escape_string($this->db->link, $Mobile_No);
	$Time = mysqli_real_escape_string($this->db->link, $Time);

	$Teacher_Name = filter_var($Teacher_Name, FILTER_SANITIZE_STRING);
	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Teacher_Name == "" || $Email == "" || $Gender == "" || $Mobile_No == "" || $Time == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}
	else if(filter_var($Email, FILTER_VALIDATE_EMAIL) === false){
		echo "<span class = 'error'> ایمیل آدرس اشتباه است لطفا ایمیل درست بنویسید!</span>";
		exit();
	}
	// if (filter_var($Mobile_No, FILTER_VALIDATE_INT) === false) {
	//     echo "<span class = 'error'> Invalid Phone No !</span>";
	// }
	// $min = 0700000;
	// $max = 0799999;

	// if (filter_var($Mobile_No, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
	//     echo "<span class = 'error'> Mobile No value should be 10 digits int value !</span>";
	// }
	else{
		$chkquery = "select * from Teacher where email = '$Email'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> ایمیل قبلا موجود است </span>";
			exit();	
		}
		else{
			$query = "insert into Teacher(Teacher_Name, Email, Language, Gender, Mobile_No, Time) values('$Teacher_Name', '$Email', '$Language', '$Gender', '$Mobile_No', '$Time')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> عملیه موفقانه انجام شد</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: عملیه موفقانه انجام نشد</span>";
				exit();
			}
		}
	}
}
public function addSubjects($Subject, $Language, $Credit_Hours, $Teacher_ID, $Faculty_ID, $Time, $Status){
	$Subject = $this->fm->validation($Subject);
	$Language = $this->fm->validation($Language);
	$Credit_Hours = $this->fm->validation($Credit_Hours);
	$Teacher_ID = $this->fm->validation($Teacher_ID);
	$Faculty_ID = $this->fm->validation($Faculty_ID);
	$Time = $this->fm->validation($Time);
	$Status = $this->fm->validation($Status);
	
	$Subject = mysqli_real_escape_string($this->db->link, $Subject);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Credit_Hours = mysqli_real_escape_string($this->db->link, $Credit_Hours);
	$Teacher_ID = mysqli_real_escape_string($this->db->link, $Teacher_ID);
	$Faculty_ID = mysqli_real_escape_string($this->db->link, $Faculty_ID);
	$Time = mysqli_real_escape_string($this->db->link, $Time);
	$Status = mysqli_real_escape_string($this->db->link, $Status);

	//$Subject = filter_var($Subject, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	mysqli_set_charset($this->db->link, 'UTF8');
	

	if ($Subject == "" || $Language == "" || $Credit_Hours == "" || $Teacher_ID == "" || $Faculty_ID == "" || $Time == "" || $Status == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}
	$min = 1;
	$max = 18;

	if (filter_var($Credit_Hours, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
	    echo "<span class = 'error'> کریدیت هاور باید از ۱ الی ۱۸ داده شود </span>";
	} 
	else if (filter_var($Time, FILTER_VALIDATE_INT) === false) {
	    echo "<span class = 'error'> تایم باید به عدد تایپ شود! </span>";
	}
	else{
		$chkquery = "select * from Subject where Subject = '$Subject'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> مضمون موجود است. مضمون جدید درج نمایید! </span>";
			exit();	
		}
		else{
			$query = "insert into Subject(Subject, Language, Credit_Hours, Time, Teacher_ID, Faculty_ID, Status) values('$Subject', '$Language', '$Credit_Hours', '$Time', '$Teacher_ID', '$Faculty_ID', '$Status')";
			$inserted_row = $this->db->insert($query);
			mysqli_set_charset($this->db->link, 'UTF8');
			if($inserted_row){
				echo "<span class = 'success'> موفقانه ثبت شد </span>";
				exit();
			}
			else{
				echo "<span class = 'error'> اشتباه: عملیه اجرا نشد.</span>";
				exit();
			}
		}
	}
}

public function addQuestions($Question, $Answer0, $Answer1, $Answer2, $Answer3, $Language, $Right_Answer, $Subject_ID){
	$Question = $this->fm->validation($Question);
	$Answer0  = $this->fm->validation($Answer0);
	$Answer1  = $this->fm->validation($Answer1);
	$Answer2  = $this->fm->validation($Answer2);
	$Answer3  = $this->fm->validation($Answer3);
	$Language  = $this->fm->validation($Language);
	$Right_Answer = $this->fm->validation($Right_Answer);
	$Subject_ID = $this->fm->validation($Subject_ID);
	
		
	$Question = mysqli_real_escape_string($this->db->link, $Question);
	$Answer0  = mysqli_real_escape_string($this->db->link, $Answer0);
	$Answer1 = mysqli_real_escape_string($this->db->link, $Answer1);
	$Answer2 = mysqli_real_escape_string($this->db->link, $Answer2);
	$Answer3 = mysqli_real_escape_string($this->db->link, $Answer3);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Right_Answer = mysqli_real_escape_string($this->db->link, $Right_Answer);
	$Subject_ID = mysqli_real_escape_string($this->db->link, $Subject_ID);
	

	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Question == "" || $Answer0 == "" || $Answer1 == "" || $Answer2 == "" || $Answer3 == "" || $Language == "" || $Right_Answer == "" || $Subject_ID == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}
	
	else{
		$chkquery = "select * from Question where Question = '$Question'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> سوالها از قبل موجود است لطفا سوال جدید درج نمایید </span>";
			exit();	
		}
		else{
			$query = "insert into Question(Question, Answer0, Answer1, Answer2, Answer3, Language, Right_Answer, Subject_ID) values('$Question', '$Answer0', '$Answer1', '$Answer2', '$Answer3', '$Language', '$Right_Answer', '$Subject_ID')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> عملیه موفقانه انجام شد.</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Question not added !</span>";
				exit();
			}
		}
	}
}

public function addFaculty($Faculty, $Language){

	$Faculty = $this->fm->validation($Faculty);
	$Language  = $this->fm->validation($Language);
		
	$Faculty = mysqli_real_escape_string($this->db->link, $Faculty);
	$Language  = mysqli_real_escape_string($this->db->link, $Language);
	
	mysqli_set_charset($this->db->link, 'UTF8');
	if ($Faculty == "" || $Language == "" ) {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}
	else{
		$chkquery = "select * from Faculty where Faculty = '$Faculty'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> Faculty already exist try new one! </span>";
			exit();	
		}
		else{
			$query = "insert into Faculty(Faculty, Language) values('$Faculty', '$Language')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> Faculty added Successfully !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Faculty not added !</span>";
				exit();
			}
		}
	}
}


public function disableUser($User_ID){
	$query = "UPDATE `users` SET `Status` = '0' WHERE `users`.`User_ID` = '$User_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> User Disabled ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> User Not Disabled ! </span> ";
		return $msg;
	}
}

public function enableUser($User_ID){
	$query = "UPDATE `users` SET `Status` = '1' WHERE `users`.`User_ID` = '$User_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> User enabled ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> User Not Enabled ! </span> ";
		return $msg;
	}
}


public function disableQuestion($Question_ID){
	$query = "UPDATE `Question` SET `Status` = '0' WHERE `Question`.`Question_ID` = '$Question_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> Question Disabled ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> Question Not Disabled ! </span> ";
		return $msg;
	}
}

public function enableQuestion($Question_ID){
	$query = "UPDATE `Question` SET `Status` = '1' WHERE `Question`.`Question_ID` = '$Question_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> Question enabled ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> Question Not Enabled ! </span> ";
		return $msg;
	}
}

public function disableSubject($Subject_ID){
	$query = "UPDATE `Subject` SET `Status` = '0' WHERE `Subject`.`Subject_ID` = '$Subject_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> Subject enabled ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> Subject Not Enabled ! </span> ";
		return $msg;
	}
}

public function enableSubject($Subject_ID){
	$query = "UPDATE `Subject` SET `Status` = '1' WHERE `Subject`.`Subject_ID` = '$Subject_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> Subject enabled ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> Subject Not Enabled ! </span> ";
		return $msg;
	}
}
public function approveMail($Contact_ID){
	$query = "UPDATE `Contact_Us` SET `Status` = '1' WHERE `Contact_Us`.`User_ID` = '$Contact_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> Mail Approved </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> Mail Not Approved! </span> ";
		return $msg;
	}
}
public function adminUser($User_ID){
	$query = "UPDATE `Users` SET `Role_ID` = '1' WHERE `Users`.`User_ID` = '$User_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> User Changed to Adminintrator ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> User Not Changed ! </span> ";
		return $msg;
	}
}

public function standardUser($User_ID){
	$query = "UPDATE `Users` SET `Role_ID` = '2' WHERE `Users`.`User_ID` = '$User_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> User Changed to Standard ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> User Not Changed ! </span> ";
		return $msg;
	}
}
	public function getAllUser(){
		$query = "select * from Users ORDER BY User_ID DESC";
		$result = $this->db->select($query);
		return $result;
	}
}
?>