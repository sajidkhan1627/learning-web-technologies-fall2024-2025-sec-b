<?php
    session_start();
    if(isset($_REQUEST['submit'])){
        
        $username = trim($_POST['username']);
        $password = trim($_REQUEST['password']);
        //echo "your username is: ".$username;
        //echo "your username is: {$username}";

        if($username == null || empty($password)){
            echo "Null username/password!";

        }else if ($username == $password) {
            //echo "valid user!";
            $_SESSION['status'] = true;
            header();
        }else{
            echo "invalid user!";
        }
    }
    else{
        header('location: login.html');
    }

?>