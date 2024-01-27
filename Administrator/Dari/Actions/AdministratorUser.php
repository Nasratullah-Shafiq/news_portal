<?php

include('./../_Partial Components/Header.php');

?>
<?php

if(isset($_GET['admn'])){
    $User_ID = $_GET['admn'];
    $admnUser = $usr->adminUser($User_ID);
}
else{
    header('Location: ../Manage-Users.php');
}

header('Location: ../Manage-Users.php');
?>
