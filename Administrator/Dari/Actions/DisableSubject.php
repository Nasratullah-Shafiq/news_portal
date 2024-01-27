<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['dsbl'])){
    $Subject_ID = $_GET['dsbl'];
    $dsblSubject = $usr->disableSubject($Subject_ID);
}
//else{
//    header('Location: ../Manage-Subject.php');
//}


header('Location: ../Manage-Subject.php');
?>
