<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html'); 
    }

    if (isset($_REQUEST['id'])){
        echo $_REQUEST['id'];
    }

    $user = ['username'=>'alamin', 'email'=>'alain@aiub.edu', 'password'=>'124'];
?>

<html>
<head>
    <title>Edit Page</title>
</head>
<body>
        <h2>Edit User</h2>
        <a href='home.php'>Back </a> |
        <a href='logout.php'>logout </a>
        <br>
        <form method="post" action="update.php" enctype="">
            
            Username <input type="text" name="username" value="<?=$user['username']?>" /> <br>
            Password <input type="password" name="password" value="<?=$user['password']?>" /> <br>
            Email <input type="email" name="email" value="<?=$user['email']?>" /> <br>
            <input type="submit" name="submit" value="Update" />
        </form>
</body>
</html>