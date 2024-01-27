
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
                <div calss = "col-md-9" style = "text-align: right;">
                    <h1> <small> درج نمودن سوالات </small><i class = "fa fa-question"> </i> </h1><hr>
                    <ol class="breadcrumb">
                        <li class = ""> <a href="Manage-Questions.php">   مدیریت سوالات  <i class = "fa fa-question"></i>  </a></li>
                        <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                    </ol>
                </div>
                <div class="col-md-9 pull-right ">

                    <form class="form-horizontal" method="POST" action="">

                        <div class="form-group">
                            <label for="Question" class="col-sm-2 control-label pull-right text-right"> سوال </label>
                            <div class="col-sm-10 pull-right">
                                <input type="text" class="form-control text-right" id="Question" placeholder="  سوال  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right">  جواب اول  </label>
                            <div class="col-sm-10 ">
                                <input type="text" class="form-control text-right" id="Answer0" placeholder="  جواب اول  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label text-right pull-right">    جواب دوم   </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-right" id="Answer1" placeholder="  جواب دوم   ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right">  جواب سوم </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-right" id="Answer2" placeholder="  جواب سوم  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right">    جواب چهارم  </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-right" id="Answer3" placeholder="  جواب چهارم  ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input Gender" class="col-sm-2 pull-right text-right"> زبان </label>
                            <div class="col-sm-10">
                                <select name="Gender" class="form-control pull-right text-right" id = "Language">
                                    <option value="English"> English </option>
                                    <option value="Dari"> Dari </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right">  جواب درست  </label>
                            <div class="col-sm-10">
                                <select name="country" id = "Right_Answer" class="form-control text-right">
                                    <option value="0" class = "text-right">  جواب اول  </option>
                                    <option value="1" style = "text-align: right">  جواب دوم  </option>
                                    <option value="2" class = "text-right">  جواب سوم  </option>
                                    <option value="3" class = "text-right">  جواب چهارم  </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label pull-right text-right">  مضمون  </label>
                            <div class="col-sm-10">
                                <select name="countr" id = "Subject_ID" class="form-control pull-right text-right">
                                    <?php $Subject = $exm->getSubject();
                                    if(!$Subject){
                                        echo "<option value=''> Subject table Not Exist! </option>";
                                    }
                                    else{
                                        if($Subject->num_rows>0){
                                            while ($result = $Subject->fetch_assoc()) { ?>

                                                <option value="<?php echo $result['Subject_ID']; ?>"> <?php echo $result['Subject']; ?> </option>
                                            <?php }}
                                        else{
                                            echo "<option value=''> Subject Table is empty </option>";
                                        }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="button-start-the-quiz pull-right" id = "btn-add-questions" >  درج شود  </button>
                                <span id="span-valid" class="span-validation"></span>
                            </div>
                        </div>
                    </form>
                </div>
                	   	  
    		</div>
    	</div>
    </div>

<?php 
include('./_Partial Components/Footer.php');
?>