<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = trim($_POST["email"]);

        if (empty($email)) {
        echo "Email cannot be empty.<br>";
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.<br>";
        } 
        else {
        echo "Email is valid!";
        }
    }

?>