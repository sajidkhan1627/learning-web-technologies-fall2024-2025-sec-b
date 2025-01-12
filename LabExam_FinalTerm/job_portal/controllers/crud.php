<?php
// Database connection
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "employer_portal"; // Use your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the action from the request
$action = isset($_POST['action']) ? $_POST['action'] : '';

// Handle different actions
switch ($action) {
    case 'create':
        createEmployer($conn);
        break;

    case 'read':
        readEmployers($conn);
        break;

    case 'search':
        searchEmployers($conn);
        break;

    case 'update':
        updateEmployer($conn);
        break;

    case 'delete':
        deleteEmployer($conn);
        break;

    default:
        echo "Invalid action";
        break;
}

// Function to create employer
function createEmployer($conn) {
    $employerName = isset($_POST['employer_name']) ? $_POST['employer_name'] : '';
    $companyName = isset($_POST['company_name']) ? $_POST['company_name'] : '';
    $contactNo = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "INSERT INTO employers (employer_name, company_name, contact_no, username, password) 
            VALUES ('$employerName', '$companyName', '$contactNo', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Employer created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to read all employers
function readEmployers($conn) {
    $sql = "SELECT * FROM employers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . " - Employer: " . $row['employer_name'] . " - Company: " . $row['company_name'] . " - Contact No: " . $row['contact_no'] . "<br>";
        }
    } else {
        echo "No employers found";
    }
}

// Function to search employers
function searchEmployers($conn) {
    $query = isset($_POST['query']) ? $_POST['query'] : '';
    $sql = "SELECT * FROM employers WHERE employer_name LIKE '%$query%' OR company_name LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . " - Employer: " . $row['employer_name'] . " - Company: " . $row['company_name'] . "<br>";
        }
    } else {
        echo "No employers found for the search query";
    }
}

// Function to update employer
function updateEmployer($conn) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $employerName = isset($_POST['employer_name']) ? $_POST['employer_name'] : '';
    $companyName = isset($_POST['company_name']) ? $_POST['company_name'] : '';
    $contactNo = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $sql = "UPDATE employers 
            SET employer_name='$employerName', company_name='$companyName', contact_no='$contactNo', username='$username', password='$password' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Employer updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to delete employer
function deleteEmployer($conn) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    $sql = "DELETE FROM employers WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Employer deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
