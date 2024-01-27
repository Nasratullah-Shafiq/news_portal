<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['enbl'])){
    $Subject_ID = $_GET['enbl'];
    $enblSubject = $usr->enableSubject($Subject_ID);
}

header('Location: ../Manage-Subject.php');
?>
