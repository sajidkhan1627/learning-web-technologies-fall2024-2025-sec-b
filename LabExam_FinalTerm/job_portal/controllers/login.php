<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "job_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Get login details from the form
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Validate login credentials (use the correct table and column names)
    $sql = "SELECT * FROM employers WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $inputUsername, $inputPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $inputUsername;
        echo "<h2>Login successful! Welcome, $inputUsername.</h2>";
        echo '<a href="../views/index.html">Go to Employer Portal</a>';
    } else {
        // Login failed
        echo "<h2>Invalid username or password.</h2>";
        echo '<a href="../views/login.html">Try Again</a>';
    }

    // Close connection
    $stmt->close();
} else {
    echo "<h2>Please enter both username and password.</h2>";
}

$conn->close();
?>
