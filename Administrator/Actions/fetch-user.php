<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "quiz");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Users WHERE Full_Name LIKE '%".$request."%' 
or Username LIKE '%".$request."%'
or Email LIKE '%".$request."%'
or Gender LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> ID </th>
            
            <th> Full Name </th>
            <th> Username </th>
            <th> Email </th>
            <th> Gender </th>
            <th> Status </th>
            <th> Action </th>
            <th> Role </th>
            <th> View Result </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

         if ($row['Role_ID']==2) {
            if($row['Status']==0){
               $output .='<tr> 
                    <td style = "color: #D05454;">'.' <i class = "fa fa-lock"></i> ' .$row["User_ID"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Full_Name"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Username"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Email"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Gender"]. '</td> 
                    <td style = "color: #D05454;"><i class="fa fa-times"></i> Disable </td>
                    <td style="color: #D05454;"><a  href="Actions/EnableUser.php?enbl='. $row["User_ID"].'" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="User is Disabled are you wanna enable?"> <i class = "fa fa-check"></i> Enable </a> </td>
                    <td> <a href="Actions/AdministratorUser.php?admn='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="This is Standard User. change to Administrator?"> <i class = "fa fa-check-circle"></i> Standard </a> </td>
                    <td> <a href = "Quiz-Result.php?id='.$row['User_ID'].'" style="color: #32C5D2;"> Quiz Result </a> </td>
                    <td> <a href="Edit-Users.php?edit='.$row['User_ID'].'" style="color: #32C5D2;"> <i class = "fa fa-pencil"></i> Edit </a></td>
                    <td> <a href="Delete/DeleteUsers.php?del='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>

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
                    <td > <i class="fa fa-circle" style="font-size: 10px; color: rgb(29,179,5);"></i> Active </td>
                    <td> <a href="Actions/DisableUser.php?dsbl='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="User is enable are you wanna disabl?"> <i class = "fa fa-times"></i> Disable </a> </td>
                    <td> <a href="Actions/AdministratorUser.php?admn='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="This is Standard User. change to Administrator?"> <i class = "fa fa-check-circle"></i> Standard </a> </td>
                    <td> <a href = "Quiz-Result.php?id='.$row['User_ID'].'" style="color: #32C5D2;"> Quiz Result </a> </td>
                    <td> <a href="Edit-Users.php?edit='.$row['User_ID'].'" style="color: #32C5D2;"> <i class = "fa fa-pencil"></i> Edit </a></td>
                    <td> <a href="Delete/DeleteUsers.php?del='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>
                 </tr>
                 ';
            }
         }
         else{
            if($row['Status']==0){
               $output .='<tr> 
                    <td style = "color: #D05454;">'.' <i class = "fa fa-lock"></i> ' .$row["User_ID"]. '</td> 

                    <td style = "color: #D05454;">' .$row["Full_Name"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Username"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Email"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Gender"]. '</td> 
                    <td style = "color: #D05454;"><i class="fa fa-times"></i> Disable </td> 
                    <td> <a href="Actions/EnableUser.php?enbl='.$row['User_ID'].'" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="User is Disabled are you wanna enable?"> <i class = "fa fa-check"></i> Enable </a> </td>
                    <td> <a href="Actions/StandardUser?std='.$row['User_ID'].'" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="This is Administrator User. change to Standard?"> <i class = "fa fa-check-circle"></i> Administrator </a> </td>
                    <td> <a href = "Quiz-Result.php?id='.$row['User_ID'].'" style="color: #32C5D2;"> Quiz Result </a> </td>
                    <td> <a href="Edit-Users.php?edit='.$row['User_ID'].'" style="color: #32C5D2;"> <i class = "fa fa-pencil"></i> Edit </a></td>
                    <td> <a href="Delete/DeleteUsers.php?del='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>

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
                    <td > <i class="fa fa-circle" style="font-size: 10px; color: rgb(29,179,5);"></i> Active </td>
                    <td> <a href="Actions/DisableUser.php?dsbl='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="User is enable are you wanna disabl?"> <i class = "fa fa-times"></i> Disable </a> </td>
                    <td> <a href="Actions/StandardUser.php?std='.$row['User_ID'].'" style="color: #32C5D2;" data-toggle="tooltip" data-placement="top" title="This is Administrator User. change to Standard?"> <i class = "fa fa-check-circle"></i> Administrator </a> </td>
                    <td> <a href = "Quiz-Result.php?id='.$row['User_ID'].'" style="color: #32C5D2;"> Quiz Result </a> </td>
                    <td> <a href="Edit-Users.php?edit='.$row['User_ID'].'" style="color: #32C5D2;"> <i class = "fa fa-pencil"></i> Edit </a></td>
                    <td> <a href="Delete/DeleteUsers.php?del='.$row['User_ID'].'" style="color: #D05454;" data-toggle="tooltip" data-placement="top" title="Delete User"> <i class = "fa fa-times"></i> Delete </a> </td>
                 </tr>
                 ';
            }
         }
  }

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Sorry!... No Users record Found</div>';
}

?>