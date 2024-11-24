<?php
session_start();

if (isset($_REQUEST['submit'])) 
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == null || $password == null) {
        echo "Null username/password!";
    } 
    
    else 
    {
        // Save username and password in a session array
        if (!isset($_SESSION['users'])) 
        {
            $_SESSION['users'] = []; // An empty array to store users
        }
        
        
        else 
        {
            $_SESSION['users'][$username] = $password;

            echo "Registration successful!";
            header('Location: login.html'); // Redirect to login page
            exit();
        }
    }
} 

else 
{
    echo "Invalid Registration!";
}
?>
