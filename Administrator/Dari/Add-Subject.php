
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
                        <h1> <small>  مضامین </small><i class = "fa fa-book"> </i> </h1><hr>
                        <ol class="breadcrumb">
                            <li> <a href="Manage-Subject.php">   مدیریت مضامین  <i class = "fa fa-book"></i>  </a></li>
                            <li ><a href="index.php"> صفحه اصلی <i class = "fa fa-tachometer"></i>  </a></li>

                        </ol>
                    </div>
                    <div class="col-md-9 pull-right" id = "shine">
                        <!-- END CONTENT BODY -->

                        <form class="form-horizontal" action = "" method = "POST">
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> مضمون </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-right" id="Subject" placeholder=" مضمون ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> زبان </label>
                                <div class="col-sm-10">
                                    <select name="Gender" class="form-control text-right" id = "Language">
                                        <option value="English"> انگلیسی </option>
                                        <option value="Dari"> دری </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> کریدیت </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-right" id="Credit_Hours" placeholder=" کریدیت ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> استاد </label>
                                <div class="col-sm-10">
                                    <select name="Teacher ID" class="form-control text-right" id="Teacher_ID">
                                        <?php $Teacher = $exm->getTeacher();
                                        if(!$Teacher){
                                            echo "<option value=''> Teacher table Not Exist! </option>";
                                        }
                                        else{
                                            if($Teacher->num_rows>0){
                                                while ($result = $Teacher->fetch_assoc()) { ?>

                                                    <option value="<?php echo $result['Teacher_ID']; ?>"> <?php echo $result['Teacher_Name']; ?> </option>
                                                <?php }}
                                            else{
                                                echo "<option value=''> Teacher Table is empty </option>";
                                            }} ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> پوهنځۍ </label>
                                <div class="col-sm-10">
                                    <select name="Teacher_ID" class="form-control text-right" id="Faculty_ID">
                                        <?php $Faculty = $exm->getFaculty();
                                        if(!$Faculty){
                                            echo "<option value=''> Faculty table Not Exist! </option>";
                                        }
                                        else{
                                            if($Faculty->num_rows>0){
                                                while ($result = $Faculty->fetch_assoc()) { ?>

                                                    <option value="<?php echo $result['Faculty_ID']; ?>"> <?php echo $result['Faculty']; ?> </option>
                                                <?php }}
                                            else{
                                                echo "<option value=''> Faculty Table is empty </option>";
                                            }} ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> حالت </label>
                                <div class="col-sm-10">
                                    <select name="Gender" class="form-control text-right" id = "Status">
                                        <option value="0"> اجازه داده شود </option>
                                        <option value="1"> قفل شود </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 pull-right text-right"> وقت امتحان </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-right" id="Time" placeholder=" وقت باید به دقیقه تعین شود..">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="submit" class="button-start-the-quiz pull-right" id = "btn-add-subject" style = "width: 200px;">  درج مضمون  </button>
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