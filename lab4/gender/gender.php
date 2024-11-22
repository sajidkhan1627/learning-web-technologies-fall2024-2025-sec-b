<?php
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    echo' Gender is : '.$gender;
} else {
    $gender = null;
}

if (empty($gender)) {
    echo'At least one of them must be selected ';
    exit();
}
?>
