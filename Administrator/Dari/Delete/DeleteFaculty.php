<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['del'])){
   $Facutly_ID = $_GET['del'];
   $deleteFaculty = $exm->delFaculty($Facutly_ID);
}

header('Location: ../Manage-Faculty.php');
?>

  