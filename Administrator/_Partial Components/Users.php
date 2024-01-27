
<?php 
// $filepath = realpath(dirname(__FILE__));
include_once('Database.php');
include_once('Format.php');
//session_start();
class Users{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

public function userRegistration($First_Name, $Last_Name, $Username, $Password, $email, $Address, $City, $Gender){
	$First_Name = $this->fm->validation($First_Name);
	$Last_Name = $this->fm->validation($Last_Name);
	$Username = $this->fm->validation($Username);
	$Password = $this->fm->validation($Password);
	$email = $this->fm->validation($email);
	$Address = $this->fm->validation($Address);
	$City = $this->fm->validation($City);
	$Gender = $this->fm->validation($Gender);
	
	$First_Name = mysqli_real_escape_string($this->db->link, $First_Name);
	$Last_Name  = mysqli_real_escape_string($this->db->link, $Last_Name);
	$Username = mysqli_real_escape_string($this->db->link, $Username);
	$Password = mysqli_real_escape_string($this->db->link, md5($Password));
	$email = mysqli_real_escape_string($this->db->link, $email);
	$Address = mysqli_real_escape_string($this->db->link, $Address);
	$City = mysqli_real_escape_string($this->db->link, $City);
	$Gender = mysqli_real_escape_string($this->db->link, $Gender);

	mysqli_set_charset($this->db->link, 'UTF8');

	if ($First_Name == "" || $Last_Name == "" || $Username == "" || $Password == "" || $email == "" || $Address == "" || $City == "" || $Gender == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		echo "<span class = 'error'> Invalid e-mail Address!</span>";
		exit();
	}
	else{
		$chkquery = "select * from Admin_User where email = '$email'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> e-mail address already exist try new one! </span>";
			exit();	
		}
		$chckquery = "select * from Admin_User where Username = '$Username'";
		$chckresult = $this->db->select($chckquery);
		if ($chckresult != false) {
			echo "<span class = 'error'> Username address already exist! try new one. </span>";
			exit();	
		}
		else{
			$query = "insert into Admin_User(First_Name, Last_Name, Username, Password, email, Address, City, Gender) values('$First_Name', '$Last_Name', '$Username', '$Password', '$email', '$Address', '$City', '$Gender')";
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
	$Username = $this->fm->validation($Username);
	$Password = $this->fm->validation($Password);

	$Username = mysqli_real_escape_string($this->db->link, $Username);
	$Password = mysqli_real_escape_string($this->db->link, $Password);
	
	Session_start();
	$_SESSION['Username'] = $Username;
	
	if($Username == "" && $Password == ""){
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
		$query = "SELECT * from Users where username='$Username' AND password='$Password'";
		$result = $this->db->select($query); 
		
		if($result !=false){
			$value = $result->fetch-assoc();
			
			if($value['status'] == '1'){
				echo "disable";
				exit();
			}
			else{
				Session::init();
				session::set("login", true);
				session::set("User_ID", $value['User_ID']);
				session::set("username", $value['username']);
				session::set("name", $value['name']);

			}
		}
		else{
			echo "error";
			exit();
		}
	}
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
		echo "<span class ='error'> Please fill out all fields ! </span>";
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
public function updateCategory($Category_ID, $Category){
	
	$Category_ID = $this->fm->validation($Category_ID);
	$Category = $this->fm->validation($Category);
	

	$Category_ID = mysqli_real_escape_string($this->db->link, $Category_ID);
	$Category = mysqli_real_escape_string($this->db->link, $Category);
	
	mysqli_set_charset($this->db->link, 'UTF8'); 
	
	if ($Category == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}

	else{ 
			$query = "UPDATE `Category` SET  `Category_ID` = '$Category_ID', `Category` = '$Category'  WHERE `Category`.`Category_ID` = '$Category_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Category Not Updated !</span>";
				exit();
			}
		}
	}

public function updateNews($News_ID, $Heading, $Body, $Source, $Category_ID){
	
	$News_ID = $this->fm->validation($News_ID);
	$Heading = $this->fm->validation($Heading);
	$Body = $this->fm->validation($Body);
	$Source = $this->fm->validation($Source);
	$Category_ID = $this->fm->validation($Category_ID);
	

	$News_ID = mysqli_real_escape_string($this->db->link, $News_ID);
	$Heading = mysqli_real_escape_string($this->db->link, $Heading);
	$Body = mysqli_real_escape_string($this->db->link, $Body);
	$Source = mysqli_real_escape_string($this->db->link, $Source);
	$Category_ID = mysqli_real_escape_string($this->db->link, $Category_ID);
	
	mysqli_set_charset($this->db->link, 'UTF8');
	if ($News_ID == "" || $Heading == "" || $Body == "" || $Source == "" || $Category_ID == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}

	else{
			$query = "UPDATE `News` SET `News_ID` = '$News_ID', `Heading` = '$Heading', `Body` = '$Body', `Source` = '$Source', `Category_ID` = '$Category_ID' WHERE `News`.`News_ID` = '$News_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> Updation Successfull !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: News Details Not Updated !</span>";
				exit();
			}
		}
	}



public function addCategories($Category){
	$Category = $this->fm->validation($Category);
	
	$Category = mysqli_real_escape_string($this->db->link, $Category);

	$Category = filter_var($Category, FILTER_SANITIZE_STRING);
	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Category == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}
	
