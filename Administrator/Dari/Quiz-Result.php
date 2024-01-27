
<?php 

include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();


if(isset($_GET['id'])){
   $User_ID = $_GET['id'];
   $QuizResult = $exm->getQuizResultByID($User_ID);

}
else{
    $QuizResult = $exm->getQuizResult();
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
            <div calss = "col-md-9" style = "text-align: right;">
                <h1> <small> نتیجه امتحانات </small><i class = "fa fa-list"> </i> </h1><hr>
                <ol class="breadcrumb">
                    <li class = ""> <a href="Quiz-Result.php"> نتیجه امتحان <i class = "fa fa-list"></i>  </a></li>
                    <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                </ol>
            </div>
            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                            <input type="text" class="form-control text-right" name ="searchQuizResult" id ="searchQuizResult" autocomplete="off" placeholder="نتیجه امتحان را اینجا جستجو کنید... ">

                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
                <div class="col-md-12" id = "QuizResult">
                 
                  <form method = "POST">
                    <?php 

                    if(!$QuizResult){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... This user has not participated in any quiz </div>';
                        echo "<br>";
                    }
                    else{

                    if($QuizResult->num_rows>0){
                           
                    ?>
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr >
                            <th style="text-align: right;"> حذف </th>
                            <th style="text-align: right;"> نتیجه امتحان </th>
                            <th style="text-align: right;"> تاریخ </th>
                            <th style="text-align: right;"> نتیجه </th>
                            <th style="text-align: right;"> بدون جواب </th>
                            <th style="text-align: right;"> اشتباه  </th>
                            <th style="text-align: right;"> درست </th>
                            <th style="text-align: right;"> جواب </th>
                            <th style="text-align: right;"> مضمون </th>
                            <th style="text-align: right;"> استاد </th>
                            <th style="text-align: right;"> اسم یوزر </th>
                            <th style="text-align: right;"> مجموع </th>
                        </tr>
                    </thead>
                <?php 
                $i=0;
                while($row = $QuizResult->fetch_array()){ ?>
                    <tr>
                        <td style="text-align: right;"> <a onclick="return confirm('are you sure you want to delete')" href="Delete/DeleteResult.php?del=<?php echo $row['Result_ID'];?>&id=<?php echo $row['User_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="Delete Quiz Result"> حذف <i class = "fa fa-times"></i> </a> </td>
                        <td style="text-align: right;"> <a href = "ViewResult.php?id=<?php echo $row['Result_ID'];?>" style="color: #32C5D2;"> View Result </td>
                        <td style="text-align: right;"> <?php echo $row['Submit_Date'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['Result'].' %';?> </td>
                        <td style="text-align: right;"> <?php echo $row['No_Answer'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['Wrong_Answer'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['Correct_Answer']?> </td>
                        <td style="text-align: right;"> <?php echo $row['Attempted_Answer'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['Subject'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['Teacher'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['Username'];?> </td>
                        <td style="text-align: right;"> <?php echo $row['TotalNumberOfQuestion'];?> </td>
                    </tr>
                
                <?php $i++; }} 
                else{
                    echo "<br>";
                    echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... This user has not participated in any quiz </div>';
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