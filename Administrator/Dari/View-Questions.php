
<?php 

include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();


if(isset($_GET['del'])){
   $Question_ID = $_GET['del'];
   $deleteQuestion = $exm->delQuestions($Question_ID);
   if($deleteQuestion){
        $msg = "Question has deleted Successfully";
   }
   else{
        $error = "Questions Not Deleted!";
   }
}

if(isset($_GET['dsbl'])){
   $Question_ID = $_GET['dsbl'];
   $dsblQuestion = $usr->disableQuestion($Question_ID);
}

if(isset($_GET['enbl'])){
   $Question_ID = $_GET['enbl'];
   $enblQuestion = $usr->enableQuestion($Question_ID);
}

?>

<?php 

if(isset($_GET['sb'])){
   $Subject = $_GET['sb'];
}
else{
    header('Location: index.php');
}
?>
    <div class="containe">
    	<div class="row" id="row">
            <!-- BEGIN SIDEBAR -->
            <div class="left-side-bar pull-right">
                
                 <?php include('./_Partial Components/Navigation.php');?>
    
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN DIV CONTENT -->
            <div class="right-side-bar">

            <div class="row">
                <div calss = "col-md-9 text-right" style = "text-align: right;">
                    <h1> <small>  سوالات  <?php echo $Subject;?>  </small> </small><i class = "fa fa-question"> </i> <small> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-Subject.php">   مدیریت مضامین  <i class = "fa fa-book"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
                <div class="col-md-12">
                  <form method = "POST" action = "QuizAnswer.php">
                    <?php 
                    $Question = $exm->getQuestions($Subject);
                    if(!$Question){
                        echo "<br>";
//                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Questions Available for ' . $Subject. ' Subject. </div>';
                        echo '<div class="alert alert-danger text-right" role="alert" style = "font-size: 16px;"> ببخشید برای مضمون  ' .$Subject. ' سوال وجود ندارد</div>';
                        echo "<br>";
                        // echo "<h2> </h2>";
                    }
                    else{

                    if($Question->num_rows>0){
                           
                    ?>

                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th class = "text-right"> حذف </th>
                            <th class = "text-right"> تغیر </th>
                            <th class = "text-right"> عملکرد </th>
                            <th class = "text-right"> حالت </th>
                            <th class = "text-right">  مضمون </th>
                            <th class = "text-right"> جواب چهار </th>
                            <th class = "text-right"> جواب ۳ </th>
                            <th class = "text-right"> جواب ۲ </th>
                            <th class = "text-right"> جواب ۱ </th>
                            <th class = "text-right"> سوال </th>
                            <th class = "text-right"> شماره </th>
                        </tr>
                    </thead>
                <?php 
                $i=0;
                while($row = $Question->fetch_array()){ ?>
                    <tr class = "text-right">
                        <td> <a onclick="return confirm('are you sure you want to delete')" href="Manage-Questions.php?del=<?php echo $row['Question_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Question"> <i class = "fa fa-times"></i> </a> </td>

                        <td> <a href="Edit-Questions.php?edit=<?php echo $row['Question_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Question"> <i class = "fa fa-pencil"></i> </a></td>

                        <?php if($row['Status']=='0'){ ?>
                            <td> <a onclick="return confirm('Are you sure you want to unlock this Question')" href="?sb=<?php echo $Subject ?> & enbl=<?php echo $row['Question_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="This question has blocked Do you want to unblock?"> Unlock </a> </td>
                        <?php } else{?>
                            <td> <a onclick="return confirm('Are you sure you want to Lock This Question')" href="?sb=<?php echo $Subject ?> & dsbl=<?php echo $row['Question_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This question has unblocked Do you want to block?"> lock </a> </td>
                        <?php }?>
                        <?php if($row['Status']=='0'){ ?>
                            <td style = "color: #D05454;"> Lock </td>
                        <?php } else{?>
                            <td style="color: #32C5D2;"> Unlock </td>
                        <?php }?>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Subject'].'</div>';
                            }
                            else{
                                echo $row['Subject'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer3'].'</div>';
                            }
                            else{
                                echo $row['Answer3'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer2'].'</div>';
                            }
                            else{
                                echo $row['Answer2'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer1'].'</div>';
                            }
                            else{
                                echo $row['Answer1'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer0'].'</div>';
                            }
                            else{
                                echo $row['Answer0'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Question'].'</div>';
                            }
                            else{
                                echo $row['Question'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.' <i class = "fa fa-lock"></i> '.$i.'</div>';
                            }
                            else{
                                echo $i;
                            }
                            ?>
                        </td>
                    </tr>

                
                <?php $i++; }} 
                else{
                    echo "<h2> No Questions Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
                    </form>
            <!-- END CONTENT BODY -->
            </div>
            </div> 
            	   	  
		</div>
        <!-- END OF DIV CONTENT -->
	</div>
    <!-- END OF DIV ROW -->
</div>
<!-- END OF DIV CONTAINE -->
<?php 
include('./_Partial Components/Footer.php');
?>