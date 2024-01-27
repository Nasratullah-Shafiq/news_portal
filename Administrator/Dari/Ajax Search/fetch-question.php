<?php 

$output = '';

$connect = mysqli_connect("localhost", "root", "", "quiz");
$request = mysqli_real_escape_string($connect, $_POST['search']);
    
$sql = "SELECT * FROM Viw_Question WHERE Question LIKE '%".$request."%'
or Subject LIKE '%".$request."%'";
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0){

  $output .= '<div calss = "table-responsive">
  <table class="table table-stripped table-hover">
    <thead>
        <tr>
            <th> ID </th>
            <th> Question </th>
            <th> Answer 1 </th>
            <th> Answer 2 </th>
            <th> Answer 3 </th>
            <th> Answer 4 </th>
            <th> Subject </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>';

  while($row = mysqli_fetch_array($result)){

            if($row['Status']==0){
               $output .='<tr> 
                    <td style = "color: #D05454;">' .$row["Question_ID"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Question"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Answer0"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Answer1"]. '</td> 
                    <td style = "color: #D05454;">' .$row["Answer2"]. '</td>
                    <td style = "color: #D05454;">' .$row["Answer3"]. '</td>
                    <td style = "color: #D05454;">' .$row["Subject"]. '</td> 
                    <td> <a href="Edit-Questions.php?edit='.$row['Question_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Question"> <i class = "fa fa-pencil"></i>edt </a></td>
                    <td> <a href="Manage-Questions.php?del='.$row['Question_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Question"> <i class = "fa fa-times"></i> dlt </a> </td>

               </tr>';
            }
            else{
                $output .='
                 <tr>
                    <td>' .$row["Question_ID"]. '</td> 
                    <td>' .$row["Question"]. '</td>
                    <td>' .$row["Answer0"]. '</td>
                    <td>' .$row["Answer1"]. '</td>
                    <td>' .$row["Answer2"]. '</td>
                    <td>' .$row["Answer3"]. '</td>
                    <td>' .$row["Subject"]. '</td>
                    <td> <a href="Edit-Questions.php?edit='.$row['Question_ID'].'" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Question"> <i class = "fa fa-pencil"></i>edt</a></td>
                    <td> <a href="Delete/DeleteQuestion.php?del='.$row['Question_ID'].'" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Question"> <i class = "fa fa-times"></i>dlt</a> </td>
                </tr>
                 ';
            }
}

    $output .='</table>';
    $output .='</div>';
  echo $output;
}
else{
  echo '<div class="alert alert-danger" role="alert"> Opps!... No Question Found</div>';
}

?>