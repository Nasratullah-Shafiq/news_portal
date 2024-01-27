<?php
ob_start();
session_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/Database.php');
include_once($filepath.'/Format.php');
include_once($filepath.'/Method.php');
// include_once($filepath.'/Users.php');
spl_autoload_register(function($class){
include_once "_Partial Components/".$class.".php";
});
$db = new Database();
$fm = new Format();
// $usr = new Users();
$mtd = new Method();

// if(!isset($_SESSION['Username'])){
//     header('Location: sign in.php');
// }
?>
<!DOCTYPE html>
<html>
<head>
<title> News </title>
	<meta charset="utf-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link href="img/checklist.png" rel="icon" type="image/png" >
    <link rel="stylesheet" type = "text/css" href="./Assets/CSS/bootstrap.css">
    <link rel="stylesheet" type = "text/css" href="./Assets/CSS/bootstrap.min.css">

    <link rel="stylesheet" type = "text/css" href = "./Assets/CSS/font-awesome.css">
    <link rel="stylesheet" type = "text/css" href = "./Assets/CSS/font-awesome.min.css">
    <link rel="stylesheet" type = "text/css" href = "./Assets/CSS/News_Style.CSS">
	
    <script type="text/javascript" src = "./Assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src = "./Assets/js/bootstrap.js"></script>
    <script type="text/javascript" src = "./Assets/js/jquery.js"></script>
    <script type="text/javascript" src = "./Assets/js/NewsPortal.js"></script>
    <script type="text/javascript" src = "./Assets/js/AjaxSearch.js"></script>
