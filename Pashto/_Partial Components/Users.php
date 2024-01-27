<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./Database.php');
include_once($filepath.'./Format.php');
//session_start();
class Users{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

public function addResults($User_ID, $TotalNumberOfQuestion, $Username, $Teacher, $Subject, $Credit_Hours, $Attempted_Answer, $Correct_Answer, $Wrong_Answer, $No_Answer, $Result){
	// $TotalNumberOfQuestion = $this->fm->validation($TotalNumberOfQuestion);
	// $Username  = $this->fm->validation($Username);
	// $Teacher  = $this->fm->validation($Teacher);
	// $Subject  = $this->fm->validation($Subject);
	// $Credit_Hours  = $this->fm->validation($Credit_Hours);
	// $Attempted_Answer  = $this->fm->validation($Attempted_Answer);
	// $Correct_Answer = $this->fm->validation($Correct_Answer);
	// $Wrong_Answer = $this->fm->validation($Wrong_Answer);
	// $No_Answer = $this->fm->validation($No_Answer);
	// $Result = $this->fm->validation($Result);
	
	$User_ID = mysqli_real_escape_string($this->db->link, $User_ID);		
	$TotalNumberOfQuestion = mysqli_real_escape_string($this->db->link, $TotalNumberOfQuestion);
	$Username  = mysqli_real_escape_string($this->db->link, $Username);
	$Teacher = mysqli_real_escape_string($this->db->link, $Teacher);
	$Subject = mysqli_real_escape_string($this->db->link, $Subject);
	$Credit_Hours = mysqli_real_escape_string($this->db->link, $Credit_Hours);
	$Attempted_Answer = mysqli_real_escape_string($this->db->link, $Attempted_Answer);
	$Correct_Answer = mysqli_real_escape_string($this->db->link, $Correct_Answer);
	$Wrong_Answer = mysqli_real_escape_string($this->db->link, $Wrong_Answer);
	$No_Answer = mysqli_real_escape_string($this->db->link, $No_Answer);
	$Result = mysqli_real_escape_string($this->db->link, $Result);

	
	mysqli_set_charset($this->db->link, 'UTF8');

	if ($TotalNumberOfQuestion == "" || $Username == "" || $Teacher == "" || $Subject == "" || $Credit_Hours == "" || $Attempted_Answer == "" || $Correct_Answer == "" || $Wrong_Answer == "" || $No_Answer == "" || $Result == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}
		else{
			$query = "INSERT into Result(User_ID, TotalNumberOfQuestion, Username, Teacher, Subject, Credit_Hours, Attempted_Answer, Correct_Answer, Wrong_Answer, No_Answer, Result) values('$User_ID', '$TotalNumberOfQuestion', '$Username', '$Teacher', '$Subject', '$Credit_Hours', '$Attempted_Answer', '$Correct_Answer', '$Wrong_Answer', '$No_Answer', '$Result')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> Result added Successfully !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Result not added !</span>";
				exit();
			}
		}
}


