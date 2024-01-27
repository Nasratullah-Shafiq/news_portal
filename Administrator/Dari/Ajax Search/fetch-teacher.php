<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "quiz");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Teacher WHERE Teacher_Name LIKE '%".$request."%'
or Email LIKE '%".$request."%'
or Gender LIKE '%".$request."%'
or Mobile_No LIKE '%".$request."%'
or Time LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> ID </th>
            <th> Teacher </th>
            <th> Email </th>
            <th> Gender </th>
            <th> Mobile No </th>
            <th> Time </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

               $output .='<tr> 
                    <td>' .$row["Teacher_ID"]. '</td> 
                    <td>' .$row["Teacher_Name"]. '</td>  
                    <td>' .$row["Email"]. '</td> 
                    <td>' .$row["Gender"]. '</td> 
                    <td>' .$row["Mobile_No"]. '</td>
                    <td>' .$row["Time"]. '</td>  
                    <td> <a href="Edit-Users.php?edit='.$row['Teacher_ID'].'" style="color: #32C5D2;"> <i class = "fa fa-pencil"></i> Edit </a></td>
                    <td> <a href="Delete/DeleteTeacher.php?del='.$row['Teacher_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>

               </tr>';
}
    $output .='</table>';
    $output .='</div>';
  echo $output;

}
else{
  echo '<div class="alert alert-danger" role="alert"> Opps!... No Teachers record Found</div>';
}

?>