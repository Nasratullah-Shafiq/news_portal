<?php 
// $filepath = realpath(dirname(__FILE__));
include('Database.php');
include('Format.php');
//session_start();
class Users{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
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
public function userLogin($Email, $Password){
	
	$Email = $this->fm->validation($Email);
	$Password = $this->fm->validation($Password);
	
	$Email = mysqli_real_escape_string($this->db->link, $Email);
	mysqli_set_charset($this->db->link, 'UTF8');
	
	Session_start();
	$_SESSION['Email'] = $Email;
	
	if(($Email == "") && ($Password == "")){
		echo "empty";
		exit();

	}
	else if($Email == "" && $Password != ""){
		echo "incorrect";
		exit();

	}
	else if($Email != "" && $Password == ""){
		echo "failed";
		exit();

	}
	else{
		$Password = mysqli_real_escape_string($this->db->link, md5($Password));
		$query = "SELECT * from Users where Email = '$Email' AND Password = '$Password'";
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
			$query = "UPDATE `News_Like` SET `Like_ID` = '', `News_ID` = '', `User_ID` = '' WHERE `News_Like`.`User_ID` = '$User_ID'";
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

	public function addLike($News_ID, $User_ID){

	$News_ID = $this->fm->validation($News_ID);
	$User_ID = $this->fm->validation($User_ID);
	
	$News_ID = mysqli_real_escape_string($this->db->link, $News_ID);
	$User_ID = mysqli_real_escape_string($this->db->link, $User_ID);

	$query = "insert into News_Like(News_ID, User_ID) values('$News_ID', '$User_ID')";
	$inserted_row = $this->db->insert($query);
	if($inserted_row){
		echo "<span class = 'success'> Insertion Successfully !</span>";
		exit();
	}
	else{
		echo "<span class = 'error'> Error: You Can Not Like This Post !</span>";
		exit();
	}

}
// public function disLike($Like_ID){
// 	print_r($Like_ID);
// 		$query = "DELETE from News_Like WHERE Like_ID ='$Like_ID'";
// 		mysqli_set_charset($this->db->link, 'UTF8');
// 		$getData = $this->db->delete($query);
// 		return $getData;
// 	}

	public function disLike($Like_ID){
		print_r($Like_ID);
		
		$query = "DELETE from News_Like WHERE Like_ID ='$Like_ID'";
		print_r($Like_ID);
		$delete_row = $this->db->delete($query);
		if($delete_row){
			echo "<span class = 'success'> You Unliked This News !</span>";
			exit();
		}
		else{
			echo "<span class = 'error'> Error: You did Not Like This News !</span>";
			exit();
		}
	}

	public function addComment($News_ID, $User_ID, $Comment){

	$News_ID = $this->fm->validation($News_ID);
	$User_ID = $this->fm->validation($User_ID);
	$Comment = $this->fm->validation($Comment);
	
	$News_ID = mysqli_real_escape_string($this->db->link, $News_ID);
	$User_ID = mysqli_real_escape_string($this->db->link, $User_ID);
	$Comment = mysqli_real_escape_string($this->db->link, $Comment);

	$Comment = filter_var($Comment, FILTER_SANITIZE_STRING);
	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Comment == "") {
		echo "<span class ='error'> Please fill out Comment fields ! </span>";
		exit();
	}
	
	else{
		$query = "insert into Comment(News_ID, User_ID, Comment) values('$News_ID', '$User_ID', '$Comment')";
		$inserted_row = $this->db->insert($query);
		if($inserted_row){
			echo "<span class = 'success'> Insertion Successfully !</span>";
			exit();
		}
		else{
			echo "<span class = 'error'> Error: Comment Not Added !</span>";
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