<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['del'])){
   $Comment_ID = $_GET['del'];
   $deleteComment = $exm->delComment($Comment_ID);
   if($deleteComment){
        $msg = "Comment has deleted Successfully";
   }
   else{
        $error = "Comment Not Deleted!";
   }
}

//header('Location: ../Manage-Subject.php');
?>
