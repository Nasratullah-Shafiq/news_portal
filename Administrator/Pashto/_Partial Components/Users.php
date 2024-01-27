
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


public function editCategory($Category_ID, $Category){
	
	$Category_ID = $this->fm->validation($Category_ID);
	$Category = $this->fm->validation($Category);

	$Category_ID = mysqli_real_escape_string($this->db->link, $Category_ID);
	$Category = mysqli_real_escape_string($this->db->link, $Category);
	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Category_ID == "" || $Category == "") {
		echo "<span class ='error'> ټول معلومات مکمل کړۍ </span>";
		exit();
	}

	else{
			$query = "UPDATE `Category` SET `Category_ID` = '$Category_ID', `Category` = '$Category' WHERE `Category`.`Category_ID` = '$Category_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'success'> عملیه په بریالیتوب سره سرته ورسیده !</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: عملیه په بریالیتوب سره سر ته و نه رسیدله.</span>";
				exit();
			}
		}
	}


public function editNews($News_ID, $Heading, $Body, $Source, $Category_ID){
	
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
		echo '<input type="text" class="form-control text-right Heading" value = "his is no fair" id="Heading">';
		exit();
	}

	else{
			$query = "UPDATE `News` SET `News_ID` = '$News_ID', `Heading` = '$Heading', `Body` = '$Body', `Source` = '$Source', `Category_ID` = '$Category_ID' WHERE `News`.`News_ID` = '$News_ID'";
			$update_row = $this->db->update($query);
			if($update_row){
				echo "<span class = 'Headingg'> ! عمیله په بریالیتوب سره سرته ورسیده </span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: ! عمیله په بریالیتوب سره ترسره نه شوه </span>";
				exit();
			}
		}
	}	


public function addCategories($Category){
	$Category = $this->fm->validation($Category);
	
	$Category = mysqli_real_escape_string($this->db->link, $Category);
	

	$Category = filter_var($Category);
	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Category == "") {
		echo "<span class ='error'> لطفا تمام خانه ها را پر نمایید </span>";
		exit();
	}

	else{
		$chkquery = "select * from Category where Category = '$Category'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> کټګوری له مخکی موجوده ده </span>";
			exit();	
		}
		else{
			$query = "insert into Category(Category, Language) values('$Category', 'Pashto')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> عملیه په بریالیتوب تر سره شوه شد</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: عملیه په بریالیتوب سر ته و نه رسیدله </span>";
				exit();
			}
		}
	}
}

public function addNews($Heading, $Body, $Source, $Category_ID){
	$Heading = $this->fm->validation($Heading);
	$Body  = $this->fm->validation($Body);
	$Source  = $this->fm->validation($Source);
	$Category_ID  = $this->fm->validation($Category_ID);
	
		
	$Heading = mysqli_real_escape_string($this->db->link, $Heading);
	$Body  = mysqli_real_escape_string($this->db->link, $Body);
	$Source = mysqli_real_escape_string($this->db->link, $Source);
	$Category_ID = mysqli_real_escape_string($this->db->link, $Category_ID);
	

	mysqli_set_charset($this->db->link, 'UTF8');

	if ($Heading == "" || $Body == "" || $Source == "" || $Category_ID == "") {
		echo "<span class ='error'> لطفا ټول معلومات مکمل کړۍ </span>";
		exit();
	}
	
	else{
		$chkquery = "select * from News where Heading = '$Heading'";
		$chkresult = $this->db->select($chkquery);
		if ($chkresult != false) {
			echo "<span class = 'error'> دا خبر له مخکی نه موجود دی ! </span>";
			exit();	
		}
		else{
			$query = "insert into News(Heading, Body, Source, File, Language, Category_ID, Status) values('$Heading', '$Body', '$Source', 'ssss', 'Pashto', '$Category_ID', 'Pending')";
			$inserted_row = $this->db->insert($query);
			if($inserted_row){
				echo "<span class = 'success'> عملیه موفقانه انجام شد.</span>";
				exit();
			}
			else{
				echo "<span class = 'error'> Error: خبر سیستم ته داخل نشو !</span>";
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
		$msg = "<span class = 'success'> User Changed to Adminintrator ! </span> ";
		return $msg;
	}
	else{
		$msg = "<span class = 'error'> User Not Changed ! </span> ";
		return $msg;
	}
}

public function viewerUser($User_ID){
	$query = "UPDATE `Users` SET `Role_ID` = '3' WHERE `Users`.`User_ID` = '$User_ID'";
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