public function userRegistration($Full_Name, $Username, $Password, $Email, $Gender, $Phone_No){
	$Full_Name = $this->fm->validation($Full_Name);
	$Username = $this->fm->validation($Username);
	$Password = $this->fm->validation($Password);
	$Email = $this->fm->validation($Email);
	$Gender = $this->fm->validation($Gender);
	$Phone_No = $this->fm->validation($Phone_No);

	$Full_Name = mysqli_real_escape_string($this->db->link, $Full_Name);
	$Username = mysqli_real_escape_string($this->db->link, $Username);
	$Password = mysqli_real_escape_string($this->db->link, md5($Password));
	$Email = mysqli_real_escape_string($this->db->link, $Email);
	$Gender = mysqli_real_escape_string($this->db->link, $Gender);
	$Phone_No = mysqli_real_escape_string($this->db->link, $Phone_No);

	if ($Full_Name == "" || $Username == "" || $Password == "" || $Email == "" || $Gender == "" || $Phone_No == "") {
		echo "<span class ='error'> Fields must not be empty ! </span>";
		exit();
	}
	else if(filter_var($Email, FILTER_VALIDATE_EMAIL) === false){
		echo "<span class = 'error'> Invalid E-mail Address!</span>";
		exit();
	}
	else{
		$chkquery = "select * from Users where Email = '$Email'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> e-mail address already exist! </span>";
			exit();	
		}
		$chckquery = "select * from Users where Username = '$Username'";
		$chckresult = $this->db->select($chckquery);
		if ($chckresult != false) {
			echo "<span class = 'error'> Username address already exist! try new one. </span>";
			exit();	
		}
		else{
			$query = "insert into Users($Full_Name, $Username, $Password, $Email, $Gender, $Phone_No) values('$Full_Name', '$Username', '$Password', '$Email', '$Gender', '$Phone_No')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> Registration Successfully !</span>";
				
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Not Registered !</span>";
				exit();
			}
		}
	}
}
public function userLogin($Username, $Password){
	$Password = $this->fm->validation($Password);
	$Username = $this->fm->validation($Username);

	
	$Username = mysqli_real_escape_string($this->db->link, $Username);
	mysqli_set_charset($this->db->link, 'UTF8');
	
	Session_start();
	$_SESSION['Username'] = $Username;
	
	if(($Username == "") && ($Password == "")){
		echo "empty";
		exit();

	}
	else if($Username == "" && $Password != ""){
		echo "incorrect";
		exit();

	}
	else if($Username != "" && $Password == ""){
		echo "failed";
		exit();

	}
	else{
		$Password = mysqli_real_escape_string($this->db->link, md5($Password));
		$query = "SELECT * from Users where Username = '$Username' AND Password = '$Password'";
		echo $result = $this->db->select($query); 

		if($result !=false){
			$row = $result->fetch-assoc();
			
			if($row['Status'] == '0'){
				echo "disable";
				exit();
			}
		}
		else{
			echo "error";
			exit();
		}
	}
}
public function forgotPassword($Username, $Email){
	
	$Username = $this->fm->validation($Username);
	$Email = $this->fm->validation($Email);

	$Username = mysqli_real_escape_string($this->db->link, $Username);
	$Email = mysqli_real_escape_string($this->db->link, $Email);
	mysqli_set_charset($this->db->link, 'UTF8');
	
	session_start();
	$_SESSION['Email'] = $Email;
	$_SESSION['Username'] = $Username;
	if($Username == "" || $Email == ""){
		echo "empty";
		exit();

	}

	else{
		$query = "select * from Users where Username='$Username' and Email='$Email'";
		$result = $this->db->select($query); 
		if($result !=false){
			$value = $result->fetch-assoc();
		}
		else{
			echo "error";
			exit();
		}
	}
}
public function changePass($Password, $User_ID){
	
	$User_ID = $this->fm->validation($User_ID);
	$Password = $this->fm->validation($Password);

	$User_ID = mysqli_real_escape_string($this->db->link, $User_ID);
	
	
	if($Password == ""){
		echo "<span class = 'success'> empty password field !</span>";
		exit();

	}
		else{
			$Password = mysqli_real_escape_string($this->db->link, md5($Password));
			$query = "UPDATE `users` SET `password` = '$Password' WHERE `users`.`User_ID` = '$User_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Profile Not Updated !</span>";
				exit();
			}
		}
}

public function updateProfile($Full_Name, $Username, $Email, $Gender, $Phone_No, $Image, $User_ID){
	$Full_Name = $this->fm->validation($Full_Name);
	$Username = $this->fm->validation($Username);
	$Email = $this->fm->validation($Email);
	$Gender = $this->fm->validation($Gender);
	$Phone_No = $this->fm->validation($Phone_No);
	$Image = $_FILES['image']['name'];
	$Image_tmp = $_FILES['image']['tmp_name'];

	$Full_Name = mysqli_real_escape_string($this->db->link, $Full_Name);
	$Username = mysqli_real_escape_string($this->db->link, $Username);
	$Email = mysqli_real_escape_string($this->db->link, $Email);
	$Gender = mysqli_real_escape_string($this->db->link, $Gender);
	$Phone_No = mysqli_real_escape_string($this->db->link, $Phone_No);
	
	if ($Full_Name == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}

	else{
			$query = "UPDATE `users` SET `Full_Name` = '$Full_Name', `Username` = '$Username', `Email` = '$Email', `Phone_No` = '$Phone_No', `Image` = '$Image' WHERE `users`.`User_ID` = '$User_ID'";
			move_uploaded_file($Image_tmp, "img/_ProfilePicture/$Image");
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Profile Not Updated !</span>";
				exit();
			}
		}
	}

	public function updatePass($Password, $User_ID){
	$User_ID = $this->fm->validation($User_ID);
	$Password = $this->fm->validation($Password);

	$User_ID = mysqli_real_escape_string($this->db->link, $User_ID);
	
	if ($Password == "") {
		echo "<span class ='error'> Please fill Password field ! </span>";
		exit();
	}

	else{
			$Password = mysqli_real_escape_string($this->db->link, md5($Password));
			$query = "UPDATE `users` SET `password` = '$Password' WHERE `users`.`User_ID` = '$User_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Password Updated !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Password Not Updated !</span>";
				exit();
			}
		}
	}

	public function getAllUser(){
		$query = "select * from Users ORDER BY User_ID DESC";
		$result = $this->db->select($query);
		return $result;
	}
	
}
?>