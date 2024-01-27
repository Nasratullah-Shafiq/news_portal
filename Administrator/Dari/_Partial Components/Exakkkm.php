<?php
class Exam{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getTotalRows(){
		$query = "SELECT * from Viw_Question where Status = '1'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
	/* FUNCTION FOR SHOWING TOTAL QUESTION OF SPECIFIC SUBJECT */
	public function getTotalRowsOfSubject($Subject_ID){
		$query = "SELECT * from Question where Subject_ID = '$Subject_ID' and Status = '1'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
	public function getQuestions($Subject){
		$query ="SELECT * from Viw_Question where Subject = '$Subject' ORDER BY Question_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getQuizResult(){
		$query ="SELECT * from Result";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getQuizResultByResult($Result_ID){
		$query ="SELECT * from Result where Result_ID = '$Result_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getQuizResultByID($User_ID){
		$query ="SELECT * from Result where User_ID = '$User_ID'";
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
//
	public function getSubject(){
		$query = "SELECT * from Viw_Subject";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	public function getContact(){
		$query = "SELECT * from Contact_Us where Status = '0'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
	public function getSubjects(){
		$query = "SELECT * from Viw_Subject where Language = 'English' and Status='1'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	public function getDariSubjects(){
		$query = "SELECT * from Viw_Subject where Language = 'Dari' and Status='1'";
		$getData = $this->db->select($query);
		mysqli_set_charset($this->db->link, 'UTF8');
		return $getData;
	}
	public function getAllQuestions(){
		$query = "SELECT * from Viw_Question";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		// $total =$getResult->num_rows;
		return $getResult;
	}
	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR SUBJECT TABLE   */
	public function getAllSubjects(){
		$query = "SELECT * from Viw_Subject";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		// $total =$getResult->num_rows;
		return $getResult;
	}
//	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR TEACHER TABLE   */
	public function getAllTeachers(){
		$query = "SELECT * from Teacher";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		// $total =$getResult->num_rows;
		return $getResult;
	}
//	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR USERS TABLE   */
	public function getAllUsers(){
		$query = "SELECT * from Users";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		// $total =$getResult->num_rows;
		return $getResult;
	}
	/* SELECT TOTAL NUMBER OF ROWS FROM DATABASE FOR USERS TABLE   */
	public function getAllContacts(){
		$query = "SELECT * from Contact_Us";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}

	/* SELECT ALL ROWS FROM DATABASE FOR QUESTION TABLE   */
	public function getQuestion(){
		$query ="SELECT * from Viw_Question";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	/* SELECT SINGLE ROW FROM DATABASE FOR QUESTION TABLE BY QUESTION_ID  */
	public function getQuestionByID($Question_ID){
		$query = "SELECT * from Question where Question_ID = '$Question_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	public function getFaculty(){
		$query = "SELECT * from Faculty";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT SINGLE ROW FROM DATABASE FOR TEACHER TABLE BY TEACHER_ID  */
	public function getTeacherByID($Teacher_ID){
		$query = "SELECT * from Teacher where Teacher_ID = '$Teacher_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT SINGLE ROW FROM DATABASE FOR SUBJECT TABLE BY SUBJECT_ID  */
	public function getSubjectByID($Subject_ID){
		$query = "SELECT * from Subject where Subject_ID = '$Subject_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}


	public function getFacultyByID($Faculty_ID){
		$query = "SELECT * from Faculty where Faculty_ID = '$Faculty_ID'";
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
	/* SELECT ALL ROWS FROM DATABASE FOR TEACHER TABLE  */
	public function getTeacher(){
		$query = "SELECT * from Teacher";
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
	public function getViwQuestions(){
		$query = "SELECT * from Viw_Question";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* SELECT ALL ROWS FROM USERS TABLE  */
	public function getAdminUsers(){
		$query = "SELECT * from Users";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	/* DELETE SINGLE ROW FROM SUBJECT TABLE  */
	public function delSubjects($Subject_ID){
		$query = "delete from Subject where Subject_ID ='$Subject_ID'";
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
		$query = "delete from Users where User_ID ='$User_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		// $img = row['Image'];
		// unlink($img);
		return $getData;
	}
	/* DELETE SINGLE ROW FROM TEACHER TABLE  */
	public function delTeachers($Teacher_ID){
		$query = "delete from Teacher where Teacher_ID ='$Teacher_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}
	public function delFaculty($Faculty_ID){
		$query = "delete from Faculty where Faculty_ID ='$Faculty_ID'";
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
	public function editTeachers($Teacher_ID){
		$query = "delete from Teacher where Teacher_ID ='$Teacher_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}

	public function delQuizResult($Result_ID){
		$query = "DELETE from Result where Result_ID ='$Result_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->delete($query);
		return $getData;
	}
}
?>