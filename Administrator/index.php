<?php

include('./_Partial Components/Header.php');
$totalNews = $exm->getAllNews();
$totalCategories = $exm->getAllCategories();
$totalTeachers = $exm->getAllTeachers();
$totalUsers = $exm->getAllUsers();

// $Username = $_SESSION['Username'];
//     $UsersByUsername = $exm->getUsersByUsername($Username);
//     $row = $UsersByUsername->fetch_assoc();
//     if($row['Role_ID']=='2'){
//         header('Location: ../sign in.php');
//     }
// if(!isset($_SESSION['Username'])){
//    header('Location: ../sign in.php');
// }

?>

    <div class="container-fluid">
    	<div class="row" id="ro">
            <div class="left-side-bar">
                <!-- BEGIN SIDEBAR -->
                <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-tachometer"> </i> Dashboard <small> Statistics overview </small></h1><hr>
                 <ol class="breadcrumb">
                <li><a href="#"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                <li class = "activ"> <a href="#"> <i class = "fa fa-question"></i> Statistics Overview </a></li>
                </ol>
                <!-- BEGIN DIV WITH FOURE DIV PANEL FOR SHOWING STATISTICS OF DATA-->
                
                <div class = "row tab-boxes">

                <!--  BEGIN FISRT THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalNews; ?></div>
                                        <div class="text-right"> News </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-News.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All News</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF FISRT THEM PANEL FOR SHOWING OF DATA  -->

                    <!--  BEGIN SECOND THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalUsers ?> </div>
                                        <div class="text-right"> Users </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-Users.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All Users</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF SECOND THEM PANEL FOR SHOWING OF DATA  -->

                    <!--  BEGIN THIRD THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalCategories ?> </div>
                                        <div class="text-right"> Category </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-Category.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All Categories</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF THIRD THEM PANEL FOR SHOWING OF DATA  -->

                    <!--  BEGIN FOURTH THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalTeachers ?> </div>
                                        <div class="text-right"> Teachers </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-Teacher.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All Teachers</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF FOURTH THEM PANEL FOR SHOWING OF DATA  -->
                </div>

                <div class = "row tab-boxes">

                <!--  BEGIN FISRT THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalNews; ?></div>
                                        <div class="text-right"> News </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-News.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All News</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF FISRT THEM PANEL FOR SHOWING OF DATA  -->

                    <!--  BEGIN SECOND THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalUsers ?> </div>
                                        <div class="text-right"> Users </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-Users.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All Users</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF SECOND THEM PANEL FOR SHOWING OF DATA  -->

                    <!--  BEGIN THIRD THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalCategories ?> </div>
                                        <div class="text-right"> Category </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-Category.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All Category</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF THIRD THEM PANEL FOR SHOWING OF DATA  -->

                    <!--  BEGIN FOURTH THEM PANEL FOR SHOWING OF DATA  -->
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                               <div class = "row">
                                    <div class="col-xs-3 panel-top">
                                        <i class = "fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge"> <?php echo $totalTeachers ?> </div>
                                        <div class="text-right"> Teachers </div>
                                    </div>
                               </div>
                            </div>
                            <a href="Manage-Teacher.php">
                                <div class="panel-footer">
                                    <span class = "pull-left"> View All Teachers</span>
                                    <span class = "pull-right"> <i class = "fa fa-arrow-circle-right"></i></span>
                                    <div class = "clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--  END OF FOURTH THEM PANEL FOR SHOWING OF DATA  -->
                </div>
                </div>
    <!-- END QUICK SIDEBAR -->
        </div> 
                	   	  
    </div>
</div>

<?php 
include('./_Partial Components/Footer.php');
?>