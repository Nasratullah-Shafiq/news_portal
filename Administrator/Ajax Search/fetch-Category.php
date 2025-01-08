<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "News_Portal");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Category WHERE Language = 'English' AND Category_ID LIKE '%".$request."%'
or Category LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> ID </th>
            <th> Category </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

        $output .='
         <tr>
            <td>' .$row["Category_ID"]. '</td> 
            <td>' .$row["Category"]. '</td>
            <td> <a href="viewResult.php?id='.$row['Category_ID'].'" style="color: #32C5D2;"> view Result </a> </td>
            <td> <a href="Delete/DeleteResult.php?del='.$row['Category_ID'].'" style="color: #D05454;"> <i class = "fa fa-times"></i> Delete </a></td> 
        </tr>
         ';
}

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Sorry!... No Category Found</div>';
}

?>