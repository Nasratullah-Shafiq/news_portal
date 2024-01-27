<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "quiz");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Contact_Us WHERE Full_Name LIKE '%".$request."%'
or Email LIKE '%".$request."%' 
or Phone_No LIKE '%".$request."%'
or Date LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> ID </th>
            <th> Full_Name </th>
            <th> Email </th>
            <th> Phone No </th>
            <th> Date </th>
            <th> View Mail </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

        $output .='
         <tr>
            <td>' .$row["User_ID"]. '</td> 
            <td>' .$row["Full_Name"]. '</td>
            <td>' .$row["Email"]. '</td>
            <td>' .$row["Phone_No"]. '</td>
            <td>' .$row["Date"]. '</td>
            <td> <a href="view-mail.php?id='.$row['User_ID'].'" style="color: #32C5D2;"> view Mail </a> </td>
            <td> <a href="Delete/DeleteMail.php?del='.$row['User_ID'].'" style="color: #D05454;"> <i class = "fa fa-times"></i> Delete </a></td> 
        </tr>
         ';
}

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
    echo '<div class="alert alert-danger" role="alert"> Opps!... No Mails Found</div>';
}

?>