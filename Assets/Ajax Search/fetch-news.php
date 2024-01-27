<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "News_Portal");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Viw_News WHERE Heading LIKE '%".$request."%'
or Body LIKE '%".$request."%'
or Category LIKE '%".$request."%' ORDER BY News_ID DESC";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){


  while($row = mysqli_fetch_array($result)){
    $news_img = $row["File"];
            
      $output .='<div class="col-md-12" >
        <span class = "active-title">
             
        </span>
      </div>
      <div class="col-md-12" style = "border-right: solid 1px rgb(170,170,170); padding-bottom: 20px; border-bottom: solid 1px rgb(170,170,170);">
     
      <a href="Details.php" style = "color: black;">
        <div class="col-md-12">
          <h2> ' .$row["Heading"]. '</h2>
        </div>
        <div class="row">

          <div class="col-md-4">
            <div class="col-md-12">
              <p> 
               ' .substr($row["Body"], 0,180)."..."."Read More". '
              </p>
            </div>
            <div class="col-md-12">
              <i class = "fa fa-clock-o"> </i> 34 min ago | <a href = "Details.php?id=' .$row["Category"]. '">' .$row["Category"]. '</a>
            </div>
          </div>
          
          <div class="col-md-8">
            <img  alt = " " width = "450px" height = "270px" src = "./img/' .$row["File"]. '"/> 
          </div>
        </div>
        </a>
        
      </div>
      </a>
';
            
  }

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Sorry!... No News Found</div>';
}

?>