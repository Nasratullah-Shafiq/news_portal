
<?php include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();

?>
<?php 
$Category = $exm->getCategory();

if(isset($_GET['edit'])){
   $Category_ID = $_GET['edit'];
   $CategoryByID = $exm->getCategoryByID($Category_ID);
}
else{
   header('Location: index.php');
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
                <div calss = "col-md-9" style = "text-align: right;">
                    <h1> <small> د کټګورۍ جوړول </small><i class = "fa fa-list-alt"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-Category.php">   د کټګورۍ لیدل  <i class = "fa fa-list-alt"></i>  </a></li>
                        <li ><a href="index.php"> کور پاڼه<i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>

                
                <div class="col-md-9 pull-right ">
                    <?php 
          if(isset($_GET['edit'])){
             $Category_ID = $_GET['edit'];
             $CategoryByID = $exm->getCategoryByID($Category_ID);
             }
             ?>
             
            <?php 
                if (isset($error)) {
                    echo "<span style = 'color: red;' class = 'pull-right'> $error </span>";
                }
                else if (isset($msg)) {
                    echo "<span style = 'color: green;' class = 'pull-right'> $msg </span>";
                }
            ?>
                    <?php 
            $CategoryByID = $exm->getCategoryByID($Category_ID);
            $result = $CategoryByID->fetch_assoc();
          ?>
                    <form class="form-horizontal" method="POST" action="">

                        <div class="form-group" style="display: none;">
                            <label class="col-sm-2 control-label pull-right text-right"> آی دی </label>
                            <div class="col-sm-10 pull-right">
                                <input type="text" value = "<?php echo $result['Category_ID'] ?>" class="form-control text-right" id="Category_ID" placeholder="  آی دی  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right"> کټګوری </label>
                            <div class="col-sm-10 pull-right">
                                <input type="text" value = "<?php echo $result['Category'] ?>" class="form-control text-right" id="Category" placeholder="  کټګوری  ">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="button-start-the-quiz pull-right" id = "btn-edit-Category" >  سیستم ته داخل شی  </button>
                                <span id="spa-valid" class="span-validation"></span>
                                <span id="span-valid" class="span-validation alert alert-success" role="alert"> </span>
                            </div>
                        </div>
                    </form>
                </div>
                        
        </div>
                	   	  
    		</div>
    	</div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>