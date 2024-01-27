
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
                        <h1> <small>  کټګوری </small><i class = "fa fa-list"> </i> </h1><hr>
                        <ol class="breadcrumb">
                            <li> <a href="Manage-Category.php">   د کټګوری مدیریت  <i class = "fa fa-list"></i>  </a></li>
                            <li ><a href="index.php"> کورپاڼه <i class = "fa fa-tachometer"></i>  </a></li>

                        </ol>
                    </div>
                    <div class="col-md-9 pull-right" id = "shine">
                        <!-- END CONTENT BODY -->

                        <form class="form-horizontal" action = "" method = "POST">
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> کټګوری </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-right" id="Category" placeholder=" کټګوری ">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="submit" class="button-start-the-quiz pull-right" id = "btn-add-category">  سیستم ته داخل شی  </button>
                                    <span id="span-valid" class="span-validation"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END QUICK SIDEBAR -->
                </div>
            </div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>