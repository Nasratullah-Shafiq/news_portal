<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "News_Portal");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Users WHERE User_ID LIKE '%".$request."%'
or Full_Name LIKE '%".$request."%'
or Username LIKE '%".$request."%'
or Email LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> User_ID </th>
            <th> Full Name </th>
            <th> Username </th>
            <th> Email </th>
            <th> Gender </th>
            <th> Phone no </th>
            <th> Role_ID </th>
            <th> Status </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

            if($row['Status']==0){
               $output .='<tr> 
                    <td style = "color: #D05454;">'.'<i class = "fa fa-lock"></i> ' .$row["User_ID"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Full_Name"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Username"]. '</td>
                    <td style = "color: #D05454;">' .$row["Email"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Gender"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Phone_No"]. '</td>
                    <td style = "color: #D05454;">' .$row["Role_ID"]. '</td>
                    <td style = "color: #D05454;">' .$row["Status"]. '</td> 
                    <td style = "color: #D05454;"> Lock </td>
                    <td> <a href="Actions/UserSubject.php?enbl='.$row['Subject_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Subject is Locked You wnat to Unlock?"><i class = "fa fa-check"></i>  Unlock </a> </td>
                    <td> <a href="Edit-User.php?edit='.$row['Subject_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Subject"> <i class = "fa fa-pencil"></i> Edit</a></td>
                    <td> <a href="Delete/DeleteUser.php?del='.$row['Subject_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Subject"> <i class = "fa fa-times"></i> Delete </a> </td>

               </tr>';
            }
            else{
                $output .='
                 <tr>
                    <td>' .$row["User_ID"]. '</td> 
                    <td>' .$row["Full_Name"]. '</td>
                    <td>' .$row["Username"]. '</td>
                    <td>' .$row["Email"]. '</td>
                    <td>' .$row["Gender"]. '</td>
                    <td>' .$row["Phone_No"]. '</td>
                    <td>' .$row["Role_ID"]. '</td>
                    <td>' .$row["Status"]. '</td>
                    <td style="color: #32C5D2;"> Unlock </td>
                    <td> <a href="Actions/DisableSubject.php?dsbl='.$row['User_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Subject is Unlock you want to Lock This?"> <i class = "fa fa-lock"></i>  Lock </a> </td>
                    <td> <a href="Edit-Subject.php?edit='.$row['User_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Subject"> <i class = "fa fa-pencil"></i> Edit</a></td>
                    <td> <a href="Manage-Subject.php?del='.$row['User_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Subject"> <i class = "fa fa-times"></i> Delete </a> </td>
                 </tr>
                 ';
            }
  }

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Sorry!... No Users Record Found</div>';
}

?>