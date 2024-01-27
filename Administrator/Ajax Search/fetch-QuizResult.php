<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "quiz");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Result WHERE Username LIKE '%".$request."%'
or Teacher LIKE '%".$request."%' 
or Subject LIKE '%".$request."%'
or Result LIKE '%".$request."%'
or Submit_Date LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> Total </th>
            <th> Username </th>
            <th> Teacher </th>
            <th> Subject </th>
            <th> Attempt </th>
            <th> Correct </th>
            <th> Wrong </th>
            <th> No Answer </th>
            <th> Result </th>
            <th> Date </th>
            <th> View Result</th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

        $output .='
         <tr>
            <td>' .$row["TotalNumberOfQuestion"]. '</td> 
            <td>' .$row["Username"]. '</td>
            <td>' .$row["Teacher"]. '</td>
            <td>' .$row["Subject"]. '</td>
            <td>' .$row["Attempted_Answer"]. '</td>
            <td>' .$row["Correct_Answer"]. '</td> 
            <td>' .$row["Wrong_Answer"]. '</td>
            <td>' .$row["No_Answer"]. '</td>
            <td>' .$row["Result"]. ' %'.'</td>
            <td>' .$row["Submit_Date"]. '</td>
            <td> <a href="viewResult.php?id='.$row['Result_ID'].'" style="color: #32C5D2;"> view Result </a> </td>
            <td> <a href="Delete/DeleteResult.php?del='.$row['Result_ID'].'" style="color: #D05454;"> <i class = "fa fa-times"></i> Delete </a></td> 
        </tr>
         ';
}

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Sorry!... No Quiz Result Found</div>';
}

?>