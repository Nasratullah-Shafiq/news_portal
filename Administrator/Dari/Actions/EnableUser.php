<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['enbl'])){
    $User_ID = $_GET['enbl'];
    $enblUser = $usr->enableUser($User_ID);
}

header('Location: ../Manage-Users.php');
?>
