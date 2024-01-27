
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
                    <h1> <small>  خبرونه </small><i class = "fa fa-list"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Add-News.php">  د خبرونو جوړول <i class = "fa fa-list"></i>  </a></li>
                        <li ><a href="index.php"> کور پاڼه <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>

            <div class = "col-sm-5 text-right pull-right">
                <form class=" "  method="POST">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-right" name ="searchNews" id ="searchNews" autocomplete="off" placeholder="  دخبرونو لټون ">
                            <span class="input-group-btn">
                                <button class="btn btn-green"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                </form>
            </div>
            <div class="col-md-12" id = "resultNews">
                  <form method = "POST">
                    <?php 
                    $News = $exm->getNews();
                    if(!$News){
                        echo "<br>";
                        echo '<div class="alert alert-danger" role="alert" style = "font-size: 16px;"> Opps!... No Result Found </div>';
                        echo "<br>";
                    }
                    else{

                    if($News->num_rows>0){
                           
                    ?>

                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th class = "text-right"> پاکول </th>
                            <th class = "text-right"> تغیر ورکول </th>
                            <th class = "text-right"> کټګوری </th>
                            <th class = "text-right"> حالت </th>
                            <th class = "text-right"> منبع </th>
                            <th class = "text-right"> تاریخ </th>
                            <th class = "text-right"> سرلیک </th>
                            <th class = "text-right"> شماره </th>
                        </tr>
                    </thead>
                <?php 
                $i=0;
                while($row = $News->fetch_array()){ ?>
                    <tr>
                        <td class = "text-right"> <a onclick="return confirm('آیا غواړۍ دا خبر دیلیت شی ؟')" href="Delete/DeleteNews.php?del=<?php echo $row['News_ID'];?>" style="color: #D05454;"  data-toggle="tooltip" data-placement="top" title="خبر پاک شی "> حذف <i class = "fa fa-times"></i> </a> </td>
                        <td class = "text-right"> <a href="Edit-News.php?edit=<?php echo $row['News_ID'];?>" style="color: #32C5D2;"  data-toggle="tooltip" data-placement="top" title="خبر اصلاح شی"> تغیر <i class = "fa fa-pencil"></i> </a></td>
                        <td class = "subject text-right">
                            <?php
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="دا خبر قفل دی">'.$row['Category'].'</div>';
                                }
                                else{
                                    echo $row['Category'];
                                }
                                ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']=="Pending"){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="دا خبر قفل دی">'.$row['Status'].'</div>';
                            }
                            else{
                                echo $row['Status'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']=="Pending"){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="دا خبر قفل دی">'.$row['Source'].'</div>';
                            }
                            else{
                                echo $row['Source'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']=="Pending"){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="دا خبر قفل دی">'.$row['Date'].'</div>';
                            }
                            else{
                                echo $row['Date'];
                            }
                            ?>
                        </td>
                        <td class = "text-right">
                        <a href="View-News.php?nid=<?php echo $row['News_ID']?>" data-toggle="tooltip" data-placement="top" title="ټول خبرونه ولیدل شی?"  style="color: black;">
                                <?php
                                if($row['Status']=="Pending"){
                                    echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="دا خبر قفل دی">'.$row['Heading'].'</div>';
                                }
                                else{
                                    echo $row['Heading'];
                                }
                                ?>
                            </a>
                        </td>
                        <td class = "text-right">
                            <?php
                            if($row['Status']=="Pending"){
                                echo '<div style = "color: #D05454;"  data-toggle="tooltip" data-placement="top" title="دا خبر قفل دی">'.$i.' <i class = "fa fa-lock"></i> '.'</div>';
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