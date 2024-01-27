<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['dsbl'])){
    $User_ID = $_GET['dsbl'];
    $dsblUser = $usr->disableUser($User_ID);
}


header('Location: ../Manage-Users.php');
?>
