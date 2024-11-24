<?php
session_start();
if (!isset($_SESSION['status'])) {
    header('location: login.html');
    exit();
}

$username = isset($_SESSION['logged_in_user']) ? $_SESSION['logged_in_user'] : null;
$password = isset($_SESSION['users'][$username]) ? $_SESSION['users'][$username] : null;
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome Home!</h1>
    <?php if ($username && $password): ?>
        <p>Username: <?php echo htmlspecialchars($username); ?></p>
        <p>Password: <?php echo htmlspecialchars($password); ?></p>
    <?php else: ?>
        <p>No data found!</p>
    <?php endif; ?>
    <a href='logout.php'>Logout</a>
</body>
</html>