	else{
		$chkquery = "select * from Category where Category = '$Category'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> Category is already exist try new one! </span>";
			exit();	
		}
		else{
			$query = "insert into Category(Category, Language) values('$Category', 'English')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> Insertion Successfully !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Category Not Added !</span>";
				exit();
			}
		}
	}
}
public function addCatgory($Category, $Language){
	$Category = $this->fm->validation($Category);
	$Language = $this->fm->validation($Language);
	
	$Category = mysqli_real_escape_string($this->db->link, $Category);
	$Language = mysqli_real_escape_string($this->db->link, $Language);

	$Category = filter_var($Category, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	mysqli_set_charset($this->db->link, 'UTF8');
	

	if ($Category == "" || $Language == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}
	
	else{
		$chkquery = "select * from Category where Category = '$Category'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> Category already exist try new one! </span>";
			exit();	
		}
		else{
			$query = "insert into Category(Category, Language) values('$Category', '$Language')";
			$inserted_row = $this->db->insert($query);
			mysqli_set_charset($this->db->link, 'UTF8');
			if($inserted_row){
				echo "<span class = 'success'> Category Inserted Successfully !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: Category Not Inserted !</span>";
				exit();
			}
		}
	}
}


public function addQuestions($Question, $Answer0, $Answer1, $Answer2, $Answer3, $Language, $Right_Answer, $Subject_ID, $Status){
	$Question = $this->fm->validation($Question);
	$Answer0  = $this->fm->validation($Answer0);
	$Answer1  = $this->fm->validation($Answer1);
	$Answer2  = $this->fm->validation($Answer2);
	$Answer3  = $this->fm->validation($Answer3);
	$Language  = $this->fm->validation($Language);
	$Right_Answer = $this->fm->validation($Right_Answer);
	$Subject_ID = $this->fm->validation($Subject_ID);
	$Status  = $this->fm->validation($Status);
		
	$Question = mysqli_real_escape_string($this->db->link, $Question);
	$Answer0  = mysqli_real_escape_string($this->db->link, $Answer0);
	$Answer1 = mysqli_real_escape_string($this->db->link, $Answer1);
	$Answer2 = mysqli_real_escape_string($this->db->link, $Answer2);
	$Answer3 = mysqli_real_escape_string($this->db->link, $Answer3);
	$Language = mysqli_real_escape_string($this->db->link, $Language);
	$Right_Answer = mysqli_real_escape_string($this->db->link, $Right_Answer);
	$Subject_ID = mysqli_real_escape_string($this->db->link, $Subject_ID);
	$Status = mysqli_real_escape_string($this->db->link, $Status);

	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Question == "" || $Answer0 == "" || $Answer1 == "" || $Answer2 == "" || $Answer3 == "" || $Language == "" || $Right_Answer == "" || $Subject_ID == "" || $Status == "") {
		echo "<span class ='error'> Please fill out all fields ! </span>";
		exit();
	}
	
	else{
		$chkquery = "select * from Question where Question = '$Question'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> Question already exist try new one! </span>";
			exit();	
		}
		else{
			$query = "insert into Question(Question, Answer0, Answer1, Answer2, Answer3, Language, Right_Answer, Subject_ID, Status) values('$Question', '$Answer0', '$Answer1', '$Answer2', '$Answer3', '$Language', '$Right_Answer', '$Subject_ID', '$Status')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> Question added Successfully !</span>";
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
		echo "<span class ='error'> Please fill out all fields ! </span>";
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


public function pendingNews($News_ID){
	$query = "UPDATE `News` SET `Status` = 'Pending' WHERE `News`.`News_ID` = '$News_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> News Status Changed to Pending ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> Question Not Disabled ! </span> ";
		return $msg;
	}
}

public function publishNews($News_ID){
	$query = "UPDATE `News` SET `Status` = 'Publish' WHERE `News`.`News_ID` = '$News_ID'";
	$update_row = $this->db->update($query);
	if($update_row){
		$msg = "<span class = 'success'> News Status Changed to Publish ! </span> ";
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