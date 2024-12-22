<?php
    session_start();
    if(isset($_REQUEST['submit'])){
        
        $username = trim($_POST['username']);
        $password = trim($_REQUEST['password']);
        $email = trim($_REQUEST['email']);

        if($username == null || empty($password || empty($email))){
            echo "Null username/password/email!";

        }else {
            $user = ['username'=> $username, 'password'=> $password, 'email'=> $email];
            $_SESSION['user'] = $user;
            header('location: login.html');
        }
    }else{
        header('location: reg.html');
    }

?>