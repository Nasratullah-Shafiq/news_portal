<?php
class Method{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	// public function getTotalRows(){
	// 	$query = "SELECT * from Viw_Question where Status = '1'";
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	$getResult = $this->db->select($query);
	// 	$total =$getResult->num_rows;
	// 	return $total;
	// }
	// /* FUNCTION FOR SHOWING TOTAL QUESTION OF SPECIFIC SUBJECT */
	// public function getTotalRowsOfSubject($Subject_ID){
	// 	$query = "SELECT * from Question where Subject_ID = '$Subject_ID' and Status = '1'";
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	$getResult = $this->db->select($query);
	// 	$total =$getResult->num_rows;
	// 	return $total;
	// }

	public function getCategoryByID($Category_ID){
		$query ="SELECT * from Category where Category_ID = '$Category_ID' and Language = 'Dari'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getNewsByID($Category_ID){
		$query ="SELECT * from News where Category_ID = '$Category_ID' ORDER BY Category_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getCategory(){
		$query = "SELECT * from Category where Language = 'Dari'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	// public function getDariQuestion($subject){
	// 	$query ="SELECT * from Viw_Question where Subject = '$subject' and Language = 'Dari' and Status = '1' ORDER BY Question_ID DESC";
	// 	$getData = $this->db->select($query);
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	return  $getData;
	// }
	// public function getUsersByUsername($Username){
	// 	$query = "SELECT * from Users where Username = '$Username'";
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	$getData = $this->db->select($query);
	// 	return $getData;
	// }
	// public function getSubject($Subject_ID){
	// 	$query = "SELECT * from Viw_Subject where Subject_ID = '$Subject_ID'";
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	$getData = $this->db->select($query);
	// 	return $getData;
	// }
	// public function getCateory(){
	// 	$query = "SELECT * from Category";
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	$getData = $this->db->select($query);
	// 	return $getData;
	// }
	
	// public function getSubjects(){
	// 	$query = "SELECT * from Viw_Subject where Language = 'English' and Status='1'";
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	$getData = $this->db->select($query);
	// 	return $getData;
	// }
	// public function getDariSubjects(){
	// 	$query = "SELECT * from Viw_Subject where Language = 'Dari' and Status='1'";
	// 	$getData = $this->db->select($query);
	// 	mysqli_set_charset($this->db->link, 'UTF8');
	// 	return $getData;
	// }
	
}
?>