<?php
class Exam{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getTotalRows(){
		$query = "SELECT * from News where Status = 'Publish'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
	/* FUNCTION FOR SHOWING TOTAL QUESTION OF SPECIFIC SUBJECT 
	public function getTotalRowsOfSubject($Subject_ID){
		$query = "SELECT * from Question where Subject_ID = '$Subject_ID' and Status = '1'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
*/
	public function getNewsByCategory($News_ID){
		$query ="SELECT * from News where Category_ID = '$Category_ID' ORDER BY News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getDariQuestion($subject){
		$query ="SELECT * from Viw_Question where Subject = '$subject' and Language = 'Dari' and Status = '1'";
		$getData = $this->db->select($query);
		mysqli_set_charset($this->db->link, 'UTF8');
		return  $getData;
	}
	public function getUsersByUsername($Username){
		$query = "SELECT * from Users where Username = '$Username'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}

	public function getCategory(){
		$query = "SELECT * from Category where Language = 'Pashto'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	
	public function getAllNews(){
		$query = "select * from News";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR SUBJECT TABLE   */
	public function getAllCategories(){
		$query = "SELECT * from Category where Language = 'Pashto'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}
	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR TEACHER TABLE   */
	
	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR USERS TABLE   */
	public function getAllUsers(){
		$query = "select * from Users";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}

	public function getNewsByID($News_ID){
		$query = "SELECT * from Viw_News where News_ID = '$News_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT SINGLE ROW FROM DATABASE FOR SUBJECT TABLE BY SUBJECT_ID*/  
	public function getCategoryByID($Category_ID){
		$query = "SELECT * from Category where Category_ID = '$Category_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT SINGLE ROW FROM DATABASE FOR USERS TABLE BY USER_ID  */
	public function getUserByID($User_ID){
		$query = "SELECT * from Users where User_ID = '$User_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	
	public function getContactUs(){
		$query = "SELECT * from Contact_Us";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	public function getContactUsByID($Contact_ID){
		$query = "SELECT * from Contact_Us where User_ID = '$Contact_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT ALL ROWS FROM VIEW QUESTION  */
	public function getNews(){
		$query = "SELECT * from Viw_News WHERE Language = 'Pashto'  ORDER BY News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT ALL ROWS FROM USERS TABLE  */
	public function getAdminUsers(){
		$query = "select * from Users";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* DELETE SINGLE ROW FROM SUBJECT TABLE  */
	public function delCategory($Category_ID){
		$query = "delete from Category where Category_ID ='$Category_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}
	public function delContactUs($Contact_ID){
		$query = "delete from Contact_Us where User_ID ='$Contact_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}
	/* DELETE SINGLE ROW FROM USERS TABLE  */
	public function delUsers($User_ID){
		$query = "delete from Admin_User where User_ID ='$User_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}
	
	/* DELETE SINGLE ROW FROM QUESTION TABLE  */
	public function delQuestions($Question_ID){
		$query = "delete from Question where Question_ID ='$Question_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}
	public function editSubjects($Subject_ID){
	$query = "delete from Subject where Subject_ID ='$Subject_ID'";
	mysqli_set_charset($this->db->link, 'UTF8');
	$getData = $this->db->delete($query);
	return $getData;
	}
	public function editUsers($User_ID){
		$query = "delete from Admin_User where User_ID ='$User_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}

}
?>