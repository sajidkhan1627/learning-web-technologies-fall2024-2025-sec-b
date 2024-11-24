<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header('location: login.html'); 
    }
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
        <h1>Welcome Home!</h1>
        <a href='logout.php'>logout </a>
</body>
</html>