</head>
<body>
    <div class="container" style="padding-top: 5px; padding-bottom: 5px;">
        <div class="row">
            <div class="col-xs-5 col-sm-2" style="background: rd;">
                <img alt='' width="100px" src='./Assets/img/bbc-blocks-dark.png '/>
            </div>
            

            <div class = "col-xs-5 col-md-2" style="color: black;">
            <?php
            if(!isset($_SESSION['Email'])){?>
            <li style="list-style: none;"><a href="sign in.php"><img alt="" class="img-circle" width="30px;" height = "30px" src="Assets/img/user.png" /> sign in </a></li>
                <?php }?>
                <?php if(isset($_SESSION['Email'])){ 
                $Email = $_SESSION['Email'];
                $UsersByUsername = $mtd->getUsersByUsername($Email);
                $row = $UsersByUsername->fetch_assoc();
                $profile_img = $row['Image'];
            ?>
                <li class="dropdown pull-right">

                
              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    
                        <?php echo "<img alt='' class='img-circle' width='30px;' height = '30px' src='Assets/img/_ProfilePicture/$profile_img ' style = 'margin-top: -5px; margin-bottom: -5px;' />"; ?>
                        <span class="username username-hide-on-mobile"> 
                        <?php echo $row['Username']; ?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
              <ul class="dropdown-menu">
                <li class="li-dropdown" style="padding-top: 6px; padding-bottom: 3px;">
                    <a href="MyProfile.php">
                    <i class="fa fa-user"></i> My Profile </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 3px;">
                    <a href="Inbox.php">
                    <i class="fa fa-envelope"></i> inbox </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 6px;">
                    <a href="Change-Pass.php">
                    <i class="fa fa-key"></i> Change Password </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 6px;">
                    <a href="Logout.php">
                    <i class="fa fa-power-off"></i> Logout </a>
                </li>
              </ul>
            </li>  
            <?php } ?>
            </div>
        </div>

  </div>
	<nav class="navbar navbar-inverse" style = "display:non;" id = "mydiv">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"style = "font-size: 30px;" href="#">NEWS</a>
            <form class=" "  method="POST" style="display: none; padding-top: 10px;">
                <div class="input-group input-group-sm">
                    <span class="input-group-btn" style = "border: 0px;">
                        <button class="btn btn-info" style="background: transparent; border: 0px; border-bottom: 1px solid white; border-radius: 0;"><i style="font-size: 18px;" class="fa fa-search"></i></button>
                    </span>
                    <input type="text" style = "background: transparent; border: 0px; border-bottom: 1px solid white; border-radius: 0;" class="form-control" name ="searchNews" id ="searchNews" autocomplete="off" placeholder="Search News here... ">
                    
                </div>
            </form>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <li class="dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Username <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu">
                <li class="li-dropdown" style="padding-top: 6px; padding-bottom: 3px;">
                    <a id = "dropdown-profle-en" href="Change-Pass.php">
                    <i class="fa fa-user"></i> My Profile </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 3px;">
                    <a id = "dropdown-profle-en" href="Change-Pass.php">
                    <i class="fa fa-envelope"></i> inbox </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 6px;">
                    <a id = "dropdown-profle-en" href="Change-Pass.php">
                    <i class="fa fa-power-off"></i> Change Password </a>
                </li>
                
              </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Language <span class="fa fa-angle-down"></span></a>
                <ul class="dropdown-menu">
                    <li style="padding-bottom: 5px;"> <a href="index.php">English </a></li>
                    <li style="padding-bottom: 5px;"> <a href="Pashto/index.php">  Pashto  </a></li>
                    <li style="padding-bottom: 5px;"><a href="Dari/index.php"> Dari  </a> </li>
                    <li role="separator" class="divider"></li>
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_GET['id'])){ ?>
           <li style = "color: white;">  <a style="color: white;" href="index"> Home </a></li>

          <?php }else{ ?>
           <li style = "color: white;">  <a class = "activ" href="index"> Home</a></li>
           
          <?php }?>

            <?php
                $allCategory = $mtd->getCategory();
                if($allCategory->num_rows>0){
                    while($row = $allCategory->fetch_assoc()){
           
                $ecrypt_1 = (($row['Category_ID']*123456789*9999)/999999);
                $link = "News?id=".urlencode(base64_encode($ecrypt_1));
              
              if(isset($_GET['id']) && $row['Category_ID']==$_GET['id']){
                  
                  $CategoryID = $row['Category_ID'];
                  $Category = $row['Category'];
                  ?>
               
                  <li><a class = "active" href="<?=$link;?>"> <?php echo $Category ?> </a></li>
                  <?php
              }
              else{
                  $CategoryID = $row['Category_ID'];
                  $Category = $row['Category'];
                  ?>
                  <li><a href="<?=$link;?>"> <?php echo $Category ?> </a> </li>
              <?php
              }
          }
            }
                else{
                    echo "<center> <h3><p> No Category found </p></h3> </center>";
                }

            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="news-header">
		<div class="container">
			<div class="news-title">
				<h1> NEWS </h1>
				
			</div>
		</div>

		<div class="news-content">
        <div class = "container" style = "padding-left: 0px;">
        <div id="navbar" class="navbar-collapse collapse">
           


           <ul class="nav navbar-nav" >
            	<?php
					if(isset($_GET['id'])){ ?>
					<a class = "home" href="index.php"> Home </a> |

					<?php }else{ ?>
					<a class = "active home" href="index.php"> Home</a> |
					 
					<?php }?>

					<?php
					    $allCategory = $mtd->getCategory();
					    if($allCategory->num_rows>0){
					        while($row = $allCategory->fetch_assoc()){
                   
                        $ecrypt_1 = (($row['Category_ID']*123456789*9999)/999999);
                        $link = "News?id=".urlencode(base64_encode($ecrypt_1));
                      
                      if(isset($_GET['data']) && $row['Category_ID']==$_GET['id']){
                          
                          $CategoryID = $row['Category_ID'];
                          $Category = $row['Category'];
                          ?>
                       
                          <a class = "active" href="<?=$link;?>"> <?php echo $Category ?> </a> |
                          <?php
                      }
                      else{
                          $CategoryID = $row['Category_ID'];
                          $Category = $row['Category'];
                          ?>
                          <a href="<?=$link;?>"> <?php echo $Category ?> </a> |
                      <?php
                      }
                  }
					}
					    else{
					        echo "<center> <h3><p> No Category found </p></h3> </center>";
					    }

					?>
          </ul>

			<ul class="nav navbar-nav navbar-right" style="display: none;">
            	<li class="dropdown ">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Username <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="li-dropdown" style="padding-top: 6px; padding-bottom: 3px;">
                    <a id = "dropdown-profle-en" href="Change-Pass.php">
                    <i class="fa fa-user"></i> My Profile </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 3px;">
                    <a id = "dropdown-profle-en" href="Change-Pass.php">
                    <i class="fa fa-envelope"></i> inbox </a>
                </li>
                <li class="li-dropdown" style="padding-top: 3px; padding-bottom: 6px;">
                    <a id = "dropdown-profle-en" href="Change-Pass.php">
                    <i class="fa fa-power-off"></i> Change Password </a>
                </li>
                
              </ul>
            </li>
          	</ul>

        	</div><!--/.nav-collapse -->		

	</div>
	</div>
</div>
<script type="text/javascript" src = "./Assets/js/tests/vendor/jquery.min.js"></script>
<script type="text/javascript" src = "./Assets/js/collapse.js"></script>
<script type="text/javascript" src = "./Assets/js/transition.js"></script>
<script type="text/javascript" src = "./Assets/js/modal.js"></script>
<script type="text/javascript" src = "./Assets/js/tooltip.js"></script>
<script type="text/javascript" src = "./Assets/js/popover.js"></script>
<script type="text/javascript" src = "./Assets/js/dropdown.js"></script>
<script type="text/javascript" src = "./Assets/js/carousel.js"></script> 
