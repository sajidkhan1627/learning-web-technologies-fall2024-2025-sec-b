<?php
require_once '../models/Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employer_name = trim($_POST['employer_name']);
    $company_name = trim($_POST['company_name']);
    $contact_no = trim($_POST['contact_no']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate fields
    if (empty($employer_name) || empty($company_name) || empty($contact_no) || empty($username) || empty($password)) {
        echo "<h2>All fields are required!</h2>";
        echo '<a href="../views/registration.html">Try Again</a>';
        exit;
    }

    // Check if username exists
    $sql = "SELECT * FROM employers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Username already exists. Please choose a different username.</h2>";
        echo '<a href="../views/registration.html">Try Again</a>';
    } else {
        $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $employer_name, $company_name, $contact_no, $username, $password);

        if ($stmt->execute()) {
            echo "<h2>Registration successful! You can now <a href='../views/login.html'>log in</a>.</h2>";
        } else {
            echo "<h2>Error: " . $conn->error . "</h2>";
            echo '<a href="../views/registration.html">Try Again</a>';
        }
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../views/registration.html");
    exit;
}
?>
