
<?php include('./_Partial Components/Header.php');

?>
<?php 

 ?>
    <div class="container-fluid" style="margin-left: -20px;">
    	<div class="row" id="row">
            <div class="left-side-bar">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                 <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <!-- END PAGE BAR -->
            <div class="right-side-bar">
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-book"> </i> <small> Add Category </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Manage-Category.php"> <i class = "fa fa-book"></i> View Category </a></li>
                </ol>
            </div>
                <div class="col-md-9">
		<!-- END CONTENT BODY -->

					<form class="form-horizontal" action = "" method = "POST">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2">Category</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="Category" placeholder="Category">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="button-start-the-quiz" id = "btn-add-category" style = "width: 200px;"> Add Category</button>
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