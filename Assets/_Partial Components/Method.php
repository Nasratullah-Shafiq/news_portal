<?php
class Method{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
/* FUNCTION FOR SHOWING TOTAL QUESTION OF SPECIFIC SUBJECT */

	public function getTotalComment($News_ID){
		$query = "SELECT * from Comment where News_ID = '$News_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		
		if(!$getResult){
			return "0";

		}else{
			$total =$getResult->num_rows;
			return $total;
		}
		
	}

	public function getTotalLike(){
		$query = "SELECT * from News_Like";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getResult = $this->db->select($query);
		$total =$getResult->num_rows;
		return $total;
	}
	
	public function getCategoryByID($Category_ID){
		$query ="SELECT * from Category where Category_ID = '$Category_ID' and Language = 'English'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getNewsByCategory($Category_ID){
		$query ="SELECT * from News where Category_ID = '$Category_ID'  and status = 'Publish' order by News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getNewsByID($News_ID){
		$query ="SELECT * from Viw_News where News_ID = '$News_ID' and status = 'Publish'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	
	public function getMostReadNews(){
		$query ="SELECT * from Viw_News limit 10";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getSportNews(){
		$query ="SELECT * from Viw_News where Category = 'Sports' and status = 'Publish' order by News_ID DESC limit 6";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getAfghanistanNews(){
		$query ="SELECT * from Viw_News where Category = 'Afghanistan' and status = 'Publish' order by News_ID DESC limit 6";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getWorldNews(){
		$query ="SELECT * from Viw_News where Category = 'World' and status = 'Publish' order by News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getTechnologyNews(){
		$query ="SELECT * from Viw_News where Category = 'Technology' and status = 'Publish' order by News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getScienceNews(){
		$query ="SELECT * from Viw_News where Category = 'Science' and status = 'Publish' order by News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
		
	}
	public function getFoodNews(){
		$query ="SELECT * from Viw_News where Category = 'Food' and status = 'Publish' order by News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getHealthNews(){
		$query ="SELECT * from Viw_News where Category = 'Health' and status = 'Publish' order by News_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getUsersByUsername($Email){
		$query = "SELECT * from Users where Email = '$Email'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}

	
	public function getCategory(){
		$query = "SELECT * from Category where Language = 'English'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return $getData;
	}
	public function getLike($News_ID){
		$query ="SELECT * from News_Like where News_ID = '$News_ID'";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
	public function getComment(){
		$query ="SELECT * from Comment ORDER BY  Comment_ID DESC";
		mysqli_set_charset($this->db->link, 'UTF8');
		$getData = $this->db->select($query);
		return  $getData;
	}
}
?>