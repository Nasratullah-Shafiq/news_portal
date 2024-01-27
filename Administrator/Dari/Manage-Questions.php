
<?php 

include('./_Partial Components/Header.php');

if(isset($_GET['dsbl'])){
   $Question_ID = $_GET['dsbl'];
   $dsblQuestion = $usr->disableQuestion($Question_ID);
}

if(isset($_GET['enbl'])){
   $Question_ID = $_GET['enbl'];
   $enblQuestion = $usr->enableQuestion($Question_ID);
}

?>
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar pull-right">
                <!-- BEGIN SIDEBAR -->
                <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
                <div calss = "col-md-9 text-right" style = "text-align: right;">
                    <h1> <small>  سوالات </small><i class = "fa fa-question"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-Questions.php">   درج نمودن سوالات  <i class = "fa fa-question"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>

            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchQuestion" id ="searchQuestion" autocomplete="off" placeholder="  جستجو سوالات  ">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
            <div class="col-md-12" id = "resultQuestion">
                  <form method = "POST">
                    <?php 
                    $Question = $exm->getQuestion();
                    if(!$Question){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Questions Found </div>';
                        echo "<br>";
                    }
                    else{

                    if($Question->num_rows>0){
                           
                    ?>

                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th class = "text-right"> حذف </th>
                            <th class = "text-right"> تغیر دادن </th>
                            <th class = "text-right"> مضمون </th>
                            <th class = "text-right"> جواب ۴ </th>
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
                    <tr>
                        <td class = "text-right"> <a onclick="return confirm('are you sure you want to delete')" href="Delete/DeleteQuestion.php?del=<?php echo $row['Question_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Question"> حذف <i class = "fa fa-times"></i> </a> </td>
                        <td class = "text-right"> <a href="Edit-Questions.php?edit=<?php echo $row['Question_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="Edit Question"> تغیر <i class = "fa fa-pencil"></i> </a></td>
                        <td class = "subject text-right">
                            <a href="View-Questions.php?sb=<?php echo $row['Subject']?>" data-toggle="tooltip" data-placement="top" title="View all Questions for this subject?"  style="color: black;">
                                <?php
                                if($row['Status']==0){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Subject is Locked">'.$row['Subject'].'</div>';
                                }
                                else{
                                    echo $row['Subject'];
                                }
                                ?>
                            </a>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer3'].'</div>';
                            }
                            else{
                                echo $row['Answer3'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer2'].'</div>';
                            }
                            else{
                                echo $row['Answer2'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer1'].'</div>';
                            }
                            else{
                                echo $row['Answer1'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Answer0'].'</div>';
                            }
                            else{
                                echo $row['Answer0'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$row['Question'].'</div>';
                            }
                            else{
                                echo $row['Question'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']==0){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="This Question is Locked">'.$i.' <i class = "fa fa-lock"></i> '.'</div>';
                            }
                            else{
                                echo $i;
                            }
                            ?>
                        </td>
                    </tr>
                
                <?php $i++; }} 
                else{
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Questions Found </div>';
                    echo "<br>";
                    }
                    }
                  
                    ?>
                    </table>
                    </form>
            <!-- END CONTENT BODY -->
            </div>
    <!-- END CONTENT -->
           </div>      	   	  
		</div>
	</div>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php 
include('./_Partial Components/Footer.php');
?>