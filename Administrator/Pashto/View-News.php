
<?php 

include('./_Partial Components/Header.php');

if (isset($_GET['nid'])) {
        //$data = $_GET['id'];
        $News_ID = $_GET['nid'];
        $NewsByID = $exm->getNewsByID($News_ID);
   }
    else{
        // header('Location: index.php');
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
                    <h1>
                     <small>  خبرونه </small> / <?php $row = $NewsByID->fetch_array();
                    echo $row['Category']; ?> <i class = "fa fa-list"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-News.php">  د خبرونو لیدل <i class = "fa fa-list"></i>  </a></li>
                        <li ><a href="index.php"> کور پاڼه <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            
            <div class="col-md-12">
                    <?php 
                    $NewsByID = $exm->getNewsByID($News_ID);
                    if(!$NewsByID){
                        echo "<h2> No Contacts exist! </h2>";
                    }
                    else{

                    if($NewsByID->num_rows>0){
                        $result = $NewsByID->fetch_assoc();
                    ?>
                <table class="table text-right float-right" style="padding-bottom: 300px;">
                    <tbody>
                        <tr>
                            
                            <td> <h2> <?php echo $result['Heading']; ?> </h2>  </td>
                            <th class="col-md-2 text-right"> سرلیک </th>
                        </tr>
                        <tr>
                            
                            <td> <h4> <?php echo $result['Body']; ?> </h4>  </td>
                            <th class="col-md-2 text-right"> بشپړ خبرونه </th>
                        </tr>
                        <tr>
                            
                            <td> <?php echo $result['Source']; ?> </td>
                            <th class="col-md-2 text-right"> منبع </th>
                        </tr>
                        <tr>
                            
                            <td> <?php echo $result['Date']; ?> </td>
                            <th class="col-md-2 text-right"> تاریخ </th>
                        </tr>
                        <tr>
                            
                            <td> <?php echo $result['Category']; ?> </td>
                            <th class="col-md-2 text-right"> کتګوری </th>
                        </tr>
                        <tr>
                            <td> <?php echo $result['Visits']; ?> </td>
                            <th class="col-md-2 text-right"> لیدل شوی </th>
                            
                        </tr>
                        <tr>
                            
                            <td> <?php echo $result['Status']; ?> </td>
                            <th class="col-md-2 text-right"> حالت </th>
                        </tr>
                         <tr>
                            
                            <td> <?php echo $result['News_ID']; ?> </td>
                            <th class="col-md-2 text-right"> آی دی  </th>
                        </tr>
                    </tbody>
                    </table>
                    <?php } 
                else{
                    echo "<h2> No Contacts Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                    ?>
                
            <!-- END CONTENT BODY -->
            </div>
    <!-- END CONTENT -->


    </div>
            
             
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