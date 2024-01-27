<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['del'])){
   $Subject_ID = $_GET['del'];
   $deleteSubject = $exm->delSubjects($Subject_ID);
   if($deleteSubject){
        $msg = "Subject has deleted Successfully";
   }
   else{
        $error = "Subject Not Deleted!";
   }
}

header('Location: ../Manage-Subject.php');
?>
