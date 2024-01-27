
<?php include('./_Partial Components/Header.php');

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
                    <h1> <small>  درج نمودن اساتید </small><i class = "fa fa-user"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li> <a href="Manage-Teacher.php">   مدیریت نمودن اساتید  <i class = "fa fa-user"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
            
            <div class="col-md-9 pull-right">
       <!-- END CONTENT BODY -->

          <form class="form-horizontal" method="POST" action="">
            <div class="form-group">
              <label for="Teacher" class="col-sm-2 text-right pull-right"> استاد </label>
              <div class="col-sm-10">
                <input type="text" class="form-control text-right" id="Teacher_Name" placeholder="  استاد  ">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 text-right pull-right"> ایمیل</label>
              <div class="col-sm-10">
                <input type="email" class="form-control text-right" id="Email" placeholder="  ایمیل آدرس  ">
              </div>
            </div>
            <div class="form-group">
                          <label for="input Gender" class="col-sm-2 text-right pull-right"> زبان </label>
                          <div class="col-sm-10">
                            <select name="Gender" class="form-control text-right" id = "Language">
                            <option value="English"> English </option>
                            <option value="Dari"> Dari </option>
                            </select>
                          </div>
                        </div>
            <div class="form-group">
              <label for="input Gender" class="col-sm-2 text-right pull-right"> جنسیت </label>
              <div class="col-sm-10">
                <select name="Gender" class="form-control text-right" id = "Gender">
                <option value="Male"> مرد </option>
                <option value="Female"> زن </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="input Phone No" class="col-sm-2 text-right pull-right"> شماره تماس </label>
              <div class="col-sm-10">
                <input type="text" class="form-control text-right" id="Mobile_No" placeholder="Phone No">
              </div>
            </div>
            <div class="form-group">
              <label for="input Time" class="col-sm-2 text-right pull-right"> اوقات کاری </label>
              <div class="col-sm-10">
                <select name="Time" class="form-control text-right" id = "Time">
                <option value="Morning"> ۱۴ ساعت </option>
                    <option value="Morning"> صبحانه </option>
                <option value="Evining"> شام </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-10">
                  <button type="submit" class="button-start-the-quiz pull-right" id = "btn-add-teacher" style = "width: 200px;"> اجرا شود </button>
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