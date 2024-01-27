<?php

include('./../_Partial Components/Header.php');

if (isset($_GET['del'])) {
	foreach ($_GET as $key => $data) {
    $data2 = $_GET[$key] = base64_decode(urldecode($data));
    $Subject_ID = ((($data2*999999)/9999)/123456789);
  }
  $data = $_GET['del'];

    $deleteSubject = $exm->delSubjects($Subject_ID);

  }

header('Location: ../Manage-Subject.php');
?>
