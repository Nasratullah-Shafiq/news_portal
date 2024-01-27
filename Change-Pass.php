<?php

include('./_Partial Components/Header.php');

?>
<?php

if(!isset($_SESSION['Username'])){
    header('Location: sign in.php');
}


if(isset($_SESSION['Username'])){
    $Username = $_SESSION['Username'];
    $UsersByUsername = $exm->getUsersByUsername($Username);
    $row = $UsersByUsername->fetch_assoc();
    $chk_img = $row['Image'];
}
else{
    header("location: index.php");
}
?>

    <div class="jumbotron" id = "jbt" style="background-image: url('./img/IBPS-Banne.jpg'); background-size: cover;">
        <div class="container">
            <div id="details" class="animated fadeInLeft">
                <h1> ONLINE <span> QUIZ </span> SYSTEM </h1>
                <p class = "paragraph">Test Your Intellect</p>
            </div>
        </div>
    </div>
    	<div class="container">
    		<div class="row">
                <div class="col-sm-3">
                    <nav class="nav-profile" id = "#nav-left-side"> 
                        <a href="Profile.php"> <i class='fa fa-user'></i> View Profile </a>
                        <a href="EditProfile.php"> <i class='fa fa-pencil'></i> Edit Profile</a>
                        <a href="QuizHistory.php"> <i class='fa fa-list'></i> View Quiz History</a>
                        <a class = "active" href="change-pass.php"> <i class='fa fa-lock'></i> Change Password</a>
                        <a href="logout.php"> <i class='fa fa-power-off'></i> Logout </a>                    
                    </nav>
                </div>    		
    		    <div class="col-md-6">
				<form class="form-horizontal" action = "" method = "POST">
                  <?php 
                    $UsersByUsername = $exm->getUsersByUsername($Username);
                    if(!$UsersByUsername){
                        echo "<h2> No Users Table exist! </h2>";
                    }
                    else{

                    if($UsersByUsername->num_rows>0){
                        $result = $UsersByUsername->fetch_array();
                    ?>
                <table class="table" style="padding-bottom: 300px;">
                    <tbody>
                        <!-- <tr>
                            <td>  </td>
                        </tr> -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php echo "<img src='img/_ProfilePicture/$chk_img' alt='' class='img-cicle' width='150px' height='130px'/>";?>
                            </div>
                        </div>
                    </tbody>
                    </table>
                    <?php } 
                else{
                    echo "<h2> No Users Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                    ?>
                         <input type="text" style = "display: none;" value="<?php echo $result['User_ID']; ?>" class="form-control" id = "User_ID" name="Username" >
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 ">Full_Name</label>
                            <div class="col-sm-10">
                              <input type="text" value="<?php echo $result['Full_Name']; ?>" class="form-control" id = "Username" name="Username" placeholder="Subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2"> Password </label>
                            <div class="col-sm-10">
                              <input type="password" value="<?php ?>"class="form-control" name="Pass" id = "Password" placeholder="Change Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="button-start-the-quiz" name="submit" id = "btn-update-password" style = "width: 200px; "> Change Password </button>
                                <span id="span-valid" class="span-validation"></span>
                            </div>
                        </div>
                    </form>
				</div>
    		</div>
    	</div>
<?php 
include('./_Partial Components/Footer.php');
?>    