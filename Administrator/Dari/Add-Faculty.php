
<?php include('./_Partial Components/Header.php');

?>
<?php $Teacher = $exm->getTeacher();
 ?>
    <div class="containe">
    	<div class="row" id="row">
            <div class="left-side-bar pull-right">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                 <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
                <div calss = "col-md-9 text-right" style = "text-align: right;">
                    <h1> <small> درج نمودن پوهنځۍ </small><i class = "fa fa-home"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-Faculty.php">  مدیریت پوهنځۍ ها  <i class = "fa fa-home"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            <div class="col-md-9 pull-right" id = "shine">
    <!-- END CONTENT BODY -->

          <form class="form-horizontal" action = "" method = "POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2  text-right pull-right"> پوهنځۍ </label>
              <div class="col-sm-10">
                <input type="text" class="form-control  text-right" id="Faculty" placeholder=" پوهنځۍ ">
              </div>
            </div>
            <div class="form-group">
              <label for="input Gender" class="col-sm-2 text-right pull-right"> زبان </label>
              <div class="col-sm-10">
                <select name="Gender" class="form-control text-right" id = " زبان ">
                <option value="English"> انگلیسی </option>
                <option value="Dari"> دری </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <button type="submit" class="btn button-start-the-quiz pull-right" id = "btn-add-faculty" style = "width: 200px;"> ثبت شود </button>
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