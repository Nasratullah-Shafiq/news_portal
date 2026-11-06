
<?php include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();


 foreach ($_GET as $key => $data) {
    $data2 = $_GET[$key] = base64_decode(urldecode($data));
    $Category_ID = ((($data2*999999)/9999)/123456789);
  }

if (isset($_GET['edt'])) {
  $data = $_GET['edt'];

	$CategoryByID = $exm->getCategoryByID($Category_ID);
  }
else{
    //header('Location: index.php');
} 

?>

    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar">
                <!-- BEGIN SIDEBAR -->
                <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-list"> </i> <small> Edit Category </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-Category.php"> <i class = "fa fa-book"></i> View Category </a></li>
                </ol>
            </div>
                <div class="col-md-9">
		<!-- END CONTENT BODY -->
					
                    <?php 
						$result = $CategoryByID->fetch_assoc();
					?>
					<form class="form-horizontal" action = "" method = "POST">
						<div class="form-group" style = "display: none;">
							<label for="inputEmail3" class="col-sm-2">Category_ID</label>
							<div class="col-sm-10">
							  <input type="text" value="<?php echo $result['Category_ID']; ?>" class="form-control" id = "Category_ID" placeholder=" Category ID">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2"> Category </label>
							<div class="col-sm-10">
							  <input type="text" value="<?php echo $result['Category']; ?>" class="form-control" id = "Category" name="Category" placeholder=" Category ">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="button-start-the-quiz" name="submit" id = "btn-edit-category" style = "width: 200px;"> Update Category</button>
								<span id="span-valid" class="span-validation"></span>
							</div>
						</div>
					</form>
				</div>
    
    <!-- END QUICK SIDEBAR -->
</div> 
                	   	  
    		</div>
    	</div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>