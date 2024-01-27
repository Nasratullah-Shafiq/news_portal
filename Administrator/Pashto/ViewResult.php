
<?php 

include('./_Partial Components/Header.php');
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./_Partial Components/Users.php');
$usr = new Users();

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

if(isset($_GET['id'])){
    $Result_ID = $_GET['id'];
    $QuizByResult = $exm->getQuizResultByResult($Result_ID);
    $row = $QuizByResult->fetch_assoc();
}
?>
   <script type="text/javascript">
   $(document).ready(function(){
        $('#printAnswer').click(function(){
            var mode = 'iframe';
            var close = mode == 'popup';
            var options = {mode:mode, popClose:close};
            $('#tblAnswer').printArea(options);
        });
   });
   </script>
   <script type="text/javascript">
        function PrintResult(el){
            var restorepage = document.body.innerHTML;
            var PrintResult = document.getElementById(el).innerHTML;
            document.body.innerHTML = PrintResult;
            window.print();
        }
   </script>

    <div class="containe">
    	<div class="row" id="row">
            <!-- BEGIN SIDEBAR -->
            <div class="left-side-bar pull-right">
                
                 <?php include('./_Partial Components/Navigation.php');?>
    
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN DIV CONTENT -->
            <div class="right-side-bar">

            <div class="row">
            <div calss = "col-md-9">
                <h1> <i class = "fa fa-list"> </i> <small> View Quiz Result </small></h1><hr>
                <ol class="breadcrumb">
                    <li ><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Quiz-Result.php"> <i class = "fa fa-list"></i> Quiz Result </a></li>
                    <li class = ""> <a href="#" id = "">
                        <i class = "fa fa-print"></i> <button type = "button" value = "Print" class = "" style="background: transparent; border: none;" onclick="PrintResult('answer-form');" id = "printAwer"> Print Result 
                        </button> </a></li>
                </ol>
            </div>
            <div class="col-md-8" id = "answer-form">
        <table class="table" >
                <thead>
                    <tr>  
                        <th> Profile Picture </th>
                        <th> <?php echo "<img alt=''width='150px' height = '120px' src='./../../img/_ProfilePicture/$profile_img' style = 'margin-top: -5px; margin-bottom: -5px;' />"; ?> </th>
                    </tr>
                    <tr>
                        <th> Total Number of Questions </th>
                        <th> <?php echo $row['TotalNumberOfQuestion'] ?> </th>
                    </tr>
                    <tr>
                        <th> Your Name </th>
                        <th> <?php echo $row['Username'];?> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th> Teacher </th>
                        <td> <?php echo $row['Teacher'];?> </td>
                    </tr>
                    <tr>
                        <th> Subject </th>
                        <td> <?php echo $row['Subject'];?> </td>
                    </tr>
                    <tr>
                        <th> Credit Hour </th>
                        <td> <?php echo $row['Credit_Hours'];?> </td>
                    </tr>
                    <tr>
                        <th> Attempted Answers </th>
                        <td> <?php echo $row['Attempted_Answer'] ?></td>
                    </tr>
                    <tr>    
                        <th> Correct Answers </th>
                        <td> <?php echo $row['Correct_Answer'];?> </td> 
                    </tr>
                    <tr>
                        <th> Wrong Answers </th>
                        <td> <?php echo $row['Wrong_Answer'];?> </td>
                    </tr>
                    <tr>
                        <th> No Answered </th>
                        <td> <?php echo $row['No_Answer'];?> </td>
                    </tr>
                    <tr>
                        <th> Your Result </th>
                        <td> <?php echo $row['Result'].' %';?></td>
                    </tr>
                    
                </tbody> 
                </table>
            </div>
            </div> 
            	   	  
		</div>
        <!-- END OF DIV CONTENT -->
	</div>
    <!-- END OF DIV ROW -->
</div>
<!-- END OF DIV CONTAINE -->
<?php 
include('./_Partial Components/Footer.php');
?>