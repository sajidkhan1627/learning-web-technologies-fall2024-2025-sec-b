<?php

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = null;
}


if (isset($_POST['option']) && count($_POST['option']) >= 2) {
   
    header("Location: BDValidation.php");
    exit();
} else {

    echo "Please select at least two options.";
}
?>