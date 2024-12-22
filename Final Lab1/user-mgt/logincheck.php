<?php
    session_start();
    if(isset($_REQUEST['submit'])){

        $username = trim($_POST['username']);
        $password = trim($_REQUEST['password']);

        if($username == null || empty($password)){
            echo "Null username/password!";

        }else if ($_SESSION['user']['username'] == $username && $_SESSION['user']['password']== $password) {
            setcookie('status', 'true', time()+3000, '/');
            header('location: home.php');
        }else{
            echo "invalid user!";
        }
    }else{
        header('location: login.html');
    }

?>