<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "quiz");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Viw_Subject WHERE Subject LIKE '%".$request."%'
or Credit_Hours LIKE '%".$request."%'
or Teacher_Name LIKE '%".$request."%'
or Faculty LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> ID </th>
            <th> Subject </th>
            <th> Credit Hours </th>
            <th> Time </th>
            <th> Teacher </th>
            <th> Faculty </th>
            <th> Status </th>
            <th> Action </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

            if($row['Status']==0){
               $output .='<tr> 
                    <td style = "color: #D05454;">'.'<i class = "fa fa-lock"></i> ' .$row["Subject_ID"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Subject"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Credit_Hours"]. '</td>
                    <td style = "color: #D05454;">' .$row["Time"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Teacher_Name"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Faculty"]. '</td> 
                    <td style = "color: #D05454;"> Lock </td>
                    <td> <a href="?enbl='.$row['Subject_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Subject is Locked You wnat to Unlock?"><i class = "fa fa-check"></i>  Unlock </a> </td>
                    <td> <a href="Edit-Subject.php?edit='.$row['Subject_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Subject"> <i class = "fa fa-pencil"></i> Edit</a></td>
                    <td> <a href="Delete/DeleteSubject.php?del='.$row['Subject_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Subject"> <i class = "fa fa-times"></i> Delete </a> </td>

               </tr>';
            }
            else{
                $output .='
                 <tr>
                    <td>' .$row["Subject_ID"]. '</td> 
                    <td>' .$row["Subject"]. '</td>
                    <td>' .$row["Credit_Hours"]. '</td>
                    <td>' .$row["Time"]. '</td>
                    <td>' .$row["Teacher_Name"]. '</td>
                    <td>' .$row["Faculty"]. '</td>
                    <td style="color: #32C5D2;"> Unlock </td>
                    <td> <a href="?dsbl='.$row['Subject_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Subject is Unlock you want to Lock This?"> <i class = "fa fa-lock"></i>  Lock </a> </td>
                    <td> <a href="Edit-Subject.php?edit='.$row['Subject_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Subject"> <i class = "fa fa-pencil"></i> Edit</a></td>
                    <td> <a href="Manage-Subject.php?del='.$row['Subject_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Subject"> <i class = "fa fa-times"></i> Delete </a> </td>
                 </tr>
                 ';
            }
  }

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Opps!... No Subjects Found</div>';
}

?>